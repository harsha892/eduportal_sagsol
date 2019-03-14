import testManagement from "./test-management"
import testTemplate from "./components/test-template"
import testTemplateIndex from "./components/test-template-index"
const DomainRoutes = {
    path: "test",
    component: testManagement,
    children: [
        {
            path: "template/index",
            name: "test.index",
            component: testTemplateIndex
        }, {
            path: "template",
            name: "test.new",
            component: testTemplate
        },
    ]
}
export default DomainRoutes;