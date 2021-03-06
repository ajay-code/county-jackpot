/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Vue.component("example-component", require("./components/ExampleComponent.vue"));
window.Vue.component("user-datatable", require("./components/admin/datatables/UserDataTable.vue"));
window.Vue.component("lottery-display-item-bs3", require("./components/lottery/LotteryDisplayItemBS3.vue"));
window.Vue.component("lottery-display-item-bs4", require("./components/lottery/LotteryDisplayItemBS4.vue"));
window.Vue.component("lottery-result", require("./components/lottery/LotteryResult.vue"));
window.Vue.component("lottery", require("./components/lottery/Lottery.vue"));
window.Vue.component("game", require("./components/game/Game.vue"));
window.Vue.component("loader", require("./components/loader/Loader.vue"));

const app = new window.Vue({
    el: "#app"
});
