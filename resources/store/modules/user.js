import ApiService from "../../js/appservices";

export default {
    state: {
        users: [],
        usersByRole: [],
        singleUserInfo: [],
        newUserFormObj: {
            email: "",
            password: "",
            role_id: "",
            user_detail: {
                first_name: "",
                last_name: "",
                phone: "",
                emergency_phone: "",
                address: "",
                city: "",
                state: "",
                zip: "",
                country: "",
                dob: ""
            }
        }
    }, getters: {
        GET_USERS: state => state.users,
        GET_USERS_BY_ROLES: state => state.usersByRole,
        SINGLE_USER_INFO: state => state.singleUserInfo,
        NEW_USER_OBJ: state => state.newUserFormObj,
    }, mutations: {
        SET_USER_MUTATION: (state, users) => {
            state.users = users;
        },
        SET_USER_BY_ROLE_MUTATION: (state, usersByRole) => {
            state.usersByRole = usersByRole;
        },
        SET_USER_INFO_BY_ID: (state, singleUserInfo) => {
            state.singleUserInfo = singleUserInfo;
        },
        NEW_USER_INFO: (state, value) => {
            console.log(value);
            state.newUserFormObj[key] = value
        }
    }, actions: {
        GET_USER_ACTION: (context) => {
            ApiService.doGet('user').then(({ data }) => {
                const users = data.data;
                context.commit('SET_USER_MUTATION', users);
            }).catch(e => {
                console.log(e)
            })
        },
        GET_USER_BY_ROLE_ACTION: (context, payload) => {
            ApiService.doGet('user?role=' + payload.id).then(({ data }) => {
                const usersByRole = data.data;
                context.commit('SET_USER_BY_ROLE_MUTATION', usersByRole);
            }).catch(e => {
                console.log(e)
            })
        },
        GET_USER_BY_ID_ACTION: (context, payload) => {
            context.commit('SET_USER_INFO_BY_ID', payload);
            // console.log("payload", payload);
            // ApiService.doGet('user/' + payload).then(({ data }) => {
            //     const singleUserInfo = data.data;
            //     console.log("payload", payload, singleUserInfo);
            //     context.commit('SET_USER_INFO_BY_ID', singleUserInfo);
            // }).catch(e => {
            //     console.log(e)
            // })
        }
    }


}