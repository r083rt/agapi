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
                        <div class="title" style="width:100%">Daftar Kartu Tanda Anggota AGPAII DIGITAL</div>
                        <div class="body-1">Daftarkan diri anda untuk mendapatkan fitur-fitur guru</div>
                    </v-card-title>
                    <v-card-text>
                        <v-form method="POST" action="{{ route('register') }}" @submit="onSubmit">
                            @csrf
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-text-field label="Nama" name="name" required></v-text-field>
                                </v-flex>
                                @if ($errors->has('name'))
                                    <div class="caption red--text">{{ $errors->first('name') }}</div>
                                @endif
                            </v-layout>
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
                                <v-flex xs12>
                                    <v-text-field type="password" label="Ulangi Password" name="password_confirmation" required></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-btn color="info" text href="{{ route('login') }}">Masuk ke akun</v-btn>
                                <v-spacer></v-spacer>
                                <v-btn type="submit" color="success" text :loading="loading" :disabled="loading">Daftar Baru</v-btn>
                            </v-layout>
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-layout>
            </v-layout>
        </v-container>
      </v-content>

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
</body>
</html>
