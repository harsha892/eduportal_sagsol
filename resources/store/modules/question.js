import ApiService from "../../js/appservices";
import router from '../../js/approutes'

export default {

    namespaced: true,

    // Data which can have access to only in this component
    state: {
        question: {
            "subject_id": null,
            "topic_id": null,
            "type": null,
            "title": null,
            "detail": null,
            "difficulty_id": null,
            "privacy_id": null,
            "audio": null,
            "video": null
        },
        singleQuestion: null
    },


    // helper methods which can access from outside of this module like in component
    getters: {
        GET_QUESTION_OBJ: state => state.question,
        GET_QUESTION_BY_ID: state => state.singleQuestion
    },


    // Data Modifier which can done only in this module cann't be access outside
    mutations: {
        SET_QUESTION_MUTATION: (state, contents) => {
            // console.log({ contents });
            state.question = question;
        },
        SET_SINGLE_QUESTION_MUTATION: (state, contents) => {
            state.singleQuestion = contents;
        },
        UPDATE_QUESTION_FIELD: (state, payload) => {
            // const { question } = state;
            const question = state.question;
            const { key, value } = payload;
            state.question = {
                ...question,
                [key]: value
            }
        }
    },


    // Action which are triggers from store dispatch method like in components
    actions: {
        GET_QUESTIONS: (context, payload) => {
            // http://education_portal.test/api/topic/1/content

            ApiService.doGet('topic/' + payload + '/content').then(({ data }) => {
                const roles = data;
                context.commit('SET_QUESTION_MUTATION', roles);
            }).catch(e => {
                console.log(e)
            })
        },
        POST_QUESTION: (context, payload) => {
            ApiService.doPost("questions", payload).then(data => {
                console.log("questions", data);
                router.push({
                    name: "e-create-answer-to-question",
                    params: { qid: data.data.id }
                })
            }).catch(e => {
                console.log(e)
            })
        },
        GET_QUESTION_BY_ID: (context, payload) => {
            ApiService.doGet('questions/' + payload).then(({ data }) => {
                const question = data;
                context.commit('SET_SINGLE_QUESTION_MUTATION', question);
            }).catch(e => {
                console.log(e)
            })
        }
    }
};