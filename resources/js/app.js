import './bootstrap';
import Vue from 'vue/dist/vue.common.dev.js';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../less/app.less';
import 'bootstrap/dist/js/bootstrap.bundle.js';

Vue.config.productionTip = false;
Vue.config.devtools = false;

import MainPage from '@/pages/MainPage.vue';
import HeaderComponent from "@/components/HeaderComponent.vue";
import FooterComponent from "@/components/FooterComponent.vue";
import OrderModal from "@/components/OrderModal.vue";



new Vue({
    el: '#app',
    components: {
        MainPage,
        HeaderComponent,
        FooterComponent,
        OrderModal
    },
});
