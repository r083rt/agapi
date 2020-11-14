<template>
  <div>
    <div class="section-inner custom-page-content mt-5">
      <div class="page-content">
        <v-layout row wrap pb-2>
          <v-flex xs2>
            <v-img
              aspect-ratio="1"
              style="border-radius: 50%;"
              :src="`/storage/${p.author_id.avatar}`"
              :lazy-src="`https://picsum.photos/10/6`"
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
            <v-layout column justify-center fill-height class="text-xs-left">
              <h4>{{ p.author_id.name }}</h4>
              <div
                class="caption grey--text"
              >{{ p.author_id.profile != null ? p.author_id.profile.school_place : 'Belum mengisi alamat sekolah' }}</div>
            </v-layout>
          </v-flex>
          <v-flex xs2>
            <v-btn icon @click="dialog.option.display = true" v-if="p.author_id.id == user.id">
              <v-icon>more_horiz</v-icon>
            </v-btn>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 class="text-xs-left">
            <div class="caption" style="overflow-wrap:break-word; white-space:pre-wrap">{{ p.body }}</div>
          </v-flex>
        </v-layout>
        <v-layout row wrap align-center>
          <v-flex xs8>
            <div
              class="caption grey--text"
              v-if="p.likes_count > 0"
            >{{ p.likes_count }} guru menyukai diskusi ini</div>
          </v-flex>
          <v-flex xs2>
            <v-btn icon @click="p.liked_count ? dislike() : like()">
              <VIcon
                ref="like"
                :color="p.liked_count ? 'red': null"
              >{{ p.liked_count ? 'favorite': 'favorite_border' }}</VIcon>
            </v-btn>
          </v-flex>
          <v-flex xs2>
            <v-btn icon @click="opencomment">
              <VIcon>chat_bubble_outline</VIcon>
            </v-btn>
          </v-flex>
        </v-layout>
        <v-layout row wrap v-if="p.comments.length > 0">
          <v-flex xs12 class="text-xs-right">
            <div
              @click="opencomment"
              class="caption grey--text text-sm-right"
            >Lihat semua {{ p.comments_count }} Komentar</div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs2>
            <v-img
              aspect-ratio="1"
              style="border-radius: 50%;"
              :src="`/storage/${user.avatar}`"
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
          <v-flex xs10>
            <v-container grid-list-xs fluid>
              <v-layout row wrap text-xs-left column justify-center fill-height>
                <div
                  class="caption grey--text text-sm-left"
                  @click="dialog.comment.display = true"
                >Tambahkan komentar...</div>
              </v-layout>
            </v-container>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12>
            <div class="caption blue--text">{{ moment(p.created_at).fromNow() }}</div>
          </v-flex>
        </v-layout>
      </div>
    </div>

    <!-- dialog komentar -->
    <v-dialog
      v-model="dialog.comment.display"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
      id="dialogcomment"
      ref="dialogcomment"
    >
      <v-card>
        <v-toolbar>
          <v-btn flat icon @click="dialog.comment.display = false">
            <v-icon>arrow_back</v-icon>
          </v-btn>
          <v-toolbar-title>Komentar</v-toolbar-title>
        </v-toolbar>
        <v-container grid-list-xs fluid id="commentcontainer">
          <v-layout row wrap>
            <v-flex xs12>
              <v-card flat ref="scrollto" id="scrollto">
                <v-layout row wrap align-center>
                  <v-flex xs2 class="text-xs-center">
                    <v-img
                      aspect-ratio="1"
                      style="border-radius: 50%;"
                      :src="`/storage/${p.author_id.avatar}`"
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
                  <v-flex xs10>
                    <h4>{{ p.author_id.name }}</h4>
                    <div class="caption" style="overflow-wrap:break-word; white-space:pre-wrap">{{ p.body }}</div>
                  </v-flex>
                </v-layout>
              </v-card>
              <v-divider></v-divider>
              <transition-group name="fade">
                <comment-item v-for="comment in p.comments" :key="comment.id" :comment="comment"></comment-item>
              </transition-group>
            </v-flex>
          </v-layout>
        </v-container>
        <v-bottom-nav fixed app :value="true" active.sync="value" shift color="white">
          <v-layout row wrap align-center>
            <v-flex xs2>
              <v-img
                aspect-ratio="1"
                style="border-radius: 50%;"
                :src="`/storage/${user.avatar}`"
                :lazy-src="`/img/lazyimage.jpg`"
                class="grey lighten-2 ml-4"
                width="10vw"
              >
                <template v-slot:placeholder>
                  <v-layout fill-height align-center justify-center ma-0>
                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                  </v-layout>
                </template>
              </v-img>
            </v-flex>
            <v-flex xs7>
              <v-form lazy-validation ref="comment">
                <v-text-field
                  v-model="comment.value"
                  :rules="rules.common"
                  name="name"
                  label="Tambahkan Komentar..."
                  id="id"
                ></v-text-field>
              </v-form>
            </v-flex>
            <v-flex xs3>
              <v-btn
                flat
                small
                color="primary"
                @click="postcomment"
                :loading="loading"
                :disabled="loading"
              >Kirim</v-btn>
            </v-flex>
          </v-layout>
        </v-bottom-nav>
      </v-card>
    </v-dialog>
    <!-- end dialog komentar -->

    <!-- dialog opsi post -->
    <v-dialog v-model="dialog.option.display" width="500">
      <v-card>
        <v-list>
          <v-list-tile @click="destroy">
            <v-list-tile-title>Hapus</v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-card>
    </v-dialog>
    <!-- end dialog opsi post -->
  </div>
