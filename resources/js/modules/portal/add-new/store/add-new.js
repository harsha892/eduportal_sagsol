import BaseService from "../../../../api/base";
import router from '../router';

const state = {
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
    answer:{},
    singleQuestion: null,
    allQuestions: []
};

const getters = {
    GET_QUESTION_OBJ: state => state.question,
    GET_QUESTION_BY_ID: state => state.question,
    GET_ALL_QUESTIONS: state => state.allQuestions,
    CLEAR_QUESTION_OBJ: state => state.question
};

const actions = {
    GET_ALL_QUESTIONS_ACTION: (context, payload) => {
        // http://education_portal.test/api/topic/1/content
        BaseService.doGet('questions?&page=' + payload).then(({ data }) => {
            const questions = data;
            const masters = context.rootGetters['GET_MASTERS'] || {};
            let { difficulty_levels = [], privacy = [] } = masters;
            difficulty_levels = difficulty_levels.reduce((prev, curr) => {
                prev[curr.id] = curr;
                return prev;
            }, {})

            privacy = privacy.reduce((prev, curr) => {
                prev[curr.id] = curr;
                return prev;
            }, {})
            const allQuestions = (questions.data || []).map(question => {
                question.privacy = (privacy[question.privacy_id] || {}).name;
                question.difficulty = (difficulty_levels[question.difficulty_id] || {}).name;
                return question;
            });
            questions.data = allQuestions;
            console.log("GET_ALL_QUESTIONS_ACTION", context.state.allQuestions)
            !!context.state.allQuestions.data ? context.commit('LOAD_MORE_QUESTIONS', questions) : context.commit('SET_QUESTION_MUTATION', questions)
        }).catch(e => {
            console.log(e)
        })
    },
    POST_QUESTION: (context, payload) => {
        console.log(payload);
        // BaseService.doPost("questions", payload).then(data => {
        //     console.log("questions", data);
        //     router.push({
        //         name: "e-create-answer-to-question",
        //         params: { qid: data.data.id }
        //     })
        // }).catch(e => {
        //     console.log(e)
        // })
    },
    UPDATE_QUESTION: (context) => {
        const payload = context.state.singleQuestion;
        console.log(payload);
        // BaseService.doPut("questions/" + payload.id, payload).then(data => {
        //     console.log("questions", data);
        //     router.push({
        //         name: "e-test-questionBank"
        //     })
        // }).catch(e => {
        //     console.log(e)
        // })
    },
    GET_QUESTION_BY_ID: (context, payload) => {
        console.log("GET_QUESTION_BY_ID", payload)
        BaseService.doGet('questions/' + payload).then(({ data }) => {
            const question = data;
            data ?
                context.commit('SET_QUESTION_OBJ_MUTATION', question) : context.commit('SET_QUESTION_OBJ_MUTATION', (context.rootGetters['GET_QUESTION_OBJ'] || {}));
        }).catch(e => {
            console.log(e)
        })
    },
    CLEAR_QUESTION_OBJ: (context) => {
        console.log(context.rootGetters['GET_QUESTION_OBJ']);
        context.commit('CLEAR_QUESTION_OBJ_MUTATION')
    }
};

const mutations = {
    SET_QUESTION_MUTATION: (state, allQuestions) => {
        state.allQuestions = allQuestions;
    },
    LOAD_MORE_QUESTIONS: (state, allQuestions) => {
        const data = [...state.allQuestions.data, ...allQuestions.data];
        state.allQuestions = allQuestions;
        state.allQuestions.data = data;
        console.log(data, "state.allQuestions", state.allQuestions);
    },
    SET_QUESTION_OBJ_MUTATION: (state, contents) => {
        state.question = contents;
    },
    UPDATE_QUESTION_FIELD: (state, payload) => {
        // const { question } = state;
        const question = state.question;
        const { key, value } = payload;
        state.question = {
            ...question,
            [key]: value
        }
    },
    CLEAR_QUESTION_OBJ_MUTATION: (state, payload) => {
        console.log("CLEAR_QUESTION_OBJ", state.question);
        state.question = {
            "subject_id": null,
            "topic_id": null,
            "type": null,
            "title": null,
            "detail": null,
            "difficulty_id": null,
            "privacy_id": null,
            "audio": null,
            "video": null
        };
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