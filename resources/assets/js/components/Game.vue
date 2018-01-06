<template>
    <div>
        <section class="img-display">
            <div>
                <span class="number">1</span>
                <img src="/game/1.jpg" alt="">
            </div>
            <div>
                <span class="number">2</span>
                
                <img src="/game/2.jpg" alt="">

            </div>
            <div>
                <span class="number">3</span>
                <img src="/game/3.jpg" alt="">
            </div>
            <div>
                <span class="number">4</span>
                <img src="/game/4.jpg" alt="">

            </div>
            <div>
                <span class="number">5</span>
                <img src="/game/5.jpg" alt="">

            </div>
            <div>
                <span class="number">6</span>
                <img src="/game/6.jpg" alt="">

            </div>
            <div>
                <span class="number">7</span>
                <img src="/game/7.jpg" alt="">

            </div>
            <div>
                <span class="number">8</span>
                <img src="/game/8.jpg" alt="">

            </div>
        </section>

        <section class="question hide">

        </section>
    </div>
</template>

<script>
    export default {
        data() {},
        props: {
            lottery: {
                type: Object
            }
        }
    };
</script>

<style>
    .img-display {
        padding: 0.5vw;
        font-size: 0;
        flex-flow: row wrap;
        display: flex;
        justify-content: center;
        padding: 200px;
    }

    .img-display div {
        -webkit-box-flex: auto;
        -ms-flex: auto;
        /* flex: auto; */
        max-width: 200px;
        margin: 0.5vw;
        position: relative;
        animation: shake 3s cubic-bezier(0.36, 0.07, 0.19, 0.97) infinite;
        
    }

    .img-display div .number{
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

    @media screen and (max-width: 400px) {
        .img-display div {
            margin: 0;
        }
        .img-display {
            padding: 0;
        }
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