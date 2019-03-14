
const state = {
    email: null,
    errors: {
        email: [],
        password: []
    },
    validations: {
        email: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    },
    isEmailValid: false
};
const getters = {
    errors: (state) => state.errors,
    isEmailValid: (state) => state.isEmailValid,
};
const actions = {
    validDateEmail(context) {
        context.commit("emailValidation");
    }
};

const mutations = {
    emailValidation() {
        const { email, validations } = state;
        const errors = [];
        if (!email && validations.test(email)) {
            emailErrors.push("In-valid email");
        }
        state.errors.email = emailErrors;
        const { error } = state;
        let isValid = true;
        Object.keys(error).forEach((field) => {
            if (error[field] && !!error[field].length) {
                isValid = false;
            }
        });
        state.isEmailValid = isValid;
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