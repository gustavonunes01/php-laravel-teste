require('./bootstrap');

window.Vue = require('vue');


Vue.component('import-csv', require('./components/ImportCSV.vue').default);

const app = new Vue({
    el: '#app',
});
