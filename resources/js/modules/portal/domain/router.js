import domain from "./domain"
import listView from "./components/list-view"
import newDomain from "./components/new-domain"

const DomainRoutes = {
    path: "domain",
    component: domain,
    children: [
        {
            path: "list",
            name: "domain.list",
            component: listView
        },
        {
            path: "new/domain",
            name: "domain.new",
            component: newDomain
        }
    ]
}
export default DomainRoutes;