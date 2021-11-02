require('./bootstrap');
import Vue from 'vue'

// window.Vue = require('vue');
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('line-chart', require('./components/LineChart.vue').default);
 Vue.component('stacked-column-chart', require('./components/StackedColumnChart.vue').default);
 const app = new Vue({
   el: '#app',
 });