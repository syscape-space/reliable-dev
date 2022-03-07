import Home from "./components/Home";

require('./bootstrap');
import { createApp } from 'vue';
import router from './router'
import App from './components/App.vue';

const app = createApp({});
app.use(router);
app.component('app',App);
app.mount('#app');