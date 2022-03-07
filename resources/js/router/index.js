import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/Home";
import Verify from "../components/Verify";
import Layout from "../components/Layout";

const prefix = '/reliable/public';
const routes = [
    { path: prefix+'/verify', component: Verify },
    { path: prefix+'/',component: Layout,
        children: [
            { path: '', component: Home },
        ],
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;