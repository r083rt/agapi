<template>
  <div id="discuss" refs="discuss">
    <div class="section-inner custom-page-content">
      <div class="page-header color-1">
        <h2>Ruang Diskusi</h2>
      </div>
      <div class="page-content">
        <v-form ref="discussForm" lazy-validation>
          <v-layout row wrap>
            <v-flex xs12>
              <v-textarea
                outline
                label="Diskusi hari ini"
                :rules="rules.common"
                v-model="post.body"
              ></v-textarea>
            </v-flex>
            <v-flex xs12 text-xs-right>
              <v-btn
                class="text-xs-right"
                @click="store"
                flat
                icon
                :loading="loading"
                :disabled="loading"
              >Kirim</v-btn>
            </v-flex>
          </v-layout>
        </v-form>
      </div>
    </div>

    <div class="pt-5" id="posts" ref="posts">
      <!-- <virtual-list :size="40" :remain="8"> -->
      <transition-group name="fadeLeft">
        <item v-for="post in posts" :key="post.id" :p="post" :user="user"></item>
      </transition-group>
      <!-- </virtual-list> -->
    </div>
  </div>
</template>

<script>
var VueScrollTo = require("vue-scrollto");
require("vue2-animate/dist/vue2-animate.min.css");
import item from "./Discussion/Item";
import virtualList from "vue-virtual-scroll-list";
Vue.use(VueScrollTo);
export default {
  props: {
    user: {}
  },
  components: { item, "virtual-list": virtualList },
  data() {
    return {
      posts: [],
      post: {},
      rules: {
        common: [v => !!v || "Harus Diisi"]
      },
      loading: false,
      scrollTo: {
        posts: {
          container: "#discuss",
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
          x: false,
          y: true
        }
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getPosts();
  },
  methods: {
    getPosts: function() {
      axios
        .get("/api/v1/post")
        .then(res => {
          this.posts = [...res.data]
        })
        .catch(err => {});
    },
    store: function() {
      if (this.$refs.discussForm.validate()) {
        this.loading = true;
        let access = {
          ...this.post,
          status: "PUBLISHED",
          title: "KTA POST",
          featured: 0
        };
        axios
          .post("/api/v1/post", access)
          .then(res => {
            this.post.body = "";
            this.posts.splice(0, 0, res.data);
            this.loading = false;
            VueScrollTo.scrollTo(this.$refs.posts, 1000, this.options);
          })
          .catch(err => {
            this.loading = false;
          });
      }
    }
  }
};
</script>
