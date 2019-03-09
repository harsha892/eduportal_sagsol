import Vue from 'vue'
import Vuex from 'vuex'
import role from './modules/role'
import user from './modules/user'
import group from './modules/group'
import subject from './modules/subject'
import groupSubjectMapping from "./modules/group-subject-mapping"
import topics from "./modules/topics"
import content from "./modules/content"
import question from "./modules/question"
import masters from "./modules/masters"
import answer from "./modules/answer"
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'
export const strict = false

export default new Vuex.Store({
    modules: {
        role,
        user,
        group,
        subject,
        groupSubjectMapping,
        topics,
        content,
        question,
        masters,
        answer
    },
    strict: debug,
    // plugins: debug ? [createLogger()] : []
})