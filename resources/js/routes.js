import Vue from "vue";
import VueRouter from "vue-router";

import AuthRoutes from "./modules/auth/routes"
import PortalRoutes from "./modules/portal/routes"

Vue.use(VueRouter);
console.log({ ...AuthRoutes });
export default new VueRouter({
    mode: "history",
    routes: [
        { ...AuthRoutes },
        { ...PortalRoutes },
        {
            path: "*",
            redirect: "/auth"
        }
    ]
});