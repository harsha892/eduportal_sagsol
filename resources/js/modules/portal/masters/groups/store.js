import { Toast } from 'buefy/dist/components/toast'
import BaseService from "../../../../api/base";
const state = {
    groups: [],
    singleObj: null,
    groupObj: {
        slug: "",
        name: "",
        description: "",
        duration: "",
        semesters: []
    },
    subjectsByGroupId: [],
    isFormValid: false,
    errors: {
        slug: [],
        name: [],
        description: [],
        duration: [],
        semesters: []
    }
};
const getters = {
    errors: (state) => state.errors,
    isFormValid: (state) => state.isFormValid,
    GET_GROUPS: state => state.groups,
    GET_GROUP_OBJ: state => state.groupObj,
    GET_BY_GROUP_ID: state => state.singleObj,
};
const mutations = {
    SET_GROUPS_MUTATION: (state, groups) => {
        state.groups = groups
    },
    SET_GROUP_BY_ID: (state, singleObj) => {
        state.singleObj = singleObj;
    },
    SET_SUBJECTS_BY_GROUP_ID: (state, subjectsByGroupId) => {
        state.subjectsByGroupId = subjectsByGroupId
    },
    updateField(state, data) {
        const { groupObj } = state;
        const { value } = data;
        const field = data.key;
        groupObj[field] = value;
        state.groupObj = groupObj;
    },
    checkFormValidation() {
        const {
            name,
            description,
            duration, } = state.groupObj
        const nameErrors = [], descriptionErrors = [], durationErrors = [];
        if (!name) {
            nameErrors.push("name is required");
        }
        if (!description) {
            descriptionErrors.push("description is required");
        }
        if (!duration) {
            durationErrors.push("duration is required");
        }
        state.errors.name = nameErrors;
        state.errors.description = descriptionErrors;
        state.errors.duration = durationErrors;
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
        state.groupObj = {
            slug: "",
            name: "",
            description: "",
            duration: "",
            semesters: 1
        };
        state.errors = {
            slug: [],
            name: [],
            description: [],
            duration: [],
            semesters: []
        }
    }
};
const actions = {
    POST_GROUP: (context, payload) => {
        context.commit('checkFormValidation');
        if (state.isFormValid)
            BaseService.doPost('group', payload).then(({ data }) => {
                Toast.open({
                    type: "is-success",
                    message: "Group Create Successfully"
                });
                context.dispatch("GET_GROUPS");
            }).catch(e => {
                console.log(e)
            })
    },
    GET_GROUPS: (context) => {
        BaseService.doGet('group').then(({ data }) => {
            const groups = data.data;
            context.commit('SET_GROUPS_MUTATION', groups);
        }).catch(e => {
            console.log(e)
        })
    },
    GET_SUBJECTS_BY_GROUP_ID: (context, payload) => {
        BaseService.doGet('group/' + payload + '/subjects').then(({ data }) => {
            const response = data;
            context.commit('SET_SUBJECTS_BY_GROUP_ID', response);
        }).catch(e => {
            console.log(e)
        })
    },
    GET_GROUP_BY_ID: (context, payload) => {
        BaseService.doGet('group/' + payload).then(({ data }) => {
            const response = data;
            context.commit('SET_GROUP_BY_ID', response);
        }).catch(e => {
            console.log(e)
        })
    },
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