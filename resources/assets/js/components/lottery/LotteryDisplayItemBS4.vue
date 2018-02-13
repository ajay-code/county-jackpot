<template>
    <div class="row featured-content">
        <div class="featured-logo col-lg-2 text-center  ">
            <img src="/img/logo.png" width="100">
        </div>
        <div class="featured-name col-lg-3">
            <div class="row">
                <div class="col-6 col-xs-6 d-lg-none text-right">
                    <span class="text-size display-label">Draw : </span>
                </div>
                <div class="col-6 col-xs-6 col-lg-12 text-lg-center">
                    <span class="text-size" v-text="lottery.name"></span>
                </div>
            </div>
        </div>
        <div class="featured-price col-lg-2">
            <div class="row">
                <div class="col-6 col-xs-6 hidden-md  d-lg-none text-right">
                    <span class="text-size display-label">Minimum Win : </span>
                </div>
                <div class="col-6 col-xs-6 col-lg-12 text-lg-center">
                    <span class="text-size"><i class="fa fa-gbp"></i> <span v-text="lottery.prize"></span></span>
                </div>
            </div>
        </div>
        <div class="featured-timer col-lg-3 text-center">
            <span class="h4" v-text="remainingTime"></span>
        </div>
        <div class=" featured-play col-lg-2 text-center ">
            <a class="btn btn-primary btn-lg work-button2 featured-play-button" style="padding: 8px 1.5rem; margin: 10px 0" :href="`/county-draw/${lottery.parent_lottery_id}/buy`" role="button" @click="preventIfExpired" :disabled="remainingTime == 'End'">{{ remainingTime == 'End' ? 'Closed' : 'Buy Now' }}</a>
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
