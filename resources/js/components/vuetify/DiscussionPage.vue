<template>
  <div id="discuss">
    <v-row>
      <v-col>
        <v-form ref="discussForm" lazy-validation>
          <v-row>
            <v-col cols="12">
              <v-textarea
              v-intro="'Isian ini untuk membuat postingan agar dapat di diskusikan ke semua anggota AGPAII'"
              placeholder="Diskusi hari ini" :rules="rules.common" v-model="post.body"></v-textarea>
            </v-col>
          </v-row>
          <v-row justify="end">
            <v-btn
              v-intro="'Tombol ini untuk mengirim isi teks dari isian diatas'"
              @click="store"
              :loading="loading"
              :disabled="loading"
              text
              justify="align-end"
            >Kirim</v-btn>
          </v-row>
        </v-form>
      </v-col>
    </v-row>
    <v-row id="posts" ref="posts">
      <transition-group name="fade">
        <post class="mb-5" v-for="post in posts.data" :key="post.id" :post="post" />
      </transition-group>
    </v-row>
  </div>
</template>

<script>
import { mapState } from "vuex";
import post from "./PostItem";
var VueScrollTo = require("vue-scrollto");
require("vue2-animate/dist/vue2-animate.min.css");
Vue.use(VueScrollTo);
export default {
  components: {
    post
  },
  data() {
    return {
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
    }
  },
  computed: {
    ...mapState(["user","posts",'storageUrl'])
  },
  mounted() {
    console.log("vue router");
    window.scrollTo(0,0)
    this.$store.dispatch('getPosts').then(res=>{
        this.$store.commit('setPosts',{posts:res.data})
    }).catch(err=>{

    })
  },
  methods: {
    store: function() {
      if (this.$refs.discussForm.validate()) {
        this.loading = true;
        this.$store.dispatch('storePost',this.post).then(res=>{
            this.$refs.discussForm.reset()
            this.post.body = ""
            this.loading = false
            VueScrollTo.scrollTo(this.$refs.posts, 1000, this.options)
        }).catch(err=>{
            this.loading = false;
        })
      }
    }
  }
}
</script>

<style>
</style>
