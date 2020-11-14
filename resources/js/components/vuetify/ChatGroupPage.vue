<template>
  <div>
    <v-row align="end" class="pb-3" id="scroll" ref="chatgroup">
      <v-col cols="12">
        <transition-group name="bounce" v-chat-scroll>
          <chat-item v-for="(chat,c) in chats" :key="chat.id" :chat="chat"></chat-item>
        </transition-group>
      </v-col>
    </v-row>
    <v-bottom-navigation
      fixed
      app
      grow
      color="white"
      v-intro="'Hai, sekarang anda bisa saling chat sesama guru, cara kerjanya sama seperti Whatsapp dan khusus anggota AGPAII'"
    >
      <v-row no-gutters align="center" justify="center">
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
            <v-text-field name="name" label="Katakan sesuatu..." v-model="chat.value" id="id"></v-text-field>
          </v-form>
        </v-col>
        <v-col cols="2">
          <v-btn color="grey" icon @click="sendMessage()">
            <v-icon>mdi-send</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-bottom-navigation>
  </div>
</template>

<script>
import { mapState } from "vuex";
require("vue2-animate/dist/vue2-animate.min.css");
import ChatItem from "./ChatItem";
export default {
  data() {
    return {
      chat: {
        value: ""
      }
    };
  },
  computed: {
    ...mapState(["user", "chats",'storageUrl'])
  },
  components: {
    "chat-item": ChatItem
  },
  mounted() {
    // this.sendMessage()
  },
  created() {},
  watch: {
    chats(val) {}
  },
  methods: {
    sendMessage() {
        // console.log(firebase.database.ServerValue.TIMESTAMP)
      this.loading = true;
      database.ref("chats").push({
        user_id: this.user.id,
        name: this.user.name,
        avatar: this.user.avatar,
        value: this.chat.value.length > 0 ? this.chat.value : "Assalamualaikum",
        created_at:  firebase.database.ServerValue.TIMESTAMP,
        updated_at: null
      });
      this.chat.value = "";
      this.loading = false;
    }
  }
};
</script>

<style>
</style>
