<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app" style="width:310px">
    <v-app>
      <v-content>
        <v-container fluid>
            <v-img src="/img/membercard.jpeg" width="300px">
                <v-container bg fill-height grid-list-md text-xs-center>
                    <v-layout row wrap>
                      <v-flex xs12 class="text-xs-center pt-5">
                        <center class="pt-5">
                          <v-img
                            src="https://S3.wasabisys.com/agpaiidigital.org/{{$user->avatar}}"
                            height="50%"
                            width="50%"
                            style="margin-top:30%;border: 10px solid transparent;"
                          ></v-img>
                          <h2 class="title">{{ $user->name }}</h2>
                          <h3 class="title">{{ $user->kta_id ?? 'Kosong' }}</h3>
                          <h5
                            class="value"
                          >{{ $user->profile->school_place ?? 'Kosong' }}</h5>
                          <h5 class="value">{{ $user->email }}</h5>
                          <center>

                          </center>
                        </center>
                      </v-flex>
                    </v-layout>
                  </v-container>
            </v-img>
            <div id="qrcode"></div>
        </v-container>
      </v-content>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.js"></script>
  <script type="text/javascript">
    new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
    </script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      mounted(){
          this.init()
      },
      methods:{
        init(){

            // console.log(qrcode)
        }
      }
    })
  </script>
</body>
</html>
