import { Toast } from 'buefy/dist/components/toast'
import BaseService from "../../../../api/base";
const state = {
    subjects: [],
    subjectObj: {
        slug: "",
        name: "",
        description: ""
    },
    isFormValid: false,
    errors: {
        slug: [],
        name: [],
        description: []
    }
};
const getters = {
    errors: (state) => state.errors,
    isFormValid: (state) => state.isFormValid,
    GET_SUBJECTS: state => state.subjects,
    GET_SUBJECT_OBJ: state => state.subjectObj,
};
const mutations = {
    SET_SUBJECTS_MUTATION: (state, subjects) => {
        state.subjects = subjects
    },
    updateField(state, data) {
        const { subjectObj } = state;
        const { value } = data;
        const field = data.key;
        subjectObj[field] = value;
        state.subjectObj = subjectObj;
    },
    checkFormValidation() {
        const { name, description } = state.subjectObj
        const nameErrors = [], descriptionErrors = [];
        if (!name) {
            nameErrors.push("name is required");
        }
        if (!description) {
            descriptionErrors.push("description is required");
        }
        state.errors.name = nameErrors;
        state.errors.description = descriptionErrors;
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
    POST_SUBJECT: (context, payload) => {
        context.commit("checkFormValidation");
        if (state.isFormValid)
            BaseService.doPost("subject", payload).then(({ data }) => {
                Toast.open({
                    type: "is-success",
                    message: "Subject Create Successfully"
                });
                context.dispatch("GET_SUBJECTS");
            }).catch(e => {
                console.log(e)
            })
    },
    GET_SUBJECTS: (context) => {
        BaseService.doGet("subject").then(({ data }) => {
            const subjects = data.data;
            context.commit('SET_SUBJECTS_MUTATION', subjects);
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