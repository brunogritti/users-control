require('./bootstrap')

window.Vue = require('vue')
window.axios = require('axios')

import Vue from 'vue'
import axios from 'axios'

Vue.component('users', require('./components/Users.vue').default);

const app = new Vue({
    el: '#app'
});
