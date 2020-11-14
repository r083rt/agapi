<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iofrm/css/iofrm-theme21.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vuetify@2.0.0/dist/vuetify.min.css" integrity="sha256-UoGcUrubZMHipEmPlWxVOve9MN+PWzDFNp55+Rz63nA=" crossorigin="anonymous">
</head>
<body>
    <div class="form-body without-side" id="app">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    {{-- <img class="logo-size" src="{{ asset('iofrm/images/logo-light.svg') }}" alt=""> --}}
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('iofrm/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Masuk ke Akun KTA</h3>
                        <p>Dapatkan akses kedalam sistem kartu tanda anggota dengan baragam fitur</p>
                        <form method="post" action="{{ route('login') }}" id="loginform" ref="loginform" @submit="onSubmit">
                            @csrf
                            <input class="form-control" id="email" type="text" name="email" placeholder="E-mail Address" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <div class="form-button">
                                <v-btn id="submit" :loading="loading" :disabled="loading" type="submit" color="success">Masuk</v-btn>
                                <a href="{{ route('password.request') }}">Lupa Password?</a>
                            </div>
                        </form>
                        <div class="page-links">
                            <a href="{{ route('register') }}">Buat Akun Baru</a>
                            <v-btn @click="dialog.display = true">Syarat dan Ketentuan</v-btn>
                        </div>
                    </div>

                    <v-dialog
                    v-model="dialog.display"
                    width="500"
                    >

                    <v-card>
                        <v-card-title
                        class="headline grey lighten-2"
                        primary-title
                        >
                        Privacy Policy
                        </v-card-title>

                        <v-card-text>
                                <v-container fill-height>
                                        <v-layout row wrap>
                                            <v-flex xs12>
                                                <div class="display-1">TERMS & CONDITIONS/ SYARAT & KETENTUAN</div>
                                                <div class="title" style="padding:20px">OVERVIEW</div>
                                                <div class="subheading" style="padding-bottom:20px">agpaiidigital.org adalah sistem keanggotaan Asosiasi Guru Pendidikan Agama Islam Indonesia (AGPAII) yang dimiliki dan dioperasikan oleh CV Ardata Media. Segala aktivitas dan aturan yang bersangkutan langsung dengan website ini akan sepenuhnya diatur oleh syarat dan ketentuan dibawah ini.</div>
                                                <div class="subheading" style="padding-bottom:20px">Dalam waktu yang tidak ditentukan syarat dan ketentuan akan berubah. Penggunaan anda atas website ini harus mengikuti setiap perubahan yang merupakan bagian dari perjanjian dan terikat oleh persyaratan sesuai dengan perubahan yang ada tanpa terkecuali.</div>
                                                <div class="title" style="padding-bottom:20px">SIGNUP</div>
                                                <div class="subheading" style="padding-bottom:20px">
                                                    <ul>
                                                        <li>Member AgpaiiDigital mendaftarkan akun dengan cara mengisi data diri di form sign up</li>
                                                        <li>Setelah submit, konfirmasi email aktivasi supaya bisa login</li>
                                                        <li>Setelah itu melakukan pembayaran member supaya astatus akun menjadi aktif</li>
                                                    </ul>
                                                </div>
                                                <div class="title" style="padding-bottom:20px">KEBIJAKAN PEMBAYARAN</div>
                                                <div class="subheading" style="padding-bottom:20px">Untuk memberikan kemudahan dan kepastian bagi pelanggan dalam melakukan pembayaran member, saat ini kami mengimplementasikan sistem pembayaran online melalui Midtrans. Midtrans adalah sebuah dompet elektronik yang dilengkapi dengan fitur link kartu kredit dan uang elektronik atau cash wallet. Semua transaksi akan diproses dalam mata uang Rupiah Indonesia. Midtrans memastikan proses pembayaran order Anda aman dengan protokol Secure Sockets Layer (SSL). SSL menyediakan keamanan penuh bagi setiap pelanggan dan kebebasan untuk berbelanja online tanpa rasa khawatir mengenai kemungkinan pencurian informasi kartu kredit.</div>
                                                <div class="title" style="padding-bottom:20px">BUKTI TRANSAKSI (INVOICE):</div>
                                                <div class="subheading" style="padding-bottom:20px">Invoice merupakan bukti transaksi yang sah sebagai bukti pemesanan dan pembelian dan sebagai acuan referensi pembelian Anda.</div>
                                                <div class="subheading" style="padding-bottom:20px">Anda dihimbau untuk menyimpan invoice dari setiap pembelian anda yang mungkin akan berguna untuk pelayanan setelah pembelian dan sebagai bukti untuk klaim garansi beberapa barang yang memiliki garansi.</div>
                                                <div class="title" style="padding-bottom:20px">KEBIJAKAN PENGEMBALIAN DANA (REFUND) DAN PEMBATALAN (CANCELLATION)</div>
                                                <div class="subheading" style="padding-bottom:20px"><i><b>Refund</b></i> berlaku apabila ada kesalahan pada system/error/bug yang mengakibatkan tidak aktifnya akun.</div>
                                                <div class="subheading" style="padding-bottom:20px"><i><b>Pembatalan Pesanan (cancelation)</b></i> dibatalkan secara sepihak apabila:</div>
                                                <div class="subheading" style="padding-bottom:20px">
                                                    <ul>
                                                        <li>Akun Anda belum aktif dalam waktu 1×24 jam setelah pembayaran atau atas permintaan pelanggan. </li>
                                                        <li>Kami belum menerima pembayaran anda.</li>
                                                        <li>Tanggal berlaku pada invoice untuk order tersebut sudah kadaluarsa</li>
                                                    </ul>
                                                </div>
                                                <div class="subheading" style="padding-bottom:20px">Selain kebijakan-kebijakan di atas, dapat ditempuh negosiasi melalui jalur chat, form kontak kami, atau whatsapp dan kami akan mempelajari kasus tersebut dan memberikan jawaban dengan segera.</div>
                                                <div class="title" style="padding-bottom:20px">KEBIJAKAN PRIVASI</div>
                                                <div class="subheading" style="padding-bottom:20px">Kami di agpaiidigital.org menjaga privasi Anda dengan sangat serius. Kami percaya bahwa informasi ini hanya dan harus digunakan untuk membantu kami menyediakan layanan yang lebih baik. Itulah sebabnya kami telah menempatkan kebijakan untuk melindungi informasi pribadi Anda.</div>
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="primary"
                            @click="dialog.display = false"
                        >
                            Saya mengerti
                        </v-btn>
                        </v-card-actions>
                    </v-card>
                    </v-dialog>

                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('iofrm/js/jquery.min.js') }}"></script>
<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.0.0/dist/vuetify.min.js" integrity="sha256-nIwVbBiTzmEyy9kAKidpnq/M+Ql45olP70xlz0l2kWo=" crossorigin="anonymous"></script>
<script src="{{ asset('iofrm/js/popper.min.js') }}"></script>
<script src="{{ asset('iofrm/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('iofrm/js/main.js') }}"></script> --}}
<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!',
            loading: false,
            dialog:{
                display: false
            }
        },
        mounted(){

        },
        methods:{
            onSubmit: function(){
                this.loading = true
            }
        }
    })
</script>
</body>

</html>
