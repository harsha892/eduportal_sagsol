window.Vue = window.Vue || require('vue');
import VueRouter from "vue-router"
Vue.use(VueRouter)
Vue.config.productionTip = false
import AuthComponent from "../vue/auth/Auth"
import MainDashboard from "../vue/Dashboard"
import UserDashboard from "../vue/portal/user-dashboard"
import AdminHomePage from "../vue/portal/admin/home"
import UsersList from "../vue/portal/admin/user/usersList"
import LeaveRequests from "../vue/portal/admin/user/leave-requests"
import FinancialReports from "../vue/portal/admin/financial-reports"
import Notifications from "../vue/portal/admin/notifications"
import educationPortal from "../vue/portal/education/education-portal"
import SubjectsView from "../vue/portal/education/tests/subjects/subjectsView"
import QuestionBank from "../vue/portal/education/tests/questions/questionbank"
import CreateNewQuestion from "../vue/portal/education/tests/questions/create-question"
import singleQuestionView from "../vue/portal/education/tests/questions/single-question-view"
import TestsView from "../vue/portal/education/tests/tests/tests"
import LearnSubjectsView from "../vue/portal/education/learn/subjects"
import LearnTopicesView from "../vue/portal/education/learn/topics"
import singleTopic from "../vue/portal/education/learn/single-topic"
import createNewTopic from "../vue/portal/education/learn/create-new-topic"
import LearnAnswerBookiIew from "../vue/portal/education/learn/answer-book"
import MasterSettings from "../vue/portal/admin/master-settings/master-settings"
import MaterSetGroups from "../vue/portal/admin/master-settings/groups"
import MaterSetSubjects from "../vue/portal/admin/master-settings/subjects"
import MaterSetRoles from "../vue/portal/admin/master-settings/roles"
import MaterSetMapping from "../vue/portal/admin/master-settings/mapping"
import MaterSetSettings from "../vue/portal/admin/master-settings/settings"
import MaterSetPermission from "../vue/portal/admin/master-settings/permission"
import CreateTestFrom from "../vue/portal/education/tests/tests/create-test-form"
import ModelQuestionPaperListView from "../vue/portal/admin/master-settings/model-question-paper-list"
import ModelQuestionPaperFrom from "../vue/portal/admin/master-settings/model-question-paper-form"
import PermissionsForm from "../vue/portal/admin/master-settings/permissions-form"
// import StaffHome from "../vue/portal/staff/dashboard"
// import StudentHome from "../vue/portal/student/dashboard"
import formsView from "../vue/shared/forms/FormsComponent"
import NewUserForm from "../vue/shared/forms/user/NewUser"
import editUserForm from "../vue/shared/forms/user/editUser"
import subjectGroupMapping from "../vue/shared/forms/subject-group-form"

const portalRoutes = [
    {
        name: "auth",
        path: '/portal',
        component: AuthComponent,
    },
    {
        name: "dashboard",
        path: "/portal/:userType",
        component: MainDashboard,
        children: [
            {
                name: "homePage",
                path: "dashboard/",
                component: UserDashboard,
                children: [
                    {
                        name: "adminDashboard",
                        path: "home/",
                        component: AdminHomePage,
                        meta: {
                            title: "Admin Dashboard"
                        }
                    },
                    {
                        name: "financialReports",
                        path: "financial-reports/",
                        component: FinancialReports
                    }, {
                        name: "notifications",
                        path: "notifications/",
                        component: Notifications
                    },
                    {
                        name: "users",
                        path: "users/:usersListType",
                        component: UsersList
                    },
                    {
                        name: "leave-requests",
                        path: "users/leave/requests",
                        component: LeaveRequests
                    },
                    {
                        name: "",
                        path: "e/tests",
                        component: educationPortal,
                        children: [
                            {
                                name: "e-test-subjects",
                                path: "subjects/",
                                component: SubjectsView
                            },
                            {
                                name: "e-test-questionBank",
                                path: "question-bank/",
                                component: QuestionBank
                            },
                            {
                                name: "e-create-new-question",
                                path: "question-bank/create-new/question",
                                component: CreateNewQuestion
                            },
                            {
                                name: "single-question-view",
                                path: "question/id",
                                component: singleQuestionView
                            },
                            {
                                name: "e-tests",
                                path: "list-of-tests/",
                                component: TestsView
                            },
                            {
                                name: "e-create-tests",
                                path: "create/",
                                component: CreateTestFrom
                            }
                        ]
                    },
                    {
                        name: "",
                        path: "e/learn",
                        component: educationPortal,
                        children: [
                            {
                                name: "e-learn-subjects",
                                path: "subjects/",
                                component: LearnSubjectsView
                            },
                            {
                                name: "e-learn-topics",
                                path: "topics/",
                                component: LearnTopicesView
                            },
                            {
                                name: "e-learn-new-topic",
                                path: "new-topic/",
                                component: createNewTopic
                            },
                            {
                                name: "e-learn-single-topic",
                                path: "single-topic/",
                                component: singleTopic
                            },
                            {
                                name: "e-answers",
                                path: "answer-book/",
                                component: LearnAnswerBookiIew
                            }
                        ]
                    },
                    {
                        name: "",
                        path: "master-set/",
                        component: MasterSettings,
                        children: [
                            {
                                name: "m-roles",
                                path: "roles/",
                                component: MaterSetRoles
                            }, {
                                name: "m-groups",
                                path: "groups/",
                                component: MaterSetGroups
                            }, {
                                name: "m-subjects",
                                path: "subjects/",
                                component: MaterSetSubjects
                            }, {
                                name: "m-settings",
                                path: "settings/",
                                component: MaterSetSettings
                            }, {
                                name: "m-permissions",
                                path: "permissions/",
                                component: MaterSetPermission
                            }, {
                                name: "m-permissions-form",
                                path: "permissions-form/",
                                component: PermissionsForm
                            }, {
                                name: "m-question-paper-list",
                                path: "model-question-papers-list/",
                                component: ModelQuestionPaperListView
                            }, {
                                name: "m-question-paper-from",
                                path: "model-question-papers-form/",
                                component: ModelQuestionPaperFrom
                            },
                            {
                                name: "m-mapping",
                                path: "mapping/",
                                component: MaterSetMapping
                            }
                        ]
                    },
                ]
            },
            {
                name: "form",
                path: "form/",
                component: formsView,
                children: [
                    {
                        name: "newUser",
                        path: "new-user/",
                        component: NewUserForm,
                    },
                    {
                        name: "editUser",
                        path: "edit-user/:id",
                        component: editUserForm,
                    },
                    {
                        name: "subjectGroupMapping",
                        path: "subject-group-mapping",
                        component: subjectGroupMapping,
                    }
                ]
            }
        ]
    }
];
const router = new VueRouter({
    routes: portalRoutes, mode: 'history',
    cors: true,
    redirect: {
        '*': '/'
    },

});
export default router;