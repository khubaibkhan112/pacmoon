require('./bootstrap');

window.Vue = require('vue').default;
//global methods file
import './globalMethods';

import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
Vue.use(DatePicker)
Vue.component('date-picker', DatePicker)


import './adminComponentsRegister';

import './employeeComponentsRegister';

const app = new Vue({
    el: '#app',
});
