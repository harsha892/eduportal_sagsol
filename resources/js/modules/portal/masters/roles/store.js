import BaseService from "../../../../api/base";

const state = {
    roles: [],
};

const getters = {
    GET_ROLES: state => state.roles,
};

const actions = {
    GET_ROLES_ACTION: (context) => {
        BaseService.doGet('role').then(({ data }) => {
            const roles = data.data;
            context.commit('SET_ROLES_MUTATION', roles);
        }).catch(e => {
            console.log(e)
        })
    }
};

const mutations = {
    SET_ROLES_MUTATION: (state, roles) => {
        state.roles = roles;
    }
};

const modules = {
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
    modules
};