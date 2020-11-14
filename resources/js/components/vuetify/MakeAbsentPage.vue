<template>
<div>
    <div class="title">Scanner Kehadiran</div>
    <v-row v-if="event != null">
        <v-col cols="12">
            <video id="preview" style="width:100%" ref="preview"></video>
        </v-col>
        <v-col cols="12">
            <v-select
            :items="cameras"
            v-model="camera"
            label="Pilih Kamera"
            return-object
            item-text="name"
            item-value="id"
            @input="changeCamera"
            ></v-select>
            <div class="title grey--text">{{ event.name }}</div>
            <div class="caption">{{ new Date(event.start_at).toLocaleString() }}</div>
        </v-col>
        <v-col cols="12">
            <v-subheader>Daftar Peserta Hadir</v-subheader>
            <v-list>
                <v-list-tile avatar v-for="user in event.users" :key="user.id">
                <v-list-tile-avatar>
                    <v-img style="border-radius:50%" width="40" :src="`${storageUrl}/${user.avatar}`" />
                </v-list-tile-avatar>
                <v-list-tile-content>
                    <v-list-tile-title>{{ user.name }} - {{ new Date(user.pivot.created_at).toLocaleString() }}</v-list-tile-title>
                    <v-list-tile-sub-title>Na. {{ user.kta_id == null ? 'Kosong' : user.kta_id }}</v-list-tile-sub-title>
                </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-col>
    </v-row>
</div>
</template>

<script>
import Swal from "sweetalert2"
import {mapState} from 'vuex'
export default {
    props:{
        event: null
    },
    data(){
        return{
            sound: "Ding",
            cameras: [],
            camera: null,
            scanner: null,
        }
    },
    computed:{
        ...mapState(['storageUrl'])
    },
    mounted(){
        if(this.event == null){
            this.$router.back()
        } else {
            this.initScanner()
        }

    },
    methods:{
        initScanner(){
            this.$store.dispatch('getEvent',this.event).then(res=>{
                createjs.Sound.registerSound("/audio/ding.wav", this.sound)
                this.scanner = new Instascan.Scanner({ video: this.$refs.preview })
                this.scanner.addListener("scan", content => {
                if (this.event.id == null) {
                    alert("Pilih jadwal")
                } else {
                    let access = {
                        event_id: this.event.id,
                        user_id: content
                    }
                    createjs.Sound.play(this.sound)
                    this.$store.dispatch('attendance',access).then(res=>{
                        this.event = res.data
                    })
                }
                })
                Instascan.Camera.getCameras()
                .then(cameras => {
                    this.cameras = cameras
                    if (cameras.length > 0) {
                    this.camera = cameras[0]
                    this.scanner.start(cameras[0])
                    } else {
                    Swal.fire({
                        type: "error",
                        title: "Aduh",
                        text: "Kamera tidak ditemukan"
                    })
                    }
                })
                .catch(function(e) {
                    console.error(e)
                })
            })
        },
        closeScanner: function() {
            this.scanner.stop()
        },
        changeCamera: function() {
            this.scanner.start(this.camera)
        }
    }
}
</script>

<style>

</style>
