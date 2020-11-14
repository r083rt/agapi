/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('moment/locale/id');
const moment = require('moment');

import Vue from 'vue'
import Vuex from "vuex"
import store from "./store"
import Vuetify from "vuetify"
import "vuetify/dist/vuetify.min.css"
import "@mdi/font/css/materialdesignicons.css" // Ensure you are using css-loader

import { mapState } from "vuex"
import DatetimePicker from "vuetify-datetime-picker"
import "vuetify-datetime-picker/src/stylus/main.styl"
import VueSweetalert2 from 'vue-sweetalert2';

import VueApexCharts from 'vue-apexcharts'

import router from "./router/app"
import Axios from 'axios';

Vue.use(VueSweetalert2);
Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(DatetimePicker);
Vue.use(require("vue-moment"), {
    moment
})

Vue.component('apexchart', VueApexCharts)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their 'basename'.
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "attendance-component",
    require("./components/admin/AttendanceComponent.vue").default
);
Vue.component(
    "lessonplanformat-component",
    require("./components/admin/LessonPlanFormatComponent.vue").default
);
Vue.component(
    "user-component",
    require("./components/admin/UserComponent.vue").default
);
Vue.component(
    "user-component-2",
    require("./components/admin/UserComponent2.vue").default
);
Vue.component('payment-report', require("./components/admin/Payment/ReportPage.vue").default)
Vue.component('payment-report-ardata', require("./components/admin/Payment/ReportArdataPage.vue").default)
Vue.component('payment-report-dpp', require("./components/admin/Payment/ReportDppPage.vue").default)
Vue.component('payment-report-province', require("./components/admin/Payment/ReportProvincePage.vue").default)
Vue.component('payment-report-city', require("./components/admin/Payment/ReportCityPage.vue").default)
Vue.component(
    "questionnary-component",
    require("./components/admin/QuestionnaryComponent.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi' // default - only for display purposes
        }
    }),
    router,
    store,
    props: {
        source: String,
      },
      data(){
        return {
            loading: false,
            drawer: null,
            item:0
        }
    },
    methods:{
        logout:function(){
           this.$refs['logout'].submit();
        }
    }
}).$mount("#app");