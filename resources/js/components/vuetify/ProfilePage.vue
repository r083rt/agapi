<template>
  <div>
    <v-row>
      <v-spacer></v-spacer>
      <v-col>
        <center>
            <v-badge bottom>
            <template v-slot:badge>
                <v-icon dark>mdi-pencil</v-icon>
            </template>
            <v-img
            v-intro="'Tekan disini untuk mengganti foto'"
            style="border-radius:50%" @click="$refs.avatar.click()" width="150" height="150"
            :src="`${storageUrl}/${user.avatar}`"
            @error="setDefaultAvatar()"
            ></v-img>
            <input v-show="false" id="avatar" ref="avatar" type="file" @change="crop" />
            </v-badge>
        </center>
      </v-col>
      <v-spacer></v-spacer>
    </v-row>
    <v-row>
      <v-spacer></v-spacer>
      <v-col cols="12" v-if="user.profile">
        <div class="caption grey--text">Nomor Kartu Anggota</div>
        <div class="body-1">{{user.kta_id || 'Kosong'}}</div>
        <div class="caption grey--text">NIK</div>
        <div class="body-1">{{user.profile.nik || 'Kosong'}}</div>
        <div class="caption grey--text">Tanggal lahir</div>
        <div class="body-1">{{user.profile.birthdate | moment('LLLL')}}</div>
        <div class="caption grey--text">Alamat</div>
        <div class="body-1">{{user.profile.home_address || 'Kosong'}}</div>
        <div class="caption grey--text">Asal Sekolah</div>
        <div class="body-1">{{user.profile.school_place || 'Kosong'}}</div>
        <div class="caption grey--text">Email</div>
        <div class="body-1">{{user.email}}</div>
        <div class="caption grey--text">No HP</div>
        <div class="body-1">{{user.profile.contact || 'Kosong'}}</div>
      </v-col>
      <v-col cols="12" v-else>
        <center><div class="title grey--text">Anda belum mengisi biodata</div></center>
      </v-col>
      <v-col cols="12">
        <center>
        <v-btn text @click="push('editprofile')" v-intro="'Tombol ini untuk mengisi biodata anda, setelah semua isian terisi maka nomor KTA akan muncul'">Edit Profile</v-btn>
        </center>
      </v-col>
      <v-spacer></v-spacer>
    </v-row>

    <!-- Dialog Crop -->
    <v-dialog
      v-model="dialog.crop"
      persistent
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <v-card color="black">
        <div ref="crop" id="crop" style="height:90vh"></div>
        <v-btn
          color="error"
          @click="dialog.crop = false"
          style="position: fixed;bottom: 0px;left: 0px;"
        >Cancel</v-btn>
        <v-btn
          color="success"
          class="pull-right"
          @click="upload"
          style="position: fixed;bottom: 0px;right: 0px;"
        >Upload</v-btn>
      </v-card>
    </v-dialog>
    <!-- End Dialog Crop -->

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
  </div>
</template>

<script>
import { mapState } from "vuex";
import "cropperjs/dist/cropper.css";
import Cropper from "cropperjs";
import Compressor from "compressorjs";
import Swal from "sweetalert2";
export default {
  data() {
    return {
      dialog: {
        crop: false
      },
      loading: {
        display: false,
        buffer: 0,
        percentage: 0,
        indeterminate: false
      },
      cropper: ""
    };
  },
  computed: {
    ...mapState(["user",'storageUrl'])
  },
  methods: {
    push(page) {
      this.$router.push(page);
    },
    crop: function(e) {
      const file = e.target.files[0];
      const fileType = file['type'];
      const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

      if (e.target.files[0] !== undefined && validImageTypes.includes(fileType)) {
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
                this.$store.commit('setUser',{user:res.data})
                this.loading.display = false;
                this.dialog.crop = false;
              });
          }
        });
      });
    },
    setDefaultAvatar() {
      this.user.avatar = "users/default.png"
      this.$store.commit('setUser',{user:this.user})
    }
  }
};
</script>

<style>
</style>
