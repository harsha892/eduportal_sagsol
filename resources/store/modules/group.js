import ApiService from "../../js/appservices";
export default {
    state: {
        groups: [], 
        groupObj: {
            "slug": "",
            "name": "",
            "description": "",
            "durations": "",
            "semesters": ""
        }
    },
    getters: {
        GET_GROUPS: state => state.groups,
        GET_GROUP_OBJ: state => state.groupObj,
    },
    mutations: {
        SET_GROUPS_MUTATION: (state, groups) => {
            state.groups = groups
        },
    },
    actions: {
        GROUP_GLOBE_ACTION: (context, payload) => {
            console.log(payload, "payload");
            if (payload !== undefined) {
                ApiService.doPost('group', payload).then(({ data }) => {
                    const groups = data.data;
                    context.commit('SET_GROUPS_MUTATION', groups);
                }).catch(e => {
                    console.log(e)
                })
            } else {
                ApiService.doGet('group').then(({ data }) => {
                    const groups = data.data;
                    context.commit('SET_GROUPS_MUTATION', groups);
                }).catch(e => {
                    console.log(e)
                })
            }
        }
    }
}