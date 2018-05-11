<template>
    <div class="row featured-content">
        <div class="featured-logo col-lg-3 text-center ">
            <img src="/img/logo.png" width="100">
        </div>
        <div class="featured-price col-lg-3">
            <div class="row">
                <div class="col-6 col-xs-6 hidden-md  d-lg-none text-right">
                    <span class="text-size display-label">Draw Name: </span>
                </div>
                <div class="col-6 col-xs-6 col-lg-12 text-lg-center">
                    <span class="text-size"> <span v-text="lottery.name"></span></span>
                </div>
            </div>
        </div>
        <div class="featured-timer col-lg-2">
           <div class="row">
                <div class="col-6 col-xs-6 hidden-md  d-lg-none text-right">
                    <span class="text-size display-label">Jackpot : </span>
                </div>
                <div class="col-6 col-xs-6 col-lg-12 text-lg-center">
                    <span class="text-size"><i class="fa fa-gbp"></i> <span v-text="lottery.prize"></span></span>
                </div>
            </div>
        </div>
        <div class=" featured-play col-lg-2">
            <div class="row">
                <div class="col-6 col-xs-6 hidden-md  d-lg-none text-right">
                    <span class="text-size display-label">Winner : </span>
                </div>
                <div class="col-6 col-xs-6 col-lg-12 text-lg-center">
                    <span class="text-size"> <span v-text="winnerName"></span></span>
                </div>
            </div>
        </div>
    </div>
</template> 

<script>
// import moment from "moment";
export default {
    data() {
        return {
            currentTime: new Date()
        };
    },
    props: {
        lottery: {
            type: Object
        }
    },
    computed: {
        remainingTime() {
            this.currentTime;
            if (this.lottery.expire_at) {
                let diff = moment(this.lottery.expire_at)
                    .endOf("day")
                    .diff(moment(), "milliseconds");
                let duration = "";
                if (diff > 0) {
                    duration = moment.duration(diff);
                } else {
                    return "End";
                }
                return duration.format("dd [days] h:mm:ss", true);
            } else {
                return "";
            }
        }
    },
    methods: {
        updateTime() {
            this.currentTime = new Date();
        },
        preventIfExpired(e) {
            if (this.remainingTime == "End") {
                e.preventDefault();
            }
        }
    },
    mounted() {
        setInterval(this.updateTime, 1000);
    },
    computed: {
        winnerName() {
            let winner = this.lottery.winner.name.split(" ");
            if (winner.length > 1) {
                return `${winner[0][0]}. ${winner[1]}`;
            } else {
                return winner[0];
            }
        }
    }
};
</script>

<style>
.display-label {
    color: #b5009b;
}
.text-size {
    font-size: 24px;
    font-weight: 600;
}
@media (max-width: 767.98px) {
    .text-size {
        font-size: 20px;
    }
}

@media (max-width: 575.98px) {
    .text-size {
        font-size: 18px;
    }
}

@media (max-width: 375px) {
    .text-size {
        font-size: 14px;
    }
}
</style>
