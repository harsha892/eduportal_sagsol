import ApiService from "../../js/appservices";
import { getField, updateField } from 'vuex-map-fields';

export default {
    state: {
        users: [],
        usersByRole: [],
        singleUserInfo: [],
        newUserFormObj: {
            email: "sample@g.com",
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
                dob: ""
            }
        }
    }, getters: {
        GET_USERS: state => state.users,
        GET_USERS_BY_ROLES: state => state.usersByRole,
        SINGLE_USER_INFO: state => state.singleUserInfo,
        NEW_USER_OBJ: state => state.newUserFormObj,
        getField
    }, mutations: {
        updateField,
        SET_USER_MUTATION: (state, users) => {
            state.users = users;
        },
        SET_USER_BY_ROLE_MUTATION: (state, usersByRole) => {
            state.usersByRole = usersByRole;
        },
        SET_USER_INFO_BY_ID: (state, singleUserInfo) => {
            state.singleUserInfo = singleUserInfo;
        },
        NEW_USER_INFO: (state, newUser) => {
            state.newUserFormObj = newUser
        },
        RESET_NEW_USER_FORM(state) {
            Object.keys(state.newUserFormObj).forEach(function (key) {
                state.newUserFormObj[key] = ''
            });
        }
    }, actions: {
        CREATE_NEW_USER_OBJ: (context) => {
            context.commit('NEW_USER_INFO', context);
        },
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
            if (payload !== undefined && payload !== {}) {
                console.log(payload, "payload GET_USER_BY_ID_ACTION");
                ApiService.doGet('user/' + payload).then(({ data }) => {
                    console.log(data);
                    const singleUserInfo = data;
                    context.commit('SET_USER_INFO_BY_ID', singleUserInfo);
                }).catch(e => {
                    console.log(e)
                })
            }
        },
        POST_USER_DATA: (context, payload) => {
            console.log(payload);
            if (payload.routeName !== 'editUser') {
                ApiService.doPost('user', payload.payload).then(({ data }) => {
                    // const singleUserInfo = data;
                    // console.log("payload", payload, singleUserInfo);
                    context.commit('RESET_NEW_USER_FORM');
                }).catch(e => {
                    console.log(e)
                })
            } else {
                ApiService.doPut('user/' + payload.payload.id, payload.payload).then(({ data }) => {
                    // const singleUserInfo = data;
                    // console.log("payload", payload, singleUserInfo);
                    // context.commit('SET_USER_INFO_BY_ID', singleUserInfo);
                }).catch(e => {
                    console.log(e)
                })
            }

        }
    }


}