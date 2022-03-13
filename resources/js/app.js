import { createApp , provide } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'


import "./bootstrap"
const vue_app = createApp(App).use(store).use(router)
    .mount('#app');
import './assets/css/style.css';
import './assets/css/bootstrap.min.css';
import './assets/css/owl.theme.default.min.css';
import './assets/css/owl.carousel.min.css';

