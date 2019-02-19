import ApiService from "../../js/appservices";
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
    getters: {
        GET_SUBJECTS: state => state.subjects,
        GET_SUBJECT_OBJ: state => state.groupObj,
    },
    mutations: {
        SET_SUBJECTS_MUTATION: (state, subjects) => {
            state.subjects = subjects
        },
    },
    actions: {
        SUBJECT_GLOBE_ACTION: (context, payload) => {
            if (payload.method !== 'get') {
                ApiService.doPost(payload.url, payload.data).then(({ data }) => {
                    const subjects = data.data;
                    context.commit('SET_SUBJECTS_MUTATION', subjects);
                    window.location.reload();
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
        }
    }
}