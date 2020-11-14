<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <video id="preview" style="width:100%" ref="preview"></video>
            </div>
            <div class="col-md-6" v-if="events.length > 0">
                <v-chip outline>
                  <v-icon left>event</v-icon> Sistem Absensi
                </v-chip>
                <v-select
                  :items="cameras"
                  v-model="camera"
                  label="Pilih Kamera"
                  return-object
                  item-text="name"
                  item-value="id"
                  @input="changeCamera"
                ></v-select>
                <v-autocomplete
                    label="Pilih Jadwal Acara"
                    :items="events"
                    item-value="id"
                    item-text="name"
                    v-model="event"
                    return-object
                    @input="getEvent"
                >
                </v-autocomplete>
                <v-card v-if="event.id != null">
                  <v-card-title primary-title>
                    {{ event.name }}
                  </v-card-title>
                  <v-card-text>
                    {{ new Date(event.start_at).toLocaleString() }}
                  </v-card-text>
                </v-card>
                <v-spacer></v-spacer>
                <v-card v-if="event.id != null">
                  <v-card-text>
                    <v-list>
                      <v-subheader>Daftar Peserta Hadir</v-subheader>

                      <v-list-tile avatar v-for="user in event.users" :key="user.id">
                        <v-list-tile-avatar>
                          <img :src="`/storage/${user.avatar}`">
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-list-tile-title>{{ user.name }} - {{ new Date(user.pivot.created_at).toLocaleString() }}</v-list-tile-title>
                            <v-list-tile-sub-title>Na. {{ user.kta_id == null ? 'Kosong' : user.kta_id }}</v-list-tile-sub-title>
                        </v-list-tile-content>
                      </v-list-tile>
                    </v-list>
                  </v-card-text>
                </v-card> 
            </div>
            <div v-else>
                <v-alert
                  :value="true"
                  type="error"
                >
                    Tidak ada jadwal acara hari ini                  
                </v-alert>
            </div>
        </div>
    </div>
</template>

<script>
    import {Event} from './../../objects.js'
    export default {
        data(){
            return{
                events: [],
                event: new Event,
                sound: "Ding",
                cameras: [],
                camera: null,
                scanner: null
            }
        },
        mounted() {
            console.log('Component mounted.')
            
            createjs.Sound.registerSound("/audio/ding.wav", this.sound)

            axios.get('/api/v1/event').then(res=>{
                this.events = res.data
            })

            this.scanner = new Instascan.Scanner({ video: this.$refs.preview })
            this.scanner.addListener('scan', (content)=> {
                if(this.event.id == null){
                    alert('Pilih jadwal dulu gan')
                } else {
                    let access = {
                        event_id: this.event.id,
                        user_id:content
                    }
                    createjs.Sound.play(this.sound)
                    axios.post('/api/v1/attendance',access).then(res=>{
                        this.event = res.data
                    })
                }

            })
            Instascan.Camera.getCameras().then((cameras)=> {
                this.cameras = cameras
                if (cameras.length > 0) {
                  this.camera = cameras[0]
                  this.scanner.start(cameras[0])
                } else {
                  console.error('No cameras found.')
                }
            }).catch(function (e) {
                console.error(e)
            })

        },
        methods:{
            getEvent: function(){
                this.event.users = []
                axios.get(`/api/v1/event/${this.event.id}`).then(res=>{
                    this.event = res.data
                })
            },
            changeCamera: function(){
                this.scanner.start(this.camera)
            }
        }
    }
</script>
