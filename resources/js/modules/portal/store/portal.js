import header from "../common/store/header";
import domain from "../domain/store/domain";
import BaseService from "../../../api/base";
import addNew from "../add-new/store/add-new"
const state = {
    roles: [],
    masters: null
};

const getters = {
    GET_ROLES: state => state.roles,
    GET_MASTERS: state => state.masters,
};

const actions = {
    GET_ROLES_ACTION: (context) => {
        BaseService.doGet('role').then(({ data }) => {
            const roles = data.data;
            context.commit('SET_ROLES_MUTATION', roles);
        }).catch(e => {
            console.log(e)
        })
    },
    GET_MASTERS_ACTION: (context) => {
        // http://education_portal.test/api/master

        BaseService.doGet('master').then(({ data }) => {
            const masters = data;
            console.log(masters);
            context.commit('SET_MASTERS_MUTATION', masters);
        }).catch(e => {
            console.log(e)
        })
    }
};

const mutations = {
    SET_ROLES_MUTATION: (state, roles) => {
        state.roles = roles;
    },
    SET_MASTERS_MUTATION: (state, masters) => {
        // console.log({ contents });
        state.masters = masters;
    }
};

const modules = {
    header,
    domain,
    addNew
};

export default {
    namespaced: false,
    state,
    getters,
    actions,
    mutations,
    modules
};