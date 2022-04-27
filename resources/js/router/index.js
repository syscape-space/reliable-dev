import { createWebHistory, createRouter } from "vue-router";
import indexPage from '../views/indexPage.vue';
import selectLawyerPage from '../views/SelectLawyer/selectLawyerPage.vue';


// Account Settings
<<<<<<< HEAD
/* import loginPage from '../views/AccountPages/loginPage.vue' // done */
/* import Register from '../views/AccountPages/registerPage.vue' // done */
=======
import loginPage from '../views/AccountPages/loginPage.vue' // done
import Register from '../views/AccountPages/registerPage.vue' // done
import FirstRegister from '../views/AccountPages/firstRegisterPage.vue' // done
>>>>>>> b3780898262d2868182a948ac54d3a22e673f9ec
import Verify from '../views/AccountPages/verifyPage.vue'
import Success from '../views/AccountPages/successPage.vue'
import UserProfile from '../views/AccountPages/userProfile.vue'

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
import offerOrder2Page from '../views/OrdersPages/offerOrder2Page.vue'
import offerOrder3Page from '../views/OrdersPages/offerOrder3Page'
import Profile2 from '../views/OrdersPages/profile2Page.vue'
import Profile3 from '../views/OrdersPages/profile3Page.vue'
import Profile4 from '../views/OrdersPages/profile4Page.vue'
import MyOrder from '../views/OrdersPages/myOrder.vue'
import EXMyOrders from '../views/OrdersPages/EXMyOrders.vue'
import ShowAllOrders from '../views/OrdersPages/showAllOrders.vue'
import Filteration from '../views/OrdersPages/ordersFilteration.vue'
//
import addTicket from '../views/TicketsPages/createTecket.vue'
import ShowSingleOrder from "../views/OrdersPages/ShowSingleOrder.vue";
import Negotiation from "../components/Negotiation";
import NegotiationsPage from "../views/OrdersPages/NegotiationsPage";
import Subscription from "../views/Subscription";
import ContractCreate from "../views/Contract/Create";


const prefix = APP_PREFIX;

// guard function 
function guardMyroute(to, from, next) {
    if (localStorage.getItem('token') && localStorage.getItem('auth_user_id')) {
        next();
    } else {
        next(prefix + '/login');
    }
}

