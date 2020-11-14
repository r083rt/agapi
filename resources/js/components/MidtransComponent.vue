<template>
  <v-btn
    v-if="user.user_activated_at == null"
    color="success"
    :loading="loading"
    :disabled="loading"
    @click="createTransaction"
  >
    <v-icon>shopping_cart</v-icon>Lakukan Pembayaran
  </v-btn>
</template>
<script>
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.css";
Vue.use(Vuetify);
import { User } from "../objects";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      loading: false,
      user: new User(),
      sound: {
        success: "Success",
        info: "Info",
        error: "Error"
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
    createjs.Sound.registerSound("/audio/success.mp3", this.sound.success);

    axios.get("/api/user").then(res => {
      this.user = res.data;
    });
  },
  methods: {
    createTransaction: function() {
      this.loading = true;
      axios.post("/api/v1/payment").then(res => {
        snap.pay(res.data.snap_token, {
          // Optional
          onSuccess: result => {
            this.loading = false;
            createjs.Sound.play(this.sound.success);
            Swal.fire({
              type: "success",
              title: "Selamat",
              text: "Anda sekarang terdaftar dalam anggota Asosiasi",
              showConfirmButton: false,
              allowOutsideClick: false
            });
            setTimeout(() => {
              location.reload();
            }, 5000);
          },
          // Optional
          onPending: result => {
            this.loading = false;
            Swal.fire({
              type: "warning",
              title: "Okay",
              text:
                "Kami tunggu pembayaran anda dalam 3x24 jam, Silahkan cek email anda untuk melihat pesan kami. Nomor Rekening yang disediakan akan hangus jika melewati batas 3 hari. Jika lewat 3 hari silahkan mengulangi pembayaran dan gunakan Nomor baru yang disediakan.",
              showConfirmButton: false,
              allowOutsideClick: false
            });
            setTimeout(() => {
              location.reload();
            }, 5000);
          },
          // Optional
          onError: result => {
            this.loading = false;
            Swal.fire({
              type: "error",
              title: "Aduh",
              text:
                "Terjadi kesalahan, silahkan hubungi kami CV Ardata Media untuk penanganan.",
              showConfirmButton: false,
              allowOutsideClick: false
            });
            setTimeout(() => {
              location.reload();
            }, 5000);
          },
          onClose: result => {
            this.loading = false;
          }
        });
      });
    }
  }
};
</script>
