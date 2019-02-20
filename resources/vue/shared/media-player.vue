<template>
  <div class="mediaView" id="mediaView">
    <div class="card">
      <div class="card-body">
        <!-- video element -->
        <vue-plyr v-if="item.type==='video'">
          <video :poster="item.media.video" :src="item.media.video">
            <source :src="item.media.video" type="video/mp4" size="320">
            <track kind="captions" label="English" srclang="en" src="captions-en.vtt" default>
          </video>
        </vue-plyr>

        <!-- audio element -->
        <vue-plyr v-else>
          <audio>
            <source :src="item.media.audio" type="audio/mp3">
            <source :src="item.media.audio" type="audio/ogg">
          </audio>
        </vue-plyr>
      </div>
      <div class="card-footer">
        <span v-on:click="closeMedia" class="cursor_pointer">Close</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "mediaView",
  props: ["item"],
  data: function() {
    return {};
  },
  mounted() {},
  methods: {
    closeMedia() {
      this.$emit("closeMedia", null);
    }
  }
};
</script>
<style scoped>
#mediaView {
  position: fixed;
  top: 110px;
  right: 15px;
  z-index: 9999;
  width: 380px;
}
</style>

