import user from "./user"
import listView from "./components/list-view"
import newUser from "./components/new-user"

const UserRoutes = {
    path: "user",
    component: user,
    children: [
        {
            path: "list",
            name: "user.list",
            component: listView
        },
        {
            path: "new/user",
            name: "user.new",
            component: newUser
        }
    ]
}
export default UserRoutes;