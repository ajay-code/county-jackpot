<template>
    <div>
        <transition name="fade" mode="out-in">
            <div v-if="timeleft" class="interval" :key="'time-left'">
                <span v-text="timeleft"></span> seconds left
            </div>
            <div v-if="!timeleft" class="interval" ::key="'question'">
                Which image was repeated
                <span v-text="answerImageRepeatTime"></span> Times
            </div>
        </transition>
        <transition name="slide">
            <section v-if="timeleft" class="img-display shake">
                <div v-for="(image, index) in displayableImages" :key="index">
                    <img :src="`/game/${image.name}`" alt="">
                </div>
            </section>
        </transition>
        <transition name="slide">
            <section v-if="timeleft == 0" class="img-display">
                <div v-for="(image, index) in questionImages" :key="index" @click="checkAnswer(image.id)">
                    <img :src="`/game/${image.name}`" alt="">
                </div>
            </section>
        </transition>

        <section class="question hide">

        </section>
    </div>
</template>

<script>
import axios from 'axios';
import Images from "@/data/images";
import localforage from "localforage";
export default {
    data() {
        return {
            images: [],
            questionImages: [],
            displayableImages: [],
            questionImagesArrayLength: 4,
            displayableImagesArrayLenght: 16,
            repeat: {
                "4": "",
                "3": "",
                "2": ""
            },
            timeleft: 5,
            answer: "",
            isAnswered: false,
            answerImageRepeatTime: ""
        };
    },
    props: {
        lottery: {
            type: Object
        }
    },
    created() {
        this.images = Images;
        localforage.setItem("lotteryIdForGame", this.lottery.id).then(() => {
            return localforage.getItem("lotteryIdForGame");
        });
        this.init();
    },
    mounted() {
        this.selectAnswer();
        this.selectQuestionImages();
        let interval = setInterval(() => {
            this.timeleft--;
            if (this.timeleft <= 0) {
                window.clearInterval(interval);
            }
        }, 1000);
    },
    methods: {
        init() {
            let filteredArray = this.selectRepeatingImages();
            this.setDisplayableImages(filteredArray);
            this.shuffleDisplayableImages();
            console.log("done");
        },
        selectRepeatingImages() {
            let except = [];
            let filteredArray = this.images.filter(image => !except.includes(image.id));

            this.repeat["4"] = filteredArray[_.random(0, filteredArray.length - 1)];
            except.push(this.repeat["4"].id);
            filteredArray = this.images.filter(image => !except.includes(image.id));

            this.repeat["3"] = filteredArray[_.random(0, filteredArray.length - 1)];
            except.push(this.repeat["3"].id);
            filteredArray = this.images.filter(image => !except.includes(image.id));

            this.repeat["2"] = filteredArray[_.random(0, filteredArray.length - 1)];
            except.push(this.repeat["2"].id);
            filteredArray = this.images.filter(image => !except.includes(image.id));
            return filteredArray;
        },
        setDisplayableImages(filteredArray) {
            _.times(4, () => {
                this.displayableImages.push(this.repeat["4"]);
            });
            _.times(3, () => {
                this.displayableImages.push(this.repeat["3"]);
            });
            _.times(2, () => {
                this.displayableImages.push(this.repeat["2"]);
            });

            let index = 1;
            while (this.displayableImages.length < this.displayableImagesArrayLenght) {
                this.displayableImages.push(filteredArray[index]);
                index++;
            }
        },
        shuffleDisplayableImages() {
            let shouldShuffle = true;
            while (shouldShuffle) {
                this.displayableImages = _.shuffle(this.displayableImages);
                console.log("shuffled");
                shouldShuffle = false;
                for (let index = 0; index <= this.displayableImages.length - 2; index++) {
                    // console.log(`index : ${index}`)
                    if (
                        this.displayableImages[index] == this.displayableImages[index + 1] ||
                        this.displayableImages[index] == this.displayableImages[index - 4] ||
                        this.displayableImages[index] == this.displayableImages[index + 4] ||
                        this.displayableImages[index] == this.displayableImages[index + 5] ||
                        this.displayableImages[index] == this.displayableImages[index - 5] ||
                        this.displayableImages[index] == this.displayableImages[index + 3] ||
                        this.displayableImages[index] == this.displayableImages[index - 3]
                    ) {
                        shouldShuffle = true;
                    }
                }
            }
        },
        selectAnswer() {
            let selectFrom = ["4", "3", "2"];
            let selectedIndex = _.random(0, 2);
            this.answerImageRepeatTime = selectFrom[selectedIndex];
            this.answer = this.repeat[selectFrom[selectedIndex]];
        },
        selectQuestionImages() {
            this.questionImages.push(this.answer);
            let filteredArray = this.images.filter(image => image.id != this.answer.id);
            let index = 1;
            while (this.questionImages.length < this.questionImagesArrayLength) {
                this.questionImages.push(filteredArray[index]);
                index++;
            }
            this.questionImages = _.shuffle(this.questionImages);
        },
        checkAnswer(id) {
            let result = '';
            this.isAnswered = true;
            if(this.answer.id == id){
                result = 'won';
            }else{
                result = 'lost';
            }
            this.getTransactionChargeId().then(chargeId => {
                axios.post(`game/result/store`, {
                    charge_id: chargeId,
                    result
                }).then(()=>{
                    this.clear();
                    if(result == 'won'){
                        window.location = '/my-lotteries'
                    }else{
                        alert('you lost')
                        window.location = '/transactions'
                    }
                })
            })
        },
        clear(){
            localforage.clear();
        },
        getTransactionChargeId(){
            return localforage.getItem("lotteryTransactionChargeIdForGame");
        }

    }
};
</script>

<style>
.interval {
    text-align: center;
    padding: 20px;
    font-size: 20px;
}

.img-display {
    font-size: 0;
    flex-flow: row wrap;
    display: flex;
    justify-content: center;
    padding: 50px 300px;
}

.img-display div {
    flex: auto;
    width: calc(100% * (1/4) - 10px);
    position: relative;
    margin: 5px;
}

.shake div {
    animation: shake 3s cubic-bezier(0.36, 0.07, 0.19, 0.97) infinite;
}

.img-display div .number {
    position: absolute;
    left: 2px;
    padding: 2px 12px;
    color: white;
    font-size: 36px;
    background: #9a0909;
}

.img-display div img {
    width: 100%;
    height: 100%;
}

@keyframes shake {
    10% {
        transform: rotate3d(0, 1, 0, 30deg);
    }
    50% {
        transform: rotate3d(0, 1, 1, 30deg);
    }
    100% {
        transform: rotate3d(0, 0, 0, 0deg);
    }
}

.slide-enter-active,
.slide-leave-active {
    animation: in 1s ease-in-out 600ms forwards;
}

.slide-enter,
.slide-leave-to {
    animation: out 600ms ease-in-out forwards;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

@keyframes out {
    0% {
        transform: translateX(0px);
    }
    100% {
        transform: translateX(-100vw);
    }
}

@keyframes in {
    0% {
        opacity: 0;
        transform: translateX(100vw);
    }
    100% {
        opacity: 1;
        transform: translateX(0px);
    }
}
</style>