<template>
    <div class="row featured-content">
        <div class="featured-logo col-lg-2 text-center  ">
            <img src="/img/featured.png">
        </div>
        <div class="featured-name col-lg-3 text-center">
            <h3><span v-text="lottery.name"></span></h3>
        </div>
        <div class="featured-price col-lg-2 text-center">
            <h4>€ <span v-text="lottery.prize"></span></h4>
        </div>
        <div class="featured-timer col-lg-3 text-center">
            <h4 v-text="remainingTime"></h4>
        </div>
        <div class=" featured-play col-lg-2 text-center">
            <a class="btn btn-primary" @click.prevent="buy" role="button">Buy</a>
        </div>
        <!-- <form action="/lottery/{{$lottery->id}}/buy" method="POST">
                    {{ csrf_field() }}
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ config('services.stripe.key') }}"
                        data-amount="{{ $lottery->entry_fee * 100 }}"
                        data-name="{{$lottery->name}}"
                        data-description="{{$lottery->name}}"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="true"
                        >
                    </script>
                </form> -->
        
    </div>
</template>

<script>
// import moment from "moment";
export default {
    data() {
        return {
            currentTime: new Date(),
            stripe: "",
            formData: {
                stripeEmail: '',
                stripeToken: ''
            },
            card: ''
        };
    },
    props: {
        lottery: {
            // type: Object
        }
    },
    created() {
        this.stripe = StripeCheckout.configure({
            key: Lottery.stripeKey,
            image: "https://stripe.com/img/documentation/checkout/marketplace.png",
            locale: "auto",
            token: (token) => {
                this.formData.stripeEmail = token.email;
                this.formData.stripeToken = token.id;
                console.log('Loading....')
                axios.post(`/lottery/${this.lottery.id}/buy`, this.formData).then((res) => {
                    console.log(res.data);
                    console.log('Done...')
                });
            }
        });
    },
    computed: {
        remainingTime() {
            this.currentTime;
            if (this.lottery.expire_at) {
                let duration = moment.duration(
                    moment(this.lottery.expire_at).diff(moment(), "milliseconds")
                );
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
        buy() {
            this.stripe.open({
                name: this.lottery.name,
                email: 'ajay10mar96@gmail.com',
                description: this.lottery.name,
                zipCode: true,
                amount: this.lottery.entry_fee * 100
            });
        }
    },
    mounted() {
        setInterval(this.updateTime, 1000);
    }
};
</script>

<style>

</style>