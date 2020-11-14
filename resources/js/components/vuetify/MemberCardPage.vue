<template>
  <div>
    <v-container fluid id="printcontent" ref="printcontent">
    <center>
        <v-row style="width:300px">
        <v-img class="image" src="/img/membercard.jpeg">
            <v-container bg fill-height grid-list-md text-xs-center>
            <v-layout row wrap>
                <v-flex xs12 class="text-xs-center pt-5">
                <center class="pt-5">
                    <v-img
                    v-if="user.avatar != null"
                    :src="`${storageUrl}/${user.avatar}`"
                    @error="setDefaultAvatar()"
                    height="50%"
                    width="50%"
                    style="margin-top:30%;border: 10px solid transparent;"
                    ></v-img>
                    <h2 class="title">{{ user.name }}</h2>
                    <h3 class="title">{{ user.kta_id != null ? user.kta_id : 'Kosong' }}</h3>
                    <h5
                    class="value"
                    >{{ user.profile != null ? user.profile.school_place : 'Kosong' }}</h5>
                    <h5 class="value">{{ user.email }}</h5>
                    <center>
                    <div id="previewbarcode"></div>
                    </center>
                </center>
                </v-flex>
            </v-layout>
            </v-container>
        </v-img>
    </v-row>
    </center>
    <v-row align="center" justify="center">
        <v-btn text :loading="loading" :disabled="loading" @click="print">Download Disini</v-btn>
    </v-row>
    </v-container>
  </div>
</template>

<script>
import { mapState } from "vuex";
import html2canvas from "html2canvas";
// import printJS from 'print-js'
import "reimg";

export default {
  data() {
    return {
      preview: false,
      loading: false
    };
  },
  computed: {
    ...mapState(["user",'storageUrl'])
  },
  mounted() {
    this.initQR();
  },
  created() {},
  methods: {
    openpreview: function() {
      this.preview = true;
    },
    print: function() {
      this.loading = true;
      html2canvas(this.$refs.printcontent).then(canvas => {
        var png = ReImg.fromCanvas(canvas).downloadPng();
        this.loading = false;
      });
    },
    initQR: function() {
      var qrcode = new QRCode(document.getElementById("previewbarcode"), {
        text: "12",
        width: 128,
        height: 128,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
      });
    },
    saveAs: function(uri, filename) {
      var link = document.createElement("a");

      if (typeof link.download === "string") {
        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);
      } else {
        window.open(uri);
      }
    },
    setDefaultAvatar() {
      this.user.avatar = "users/default.png"
      this.$store.commit('setUser',{user:this.user})
    }
  }
};
</script>
