require('./bootstrap');
import Vue from 'vue'

// window.Vue = require('vue');
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('line-chart', require('./components/LineChart.vue').default);
 Vue.component('stacked-column-chart', require('./components/StackedColumnChart.vue').default);
 Vue.component('stacked-column-chart2', require('./components/StackedColumnChart2.vue').default);
 const app = new Vue({
   el: '#app',
 });

//  function name() {
//    return 'Here is a name.';
//  }

 () => 'Here is a name.';
