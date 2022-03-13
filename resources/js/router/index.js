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

// Orders 
import showOrdersPage from '../views/OrdersPages/showOrdersPage'
import offerOrder1Page from '../views/OrdersPages/offerOrder1Page'
import offerOrder2Page from '../views/OrdersPages/offerOrder2Page'
import offerOrder3Page from '../views/OrdersPages/offerOrder3Page'


const prefix = '/reliable/public/app';

// guard function 
function guardMyroute(to, from, next)
{
    var isAuthenticated= false;
     
    if(localStorage.getItem('token'))
    isAuthenticated = true;
    else
    isAuthenticated= false;
    if(isAuthenticated) 
    {
    next(); 
    } 
    else
    {
    next(prefix+'/login');
    }
}
// our routes
const routes = [
    {
        path : prefix+'/' ,
        component : indexPage,
        name:'home'
    } ,
    {
        path : prefix+'/login' , component : loginPage , name : "Login"
    },
    {
        path : prefix+'/register' , component : Register,name:"Register"
    },
    // start of verify test route ==> if clicked will go to success component this for test only
    {
        path : prefix+'/verify' , beforeEnter : guardMyroute ,  component : Verify
    },
    {
        path : prefix+'/success' , beforeEnter : guardMyroute , component : Success , name : "Success"
    },
    // end of verify test route ==> if clicked will go to success component this for test only
    {
        path : prefix+'/u_index' , beforeEnter : guardMyroute , component : profilePage , name : "profilePage"
    },
    {
        path : prefix+'/u_profile' , beforeEnter : guardMyroute , component : u_indexPage , name : "u_indexPage"
    },
    {
        path : prefix+'/u_employment_applocations' , beforeEnter : guardMyroute , component : employmentApplications
    },
    {
        path : prefix+'/u_palance' , beforeEnter : guardMyroute , component : palance , name : "palance"
    },
    {
        path : prefix+'/u_offers_order' , beforeEnter : guardMyroute , component : offerOrder , name : "offerOrder"
    },
    {
        path : prefix+'/u_document_request' , beforeEnter : guardMyroute , component : DocumentRequest , name : "DocumentRequest"
    },
    // orders pages routes
    {
        path : prefix+'/o_index' , beforeEnter : guardMyroute , component : showOrdersPage , name : "showOrdersPage"
    },
    {
        path : prefix+'/o_offer_order1' , beforeEnter : guardMyroute , component  : offerOrder1Page , name : "offerOrder1Page"
    },
    {
        path : prefix+'/o_offer_order2' , beforeEnter : guardMyroute , component  : offerOrder2Page , name : "offerOrder2Page"
    },
    {
        path : prefix+'/o_offer_order3' , beforeEnter : guardMyroute , component  : offerOrder3Page , name : "offerOrder3Page"
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;