import ApiService from "../../js/appservices";

export default {

    // Data which can have access to only in this component
    state: {
        contents: []
    },


    // helper methods which can access from outside of this module like in component
    getters: {
        GET_CONTENTS_BY_TOPIC_ID: state => state.contents,
    },


    // Data Modifier which can done only in this module cann't be access outside
    mutations: {
        SET_CONTENTS_MUTATION: (state, contents) => {
            // console.log({ contents });
            state.contents = contents;
        }
    },


    // Action which are triggers from store dispatch method like in components
    actions: {
        GET_CONTENTS_BY_TOPIC_ID_ACTION: (context, payload) => {
            // http://education_portal.test/api/topic/1/content

            ApiService.doGet('topic/' + payload + '/content').then(({ data }) => {
                const roles = data;
                context.commit('SET_CONTENTS_MUTATION', roles);
            }).catch(e => {
                console.log(e)
            })
        }
    }
};