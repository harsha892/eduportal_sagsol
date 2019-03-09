import ApiService from "../../js/appservices";

export default {

    namespaced: true,

    // Data which can have access to only in this component
    state: {
        answer: {
            "notes": null,
            "video": null,
            "audio": null,
        }
    },


    // helper methods which can access from outside of this module like in component
    getters: {
        GET_ANSWER_OBJ: state => state.answer,
    },


    // Data Modifier which can done only in this module cann't be access outside
    mutations: {
        SET_QUESTION_MUTATION: (state, contents) => {
            // console.log({ contents });
            state.question = answer;
        },

        UPDATE_QUESTION_FIELD: (state, payload) => {
            // const { question } = state;
            const question = state.answer;
            const { key, value } = payload;
            state.answer = {
                ...answer,
                [key]: value
            }
        }
    },


    // Action which are triggers from store dispatch method like in components
    actions: {
        GET_ANSWER_BY_ID: (context, payload) => {
            console.log(payload);
        },
        POST_ANSWER: (context, payload) => {
            console.log(payload);
            ApiService.doPost("questions/" + payload.qId + "/answers", payload.content).then(res => {
                console.log(res);
            })
        }
    }
};