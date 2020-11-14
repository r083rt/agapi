<template>
  <v-app>
    <v-flex xs12 md3 pa-3>
      <v-card width="100%" ripple>
        <v-img
          :src="`/storage/${user.avatar}`"
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
  </v-app>
</template>

<script>
import Swal from "sweetalert2";
import { User } from "./../../../objects";

export default {
  props: {
    user: []
  },
  data() {
    return {};
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
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
