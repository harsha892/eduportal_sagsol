import BaseService from "../../../api/base";
import { Toast } from 'buefy/dist/components/toast'
import router from "../routes"
const state = {
    models: null,
    test_model: {
        section_type: null,
        name_type: null,
        name: "",
        marks: "",
        time: "",
        no_of_sections: ""
    },
    sections: [],
    errors: {
        name: [],
        no_of_sections: [],
        name_type: [],
        section_type: []
    },
    isFormValid: false
};

const getters = {
    GET_TEST_MODELS: state => state.models,
    GET_TEST_MODEL_FORM: state => state.test_model,
    errors: state => state.errors,
    GET_SECTIONS_FOR_MODEL: state => state.sections,
};

const actions = {
    GET_TEST_MODELS_ACTION: (context) => {
        BaseService.doGet('paper-models').then(({ data }) => {
            const models = data;
            context.commit('SET_TEST_MODELS_MUTATION', models);
        }).catch(e => {
            console.log(e)
        })
    },
    GENERATE_TEST_MODEL: (context, payload) => {
        context.commit("checkFormValidation");
        if (state.isFormValid) {
            for (let index = 0; index < state.test_model.no_of_sections; index++) {
                const section_obj = {
                    sectionTitle: String.fromCharCode(97 + index),
                    questions: "",
                    options: "",
                    marks: "",
                    time: "",
                    question_type: ""
                };
                context.commit("SET_SECTIONS", section_obj)
            }
        }
    },
    POST_TEST_MODEL: (context, payload) => {
        console.log(payload);
        BaseService.doPost("paper-models", payload.question).then(({ data }) => {
            console.log(data);
            if (data) {
                BaseService.doPost("paper-models/" + data.id + "/sections", { sections: payload.sections }).then(({ data }) => {
                    Toast.open({
                        type: "is-success",
                        message: "Test Model Created Successfully"
                    });
                    context.commit("clearSectionForm");
                    context.commit("clearTestModelForm");
                    console.log(router);
                    router.push({ name: "topics.list" });
                }).catch(e => {
                    console.log(e)
                })
            }
        }).catch(e => {
            console.log(e)
        })
    }
};

const mutations = {
    SET_TEST_MODELS_MUTATION: (state, models) => {
        state.models = models;
    },
    updateField(state, data) {
        const { test_model } = state;
        const field = data.key;
        const { value } = data;
        test_model[field] = value !== "" ? value : null;
        state.test_model = test_model;
    },
    updateFieldWithIndex(state, data) {
        const { sections } = state;
        const field = data.key;
        const value = data.value;
        sections[data.index][field] = value !== "" ? value : null;
        state.sections = sections;
    },
    SET_SECTIONS(context, payload) {
        state.sections.push(payload);
    },
    /**
     * Check Validation
     */
    checkFormValidation() {
        const { name, no_of_sections } = state.test_model;
        const nameErrors = [];
        const no_of_sectionsErrors = [];
        if (!name) {
            nameErrors.push("name is required");
        }
        if (!no_of_sections) {
            no_of_sectionsErrors.push("no_of_sections is required");
        }
        state.errors.name = nameErrors;
        state.errors.no_of_sections = no_of_sectionsErrors;
        const { errors } = state;
        let isValid = true;

        Object.keys(errors).forEach((field) => {
            if (errors[field] && !!errors[field].length) {
                isValid = false;
            }
        });
        state.isFormValid = isValid;
    },
    checkFormValidationWithIndex() {
        const sections = state.sections;
        const sectionErrors = [];
        if (sections.length > 0) {
            if (!name) {
                nameErrors.push("name is required");
            }
        }
        state.errors.name = nameErrors;
        state.errors.no_of_sections = no_of_sectionsErrors;
        const { errors } = state;
        let isValid = true;

        Object.keys(errors).forEach((field) => {
            if (errors[field] && !!errors[field].length) {
                isValid = false;
            }
        });
        state.isFormValid = isValid;
    },
    clearSectionForm() {
        state.sections.length > 0 ? state.sections = [] : false
    },
    clearTestModelForm() {
        state.test_model = {
            section_type: null,
            name_type: null,
            name: "",
            marks: "",
            time: "",
            no_of_sections: ""
        }
    }
};

const modules = {
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
    modules
};