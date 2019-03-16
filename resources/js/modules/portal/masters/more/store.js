import { Toast } from 'buefy/dist/components/toast'
import BaseService from "../../../../api/base";
const state = {
    formObj: { name },
    masters: null
};
const getters = {
    FORM_OBJ: state => state.formObj,
    GET_MASTERS: state => state.masters,
};
const mutations = {
    SET_MASTERS_MUTATION: (state, masters) => {
        // console.log({ contents });
        state.masters = masters;
    },
    updateField(state, data) {
        const { formObj } = state;
        const { value } = data;
        const field = data.key;
        formObj[field] = value;
        state.formObj = formObj;
    },
    clearForm: (state) => {
        state.formObj = {
            name: "",
        };
    }
};
const actions = {
    GET_MASTERS_ACTION: (context) => {
        BaseService.doGet('master').then(({ data }) => {
            const masters = data;
            console.log(masters);
            context.commit('SET_MASTERS_MUTATION', masters);
        }).catch(e => {
            console.log(e)
        })
    },
    POST_MASTER: (context, payload) => {
        BaseService.doPost('master/' + payload.url, payload.data).then(({ data }) => {
            console.log(context);
            context.dispatch("GET_MASTERS_ACTION");
            context.commit("clearForm");
            Toast.open({
                type: "is-danger",
                message: `${(payload.url).replace("_", " ")} Create Successfully`
            });
        }).catch(e => {
            console.log(e)
        })
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