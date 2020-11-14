<template>
    <div>
        <a href="#" class="btn btn-secondary" @click="openpreview">Download Kartu</a>

        <!-- card preview -->
        <v-dialog
          v-model="preview"
          width="400"
        >
          <v-card>

            <v-card-text id="printcontent" ref='printcontent'>
              <v-img
                class="image"
                src="/img/membercard.jpeg"
              >
                <v-container bg fill-height grid-list-md text-xs-center>
                    <v-layout row wrap pt-5 pb-5>
                      <v-flex xs12 class="text-xs-center pt-5">
                          <center class="pt-5">
                          <v-img 
                            v-if="user.avatar != null"
                            :src="`/storage/${user.avatar}`" 
                            height="50%" 
                            width="50%"
                            style="margin-top:30%;border: 10px solid transparent;"
                          >
                          </v-img>
                          <h2 class="title">{{ user.name }}</h2>
                          <h3 class="title">{{ user.kta_id != null ? user.kta_id : 'Kosong' }}</h3>
                          <h5 class="value">{{ user.profile != null ? user.profile.school_place : 'Kosong' }}</h5>
                          <h5 class="value">{{ user.email }}</h5>
                          <center>
                              <div id="previewbarcode"></div>
                          </center>
                        </center>
                      </v-flex>
                    </v-layout>
                  </v-container>
              </v-img>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
              <v-btn
                color="primary"
                flat
                @click="preview = false"
              >
                Close
              </v-btn>
              <v-spacer></v-spacer>
              <v-btn color="success" flat :loading='loading' :disabled="loading" @click="print">Download</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <!-- end card preview -->
    </div>
</template>

<script>
    import { User, Profile } from '../objects'
    import html2canvas from 'html2canvas'
    // import printJS from 'print-js'
    import 'reimg'

    export default {
        data(){
            return {
                user: new User,
                preview: false,
                loading: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('/api/user').then(res=>{
                this.user = res.data
                if(res.data.profile == null){
                this.user.profile = new Profile
                }
                this.initQR()
            })
        },
        methods:{
            openpreview:function(){
                this.preview = true
            },
            print:function(){
                // printJS('/img/membercard.png','image')
                // printJS('printcontent', 'image')
                this.loading = true
                html2canvas(this.$refs.printcontent).then((canvas)=> {
                  
                    var png = ReImg.fromCanvas(canvas).downloadPng()
                    // this.saveAs(canvas.toDataURL(), 'kartu-member-agpaii.png')
                    this.loading = false
                })
            },
            getUser: function(){
                axios.get('/api/user').then(res=>{
                    this.user = res.data
                    if(res.data.profile == null){
                    this.user.profile = new Profile
                    }
                })
            },
            initQR: function(){
              var qrcode = new QRCode(document.getElementById("previewbarcode"), {
                  text: this.user.id.toString(),
                  width: 128,
                  height: 128,
                  colorDark : "#000000",
                  colorLight : "#ffffff",
                  correctLevel : QRCode.CorrectLevel.H
              })
            },
            saveAs: function(uri, filename) {

                var link = document.createElement('a');

                if (typeof link.download === 'string') {

                    link.href = uri;
                    link.download = filename;

                    //Firefox requires the link to be in the body
                    document.body.appendChild(link);

                    //simulate click
                    link.click();

                    //remove the link when done
                    document.body.removeChild(link);

                } else {

                    window.open(uri);

                }
            }
        }
    }
</script>