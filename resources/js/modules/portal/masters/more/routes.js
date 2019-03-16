import masters from "./more-masters"
import moreMastersView from "./components/more-masters-view"

const moreMasterRoutes = {
    path: "masters",
    component: masters,
    children: [
        {
            path: "list",
            name: "masters.list",
            component: moreMastersView
        }
    ]
}
export default moreMasterRoutes;