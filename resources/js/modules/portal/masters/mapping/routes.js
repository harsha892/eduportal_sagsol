import mapping from "./mapping"
import mappingTable from "./components/mapping-table"
import mappingForm from "./components/mapping-form"

const mappingRoutes = {
    path: "mapping/:groupId",
    component: mapping,
    children: [
        {
            path: "list",
            name: "mapping.list",
            component: mappingTable
        },
        {
            path: "form",
            name: "mapping.form",
            component: mappingForm
        }
    ]
}
export default mappingRoutes;