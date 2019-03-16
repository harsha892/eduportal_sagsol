import router from "../../../../routes"
import BaseService from "../../../../api/base"
const state = {
    autoCompleteResult: null
}


// helper methods which can access from outside of this module like in component
const getters = {
    SEARCH_RESULT: state => state.autoCompleteResult,
};


// Data Modifier which can done only in this module cann't be access outside
const mutations = {
    SEARCH_RESULT_MUTATION: (state, payload) => {
        // console.log({ contents });
        state.autoCompleteResult = payload;
    }
};


// Action which are triggers from store dispatch method like in components
const actions = {
    SEARCH_BY_KEYWORD: (context, payload) => {
        BaseService.doGet(payload.url + "?search=" + payload.keyword).then(({ data }) => {
            context.commit("SEARCH_RESULT_MUTATION", data.data);
        }).catch(e => {
            console.log(e)
        })

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