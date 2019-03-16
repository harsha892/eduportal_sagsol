import groups from "./groups"
import groupsTable from "./components/groups-table"

const GroupsRoutes = {
    path: "groups",
    component: groups,
    children: [
        {
            path: "list",
            name: "groups.list",
            component: groupsTable
        }
    ]
}
export default GroupsRoutes;