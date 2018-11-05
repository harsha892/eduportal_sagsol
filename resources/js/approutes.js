window.Vue = window.Vue || require('vue');
import VueRouter from "vue-router"
Vue.use(VueRouter)
Vue.config.productionTip = false
import authComponent from "../vue/auth/Auth"
import VendorComponent from "../vue/vendor/VendorCompponent"
import Dashboard from "../vue/Dashboard"
import DashboardHome from "../vue/dashboard/dashboardHome"
import FormsComponent from "../vue/forms/FormsHome"
import profileComponent from "../vue/dashboard/profile-views/profilesHome"

const router = new VueRouter({
    routes: [
        {
            name: "portalhome",
            path: '/portal',
            component: authComponent
        },
        {
            name: "dashboard",
            path: "/portal/dashboard/:userType",
            component: Dashboard,
            children: [
                {
                    name: "dashboardHome",
                    path: "page/:pageType",
                    component: DashboardHome
                },
                {
                    name: "forms",
                    path: "form/:formType/:userId?",
                    component: FormsComponent
                },
                {
                    name: "profile",
                    path: "profile/:userIs/:userId",
                    component: profileComponent
                }
            ]
        }
    ], mode: 'history',
    cors: true,
    redirect: {
        '*': '/'
    },

});
export default router;

