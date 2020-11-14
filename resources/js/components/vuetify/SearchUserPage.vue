<template>
<div>
    <div class="title">Cari Guru</div>
    <v-row>
        <v-col>
            <v-text-field v-model="search" @input="searchUsers" placeholder="Tulis nama..."></v-text-field>
        </v-col>
    </v-row>
    <!-- <v-row v-if="users.length == 0 && loading == false">
        <v-col cols="12">
            <v-row align="center" justify="center">
                <div class="title grey--text">Kosong</div>
            </v-row>
        </v-col>
    </v-row> -->
    <v-row v-if="loading">
        <v-col cols="12">
            <v-skeleton-loader
            class="mx-auto"
            max-width="300"
            type="card"
            ></v-skeleton-loader>
        </v-col>
        <v-col cols="12">
            <v-skeleton-loader
            class="mx-auto"
            max-width="300"
            type="card"
            ></v-skeleton-loader>
        </v-col>
    </v-row>
    <v-row>
        <v-col cols="12" v-if="users.prev_page_url">
            <center>
                <v-btn text @click="getPrevUsers()">Sebelumnya</v-btn>
            </center>
        </v-col>
        <v-col cols="12" v-for="user in users.data" :key="user.id">
            <v-card width="100%">
                <v-container>
                    <v-row align="center">
                        <v-col cols="2">
                            <v-img width="80" style="border-radius:50%" :src="`${storageUrl}/${user.avatar}`"></v-img>
                        </v-col>
                        <v-col cols="10">
                            <div class="caption">
                                <div class="body-1">{{user.name}}</div>
                            </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <div class="caption grey--text">
                                {{user.profile ? user.profile.long_bio || 'Tidak ada keterangan' : 'Tidak ada keterangan'}}
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>
        </v-col>
        <v-col cols="12" v-if="users.next_page_url">
            <center>
                <v-btn text @click="getNextUsers()">Selanjutnya</v-btn>
            </center>
        </v-col>
    </v-row>
</div>
</template>

<script>
import debounce from 'debounce'
import {mapState} from 'vuex'
export default {
    data(){
        return{
            search:'',
            loading: false,
            users:{}
        }
    },
    mounted(){

    },
    computed:{
        ...mapState(['storageUrl'])
    },
    created(){
        this.searchUsers = debounce(this.searchUsers,1000)
    },
    methods:{
        searchUsers(){
            if(this.search.length != 0){
                this.loading = true
                this.$store.dispatch('searchUsers',this.search).then(res=>{
                    this.users = res.data
                    this.loading = false
                }).catch(err=>{
                    this.loading = false
                })
            }
        },
        getNextUsers(){
            this.loading = true
            this.$store.dispatch('getUsers',this.users.next_page_url).then(res=>{
                this.users = res.data
                this.loading = false
            }).catch(err=>{
                this.loading = false
            })
        },
        getPrevUsers(){
            this.loading = true
            this.$store.dispatch('getUsers',this.users.prev_page_url).then(res=>{
                this.users = res.data
                this.loading = false
            }).catch(err=>{
                this.loading = false
            })
        }
    }
}
</script>

<style>

</style>
