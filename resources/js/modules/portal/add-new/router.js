import addNew from "./add-new"
import addNewQuestion from "./components/add-new-question"
import addNewContent from "./components/add-new-content"
const addNewRoutes = {
    path: "add-new",
    component: addNew,
    children: [
        {
            path: "question",
            name: "addNew.question",
            component: addNewQuestion
        },
        {
            path: "content",
            name: "addNew.content",
            component: addNewContent
        }
    ]
}
export default addNewRoutes;