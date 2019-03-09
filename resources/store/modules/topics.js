import ApiService from "../../js/appservices";
import router from '../../js/approutes'
export default {
    state: {
        topics: [],
        topicsFormObj: {
            "name": "",
            "short_description": "",
            "long_description": "",
        },
        postedTopic: null,
        topicContent: null
    },
    getters: {
        GET_TOPICS: state => state.topics,
        GET_POSTED_TOPIC: state => state.postedTopic
    },
    mutations: {
        SET_TOPICS_MUTATION: (state, topics) => {
            state.topics = topics
        },
        SET_POSTED_TOPIC_MUTATION: (state, postedTopic) => {
            state.postedTopic = postedTopic
        },
        SET_POSTED_TOPIC_CONTENT_MUTATION: (state, topicContent) => {
            state.topicContent = topicContent
        }
    },
    actions: {
        TOPIC_GLOBE_ACTION: (context, payload) => {
            // console.log("topic post url check---->", 'group/' + payload.subjectId + '/topics', payload.topics);
            ApiService.doPost('group/subjects/' + payload.subjectId + '/topics', payload.topics).then(({ data }) => {
                const topics = data;
                // console.log(data, topics);
                context.commit('SET_POSTED_TOPIC_MUTATION', data);
                // window.location.reload();
            }).catch(e => {
                console.log(e)
            })
        },
        ADD_CONTENT_TO_TOPIC: (context, payload) => {
            // http://education_portal.test/api/topic/1/content

            ApiService.doPost('topic/' + payload.topicId + '/content', payload).then(({ data }) => {
                const topics = data;
                // console.log(data, topics);
                context.commit('SET_POSTED_TOPIC_CONTENT_MUTATION', data);
                swal({
                    text: "Content Uploaded Successfully",
                    icon: "warning",
                    dangerMode: true,
                    buttons: false,
                    timer: 2000
                }).then(function () {
                    console.log("swal completed then");
                    router.push({
                        name: "e-learn-topics",
                    });
                })

                // window.location.reload();
            }).catch(e => {
                console.log(e)
            })
        },
        GET_TOPICS_LIST: (context, payload) => {
            // payload.page
            ApiService.doGet(payload.url).then(({ data }) => {
                const topics = data;
                context.commit('SET_TOPICS_MUTATION', topics);
            }).catch(e => {
                console.log(e)
            })
        }
    }
}