import DomainRoutes from "./domain/router"
import testManagementRoutes from "./test-management/router"
import trainingManagementRoutes from "./training-management/router"
import addNewRoutes from "./add-new/router";
import portal from "./portal"
import Dashboard from "./portal-dashboard"

const PortalRoutes = {
    path: "/user/:userType",
    component: portal,
    children: [
        {
            path: "dashboard",
            name: "portal.dashboard",
            component: Dashboard,
        },
        { ...DomainRoutes },
        { ...testManagementRoutes },
        { ...trainingManagementRoutes },
        { ...addNewRoutes }
    ]
}
export default PortalRoutes;