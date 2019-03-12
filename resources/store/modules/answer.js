import ApiService from "../../js/appservices";
import router from '../../js/approutes'

export default {

    namespaced: true,

    // Data which can have access to only in this component
    state: {
        answer: {
            title: null,
            audio: null,
            video: null,
            attachment: null,
            correct: false
        }
    },


    // helper methods which can access from outside of this module like in component
    getters: {
        GET_ANSWER_OBJ: state => state.answer,
        GET_ANSWER_BY_ID: state => state.singleAnswer,
    },


    // Data Modifier which can done only in this module cann't be access outside
    mutations: {
        SET_ANSWER_MUTATION: (state, contents) => {
            // console.log({ contents });
            state.answer = contents;
        },

        UPDATE_ANSWER_FIELD: (state, payload) => {
            // const { question } = state;
            const answer = state.answer;
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
            console.log("GET_ANSWER_BY_ID", payload);
            ApiService.doGet('questions/' + payload + '/answers').then(({ data }) => {
                const question = data[0];
                data.length !== 0 ?
                    context.commit('SET_ANSWER_MUTATION', question) : context.commit('SET_ANSWER_MUTATION', (context.rootGetters['GET_ANSWER_OBJ'] || {}));
            }).catch(e => {
                console.log(e)
            })
        },
        POST_ANSWER: (context, payload) => {
            console.log("POST_ANSWER", payload.qId, payload.qnsId, payload.answer);
            ApiService.doPost("questions/" + payload.qId + "/answers", payload.answer).then(res => {
                console.log(res);
                router.push({
                    name: "e-test-questionBank"
                })
            }).catch(e => {
                console.log(e)
            })
        },
        UPDATE_ANSWER: (context, payload) => {
            console.log("UPDATE_ANSWER", payload.qId, payload.qnsId, payload.answer);
            ApiService.doPut("questions/" + payload.qId + "/answers/" + payload.qnsId, payload.answer).then(res => {
                console.log(res);
                router.push({
                    name: "e-test-questionBank"
                })
            }).catch(e => {
                console.log(e)
            })
        }
    }
};