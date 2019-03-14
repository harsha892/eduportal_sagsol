import trainingManagement from "./training-management"
import trainingTemplate from "./components/training-template"
import trainingTemplateIndex from "./components/training-template-index"
const DomainRoutes = {
    path: "training",
    component: trainingManagement,
    children: [
        {
            path: "template/index",
            name: "training.index",
            component: trainingTemplateIndex
        }, {
            path: "template",
            name: "training.new",
            component: trainingTemplate
        },
    ]
}
export default DomainRoutes;