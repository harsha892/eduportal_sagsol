import router from "../router";
import { Toast } from 'buefy/dist/components/toast'
import BaseService from "../../../../api/base";
const state = {
    users: null,
    userObj: {
        email: "",
        password: "",
        role_id: "",
        user_detail: {
            first_name: "",
            last_name: "",
            gender: "",
            phone: "",
            emergency_phone: "",
            address: "",
            city: "",
            state: "",
            zip: "",
            country: "",
            dob: {
                date: ""
            }
        }
    }
}


// helper methods which can access from outside of this module like in component
const getters = {
    GET_DOMAIN_INFO_BY_ROLE: state => state.users,
    USER_OBJ: state => state.userObj,
};


// Data Modifier which can done only in this module cann't be access outside
const mutations = {
    SET_DOMAIN_INFO_BY_ROLE: (state, payload) => {
        // console.log({ contents });
        state.users = payload;
        console.log("SET_DOMAIN_INFO_BY_ROLE", payload);
    },
    DATA_FAIL: (state, message) => {
        Toast.open({
            type: "is-danger",
            message
        });

    },
    updateField(state, data) {
        const { userObj } = state;
        const { value } = data;
        function assignDataToObj(obj) {
            Object.keys(obj).forEach(function (key) {
                if (key === data.key) {
                    return obj[key] = value !== "" ? value : null;
                } else if (typeof obj[key] === 'object') {
                    console.log(obj[key]);
                    assignDataToObj(obj[key]);
                }
            });
        }
        assignDataToObj(userObj);
        state.userObj = userObj;
    },
};


// Action which are triggers from store dispatch method like in components
const actions = {
    DOMAIN_INFO_BY_ROLE: (context, payload) => {
        context.commit("SET_DOMAIN_INFO_BY_ROLE");
        BaseService.doGet('user/' + (payload || '')).then(
            response => {
                // console.log(response);
                context.commit("SET_DOMAIN_INFO_BY_ROLE", response.data);
            },
            error => {
                console.log(response);
                const { response = {} } = error;
                const { data = {} } = response;
                const { message = "Internal Server Error" } = data;
                context.commit("DATA_FAIL", message);
            }
        );

    },
    DO_LOGOUT: (context) => {
        context.commit("CLEAR_USER_INFO");
    },
    CREATE_NEW_DOMAIN: (context) => {
        // router.push("/")
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