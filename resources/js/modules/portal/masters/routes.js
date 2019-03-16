import masterView from "./master"
import RolesRoutes from "./roles/routes"
import GroupsRoutes from "./groups/routes"
import SubjectsRoutes from "./subjects/routes"
import moreMasterRoutes from "./more/routes"
import TopicsRoutes from "./topics/routes"
import mappingRoutes from "./mapping/routes"
const MasterRoutes = {
    path: "master",
    component: masterView,
    children: [
        { ...RolesRoutes },
        { ...GroupsRoutes },
        { ...SubjectsRoutes },
        { ...moreMasterRoutes },
        { ...TopicsRoutes },
        { ...mappingRoutes }
    ]
}
export default MasterRoutes;