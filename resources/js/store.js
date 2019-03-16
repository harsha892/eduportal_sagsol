import Vue from 'vue'
import Vuex from 'vuex'
import Auth from './modules/auth/store/auth'
import portalStore from "./modules/portal/store/store";
// import validator from "./modules/common/validator"
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'
export const strict = false

export default new Vuex.Store({
    modules: {
        Auth,
        portalStore
        // validator
    },
    strict: debug,
    // plugins: debug ? [createLogger()] : []
})