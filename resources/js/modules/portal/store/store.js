import header from "../common/store/header";
import autoComplete from "../common/store/auto-complete"
import domain from "../domain/store/domain";
import addNew from "../add-new/store/add-new";
import masters from "../masters/store";
import testManagement from "../test-management/store"
const state = {};

const getters = {};

const actions = {};

const mutations = {};

const modules = {
    header,
    autoComplete,
    domain,
    addNew,
    masters,
    testManagement
};

export default {
    namespaced: false,
    state,
    getters,
    actions,
    mutations,
    modules
};