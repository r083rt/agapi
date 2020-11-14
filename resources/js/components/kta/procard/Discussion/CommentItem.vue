<template>
  <v-card flat class="pb-4">
    <v-layout row wrap align-center>
      <v-flex xs2 class="text-xs-center">
        <v-img
          aspect-ratio="1"
          style="border-radius: 50%;"
          :src="`/storage/${comment.user.avatar}`"
          :lazy-src="`/img/lazyimage.jpg`"
          class="grey lighten-2"
          width="10vw"
        >
          <template v-slot:placeholder>
            <v-layout fill-height align-center justify-center ma-0>
              <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
            </v-layout>
          </template>
        </v-img>
      </v-flex>
      <v-flex xs8>
        <div class="title">{{ comment.user.name }}</div>
        <div class="caption" style="overflow-wrap:break-word; white-space:pre-wrap">{{ comment.value }}</div>
        <div
          class="caption grey--text"
          v-if="comment.likes_count > 0"
        >{{ comment.likes_count }} guru menyukai komentar ini</div>
        <div class="caption blue--text">{{ moment(comment.created_at).fromNow() }}</div>
      </v-flex>
      <v-flex xs2 class="text-xs-center">
        <v-btn icon ripple @click="comment.liked_count ? dislike() : like()">
          <v-icon
            :color="comment.liked_count ? 'red': null"
          >{{ comment.liked_count ? 'favorite': 'favorite_border' }}</v-icon>
        </v-btn>
      </v-flex>
    </v-layout>
  </v-card>
</template>

<script>
import moment from "moment";
moment.locale("id");
export default {
  props: {
    comment: {}
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    moment,
    like: function() {
      let access = {
        comment_id: this.comment.id
      };
      axios
        .post("/api/v1/commentlike", access)
        .then(res => {
          this.comment.liked_count = res.data.liked_count;
          this.comment.likes_count = res.data.likes_count;
        })
        .catch(err => {});
    },
    dislike: function() {
      let access = {
        _method: "delete"
      };
      axios
        .post(`/api/v1/commentlike/${this.comment.id}`, access)
        .then(res => {
          this.comment.liked_count = res.data.liked_count;
          this.comment.likes_count = res.data.likes_count;
        })
        .catch(err => {});
    }
  }
};
</script>
