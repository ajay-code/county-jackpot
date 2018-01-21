<template>
    <div>
        <loader v-if="loading"></loader>
        <transition name="fade" mode="out-in">
            <div v-if="timeleft" class="interval" :key="'time-left'">
                <span v-text="timeleft"></span> seconds left
            </div>
            <div v-if="timeleft == 0 && !showBuy" class="interval" ::key="'question'">
                Which image was repeated
                <span v-text="answerImageRepeatTime"></span> Times
            </div>
        </transition>
        <transition name="slide" mode="out-in">
            <section v-if="timeleft" class="img-display shake" :key="'images-displayable'">
                <div v-for="(image, index) in displayableImages" :key="index">
                    <img :src="`/game/${image.name}`" alt="">
                </div>
            </section>
            <section v-if="timeleft == 0 && !showBuy" class="img-display" :key="'images-question'">
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
import axios from "axios";
import Images from "@/data/images";
import localforage from "localforage";
export default {
    data() {
        return {
            images: [],
            answer: "",
            stripe: "",
            formData: {
                stripeEmail: "",
                stripeToken: ""
            },
            loading: false,
            questionImages: [],
            displayableImages: [],
            questionImagesArrayLength: 4,
            displayableImagesArrayLenght: 16,
            repeat: {
                "4": "",
                "3": "",
                "2": ""
            },
            timeleft: 15,
            isAnswered: false,
            answerImageRepeatTime: "",
            showBuy: false,
            userAnswer: null
        };
    },
    props: {
        parentLottery: {
            type: Object
        }
    },
    created() {
        this.images = Images;
        this.init();
        this.stripeInit();
        console.log("created");
    },
    mounted() {
        let interval = setInterval(() => {
            this.timeleft--;
            if (this.timeleft <= 0) {
                window.clearInterval(interval);
            }
        }, 1000);
        console.log("mounted");
    },
    methods: {
        stripeInit() {
            this.stripe = StripeCheckout.configure({
                key: Lottery.stripeKey,
                image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                locale: "auto",
                token: token => {
                    this.formData.stripeEmail = token.email;
                    this.formData.stripeToken = token.id;
                    console.log("Loading....");
                    this.loading = true;
                    axios
                        .post(`/lotteries/${this.parentLottery.id}/buy`, {
                            ...this.formData,
                            result: this.userAnswer == this.answer.id ? "won" : "lost"
                        })
                        .then(res => {
                            let transaction = res.data;
                            window.location = "/my-lotteries";
                        })
                        .catch(err => {
                            this.loading = false;
                            alert("something went wrong");
                        });
                }
            });
        },
        init() {
            let filteredArray = this.selectRepeatingImages();
            this.setDisplayableImages(filteredArray);
            this.shuffleDisplayableImages();
            this.setUpAnswer();
            console.log("done");
        },
        setUpAnswer() {
            this.selectAnswer();
            this.selectQuestionImages();
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
            this.isAnswered = true;
            this.showBuy = true;
            if (!this.userAnswer) {
                this.userAnswer = id;
            }
            setTimeout(this.buy(), 2000);
        },
        buy() {
            this.stripe.open({
                name: this.parentLottery.name,
                email: Lottery.user.email,
                currency: "gbp",
                description: this.parentLottery.name,
                amount: this.parentLottery.entry_fee
            });
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
    max-width: 600px;
    margin: 20px auto;
    justify-content: center;
    padding: 50px;
}

.img-display div {
    flex: auto;
    width: calc(100% * (1/4) - 10px);
    position: relative;
    margin: 5px;
    box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.slide-enter-active {
    animation: in 0.5s ease-out;
}
.slide-leave-active {
    animation: out 1s ease-in-out;
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

@keyframes shake {
    50% {
        transform: rotate3d(0, 1, 1, 5deg);
    }
    100% {
        transform: rotate3d(0, 0, 0, 0deg);
    }
}
</style>
