<template>
    <div class="slide-container">
        <loader v-if="loading"></loader>
        <div class="wrapper">
            <div class="clash-card barbarian">
                <div class="clash-card__image clash-card__image--barbarian">
                    <img src="/img/logo.png" alt="barbarian" />
                </div>
                <div class="clash-card__unit-name"><span v-text="lottery.name"></span></div>
                <div class="clash-card__unit-description">
                    Remaining Time <span v-text="remainingTime"></span><br>
                    Expire On <span v-text="expireAt"></span>
                </div>
                <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                    <div class="one-third">
                        <div class="stat"> 
                            <i class="fa fa-gbp"></i> <span v-text="entry"></span>
                        </div>
                        <div class="stat-value">Entry</div>
                    </div>

                    <div class="one-third buy" @click="play">
                        <div class="stat">Enter </div>
                        <div class="stat-value">Draw</div>
                    </div>
 
                    <div class="one-third no-border">
                        <div class="stat">
                            <i class="fa fa-gbp"></i> <span v-text="lottery.prize"></span>
                        </div>
                        <div class="stat-value">Prize</div>
                    </div>

                </div>
            </div>
            <!-- end clash-card barbarian-->
        </div>
        <!-- end wrapper -->
    </div>
    <!-- end container -->
</template>

<script>
import localforage from "localforage";
export default {
    data() {
        return {
            loading: false,
            currentTime: new Date(),
            stripe: "",
            formData: {
                stripeEmail: "",
                stripeToken: ""
            },
            card: ""
        };
    },
    props: {
        lottery: {
            type: Object
        }
    },
    computed: {
        entry() {
            return this.lottery.entry_fee / 100;
        },
        expireAt() {
            return moment(this.lottery.expire_at).format("LL");
        },
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
        play() {
            window.location = `/lotteries/${this.lottery.parent_lottery_id}/game`;
        }
    },
    mounted() {
        setInterval(this.updateTime, 1000);
    }
};
</script>

<style lang="scss" scoped>
@import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);

$border-radius-size: 14px;
$barbarian: #ec9b3b;

*,
*:before,
*:after {
    box-sizing: border-box;
}

body {
    font: 14px/20px "Lato", Arial, sans-serif;
    color: #9e9e9e;
    margin-top: 30px;
}

.slide-container {
    margin: auto;
    max-width: 600px;
    text-align: center;
}

.wrapper {
    padding-top: 40px;
    padding-bottom: 40px;
    background: inherit;
    &:focus {
        outline: 0;
    }
}

.clash-card {
    background: white;
    width: 376px;
    display: inline-block;
    margin: auto;
    border-radius: $border-radius-size + 5;
    position: relative;
    text-align: center;
    box-shadow: -1px 15px 30px -12px black;
    z-index: 9999;
}

.clash-card__image {
    position: relative;
    height: 230px;
    margin-bottom: 35px;
    border-top-left-radius: $border-radius-size;
    border-top-right-radius: $border-radius-size;
}

.clash-card__image--barbarian {
    background: #ada8a8;
    img {
        width: 397px;
        position: absolute;
        top: -45px;
        left: -10px;
    }
}

.clash-card__level {
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 3px;
}

.clash-card__level--barbarian {
    color: $barbarian;
}

.clash-card__unit-name {
    font-size: 4rem;
    color: $barbarian;
    font-weight: 900;
    margin-bottom: 5px;
}

.clash-card__unit-description {
    padding: 20px;
    font-size: 2rem;
    margin-bottom: 10px;
}

.clash-card__unit-stats--barbarian {
    background: $barbarian;

    .one-third {
        border-right: 1px solid #bd7c2f;
    }
}

.clash-card__unit-stats {
    color: white;
    font-weight: 700;
    font-size: 32px;
    border-bottom-left-radius: $border-radius-size;
    border-bottom-right-radius: $border-radius-size;

    .one-third {
        width: 33%;
        float: left;
        padding: 20px 15px;
    }

    sup {
        position: absolute;
        bottom: 4px;
        font-size: 45%;
        margin-left: 2px;
    }

    .stat {
        position: relative;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .stat-value {
        text-transform: uppercase;
        font-weight: 400;
        font-size: 12px;
    }

    .no-border {
        border-right: none;
    }
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}
.buy:hover {
    cursor: pointer;
    outline: none;
    background: desaturate($barbarian, 7%);
    box-shadow: inset 0px 0px 4px desaturate($barbarian, 20%);
}
</style>
