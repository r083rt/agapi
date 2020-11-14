<template>
  <div id="commentpage">
    <div class="title">Komentar</div>
    <v-row id="goto">
      <v-col cols="12">
        <v-card width="100%">
          <v-container>
            <v-row align="center">
              <v-col cols="2">
                <v-img width="40" style="border-radius:50%" :src="`${storageUrl}/${post.author_id.avatar}`"></v-img>
              </v-col>
              <v-col cols="10">
                <div class="body-2">{{ post.author_id.name }}</div>
                <div class="caption grey--text">{{post.body}}</div>
                <div class="caption grey--text">{{post.created_at | moment("from","now")}}</div>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      </v-col>
    </v-row>

    <hr />

    <v-row ref="comments">
      <v-col cols="12">
        <transition-group name="fade">
          <comment
            class="mb-5"
            v-for="comment in post.comments"
            :comment="comment"
            :key="comment.id"
            :ref="`comment${comment.id}`"
            :id="`comment${comment.id}`"
          />
        </transition-group>
      </v-col>
    </v-row>

    <v-bottom-navigation fixed app grow color="white">
      <v-row no-gutters align="center">
        <v-col cols="2">
        <v-img
            aspect-ratio="1"
            style="border-radius: 50%"
            :src="`${storageUrl}/${user.avatar}`"
            :lazy-src="`/img/lazyimage.jpg`"
            class="grey lighten-2 ml-4"
            width="40"
        >
            <template v-slot:placeholder>
            <v-row fill-height align-center justify-center ma-0>
                <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
            </v-row>
            </template>
        </v-img>
        </v-col>
        <v-col cols="8">
        <v-form lazy-validation ref="comment">
            <v-text-field
            v-model="form.comment.value"
            :rules="rules.common"
            name="name"
            label="Tambahkan Komentar..."
            id="id"
            ></v-text-field>
        </v-form>
        </v-col>
        <v-col cols="2">
            <v-btn color="grey" icon @click="storeComment()" :loading="loading" :disabled="loading">
                <v-icon>mdi-send</v-icon>
            </v-btn>
        </v-col>
    </v-row>
    </v-bottom-navigation>
  </div>
</template>

<script>
import { mapState } from "vuex"
import comment from "./CommentItem"
var VueScrollTo = require("vue-scrollto")
require("vue2-animate/dist/vue2-animate.min.css")
Vue.use(VueScrollTo)
export default {
  components: {
    comment
  },
  props: {
    post: null
  },
  data() {
    return {
      rules: {
        common: [v => !!v || "Harus Diisi"]
      },
      form: {
        comment: {
          value: ""
        }
      },
      loading: false,
      scrollTo: {
        posts: {
          container: "#commentpage",
          easing: "ease-in",
          offset: -60,
          force: true,
          cancelable: true,
          onStart: function(element) {
            // scrolling started
          },
          onDone: function(element) {
            // scrolling is done
          },
          onCancel: function() {
            // scrolling has been interrupted
          },
          x: true,
          y: true
        }
      }
    }
  },
  computed: {
    ...mapState(["user",'storageUrl'])
  },
  mounted() {
    this.post == null ? this.$router.back() : null
  },
  methods: {
    storeComment() {
        if (this.$refs.comment.validate()) {
            this.loading = true
            const payload = {
                post:this.post,
                user:this.user,
                comment:this.form.comment
            }
            this.$store.dispatch('storeComment',payload).then(res=>{
                this.loading = false
                this.post.comments.splice(0,0,res.data)
                this.post.comments_like+=1
                this.$refs.comment.reset()
                this.form.comment.value = null
                VueScrollTo.scrollTo(document.getElementById('goto'), 1000, this.options)
            }).catch(err=>{
                this.loading = false
            })
        }
    }
  }
}
</script>

<style>
</style>
