import Vue from 'vue'
import Vuex from 'vuex'
import role from './modules/role'
import user from './modules/user'
import group from './modules/group'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'
export const strict = false

export default new Vuex.Store({
    modules: {
        role,
        user,
        group
    },
    strict: debug,
    // plugins: debug ? [createLogger()] : []
})