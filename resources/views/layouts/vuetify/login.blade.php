<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.0.2/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <style>
        #app{
            background-image: url('https://picsum.photos/1920/1080?random');
        }
        #content {
            background-image: linear-gradient(to top right, rgba(100,115,201,.7), rgba(25,32,72,.7))
        }

        [v-cloak] > * { display:none }
        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        [v-cloak]:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #333;
            animation: spinner 0.6s linear infinite;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
</head>
<body>
  <div id="app" v-cloak>
    <v-app>
      <v-content id="content">
        <v-container bg fill-height grid-list-md text-xs-center>
            <v-layout row wrap align-center>
                <v-card max-width="500" class="mx-auto">
                    <v-card-title class="text-center">
                        <div class="title" style="width:100%">Masuk ke Akun AGPAII DIGITAL</div>
                        <div class="body-1">Dapatkan akses kedalam sistem kartu tanda anggota dengan beragam fitur</div>
                    </v-card-title>
                    <v-card-text>
                        <v-form method="post" action="{{ route('login') }}" id="loginform" ref="loginform" @submit="onSubmit">
                            @csrf
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-text-field label="Email" name="email" required></v-text-field>
                                </v-flex>
                                @if ($errors->has('email'))
                                    <div class="caption red--text">{{ $errors->first('email') }}</div>
                                @endif
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-text-field type="password" label="Password" name="password" required></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    @if ($errors->has('password'))
                                        <div class="caption red--text">{{ $errors->first('password') }}</div>
                                    @endif
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </v-layout>
                            <v-layout row wrap>
                                <v-btn color="info" text href="{{ route('register') }}">Buat akun baru</v-btn>
                                <v-spacer></v-spacer>
                                <v-btn type="submit" color="success" text :loading="loading" :disabled="loading">Masuk</v-btn>
                            </v-layout>
                            <v-layout row wrap>
                                <v-btn class="caption" text href="{{ route('password.request') }}">Lupa password?</v-btn>
                                <v-btn class="caption" text @click="dialog.display = true">Syarat dan Ketentuan</v-btn>
                                <v-btn class="caption" text href="https://wasap.at/qGxvLs">Bantuan Pendaftaran Manual</v-btn>
                            </v-layout>
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-layout>
            </v-layout>
        </v-container>
      </v-content>

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
                                        <v-layout row wrap text-center>
                                            <v-flex xs12>
                                                <div class="title">TERMS & CONDITIONS/ SYARAT & KETENTUAN</div>
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
                            text
                            color="primary"
                            @click="dialog.display = false"
                        >
                            Saya mengerti
                        </v-btn>
                        </v-card-actions>
                    </v-card>
                    </v-dialog>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.0.2/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
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
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-6345030598186823",
        enable_page_level_ads: true
    });
    </script>
</body>
</html>
