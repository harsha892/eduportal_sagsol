import ApiService from "../../js/appservices";

export default {

    // Data which can have access to only in this component
    state: {
        masters: null
    },


    // helper methods which can access from outside of this module like in component
    getters: {
        GET_MASTERS: state => state.masters,
    },


    // Data Modifier which can done only in this module cann't be access outside
    mutations: {
        SET_MASTERS_MUTATION: (state, masters) => {
            // console.log({ contents });
            state.masters = masters;
        }
    },


    // Action which are triggers from store dispatch method like in components
    actions: {
        GET_MASTERS_ACTION: (context) => {
            // http://education_portal.test/api/master

            ApiService.doGet('master').then(({ data }) => {
                const masters = data;
                console.log(masters);
                context.commit('SET_MASTERS_MUTATION', masters);
            }).catch(e => {
                console.log(e)
            })
        }
    }
};