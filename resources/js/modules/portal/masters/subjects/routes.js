import subjects from "./subjects"
import subjectsTable from "./components/subjects-table"

const SubjectsRoutes = {
    path: "subjects",
    component: subjects,
    children: [
        {
            path: "list",
            name: "subjects.list",
            component: subjectsTable
        }
    ]
}
export default SubjectsRoutes;