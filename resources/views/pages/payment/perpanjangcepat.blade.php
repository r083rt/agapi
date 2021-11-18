<!DOCTYPE html>
<html>
<!--
    WARNING! Make sure that you match all Quasar related
    tags to the same version! (Below it's "@1.16.0")
  -->

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.16.0/dist/quasar.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Add the following at the end of your body tag -->
    <q-app id="q-app">
        <q-layout>
            <q-page-container class="q-pa-lg">
                <q-page>
                    <div class="row justify-center">
                        <div class="column">
                            <q-form lazy-validation ref="form">
                                <div class="text-h5">AGPAII Perpanjang Cepat</div>
                                <q-input :rules="[ val => val && val.length > 0 || 'Ketik sesuatu']" hint="Email Akun"
                                    lazy-rules color="grey-9" v-model="email" label="Masukan Email"></q-input>
                                <div class="row justify-end">
                                    <q-btn flat icon="search" @click="doSearch()">Cari</q-btn>
                                </div>
                            </q-form>
                        </div>
                    </div>
                    <div class="row justify-center" v-if="user">
                        <div class="column">

                            <q-avatar>
                                <img :src="`${storageUrl}/${user.avatar}`">
                            </q-avatar>
                            <div class="text-caption">nama: @{{ user . name }}</div>
                            <div class="text-caption">email: @{{ user . email }}</div>
                            <div class="text-caption">nomer kta: @{{ user . kta_id }}</div>
                            <div class="text-h6 text-warning">Lama Pemakaian: @{{ user . late_paid }} bulan</div>
                            <div class="text-caption text-grey">Masa aktif pemakaian 6 bulan</div>
                            <div class="text-h6 text-green" v-if="user.late_paid < 6">Akun masih dalam masa aktif</div>
                            <div class="row">
                                <q-btn class="q-ma-sm" :loading="loading" :disable="loading"
                                    @click="createTransaction()" color="green" v-if="user.late_paid >= 6">Perpanjang
                                    sekarang</q-btn>
                                <q-btn class="q-ma-sm" :loading="loading" :disable="loading" @click="check()"
                                    color="green" v-if="user.late_paid >= 6">Konfirmasi</q-btn>
                            </div>

                        </div>
                    </div>
                </q-page>
            </q-page-container>
        </q-layout>
    </q-app>

    <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quasar@1.16.0/dist/quasar.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
        integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        new Vue({
            el: '#q-app',
            data: function() {
                return {
                    email: "admin@admin.com",
                    user: null,
                    storageUrl: "http://cdn-agpaiidigital.online",
                    loading: false
                }
            },
            methods: {
                doSearch() {
                    this.$refs.form.validate().then(success => {
                        if (success) {
                            axios.get(`/api/v1/users/searchbyemail/${this.email}`).then(res => {
                                if (res.data.email) {
                                    this.user = res.data
                                    Swal.fire(
                                        'Ketemu!',
                                        'Data pengguna ditemukan',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Ops!',
                                        'Data pengguna tidak ditemukan',
                                        'error'
                                    )
                                }
                            }).catch(err => {
                                Swal.fire(
                                    'Ops!',
                                    'Data pengguna tidak ditemukan',
                                    'error'
                                )
                            })
                        }
                    })
                },
                createTransaction() {
                    this.loading = true
                    let access = {
                        user_id: this.user.id
                    }
                    axios.post(`/api/v1/quickpaymentUrl`, access).then((res) => {
                        window.location.href = `${res.data.payment_url}`
                    }).catch((err) => {
                        console.log(err)
                    }).finally(() => {
                        this.loading = false;
                    })
                },
                check() {
                    axios
                        .get(`/api/v1/quickgetstatus/${this.user.id}`)
                        .then(res => {
                            // this.user = {...res.data}
                            if (
                                moment(new Date()).diff(
                                    new Date(res.data.user_activated_at),
                                    "months",
                                    true
                                ) > 6
                            ) {
                                this.$q.notify("Silahkan Tunggu 1x24 jam");
                            } else {
                                this.$q.notify("Pembayaran diterima");
                            }
                        })
                        .catch(err => {
                            console.log(err)
                        });
                },
            },
            // ...etc
        })
    </script>
</body>

</html>
