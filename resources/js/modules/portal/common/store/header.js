import router from "../../../../routes"
const state = {
    user: null
}


// helper methods which can access from outside of this module like in component
const getters = {
    GET_USER_INFO: state => state.user,
};


// Data Modifier which can done only in this module cann't be access outside
const mutations = {
    SET_USER_MUTATION: (state) => {
        // console.log({ contents });
        state.user = JSON.parse(localStorage.getItem("@User"));
    },
    CLEAR_USER_INFO: (state) => {
        state.user = null;
        localStorage.clear();
        router.push(`/auth/login`);

    }
};


// Action which are triggers from store dispatch method like in components
const actions = {
    SET_USER_INFO: (context) => {
        context.commit("SET_USER_MUTATION");

    },
    DO_LOGOUT: (context) => {
        context.commit("CLEAR_USER_INFO");
    }
};
const modules = {};
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
    modules
};