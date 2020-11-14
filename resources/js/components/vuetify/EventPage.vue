<template>
<div>
    <div class="title">Jadwal Acara</div>
    <v-row>
        <v-card width="100%" class="mt-5" v-for="event in events.data" :key="event.id" ripple @click="openGuest(event)">
            <v-container>
                <v-row v-if="moment(event.start_at).diff(moment(),'days') >= 0 && moment(event.start_at).diff(moment(),'days') < 20"
                >
                    <v-col>
                        <div class="body-2 red--text text--lighten-2">
                            <div class="body-2 red--text text--lighten-2">SEBENTAR LAGI</div>
                        </div>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <div class="title">{{event.name}}</div>
                        <div class="caption grey--text">{{event.address}}</div>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <div class="body-2">{{event.start_at | moment("LLLL")}}</div>
                        <div class="caption grey--text">{{event.start_at | moment("from","now")}}</div>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <div class="body-2">{{event.user.name}}</div>
                        <div class="caption grey--text">{{event.user.profile ? event.user.profile.contact : 'Tidak ada kontak'}}</div>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <div class="caption grey--text">{{event.description}}</div>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>
    </v-row>
</div>
</template>

<script>
import { mapState } from "vuex";
import moment from "moment";
export default {
    data(){
        return {

        }
    },
    computed: {
        ...mapState(["events"])
    },
    mounted(){
        if(this.events.data ? this.events.length == 0 : true){
            this.getEvents()
        }
    },
    methods:{
        moment,
        getEvents(){
            this.$store.dispatch('getEvents').then(res=>{
                this.$store.commit('setEvents',{events:res.data})
            }).catch(err=>{

            })
        },
        openGuest(event){
            this.$router.push({
                name:'eventguest',
                params:{
                    event: event
                }
            })
        }
    }
}
</script>

<style>

</style>
