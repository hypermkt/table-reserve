
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import ElementUI from 'element-ui';
import FullCalendar from 'vue-full-calendar'
import 'element-ui/lib/theme-chalk/index.css';

import "fullcalendar/dist/fullcalendar.min.css";
import "fullcalendar-scheduler";
import "fullcalendar-scheduler/dist/scheduler.min.css";

window.Vue = require('vue');
Vue.use(ElementUI);
Vue.use(FullCalendar);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('reservation-component', require('./components/ReservationComponent.vue'));
Vue.component('reservation-calendar-component', require('./components/Reservation/CalendarComponent.vue'));
Vue.component('reservation-scheduler-component', require('./components/Reservation/SchedulerComponent.vue'));
Vue.component('setting-general-component', require('./components/Setting/GeneralComponent.vue'));

const app = new Vue({
    el: '#app'
});
