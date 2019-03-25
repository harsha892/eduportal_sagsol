import UserRoutes from "./user/router"
import testManagementRoutes from "./test-management/router"
import trainingManagementRoutes from "./training-management/router"
import addNewRoutes from "./add-new/router";
import portal from "./portal"
import Dashboard from "./portal-dashboard"
import MasterRoutes from "./masters/routes"
const PortalRoutes = {
    path: "/user/:userType",
    component: portal,
    children: [
        {
            path: "dashboard",
            name: "portal.dashboard",
            component: Dashboard,
        },
        { ...UserRoutes },
        { ...testManagementRoutes },
        { ...trainingManagementRoutes },
        { ...addNewRoutes },
        { ...MasterRoutes }
    ]
}
export default PortalRoutes;