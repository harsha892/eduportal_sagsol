
import groups from "./groups/store";
import roles from "./roles/store";
import subjects from "./subjects/store";
import moreMasters from "./more/store"
import topics from "./topics/store"
import mapping from "./mapping/store"
const state = {
};

const getters = {
};

const actions = {

};

const mutations = {

};

const modules = {
    roles,
    groups,
    subjects,
    topics,
    moreMasters,
    mapping
};

export default {
    namespaced: false,
    state,
    getters,
    actions,
    mutations,
    modules
};