import AuthComponent from "./auth-component.vue"
import LoginComponent from "./components/Auth.vue"
const AuthRoutes = {
    path: "/auth",
    component: AuthComponent,
    children: [
        {
            path: "login",
            name: "auth.login",
            component: LoginComponent
        },
        {
            path: "",
            redirect: "login"
        }
    ]
}
export default AuthRoutes;