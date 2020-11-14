<template>
<div>
    <div class="title">Halaman Kontribusi</div>
    <v-row>
      <v-tabs centered v-model="tab" background-color="transparent">
        <v-tab v-intro="'Ruang ini menjelaskan acara yang anda buat sekaligus untuk melakukan absensi pada acara anda'">Kegiatan Anda</v-tab>
        <v-tab v-intro="'Ruang ini menjelaskan acara apa saja yang pernah anda ikuti'">Partisipasi Kegiatan</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab" style="width:100%">
        <v-tab-item>
          <v-card flat>
            <v-card-text>
                <v-container fluid>
                    <v-row>
                        <v-col cols="12">
                            <center>
                                <v-btn v-intro="'Tombol untuk membuat acara baru anda'" text @click="push('createevent')">
                                    <v-icon>
                                        mdi-plus
                                    </v-icon> Buat Acara Anda
                                </v-btn>
                            </center>
                        </v-col>
                        <v-col cols="12">
                            <v-list>
                                <v-list-item three-line v-for="(event,e) in user.events" :key="event.id">
                                <v-list-item-content>
                                    <v-list-item-title>{{event.name}}</v-list-item-title>
                                    <v-list-item-subtitle>
                                    {{event.address}}
                                    </v-list-item-subtitle>
                                    <v-list-item-subtitle>
                                    {{event.start_at}}
                                    </v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-icon>
                                    <v-btn icon @click="openAbsent(event)">
                                        <v-icon
                                        v-intro="'Tombol ini untuk melakukan absensi pada acara anda'"
                                        v-intro-if="e == 0"
                                        >mdi-camera</v-icon>
                                    </v-btn>
                                </v-list-item-icon>
                                </v-list-item>
                            </v-list>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <v-card-text>
                <v-row>
                    <v-col cols="12" v-for="guestevent in user.guest_events" :key="guestevent.id">
                        <div class="body-2 grey--text">Hadir di {{guestevent.name}}</div>
                        <div class="body-2">{{guestevent.start_at | moment("LLLL")}}</div>
                        <div class="body-2">Di {{guestevent.address}}</div>
                    </v-col>
                </v-row>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-row>
</div>
</template>

<script>
import { mapState } from "vuex"
export default {
    data(){
        return {
            tab: null
        }
    },
    computed: {
        ...mapState(["user",'storageUrl'])
    },
    methods:{
        push(page){
            this.$router.push(page)
        },
        openAbsent(event){
            this.$router.push({
                name:'makeabsent',
                params:{
                    event:event
                }
            })
        }
    }
}
</script>

<style>

</style>
