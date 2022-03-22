import { createWebHistory, createRouter } from "vue-router";
import indexPage from '../views/indexPage.vue';

// Account Settings
import loginPage from '../views/AccountPages/loginPage.vue' // done
import Register from '../views/AccountPages/registerPage.vue' // done
import Verify from '../views/AccountPages/verifyPage.vue' 
import Success from '../views/AccountPages/successPage.vue' 

// Jobs 
import ShowAllJobsPage from '../views/JobPages/showAllJobs.vue' 
import GetThisJobDetails from '../views/JobPages/getThisJobDetails.vue' 

// License
import licenseShowPage from '../views/LicensePages/licenseShowPage.vue'
import addLicensePage from '../views/LicensePages/addLicensePage.vue' // wait for user_job

// Users Profile
import u_indexPage from '../views/UserProfilePages/u_indexPage.vue'
import profilePage from '../views/UserProfilePages/profilePage.vue' // done
import employmentApplications from '../views/UserProfilePages/employmentApplications.vue'
import Balance from '../views/UserProfilePages/Balance.vue'
import offerOrder from '../views/UserProfilePages/offerOrder.vue'
import DocumentRequest from '../views/UserProfilePages/documentRequest.vue'
import ChatPage from '../views/UserProfilePages/chatPage.vue'
import Ticket1 from '../views/UserProfilePages/ticket1Page.vue'
import Ticket2 from '../views/UserProfilePages/ticket2Page.vue'
import Users from '../views/UserProfilePages/usersPage.vue'
import NotificationPage from '../views/OrdersPages/notificationPage.vue'

// Orders 
import showOrdersPage from '../views/OrdersPages/showOrdersPage'
import offerOrder1Page from '../views/OrdersPages/offerOrder1Page'
import offerOrder2Page from '../views/OrdersPages/offerOrder2Page'
import offerOrder3Page from '../views/OrdersPages/offerOrder3Page'
import Profile2 from '../views/OrdersPages/profile2Page.vue'
import Profile3 from '../views/OrdersPages/profile3Page.vue'
import Profile4 from '../views/OrdersPages/profile4Page.vue'
import MyOrder from '../views/OrdersPages/myOrder.vue'


const env = "production";
// Tickets
import addTicket from '../views/TicketsPages/createTecket.vue'


const prefix = env === "local" ? '':'/reliable/public';

// guard function 
function guardMyroute(to, from, next)
{
    if(localStorage.getItem('token'))
    {
    next(); 
    } 
    else
    {
    next(prefix+'/login');
    }
}
// our routes
    // Account Settings
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
    // Jobs
    {
        path : prefix+'/all_jobs' , beforeEnter : guardMyroute , component : ShowAllJobsPage,name:"ShowAllJobsPage"
    },
    {
        path : prefix+'/job_details' , beforeEnter : guardMyroute , component : GetThisJobDetails,name:"GetThisJobDetails"
    },
    // License Pages Routes
    {
        path : prefix+'/add_license' , beforeEnter : guardMyroute , component : addLicensePage,name:"addLicensePage"
    }, 
    {
        path : prefix+'/license_show' , beforeEnter : guardMyroute , component : licenseShowPage,name:"licenseShowPage"
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
        path : prefix+'/user-balance' , beforeEnter : guardMyroute , component : Balance , name : "Balance"
    },
    {
        path : prefix+'/u_offers_order' , beforeEnter : guardMyroute , component : offerOrder , name : "offerOrder"
    },
    {
        path : prefix+'/make-order' , beforeEnter : guardMyroute , component : DocumentRequest , name : "DocumentRequest"
    },
    {
        path : prefix+'/u_ticket_details' , beforeEnter : guardMyroute , component : ChatPage , name : "ChatPage"
    },
    {
        path : prefix+'/u_ticket1' , beforeEnter : guardMyroute , component : Ticket1 , name : "Ticket1"
    },
    {
        path : prefix+'/u_ticket2' , beforeEnter : guardMyroute , component : Ticket2 , name : "Ticket2"
    },
    {
        path : prefix+'/u_users' , beforeEnter : guardMyroute , component : Users , name : "Users"
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
    },
    {
        path : prefix+'/u_notification' , beforeEnter : guardMyroute , component : NotificationPage , name : "NotificationPage"
    },
    {
        path : prefix+'/u_profile2' , beforeEnter : guardMyroute , component : Profile2 , name : "Profile2"
    },
    {
        path : prefix+'/u_profile3' , beforeEnter : guardMyroute , component : Profile3 , name : "Profile3"
    },
    {
        path : prefix+'/u_profile4' , beforeEnter : guardMyroute , component : Profile4 , name : "Profile4" 
    },
    {
        path : prefix+'/my_orders' , beforeEnter : guardMyroute , component : MyOrder , name : "MyOrder" 
    },
    // Tickets pages routes
    {
        path : prefix+'/u_new_ticket' , beforeEnter : guardMyroute , component : addTicket , name : "addTicket" 
    },
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;