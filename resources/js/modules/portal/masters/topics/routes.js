import topics from "./topics"
import topicsTable from "./components/topics-table"
import topicsForm from "./components/topics-form"

const TopicsRoutes = {
    path: "topics",
    component: topics,
    children: [
        {
            path: "list",
            name: "topics.list",
            component: topicsTable
        },
        {
            path: "form",
            name: "topics.form",
            component: topicsForm
        }
    ]
}
export default TopicsRoutes;