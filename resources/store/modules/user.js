import ApiService from "../../js/appservices";
import { getField, updateField } from 'vuex-map-fields';
import moment from "moment";
import router from '../../js/approutes'


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
        },
        errors: {}
    }, getters: {
        GET_USERS: state => state.users,
        GET_USERS_BY_ROLES: state => state.usersByRole,
        SINGLE_USER_INFO: state => state.singleUserInfo,
        NEW_USER_OBJ: state => state.newUserFormObj,
        GET_ERRORS: state => state.errors,
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
            console.log(newUser);
            state.newUserFormObj = newUser
        },
        SET_ERRORS: (state, errors) => {
            console.log("SET_ERRORS", { state, errors })
            state.errors = errors
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
        POST_USER_DATA: (context, data) => {
            let payload = JSON.parse(JSON.stringify(data));
            payload.data.user_detail.dob = moment(payload.data.user_detail.dob).format(
                "DD/MM/YYYY"
            );
            console.log(payload);
            if (payload.type === "new") {
                payload.data.role_id = payload.data.role_id.id;
                ApiService.doPost('user', payload.data).then(response => {
                    const form = JSON.parse(JSON.stringify(context.state.newUserFormObj));
                    Object.keys(form).forEach(key => {
                        if (typeof form[key] == 'object') {
                            Object.keys(form[key]).forEach(k => {
                                form[key][k] = "";
                            })
                        } else {
                            form[key] = "";
                        }
                    })
                    context.commit('NEW_USER_INFO', form);
                    router.push({
                        name: "users",
                        params: { usersListType: data.data.role_id.slug }
                    });
                    return response;
                }).catch(error => {
                    context.commit('SET_ERRORS', error)
                })
            } else {
                ApiService.doPut('user/' + payload.data.id, payload.data).then(response => {
                    router.go(-1);
                    return response;
                }).catch(error => {
                    context.commit('SET_ERRORS', error)
                })
            }

        }
    }


}