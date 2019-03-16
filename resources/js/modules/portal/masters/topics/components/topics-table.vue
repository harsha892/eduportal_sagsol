<template>
  <div id="topics-table-view">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="col-6 p-0 invisible">
            <div class="input-group mb-0">
              <input
                type="text"
                class="form-control"
                id="searchTopicHelp"
                placeholder="Search by topic name"
              >
              <div class="input-group-append">
                <span
                  class="input-group-text bg-dark text-white"
                  id="basic-addon1"
                >Search by topic name</span>
              </div>
            </div>
          </div>
          <div>
            <router-link :to="{ name: 'topics.form'}" class="btn btn-primary">Create New Topic</router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover" v-if="topics">
          <thead class="thead-light">
            <tr>
              <th scope="col">Topic</th>
              <th scope="col">Content</th>
              <th scope="col">Subject</th>
              <th scope="col">Group</th>
              <th scope="col">Is Approved</th>
              <!-- <th scope="col">Action</th> -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,index) in topics.data" :key="index">
              <td>
                <router-link :to="{ name: 'e-learn-single-topic'}">{{item.name}}</router-link>
              </td>
              <td>
                <a
                  href
                  class="text-info"
                  data-toggle="modal"
                  data-target="#topic_content_modal"
                  v-on:click="getTopicContent(item)"
                >View Content</a>
              </td>
              <td>{{item.subject_name}}</td>
              <td>{{item.group_name}}</td>
              <td>
                <span class="badge badge-success" v-if="item.is_active===1">Approved</span>
                <span class="badge badge-secondary" v-else>In Active</span>
              </td>
              <!-- <td>
                <a href class="text-danger">
                  <i class="fa fa-exclamation-circle"></i> Report
                </a> |
                <a href>
                  <i class="fa fa-edit"></i> Edit
                </a> |
                <a href class="text-muted">
                  <small>
                    <i class="fa fa-trash"></i> Delete
                  </small>
                </a>
              </td>-->
            </tr>
          </tbody>
        </table>
        <p v-else>No topics were found create new topic</p>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="topic_content_modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="topic_content_modal"
      aria-hidden="true"
      v-if="topics && content"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <ul class="list-inline">
                <li>Topic: {{topicContent.name}}</li>
                <li class="list-inline-item">
                  <span class="text-muted">Subject:</span>
                  {{topicContent.subject_name}}
                </li>
                <li class="list-inline-item">
                  <span class="text-muted">Group:</span>
                  {{topicContent.group_name}}
                </li>
                <li v-if="!content.length" class="pt-3">
                  <router-link
                    data-dismiss="modal"
                    class="btn btn-danger"
                    :to="{ name: 'topicContent', params:{topicId:topicContent.id}}"
                  >Click here to add content</router-link>
                </li>
              </ul>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table" v-if="!!content.length">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Notes</th>
                  <th scope="col">Audio</th>
                  <th scope="col">Video</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in content" :key="index">
                  <th scope="row">1</th>
                  <td>
                    <span v-if="item.notes">Read Book</span>
                    <span v-else>NA</span>
                  </td>
                  <td>
                    <span v-if="item.audio">
                      <span
                        class="btn btn-sm btn-danger"
                        v-on:click="playMedia('audio',item)"
                        data-dismiss="modal"
                      >Listen Audio</span>
                    </span>
                  </td>
                  <td>
                    <span v-if="item.video">
                      <span
                        class="btn btn-sm btn-danger"
                        v-on:click="playMedia('video',item)"
                        data-dismiss="modal"
                      >Watch Video</span>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
            <p v-else class="text-danger">Content not found please add content</p>
          </div>
        </div>
      </div>
    </div>
    <div v-if="mediaObj!==null">
      <div class="card">
        <media-player :item="mediaObj" @closeMedia="closeMedia"></media-player>
        <div class="card-footer">
          <span v-on:click="mediaObj=null">Close</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import mediaPlayer from "../../../common/components/media-player";
export default {
  name: "topics-table-view",
  data() {
    return {
      topicContent: "",
      mediaObj: null
    };
  },
  watch: {},
  mounted() {},
  components: {
    mediaPlayer
  },
  methods: {
    getTopicContent(topic) {
      this.topicContent = topic;
      this.$store.dispatch("topics/GET_CONTENTS_BY_TOPIC_ID_ACTION", topic.id);
    },
    playMedia(mediaType, item) {
      this.mediaObj = { media: item, type: mediaType };
    },
    closeMedia() {
      this.mediaObj = null;
    }
  },
  computed: {
    topics() {
      return this.$store.getters["topics/GET_TOPICS"];
    },
    content() {
      console.log(this.$store.getters["topics/GET_CONTENTS_BY_TOPIC_ID"])
      // return !!this.$store.getters["topics/GET_CONTENTS_BY_TOPIC_ID"].length
      //   ? this.$store.getters["topics/GET_CONTENTS_BY_TOPIC_ID"]
      //   : [];
    }
  },
  created() {
    this.$store.dispatch("topics/GET_TOPICS_LIST", { url: "topic?&page=" + 1 });
  }
};
</script>