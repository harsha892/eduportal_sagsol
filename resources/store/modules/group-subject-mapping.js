import ApiService from "../../js/appservices";
import router from '../../js/approutes'

export default {
    state: {
        subjects: [],
        subjectObj: {
            "slug": "",
            "name": "",
            "description": "",
            "durations": "",
            "semesters": ""
        }
    },
    getters: {},
    mutations: {
        SET_SUBJECTS_MUTATION: (state, subjects) => {
            state.subjects = subjects
        },
    },
    actions: {
        SG_MAPPING_GLOBE_ACTION: (context, payload) => {
            if (payload.method !== 'get') {
                ApiService.doPost(payload.url, payload.data).then(({ data }) => {
                    const subjects = data.data;
                    context.commit('SET_SUBJECTS_MUTATION', subjects);
                    router.push({
                        name: "m-mapping",
                    });
                }).catch(e => {
                    console.log(e)
                })
            } else {
                ApiService.doGet(payload.url).then(({ data }) => {
                    const subjects = data.data;
                    context.commit('SET_SUBJECTS_MUTATION', subjects);
                }).catch(e => {
                    console.log(e)
                })
            }
        },
        SG_MAPPING_DELETE_ACTION: (context, payload) => {
            // http://education_portal.test/api/group/2/subjects/delete

            ApiService.doPost('group/' + payload.groupId + '/subjects/delete', payload).then(({ data }) => {
                window.location.reload();
                return data;
            }).catch(e => {
                console.log(e)
            })
        }
    }
}