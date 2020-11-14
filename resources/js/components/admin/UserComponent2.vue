<template>
  <v-app>
    <v-container grid-list-xs>
      <v-layout row wrap>
        <v-flex xs12 md3 v-for="(user,u) in users" :key="user.id" pa-3>
          <v-card width="100%" ripple>
            <v-img
              :src="`/storage/${user.avatar}`"
              lazy-src="/img/lazyimage.jpg"
              aspect-ratio="1"
              class="grey lighten-2"
              @error="avatarError(user)"
              @click="showAvatar(user)"
            >
              <template v-slot:placeholder>
                <v-layout fill-height align-center justify-center ma-0>
                  <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                </v-layout>
              </template>
            </v-img>
            <v-card-title primary-title>{{ user.name }}</v-card-title>
            <v-card-text>
              <v-layout row wrap>
                <v-flex xs6>
                  <h5>Status: {{ user.user_activated_at == null ? 'Belum Aktif' : 'Aktif' }}</h5>
                  <h5>Email: {{ user.email }}</h5>
                  <h5>No KTA: {{ user.kta_id }}</h5>
                </v-flex>
              </v-layout>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
    <!-- show avatar dialog -->
    <v-dialog v-model="dialog.avatar.display" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>{{ dialog.avatar.title }}</v-card-title>

        <v-card-text>
          <v-img
            :src="`/storage/${dialog.avatar.src}`"
            lazy-src="/img/lazyimage.jpg"
            aspect-ratio="1"
            class="grey lighten-2"
          >
            <template v-slot:placeholder>
              <v-layout fill-height align-center justify-center ma-0>
                <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
              </v-layout>
            </template>
          </v-img>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialog.avatar.display = false">Tutup</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app>
</template>

<script>
import Swal from "sweetalert2";
import { User } from "./../../objects";

export default {
  data() {
    return {
      url: "/api/v1/user",
      users: [],
      paginate: null,
      user: new User(),
      form: {
        edit: {
          display: false
        }
      },
      dialog: {
        avatar: {
          title: "avatar",
          display: false,
          src: "/users/default.png"
        }
      },
      bottom: false
    };
  },
  mounted() {
    console.log("Component mounted.");
    window.addEventListener("scroll", () => {
      this.bottom = this.bottomVisible();
    });
    this.getUser();
  },
  watch: {
    bottom(bottom) {
      if (bottom) {
        if (this.paginate == null) {
          this.url = "/api/v1/user";
          this.getUser();
        } else if (
          this.paginate.next_page_url != null &&
          this.paginate.next_page_url != this.url
        ) {
          this.url = this.paginate.next_page_url;
          this.getUser();
        }
      }
    }
  },
  methods: {
    getUser: function() {
      axios
        .get(this.url)
        .then(res => {
          res.data.data.forEach((val, key) => {
            if (this.users.indexOf(val) === -1) {
              this.users.push(val);
            }
          });
          this.paginate = res.data;
        })
        .catch(err => {
          this.getUser();
        });
    },
    bottomVisible() {
      const scrollY = window.scrollY;
      const visible = document.documentElement.clientHeight;
      const pageHeight = document.documentElement.scrollHeight;
      const bottomOfPage = visible + scrollY >= pageHeight;
      return bottomOfPage || pageHeight < visible;
    },
    edit: function() {
      this.form.edit.display = true;
    },
    update: function() {},
    destroy: function(user) {
      Swal.fire({
        title: `Yakin mau hapus ${user.name}?`,
        type: "error",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        showLoaderOnConfirm: true,
        preConfirm: () => {
          let access = {
            _method: "delete"
          };
          return axios
            .post(`/api/v1/user/${user.id}`)
            .then(res => {})
            .catch(err => {
              Swal.fire({
                type: "error",
                title: "Aduh",
                text: `Terjadi kesalahan ${err}`
              });
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then(res => {
        if (res.value) {
          Swal.fire({
            type: "success",
            title: "Selesai",
            text: "Akun telah terhapus"
          });
        }
      });
    },
    avatarError: function(e) {
      axios.get(`/api/v1/users/setDefaultAvatar/${e.id}`).then(res => {
        e.avatar = res.data.avatar;
      });
    },
    showAvatar: function(e) {
      this.dialog.avatar.src = e.avatar;
      this.dialog.avatar.title = `Foto ${e.name}`;
      this.dialog.avatar.display = true;
    }
  }
};
</script>
