import { createApp , provide } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import "./bootstrap"
const vue_app = createApp(App)
    .use(store)
    .use(router)
    .use(VueSweetalert2)
    .mount('#app');
import './assets/css/style.css';
import './assets/css/bootstrap.min.css';
import './assets/css/owl.theme.default.min.css';
import './assets/css/owl.carousel.min.css';

