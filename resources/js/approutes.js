window.Vue = window.Vue || require('vue');
import VueRouter from "vue-router"
Vue.use(VueRouter)
Vue.config.productionTip = false
import authComponent from "../vue/auth/Auth"
import VendorComponent from "../vue/vendor/VendorCompponent"
import Dashboard from "../vue/Dashboard"
import DashboardHome from "../vue/dashboard/dashboardHome"
import FormsComponent from "../vue/FormsComponent"

const router = new VueRouter({
    routes: [
        {
            name: "portalhome",
            path: '/portal',
            component: authComponent
        },
        {
            name: "dashboard",
            path: "/portal/dashboard",
            component: Dashboard,
            children: [
                {
                    name: "dashboardHome",
                    path: ":userType/page/:pageType",
                    component: DashboardHome
                },
                {
                    name: "forms",
                    path: ":userType/forms",
                    component: FormsComponent
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

