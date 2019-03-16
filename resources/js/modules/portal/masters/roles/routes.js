import roles from "./roles"
import rolesTable from "./components/roles-table"

const RolesRoutes = {
    path: "role",
    component: roles,
    children: [
        {
            path: "list",
            name: "role.list",
            component: rolesTable
        }
    ]
}
export default RolesRoutes;