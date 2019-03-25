import router from "../router";
import { Toast } from 'buefy/dist/components/toast'
import BaseService from "../../../../api/base";
const state = {
    users: null,
    userObj: {
        email: "",
        password: "",
        phone: "",
        address: "",
        role_id: 1,
        user_detail: {
            first_name: "",
            last_name: "",
            father_name: "",
            phone: "",
            email: "",
            profile_image: "",
            gender: "",
            blood_group: "",
            identity_number: "",
            address: "",
            city: "",
            state: "",
            zip: "",
            country: "",
            dob: "",
            level_year: "",
            level_semester: "",
            group: "",
            academic_year: 1,
            skills: [],
            hobbies: [],
            languages: [],
            references: [
                { name: "", Phone: "", email: "", isRemove: false }
            ]
        },
        qualifications: [
            { college: "", year: "", marks: "", percentage: "", attachment: "", isRemove: false }
        ],
        experiences: [
            { company: "", year: "", title: "", isRemove: false }
        ],
        bank_account: {
            bank: "", ifsc: "", ac_no: ""
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
        console.log(data);
        function assignDataToObj(obj) {
            Object.keys(obj).forEach(function (key) {
                if (key === data.key) {
                    return obj[key] = value !== "" ? value : null;
                } else if (typeof obj[key] === 'object') {
                    // console.log(obj[key]);
                    assignDataToObj(obj[key]);
                }
            });
        }
        assignDataToObj(userObj);
        state.userObj = userObj;
    },
    updateFieldWithIndex(state, data) {
        const { userObj } = state;
        const field = data.key;
        const value = data.value;
        const type = data.type;
        if (type === "references") {
            userObj.user_detail[type][data.index][field] = value !== "" ? value : null;
        } else {
            userObj[type][data.index][field] = value !== "" ? value : null;
        }
        console.log("updateFieldWithIndex", userObj)
        state.userObj = userObj;
    },
    ADD_NEW_OBJ_TO_USER_OBJ(state, data) {
        const { userObj } = state;
        const type = data.type;
        const index = data.index;
        console.log(data);
        const d = {
            qualifications: { college: "", year: "", marks: "", percentage: "", attachment: "", isRemove: false },
            experiences: { college: "", year: "", marks: "", percentage: "", attachment: "", isRemove: false },
            references: { name: "", Phone: "", email: "", isRemove: false }
        }
        if (type === "references") {
            userObj.user_detail[type].push(d[type]);
            userObj.user_detail[type][index].isRemove = true;
        } else {
            userObj[type].push(d[type]);
            userObj[type][index].isRemove = true;
        }
        state.userObj = userObj;
    },
    REMOVE_OBJ_TO_USER_OBJ(state, data) {
        const { userObj } = state;
        const type = data.type;
        const index = data.index;
        userObj[type].splice(index, 1);
    }
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
    CREATE_NEW_USER: (context) => {
        BaseService.doPost("user", state.userObj).then(({ data }) => {
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