</template>

<script>
import CommentItem from "./CommentItem";
require("vue2-animate/dist/vue2-animate.min.css");
import moment from "moment";
moment.locale("id");
export default {
  props: {
    p: {},
    user: {}
  },
  components: {
    "comment-item": CommentItem
  },
  data() {
    return {
      rules: {
        common: [v => !!v || "Harus Diisi"]
      },
      comment: {
        value: ""
      },
      loading: false,
      dialog: {
        comment: {
          display: false
        },
        option: {
          display: false
        }
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    moment,
    like: function() {
      let access = {
        post_id: this.p.id
      };
      axios
        .post("/api/v1/postlike", access)
        .then(res => {
          this.p.liked_count = res.data.liked_count;
          this.p.likes_count = res.data.likes_count;
        })
        .catch(err => {});
    },
    dislike: function() {
      let access = {
        _method: "delete"
      };
      axios
        .post(`/api/v1/postlike/${this.p.id}`, access)
        .then(res => {
          this.p.liked_count = res.data.liked_count;
          this.p.likes_count = res.data.likes_count;
        })
        .catch(err => {});
    },
    opencomment: function() {
      this.dialog.comment.display = true;
      axios
        .get(`/api/v1/post/${this.p.id}`)
        .then(res => {
          this.p.comments = res.data.comments;
        })
        .catch(err => {});
    },
    postcomment: function() {
      if (this.$refs.comment.validate()) {
        this.loading = true;
        let access = {
          post_id: this.p.id,
          user_id: this.user.id,
          value: this.comment.value
        };
        axios
          .post("/api/v1/postcomment", access)
          .then(res => {
            document.getElementsByClassName(
              "v-dialog--active"
            )[0].scrollTop = 0;
            this.loading = false;
            this.dialog.comment.display = true;
            this.p.comments.splice(0, 0, res.data);
            this.p.comments_count += 1;
            this.comment.value = null;
          })
          .catch(err => {
            this.loading = false;
          });
      }
    },
    destroy: function() {
      let access = {
        _method: "delete"
      };
      axios
        .post(`/api/v1/post/${this.p.id}`, access)
        .then(res => {
          this.dialog.option.display = false;
          this.$parent.$parent.posts.splice(
            this.$parent.$parent.posts.indexOf(this.p),
            1
          );
        })
        .catch(err => {});
    }
  }
};
</script>
