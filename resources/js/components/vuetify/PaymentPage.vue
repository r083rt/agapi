<template>
  <div>
      <center><v-img src="/img/lock.jpg" width="400px"></v-img></center>
      <div v-intro="'Tekan disini untuk aktivasi akun dengan cara melakukan pembayaran melalui via Transfer Bank Gopay atau ATM'">
          <v-btn
            block
            v-show="user.user_activated_at == null"
            color="success"
            :loading="loading"
            :disabled="loading"
            @click="createTransaction"
        >
            <v-icon>mdi-shopping-cart</v-icon>Lakukan Pembayaran
        </v-btn>
      </div>
  </div>
</template>
<script>
    import {
        mapState
    } from "vuex"
    import Swal from "sweetalert2"
    const moment = require("moment")

    export default {
        data() {
            return {
                loading: false,
                sound: {
                    success: "Success",
                    info: "Info",
                    error: "Error"
                },
                introConfig:{
                    index:0,
                    steps:[
                        {
                            title: "Welcome!",
                            description: 'Press the button below or use your left/right keys to navigate',
                            selector: null,
                            btnRightLabel: "Get started"			// Custom label for this step
                            // , btnLeftIcon: "fa fa-close"			// If btnLeftLabel or btnLeftIcon is set for the first step it will stop the intro on click. Otherwise the left button is hidden.

                        }
                    ]
                }
            };
        },
        computed: {
            ...mapState(["user"])
        },
        mounted() {
            createjs.Sound.registerSound("/audio/success.mp3", this.sound.success)
        },
        created() {

        },
        watch: {
            user: {
                handler: function(val) {
                    const monthDifference = moment(new Date()).diff(
                        new Date(val.user_activated_at),
                        "months",
                        true
                    )
                    if (
                        val &&
                        val.user_activated_at != null &&
                        monthDifference < 6
                    ) {
                        this.$router.push('dashboard')
                    }
                },
                deep: true
            }
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
                                text: "Kami tunggu pembayaran anda dalam 3x24 jam, Silahkan cek email anda untuk melihat pesan kami. Nomor Rekening yang disediakan akan hangus jika melewati batas 3 hari. Jika lewat 3 hari silahkan mengulangi pembayaran dan gunakan Nomor baru yang disediakan.",
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
                                text: "Terjadi kesalahan, silahkan hubungi kami CV Ardata Media untuk penanganan.",
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
