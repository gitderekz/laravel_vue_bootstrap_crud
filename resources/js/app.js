/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// // +derek
// import './bootstrap';
// import Vue from 'vue'
// import App from './App.vue';
import VueAxios from 'vue-axios';
// import VueRouter from 'vue-router';
import axios from 'axios';
// import { routes } from './routes';

// Vue.use(VueRouter);
// Vue.use(VueAxios, axios);

import './bootstrap';
import { createApp } from 'vue';
import app from './App.vue';
import router from './routes';
createApp(app).use(VueAxios, axios).use(router).mount("#app");
// // -derek