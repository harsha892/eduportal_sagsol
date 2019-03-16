import { Toast } from 'buefy/dist/components/toast'
import BaseService from "../../../../api/base";
const state = {
    subjects: {},
    allSubjects: null,
    mappedSubjects: null
};
const getters = {
    GET_MAPPED_SUBJECTS: state => state.subjects,
    GET_MAPPED_SUBJECTS_BY_GROUP_ID: state => state.mappedSubjects
};
const mutations = {
    MAP_SUBJECT_MUTATION: (state, payload = {}) => {
        const { yindex, sindex, subjects } = payload;
        state.subjects[`${yindex}-${sindex}`] = subjects;

        /**
         * 
         */
        state.allSubjects = Object.keys(state.subjects).reduce((prev, key) => {
            return [...prev, ...state.subjects[key]];
        }, []);
        // console.log({ .allSubjects });
    },
    SET_SUBJECTS_BY_GROUP_ID: (state, payload) => {
        state.mappedSubjects = payload;
    },
    SORT_SUBJECTS: (state, payload) => {
        if (payload === "semester") {
            state.mappedSubjects
                .sort()
                .sort((a, b) => (a.semester > b.semester ? 1 : -1));
        } else if (payload === "year") {
            state.mappedSubjects.sort().sort((a, b) => (a.year > b.year ? 1 : -1));
        }
    }
};
const actions = {
    GET_MAPPED_SUBJECTS_BY_GROUP_ID: (context, payload) => {
        BaseService.doGet("group/" + payload + "/subjects").then(({ data }) => {
            const subjects = data;
            context.commit('SET_SUBJECTS_BY_GROUP_ID', subjects);
        }).catch(e => {
            console.log(e)
        })
    },
    MAP_SUBJECTS: (context, payload) => {
        context.commit("MAP_SUBJECT_MUTATION", payload)
    },
    POST_SUBJECTS: (context, payload) => {
        BaseService.doPost('group/' + payload + '/subjects', { subjects: state.allSubjects }).then(({ data }) => {
            Toast.open({
                type: "is-success",
                message: "Subject mapping Create Successfully"
            });
        }).catch(e => {
            console.log(e)
        })
    },
    SORT_MAPPED_SUBJECTS: (context, payload) => {
        context.commit("SORT_SUBJECTS", payload);
    }
}

const modules = {};
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
    modules
}