function checkIfLogin(to, from, next) {
    if (localStorage.getItem('token')  && localStorage.getItem('auth_user_id')) {
        next(prefix + '/u_index');
    } else {
        next();
    }
}
// our routes
// Account Settings
const routes = [{
        path: prefix + '/',
        component: indexPage,
        beforeEnter: checkIfLogin,
        name: 'home',
    },
    {
        path: prefix + '/select-lawyer',
        component: selectLawyerPage,
        // beforeEnter: checkIfLogin,
        name: 'select-lawyer',
    },
    {
        path: prefix + '/login',
        component: loginPage,
        beforeEnter: checkIfLogin,
        name: "Login",
    },
    /* {
        path: prefix + '/register',
        component: Register,
        beforeEnter: checkIfLogin,
        name: "Register",
    }, */
    {
        path: prefix + '/FirstRegister',
        component: FirstRegister,
        beforeEnter: checkIfLogin,
        name: "FirstRegister",
    },
    {
        path: prefix + '/user-profile/:id',
        component: UserProfile,
        beforeEnter: guardMyroute,
        props: true,
        name: "UserProfile",
    },
    // Jobs
    {
        path: prefix + '/all_jobs',
        beforeEnter: guardMyroute,
        component: ShowAllJobsPage,
        name: "ShowAllJobsPage",
    }, {
        path: prefix + '/job_details',
        beforeEnter: guardMyroute,
        component: GetThisJobDetails,
        name: "GetThisJobDetails"
    },
    // License Pages Routes
    {
        path: prefix + '/add_license',
        beforeEnter: guardMyroute,
        component: addLicensePage,
        name: "addLicensePage",
    }, {
        path: prefix + '/license_show',
        beforeEnter: guardMyroute,
        component: licenseShowPage,
        name: "licenseShowPage",
    },
    // start of verify test route ==> if clicked will go to success component this for test only
    {
        path: prefix + '/verify',
        beforeEnter: guardMyroute,
        component: Verify,
    }, {
        path: prefix + '/success',
        beforeEnter: guardMyroute,
        component: Success,
        name: "Success",
    },
    // end of verify test route ==> if clicked will go to success component this for test only
    {
        path: prefix + '/u_index',
        beforeEnter: guardMyroute,
        component: profilePage,
        name: "profilePage",
    }, {
        path: prefix + '/u_profile',
        beforeEnter: guardMyroute,
        component: u_indexPage,
        name: "u_indexPage",
    }, {
        path: prefix + '/u_employment_applocations',
        beforeEnter: guardMyroute,
        component: employmentApplications,
    }, {
        path: prefix + '/user-balance',
        beforeEnter: guardMyroute,
        component: Balance,
        name: "Balance",

    }, {
        path: prefix + '/u_offers_order',
        beforeEnter: guardMyroute,
        component: offerOrder,
        name: "offerOrder",
    }, {
        path: prefix + '/make-order',
        beforeEnter: guardMyroute,
        component: DocumentRequest,
        name: "DocumentRequest",
    }, {
        path: prefix + '/u_ticket_details',
        beforeEnter: guardMyroute,
        component: ChatPage,
        name: "ChatPage",
    }, {
        path: prefix + '/u_ticket1',
        beforeEnter: guardMyroute,
        component: Ticket1,
        name: "Ticket1",
    }, {
        path: prefix + '/u_ticket2',
        beforeEnter: guardMyroute,
        component: Ticket2,
        name: "Ticket2",
    }, {
        path: prefix + '/u_users',
        beforeEnter: guardMyroute,
        component: Users,
        name: "Users",
    },

    // orders pages routes
    {
        path: prefix + '/o_index',
        beforeEnter: guardMyroute,
        component: showOrdersPage,
        name: "showOrdersPage",

    }, {
        path: prefix + '/o_offer_order2/:id',
        beforeEnter: guardMyroute,
        component: offerOrder2Page,
        props: true,
        name: "offerOrder2Page",
    }, {
        path: prefix + '/o_offer_order3',
        beforeEnter: guardMyroute,
        component: offerOrder3Page,
        name: "offerOrder3Page",
    }, {
        path: prefix + '/u_notification',
        beforeEnter: guardMyroute,
        component: NotificationPage,
        name: "NotificationPage",
    }, {
        path: prefix + '/u_profile2',
        beforeEnter: guardMyroute,
        component: Profile2,
        name: "Profile2",
    }, {
        path: prefix + '/u_profile3',
        beforeEnter: guardMyroute,
        component: Profile3,
        name: "Profile3",
    }, {
        path: prefix + '/u_profile4',
        beforeEnter: guardMyroute,
        component: Profile4,
        name: "Profile4",
    }, {
        path: prefix + '/my_orders/:status?',
        beforeEnter: guardMyroute,
        component: MyOrder,
        name: "MyOrder",
        props:true,
    }, {
        path: prefix + '/my_orders_ex',
        beforeEnter: guardMyroute,
        component: EXMyOrders,
        name: "EXMyOrders",
    }, {
        path: prefix + '/show_all_orders',
        beforeEnter: guardMyroute,
        component: ShowAllOrders,
        name: "ShowAllOrders",
    }, {
        path: prefix + '/filteration',
        beforeEnter: guardMyroute,
        component: Filteration,
        name: "Filteration",
    },
    // Tickets pages routes
    {
        path: prefix + '/u_new_ticket',
        beforeEnter: guardMyroute,
        component: addTicket,
        name: "addTicket",
    }, {
        path: prefix + '/order/:code',
        beforeEnter: guardMyroute,
        props: true,
        component: ShowSingleOrder,
        name: 'ShowSingleOrder',
    }, {
        path: prefix + '/negotiation/:id',
        component: Negotiation,
        name: 'negotiation',
        props: true,
    }, {
        path: prefix + '/order-negotiations/:id',
        component: NegotiationsPage,
        name: 'order_negotiations',
        props: true,
    },{
        path: prefix + '/subscription',
        component: Subscription,
        name: 'Subscription',
    },
    {
        path: prefix + '/contract/create/:hash_code',
        props:true,
        component:ContractCreate ,
        name: 'ContractCreate',
    },
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;