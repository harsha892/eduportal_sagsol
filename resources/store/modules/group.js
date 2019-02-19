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
        },
        subjectsByGroupId: []
    },
    getters: {
        GET_GROUPS: state => state.groups,
        GET_GROUP_OBJ: state => state.groupObj,
        GET_SUBJECTS_INFO_BY_GROUP_ID: state => state.subjectsByGroupId,
    },
    mutations: {
        SET_GROUPS_MUTATION: (state, groups) => {
            state.groups = groups
        },
        SET_SUBJECTS_BY_GROUP_ID: (state, subjectsByGroupId) => {
            state.subjectsByGroupId = subjectsByGroupId
        }
    },
    actions: {
        GROUP_GLOBE_ACTION: (context, payload) => {
            if (payload !== undefined) {
                ApiService.doPost('group', payload).then(({ data }) => {
                    const groups = data.data;
                    context.commit('SET_GROUPS_MUTATION', groups);
                    window.location.reload();
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
        },
        GET_SUBJECTS_BY_GROUP_ID: (context, payload) => {
            ApiService.doGet('group/' + payload + '/subjects').then(({ data }) => {
                const response = data;
                context.commit('SET_SUBJECTS_BY_GROUP_ID', response);
            }).catch(e => {
                console.log(e)
            })
        },
    }
}