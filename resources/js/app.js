import { createApp } from 'vue';
import HomeComponent from './components/HomeComponent.vue';
import axios from 'axios'
import VueAxios from 'vue-axios'

const app =  createApp({});
app.component('home-component', HomeComponent)
.use(VueAxios, axios)
.mount('#app');

require('./bootstrap');
