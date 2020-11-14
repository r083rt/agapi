<template>
  <v-app>
    <!-- Main Content -->
    <div id="main" class="site-main">
      <!-- Page changer wrapper -->
      <div class="pt-wrapper">
        <!-- Subpages -->
        <div class="subpages">
          <!-- Home Subpage -->
          <section class="pt-page" data-id="home">
            <div class="section-inner start-page-content">
              <div class="page-header">
                <div class="row">
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <!-- <div class="photo"> -->
                    <v-img
                      @click="$refs.avatar.click()"
                      v-if="user.avatar != null"
                      :src="`/storage/${user.avatar}`"
                      @error="changeImageToDefault"
                      lazy-src="/img/lazyimage.jpg"
                      aspect-ratio="1"
                      style="border-radius: 50%;"
                    >
                      <v-layout
                        pa-2
                        column
                        fill-height
                        class="lightbox white--text text-center center-block"
                      >
                        <v-spacer></v-spacer>
                        <v-flex shrink>
                          <!-- <v-btn :disabled="loading.display" icon flat @click="$refs.avatar.click()">
                                <v-icon>backup</v-icon>
                          </v-btn>-->

                          <input v-show="false" id="avatar" ref="avatar" type="file" @change="crop" />
                        </v-flex>
                      </v-layout>

                      <template v-slot:placeholder>
                        <v-layout fill-height align-center justify-center ma-0>
                          <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                        </v-layout>
                      </template>
                    </v-img>
                    <!-- </div> -->
                  </div>

                  <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="title-block">
                      <h2 class="white--text pt-3">{{ user.name }}</h2>
                      <div class="owl-carousel text-rotation" v-if="user.user_activated_at != null">
                        <div class="item">
                          <div class="sp-subtitle">Nomor Kartu Tanda Anggota</div>
                        </div>
                        <div class="item">
                          <div class="sp-subtitle">{{ user.kta_id }}</div>
                        </div>
                      </div>
                    </div>

                    <div class="social-links" v-if="user.user_activated_at != null">
                      <h3 class="white--text">{{ user.profile.school_place }}</h3>
                      <v-btn color="success">Member Resmi</v-btn>
                    </div>
                    <div class="social-links" v-else>
                      <midtrans-component></midtrans-component>
                    </div>
                  </div>
                </div>
              </div>

              <div class="page-content">
                <div class="row">
                  <div
                    class="col-sm-6 col-md-6 col-lg-6 center-block text-center"
                    v-show="user.user_activated_at != null"
                  >
                    <div class="about-me">
                      <center>
                        <div id="barcode"></div>
                      </center>
                    </div>
                    <div class="download-resume">
                      <print-card-component ref="printCard"></print-card-component>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <profile-edit-component></profile-edit-component>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End of Home Subpage -->

          <!-- Resume Subpage -->
          <section class="pt-page" data-id="event">
            <div class="section-inner custom-page-content">
              <div class="page-header color-1">
                <h2>Jadwal Acara</h2>
              </div>
              <div class="page-content">
                <event-list></event-list>
              </div>
            </div>
          </section>
          <!-- End of Resume Subpage -->

          <!-- Discuss Subpage -->
          <section class="pt-page" data-id="discuss">
            <discussion :user="user"></discussion>
          </section>
          <!-- End of Discuss Subpage -->

          <!-- Contribution Subpage -->
          <section class="pt-page" data-id="contribution">
            <div class="section-inner custom-page-content">
              <div class="page-header color-1">
                <h2>Papan Kontribusi</h2>
              </div>
              <div>
                <contribution :user="user"></contribution>
              </div>
            </div>
          </section>
          <!-- End of Constribution Subpage -->

          <!-- Information Subpage -->
          <section class="pt-page" data-id="information">
            <div class="section-inner custom-page-content">
              <div class="page-header color-1">
                <h2>Papan Informasi</h2>
              </div>
              <div class="page-content">
                <information :user="user"></information>
              </div>
            </div>
          </section>
          <!-- End of Information Subpage -->
        </div>
      </div>
      <!-- /Page changer wrapper -->
    </div>
    <!-- /Main Content -->

    <!-- loading -->
    <v-dialog v-model="loading.display" hide-overlay persistent width="300">
      <v-card color="primary" dark>
        <v-card-text>
          Please stand by
          <!-- progress -->
          <v-progress-linear
            v-model="loading.buffer"
            :buffer-value="loading.percentage"
            buffer
            :indeterminate="loading.indeterminate"
            color="white"
            class="mb-0"
          ></v-progress-linear>
          <!-- end progress -->
        </v-card-text>
      </v-card>
    </v-dialog>
    <!-- end loading -->

    <!-- Dialog Crop -->
    <v-dialog
      v-model="dialog.crop"
      persistent
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <v-card color="black">
        <div ref="crop" id="crop"></div>
        <v-btn color="error" @click="dialog.crop = false" style="position: fixed;bottom: 0px;left: 0px;">Cancel</v-btn>
        <v-btn color="success" class="pull-right" @click="upload" style="position: fixed;bottom: 0px;right: 0px;">Upload</v-btn>
      </v-card>
    </v-dialog>
    <!-- End Dialog Crop -->

    <!-- floating button -->
    <v-speed-dial
      v-model="action.display"
      bottom
      right
      fixed
      :direction="action.direction"
      :transition="action.transition"
    >
      <template v-slot:activator>
        <v-btn v-model="action.display" color="blue darken-2" dark fab>
          <v-icon>mdi-fingerprint</v-icon>
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
      <v-btn fab dark small color="green" href="#home">
        <v-icon>home</v-icon>
      </v-btn>
      <v-btn fab dark small color="green" href="#event">
        <v-icon>format_list_bulleted</v-icon>
      </v-btn>
      <v-btn fab dark small color="green" href="#information">
        <v-icon>help</v-icon>
      </v-btn>
      <v-btn
        v-if="user.user_activated_at != null"
        fab
        dark
        small
        color="green"
        href="#contribution"
      >
        <v-icon>event</v-icon>
      </v-btn>
      <v-btn v-if="user.user_activated_at != null" fab dark small color="green" href="#discuss">
        <v-icon>chat</v-icon>
      </v-btn>
    </v-speed-dial>
    <!-- end floating button -->
  </v-app>
