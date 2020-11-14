<template>
  <v-card width="100%">
    <v-container>
      <v-row align="center">
        <v-col cols="2">
          <v-img style="border-radius:50%" width="40" :src="`${storageUrl}/${post.author_id.avatar}`" @error="setDefaultAvatar()"/>
        </v-col>
        <v-col cols="8">
          <div class="body-2">{{ post.author_id.name }}</div>
        </v-col>
        <v-col cols="2">
          <v-btn clear icon v-if="post.author_id.id == user.id" @click="destroy()">
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <div
            class="caption"
            style="overflow-wrap:break-word; white-space:pre-wrap"
          >{{ post.body }}</div>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="8">
          <div
            class="caption grey--text"
            v-if="post.likes_count > 0"
          >{{ post.likes_count }} Guru Menyukai</div>
        </v-col>
        <v-col cols="2">
          <v-btn icon @click="post.liked_count ? dislike() : like()">
            <v-icon
              :color="post.liked_count ? 'red': null"
            >{{ post.liked_count ? 'mdi-heart': 'mdi-heart-outline' }}</v-icon>
          </v-btn>
        </v-col>
        <v-col cols="2">
          <v-btn icon @click="openComment()">
            <v-icon>mdi-comment</v-icon>
          </v-btn>
        </v-col>
      </v-row>
      <v-row justify="space-between">
          <v-col>
              <div class="caption grey--text">{{post.created_at | moment('from','now')}}</div>
          </v-col>
          <v-col>
              <div v-show="post.comments_count > 0" class="caption grey--text">Lihat semua {{post.comments_count}} komentar</div>
          </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>

<script>
import { mapState } from "vuex"
export default {
  props: {
    post: Object
  },
  data() {
    return {}
  },
  computed: {
    ...mapState(["user",'storageUrl'])
  },
  methods: {
    like: function() {
      this.$store
        .dispatch("likePost", this.post)
        .then(res => {
          this.post.liked_count = res.data.liked_count
          this.post.likes_count = res.data.likes_count
        })
        .catch(err => {})
    },
    dislike: function() {
      this.$store
        .dispatch("dislikePost", this.post)
        .then(res => {
          this.post.liked_count = res.data.liked_count
          this.post.likes_count = res.data.likes_count
        })
        .catch(err => {})
    },
    destroy: function() {
      this.$store
        .dispatch("destroyPost", this.post)
        .then(res => {})
        .catch(err => {})
    },
    setDefaultAvatar(){
        this.post.author_id.avatar = "users/default.png"
    },
    openComment(){
        this.$router.push({
            name: 'postcomment',
            params:{
                post:this.post
            }
        })
    }
  }
}
</script>

<style>
</style>
