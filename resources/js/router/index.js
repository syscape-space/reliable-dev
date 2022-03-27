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
import offerOrder2Page from '../views/OrdersPages/offerOrder2Page.vue'
import offerOrder3Page from '../views/OrdersPages/offerOrder3Page'
import Profile2 from '../views/OrdersPages/profile2Page.vue'
import Profile3 from '../views/OrdersPages/profile3Page.vue'
import Profile4 from '../views/OrdersPages/profile4Page.vue'
import MyOrder from '../views/OrdersPages/myOrder.vue'
import EXMyOrders from '../views/OrdersPages/EXMyOrders.vue'
import ShowAllOrders from '../views/OrdersPages/showAllOrders.vue'


// Tickets
import addTicket from '../views/TicketsPages/createTecket.vue'
import ShowSingleOrder from "../views/OrdersPages/ShowSingleOrder.vue";


const prefix = APP_PREFIX;

// guard function 
function guardMyroute(to, from, next) {
    if (localStorage.getItem('token')) {
        next();
    } else {
        next(prefix + '/login');
    }
}

function checkIfLogin(to, from, next) {
    if (localStorage.getItem('token')) {
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
        meta: { title: 'Reliable' }
    },
    {
        path: prefix + '/login',
        component: loginPage,
        beforeEnter: checkIfLogin,
        name: "Login",
        meta: { title: 'Login' }
    },
    {
        path: prefix + '/register',
        component: Register,
        beforeEnter: checkIfLogin,
        name: "Register",
        meta: { title: 'Register' }
    },
    // Jobs
    {
        path: prefix + '/all_jobs',
        beforeEnter: guardMyroute,
        component: ShowAllJobsPage,
        name: "ShowAllJobsPage",
        meta: { title: 'All Jobs' }
    },
    {
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
        meta: { title: 'Add License' }
    },
    {
        path: prefix + '/license_show',
        beforeEnter: guardMyroute,
        component: licenseShowPage,
        name: "licenseShowPage",
        meta: { title: 'License' }
    },
    // start of verify test route ==> if clicked will go to success component this for test only
    {
        path: prefix + '/verify',
        beforeEnter: guardMyroute,
        component: Verify,
        meta: { title: 'Verify' }
    },
    {
        path: prefix + '/success',
        beforeEnter: guardMyroute,
        component: Success,
        name: "Success",
        meta: { title: 'Success' }
    },
    // end of verify test route ==> if clicked will go to success component this for test only
    {
        path: prefix + '/u_index',
        beforeEnter: guardMyroute,
        component: profilePage,
        name: "profilePage",
        meta: { title: 'Profile' }
    },
    {
        path: prefix + '/u_profile',
        beforeEnter: guardMyroute,
        component: u_indexPage,
        name: "u_indexPage",
        meta: { title: 'Profile' }
    },
    {
        path: prefix + '/u_employment_applocations',
        beforeEnter: guardMyroute,
        component: employmentApplications,
        meta: { title: 'Employment Applications' }
    },
    {
        path: prefix + '/user-balance',
        beforeEnter: guardMyroute,
        component: Balance,
        name: "Balance",
        meta: { title: 'Balance' }

    },
    {
        path: prefix + '/u_offers_order',
        beforeEnter: guardMyroute,
        component: offerOrder,
        name: "offerOrder",
        meta: { title: 'Offer Orders' }
    },
    {
        path: prefix + '/make-order',
        beforeEnter: guardMyroute,
        component: DocumentRequest,
        name: "DocumentRequest",
        meta: { title: 'make order' }
    },
    {
        path: prefix + '/u_ticket_details',
        beforeEnter: guardMyroute,
        component: ChatPage,
        name: "ChatPage",
        meta: { title: 'Chat' }
    },
    {
        path: prefix + '/u_ticket1',
        beforeEnter: guardMyroute,
        component: Ticket1,
        name: "Ticket1",
        meta: { title: 'Ticket' }
    },
    {
        path: prefix + '/u_ticket2',
        beforeEnter: guardMyroute,
        component: Ticket2,
        name: "Ticket2",
        meta: { title: 'Ticket' }
    },
    {
        path: prefix + '/u_users',
        beforeEnter: guardMyroute,
        component: Users,
        name: "Users",
        meta: { title: 'Users' }
    },

    // orders pages routes
    {
        path: prefix + '/o_index',
        beforeEnter: guardMyroute,
        component: showOrdersPage,
        name: "showOrdersPage",
        meta: { title: 'Orders' }

    },
    {
        path: prefix + '/o_offer_order2/:id',
        beforeEnter: guardMyroute,
        component: offerOrder2Page,
        props: true,
        name: "offerOrder2Page",
        meta: { title: 'Offers' }
    },
    {
        path: prefix + '/o_offer_order3',
        beforeEnter: guardMyroute,
        component: offerOrder3Page,
        name: "offerOrder3Page",
        meta: { title: 'Orders' }
    },
    {
        path: prefix + '/u_notification',
        beforeEnter: guardMyroute,
        component: NotificationPage,
        name: "NotificationPage",
        meta: { title: 'Notification' }
    },
    {
        path: prefix + '/u_profile2',
        beforeEnter: guardMyroute,
        component: Profile2,
        name: "Profile2",
        meta: { title: 'Profile' }
    },
    {
        path: prefix + '/u_profile3',
        beforeEnter: guardMyroute,
        component: Profile3,
        name: "Profile3",
        meta: { title: 'Profile' }
    },
    {
        path: prefix + '/u_profile4',
        beforeEnter: guardMyroute,
        component: Profile4,
        name: "Profile4",
        meta: { title: 'Profile' }
    },
    {
        path: prefix + '/my_orders',
        beforeEnter: guardMyroute,
        component: MyOrder,
        name: "MyOrder",
        meta: { title: 'My Orders' }
    },
    {
        path: prefix + '/my_orders_ex',
        beforeEnter: guardMyroute,
        component: EXMyOrders,
        name: "EXMyOrders",
        meta: { title: 'EX My Orders' }
    },
    {
        path: prefix + '/show_all_orders',
        beforeEnter: guardMyroute,
        component: ShowAllOrders,
        name: "ShowAllOrders",
        meta: { title: 'Orders' }
    },
    // Tickets pages routes
    {
        path: prefix + '/u_new_ticket',
        beforeEnter: guardMyroute,
        component: addTicket,
        name: "addTicket",
        meta: { title: 'Add Ticket' }
    },
    {
        path: prefix + '/order/:id',
        props: true,
        component: ShowSingleOrder,
        name: 'ShowSingleOrder',
    },
]
const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
});

export default router;