</template>

<script>
import Vuetify from "vuetify";
// index.js or main.js
import "vuetify/dist/vuetify.css"; // Ensure you are using css-loader
Vue.use(Vuetify);
import { User, Profile } from "../../objects";
import MidtransComponent from "./../MidtransComponent.vue";
import PrintCardComponent from "./../PrintCardComponent.vue";
import ProfileEditComponent from "./ProfileEditComponent.vue";
import EventList from "./procard/EventList";
import Discussion from "./procard/Discussion";
import Contribution from "./procard/Contribution";
import Information from "./procard/Information";
import "cropperjs/dist/cropper.css";
import Cropper from "cropperjs";
import Compressor from "compressorjs";
import Swal from "sweetalert2";

export default {
  components: {
    "midtrans-component": MidtransComponent,
    "print-card-component": PrintCardComponent,
    "profile-edit-component": ProfileEditComponent,
    "event-list": EventList,
    discussion: Discussion,
    contribution: Contribution,
    information: Information
  },
  data() {
    return {
      user: new User(),
      avatar: "",
      loading: {
        display: false,
        buffer: 0,
        percentage: 0,
        indeterminate: false
      },
      action: {
        direction: "top",
        display: false,
        transition: "slide-y-reverse-transition"
      },
      dialog: {
        crop: false
      },
      cropper: ""
    };
  },
  mounted() {
    this.loading.display = true
    this.loading.indeterminate = true
    axios.get("/api/user").then(res => {
      this.user = res.data;

      if (res.data.profile == null) {
        this.user.profile = new Profile();
        if (res.data.kta_id == null && res.data.user_activated_at != null) {
          Swal.fire({
            type: "warning",
            title: "Mengingatkan",
            text: "Silahkan mengisi biodata supaya muncul nomor KTA",
            showConfirmButton: true,
            allowOutsideClick: false
          });
        }
      }

      var qrcode = new QRCode(document.getElementById("barcode"), {
        text: res.data.id.toString(),
        width: 256,
        height: 256,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
      });
      this.loading.display = false
      this.loading.indeterminate = false
    });
  },
  methods: {
    crop: function(e) {
      if (e.target.files[0] !== undefined) {
        const reader = new FileReader();
        reader.onload = e => {
          if (e.target.result) {
            let img = document.createElement("img");
            img.id = "image";
            img.src = e.target.result;
            // clean result before
            this.$refs.crop.innerHTML = "";
            // append new image
            this.$refs.crop.appendChild(img);
            // init cropper
            this.cropper = new Cropper(img, {
              aspectRatio: 1 / 1
            });
          }
        };
        reader.readAsDataURL(e.target.files[0]);
        this.dialog.crop = true;
      }
    },
    upload: function(event) {
      event.preventDefault();
      this.loading.percentage = 0;
      this.loading.display = true;
      let imgSrc = this.cropper.getCroppedCanvas().toBlob(blob => {
        new Compressor(blob, {
          quality: 0.6,
          success: result => {
            let access = new FormData();
            access.append("avatar", result);
            access.set("_method", "put");
            const config = {
              headers: {
                "content-type": "multipart/form-data"
              },
              onUploadProgress: function(progressEvent) {
                this.loading.buffer = this.loading.percentage = parseInt(
                  Math.round((progressEvent.loaded * 100) / progressEvent.total)
                );
              }.bind(this)
            };
            axios
              .post(`/api/v1/user/${this.user.id}`, access, config)
              .then(res => {
                this.user.avatar = res.data.avatar;
                this.loading.display = false;
                this.dialog.crop = false;
              });
          }
        });
      });
    },
    initUser: function() {
      axios.get("/api/user").then(res => {
        this.user = res.data;
      });
    },
    changeImageToDefault: function() {
      this.user.avatar = "users/default.png";
    }
  }
};
</script>
