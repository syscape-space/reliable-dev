import { createWebHistory, createRouter } from "vue-router";
import indexPage from '../views/indexPage.vue';

// Account Settings
import loginPage from '../views/AccountPages/loginPage.vue'
import Register from '../views/AccountPages/registerPage.vue'
import Verify from '../views/AccountPages/verifyPage.vue'
import Success from '../views/AccountPages/successPage.vue'

// Users Profile
import u_indexPage from '../views/UserProfilePages/u_indexPage.vue'
import profilePage from '../views/UserProfilePages/profilePage.vue'
import employmentApplications from '../views/UserProfilePages/employmentApplications.vue'
import palance from '../views/UserProfilePages/palance.vue'
import offerOrder from '../views/UserProfilePages/offerOrder.vue'
import DocumentRequest from '../views/UserProfilePages/documentRequest.vue'
const prefix = '/reliable/public/app';
const routes = [
    {
        path : prefix+'/' ,
        component : indexPage,
        name:'home'
    },
    {
        path : prefix+'/login' , component : loginPage , name : "Login"
    },
    {
        path : prefix+'/register' , component : Register,name:"Register"
    },
    // start of verify test route ==> if clicked will go to success component this for test only
    {
        path : prefix+'/verify' , component : Verify
    },
    {
        path : prefix+'/success' , component : Success , name : "Success"
    },
    // end of verify test route ==> if clicked will go to success component this for test only
    {
        path : prefix+'/u_index' , component : profilePage , name : "profilePage"
    },
    {
        path : prefix+'/u_profile' , component : u_indexPage , name : "u_indexPage"
    },
    {
        path : prefix+'/u_employment_applocations' , component : employmentApplications
    },
    {
        path : prefix+'/u_palance' , component : palance , name : "palance"
    },
    {
        path : prefix+'/u_offers_order' , component : offerOrder , name : "offerOrder"
    },
    {
        path : prefix+'/u_document_request' , component : DocumentRequest , name : "DocumentRequest"
    },
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;