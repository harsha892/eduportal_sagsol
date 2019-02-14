import ApiService from "../../js/appservices";

export default {

    // Data which can have access to only in this component
    state: {
        roles: []
    },


    // helper methods which can access from outside of this module like in component
    getters: {
        GET_ROLES: state => state.roles,
    },


    // Data Modifier which can done only in this module cann't be access outside
    mutations: {
        SET_ROLES_MUTATION: (state, roles) => {
            // console.log({ roles });
            state.roles = roles;
        }
    },


    // Action which are triggers from store dispatch method like in components
    actions: {
        GET_ROLES_ACTION: (context) => {
            ApiService.doGet('role').then(({ data }) => {
                const roles = data.data;
                context.commit('SET_ROLES_MUTATION', roles);
            }).catch(e => {
                console.log(e)
            })
        }
    }
};