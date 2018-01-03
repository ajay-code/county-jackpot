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
            <a class="btn btn-primary btn-lg work-button2 featured-play-button" style="padding: 8px 1.5rem;" :href="`/lottery/${lottery.id}/buy`" role="button">Buy Now</a>
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
    }
  },
  mounted() {
    setInterval(this.updateTime, 1000);
  }
};
</script>

<style>

</style>