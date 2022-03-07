import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/Home";
import Verify from "../components/Verify";

const prefix = '/reliable/public';
const routes = [
    { path: prefix+'/', component: Home },
    { path: prefix+'/verify', component: Verify },
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;