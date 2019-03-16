import { Toast } from 'buefy/dist/components/toast';
import router from "../routes";
import BaseService from "../../../../api/base";
const state = {
    topics: [],
    postedTopic: null,
    topicContent: null,
    contents: [],
    topicObj: {
        name: "",
        short_description: "",
        long_description: "",
    },
    errors: {
        name: [],
        short_description: []
    },
    isFormValid: false
};
const getters = {
    GET_TOPICS: state => state.topics,
    GET_POSTED_TOPIC: state => state.postedTopic,
    GET_CONTENTS_BY_TOPIC_ID: state => state.contents,
    TOPICS_FORM_OBJ: state => state.topicObj,
    IS_FORM_VALID: state => state.isFormValid,
    ERRORS: state => state.errors
};
const mutations = {
    SET_TOPICS_MUTATION: (state, topics) => {
        state.topics = topics
    },
    SET_POSTED_TOPIC_MUTATION: (state, postedTopic) => {
        state.postedTopic = postedTopic
    },
    SET_POSTED_TOPIC_CONTENT_MUTATION: (state, topicContent) => {
        state.topicContent = topicContent
    },
    SET_CONTENTS_MUTATION: (state, contents) => {
        // console.log({ contents });
        state.contents = contents;
    },
    updateField(state, data) {
        const { topicObj } = state;
        const { value } = data;
        const field = data.key;
        topicObj[field] = value;
        state.topicObj = topicObj;
    },
    checkFormValidation() {
        const { name, short_description } = state.topicObj
        const nameErrors = [], shortDescription = [];
        if (!name) {
            nameErrors.push("name is required");
        }
        if (!short_description) {
            shortDescription.push("short description is required");
        }
        state.errors.name = nameErrors;
        state.errors.short_description = shortDescription;
        const { errors } = state;
        let isValid = true;

        Object.keys(errors).forEach((field) => {
            if (errors[field] && !!errors[field].length) {
                isValid = false;
            }
        });
        state.isFormValid = isValid;

    },
    clearForm: (state) => {
        state.subjectObj = {
            slug: "",
            name: "",
            description: "",
        };
        state.errors = {
            slug: [],
            name: [],
            description: []
        }
    }
};
const actions = {
    ADD_CONTENT_TO_TOPIC: (context, payload) => {
        BaseService.doPost('topic/' + payload.topicId + '/content', payload).then(({ data }) => {
            const topics = data;
            // console.log(data, topics);
            context.commit('SET_POSTED_TOPIC_CONTENT_MUTATION', data);
            swal({
                text: "Content Uploaded Successfully",
                icon: "warning",
                dangerMode: true,
                buttons: false,
                timer: 2000
            }).then(function () {
                console.log("swal completed then");
                router.push({
                    name: "e-learn-topics",
                });
            })

            // window.location.reload();
        }).catch(e => {
            console.log(e)
        })
    },
    CREATE_TOPIC: (context, payload) => {
        context.commit("checkFormValidation");
        console.log(state.isFormValid);
        if (state.isFormValid) {
            BaseService.doPost('group/subjects/' + payload.subjectId + '/topics', payload.topics).then(({ data }) => {
                context.commit('GET_TOPICS_LIST');
                Toast.open({
                    type: "is-success",
                    message: "Topic Created Successfully"
                });
                router.push("topics.list")
            }).catch(e => {
                console.log(e)
            })
        }
    },
    GET_TOPICS_LIST: (context, payload) => {
        // payload.page
        BaseService.doGet(payload.url).then(({ data }) => {
            const topics = data;
            context.commit('SET_TOPICS_MUTATION', topics);
        }).catch(e => {
            console.log(e)
        })
    },
    GET_CONTENTS_BY_TOPIC_ID_ACTION: (context, payload) => {
        // http://education_portal.test/api/topic/1/content

        BaseService.doGet('topic/' + payload + '/content').then(({ data }) => {
            const roles = data;
            context.commit('SET_CONTENTS_MUTATION', roles);
        }).catch(e => {
            console.log(e)
        })
    }
}

const modules = {};
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
    modules
}