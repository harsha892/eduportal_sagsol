
import { Toast } from 'buefy/dist/components/toast'
import authService from "../../../api/auth";
import router from "../../../routes";
let AUTH_KEYS = {
    user: "@User",
    token: "@token",
    role: "@role"
};
console.log(AUTH_KEYS);
const validations = {
    email: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
}
const state = {
    loading: false,
    login: {
        email: null,
        password: null,
    },
    isLoginFormValid: false,
    isLoginFormSubmit: false,
    errors: {
        email: [],
        password: []
    }
};
const getters = {
    errors: (state) => state.errors,
    loading: (state) => state.loading,
    loginForm: (state) => state.login,
    isLoginFormValid: (state) => state.isLoginFormValid,
    isLoginFormSubmit: (state) => state.isLoginFormSubmit,
};
const actions = {
    login(context) {
        context.commit("loginSubmit");
        const { state } = context;
        context.commit("checkFormValidation");
        const { isLoginFormValid } = state;
        if (!isLoginFormValid) {
            return false;
        }
        const { login } = state;
        authService.doAuthPost("user/login", login).then(
            response => {
                console.log(response);
                context.commit("login", 'login successfully');
                localStorage.setItem(AUTH_KEYS.role, JSON.stringify(response.data.role));
                localStorage.setItem(AUTH_KEYS.token, JSON.stringify(response.data.token));
                localStorage.setItem(AUTH_KEYS.user, JSON.stringify(response.data.user));
                router.push(`/user/${response.data.role}/dashboard`);
            },
            error => {
                console.log(response);
                const { response = {} } = error;
                const { data = {} } = response;
                const { message = "Internal Server Error" } = data;
                context.commit("loginFail", message);
            }
        );
    }
};

const mutations = {
    login(state, message) {
        state.loginSuccess = true;
        Toast.open({
            type: "is-success",
            message
        });
        state.loading = false;
    },

    loginFail(state, message) {
        console.log(message);
        state.loginSuccess = !true;
        state.loading = !true;
        Toast.open({
            type: "is-danger",
            message
        });
    },

    loginSuccess(state, clear = false) {
        state.loading = false;
        if (clear) {
            state.login = {
                email: ""
            };
        }
    },

    loginSubmit(state) {
        state.isLoginFormSubmit = true;
        state.loading = state.isLoginFormValid;
    },

    updateField(state, data) {
        const { login } = state;
        const field = data.key;
        const { value } = data;
        login[field] = value !== "" ? value : null;
        state.login = login;
    },
    /**
     * Check Validation
     */
    checkFormValidation() {
        const { email, password } = state.login;
        const emailErrors = [];
        const pwdErrors = [];
        if (!validations.email.test(email)) {
            emailErrors.push("Should be in email format");
        }
        if (password.length < 6) {
            pwdErrors.push("Must be 6 charterers length");
        }
        state.errors.email = emailErrors;
        state.errors.password = pwdErrors;

        const { errors } = state;
        let isValid = true;
        Object.keys(errors).forEach((field) => {
            if (errors[field] && !!errors[field].length) {
                isValid = false;
            }
        });
        state.isLoginFormValid = isValid;
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