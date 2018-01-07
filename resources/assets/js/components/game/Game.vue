<template>
    <div>
        <div class="interval">
            <span v-text="timeleft"></span> seconds left
        </div>
        <section v-if="timeleft" class="img-display">
            <div v-for="(image, index) in displayableImages" :key="index">
                <img :src="`/game/${image.name}`" alt="">
            </div>
        </section>

        <section class="question hide">

        </section>
    </div>
</template>

<script>
import Images from "@/data/images";
import localforage from "localforage";
export default {
    data() {
        return {
            images: [],
            displayableImages: [],
            repeat: {
                '4': '',
                '3': '',
                '2': '',
            },
            timeleft: 10
        };
    },
    props: {
        lottery: {
            type: Object
        }
    },
    created() {
        this.images = Images;
        localforage
            .setItem("lotteryIdForGame", this.lottery.id)
            .then(() => {
                return localforage.getItem("lotteryIdForGame");
            })
        this.init()
    },
    mounted(){
        let interval = setInterval(() => {
            this.timeleft--;
            if(this.timeleft <= 0){
                window.clearInterval(interval);
            }
        }, 1000)
    },
    methods: {
        init(){
            let arrayLenght = 16;
            let except = [];
            let filteredArray = this.images.filter( image => !except.includes(image.id) )

            this.repeat['4'] = filteredArray[_.random(0, filteredArray.length - 1)]
            except.push(this.repeat['4'].id);
            filteredArray = this.images.filter( image => !except.includes(image.id) )
            
            this.repeat['3'] = filteredArray[_.random(0, filteredArray.length - 1)]
            except.push(this.repeat['3'].id);
            filteredArray = this.images.filter( image => !except.includes(image.id) )

            this.repeat['2'] = filteredArray[_.random(0, filteredArray.length - 1)]
            except.push(this.repeat['2'].id);
            filteredArray = this.images.filter( image => !except.includes(image.id) )

            filteredArray = _.shuffle(filteredArray)
            
            _.times(4, ()=> {
                this.displayableImages.push(this.repeat['4']) 
            })
            _.times(3, ()=> {
                this.displayableImages.push(this.repeat['3']) 
            })
            _.times(2, ()=> {
                this.displayableImages.push(this.repeat['2']) 
            })

            let index = 1;
            while(this.displayableImages.length < 16){
                this.displayableImages.push(filteredArray[index])
                index++;
            }

            let shouldShuffle = true;
            while(shouldShuffle){
                this.displayableImages = _.shuffle(this.displayableImages)
                console.log('shuffled')
                shouldShuffle = false;
                for(let index=0; index <= this.displayableImages.length -2; index++){
                    // console.log(`index : ${index}`)
                    if(this.displayableImages[index] == this.displayableImages[index+1] || this.displayableImages[index] == this.displayableImages[index - 4] || this.displayableImages[index] == this.displayableImages[index+4] || this.displayableImages[index] == this.displayableImages[index+5] || this.displayableImages[index] == this.displayableImages[index-5] || this.displayableImages[index] == this.displayableImages[index+3] || this.displayableImages[index] == this.displayableImages[index-3]){
                        shouldShuffle = true;
                    }
                }
            }

            console.log('done');

            
        }
    }
};
</script>

<style>
.interval{
    text-align: center;
    padding: 20px;
    font-size: 20px;
}
.img-display {
    font-size: 0;
    flex-flow: row wrap;
    display: flex;
    justify-content: center;
    padding: 50px 200px;
}

.img-display div {
    flex: auto;
    width: calc(100% * (1/4) - 10px);
    position: relative;
    margin: 5px;
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
</style>