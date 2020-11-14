<template>
    <div>
        <v-row>
            <v-col>
                <div class="caption grey--text">DESKRIPSI DIRI</div>
                <v-text-field v-model="user.profile.long_bio"></v-text-field>
                <div class="caption grey--text">NAMA</div>
                <v-text-field v-model="user.name"></v-text-field>
                <div class="caption grey--text">JENJANG PENDIDIKAN YANG DIAJAR</div>
                <v-select v-model="user.profile.educational_level_id" :items="educationallevels" item-text="name" item-value="id">
                </v-select>
                <div class="caption grey--text">NIK</div>
                <v-text-field v-model="user.profile.nik"></v-text-field>
                <div class="caption grey--text">TANGGAL LAHIR</div>
                <!-- <v-text-field v-model="user.profile.birthdate"></v-text-field> -->
                <v-dialog
                    ref="birthdate"
                    v-model="form.date"
                    :return-value.sync="user.profile.birthdate"
                    persistent
                    width="290px"
                >
                    <template v-slot:activator="{ on }">
                    <v-text-field
                        v-model="user.profile.birthdate"
                        readonly
                        v-on="on"
                    ></v-text-field>
                    </template>
                    <v-date-picker v-model="user.profile.birthdate" scrollable>
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="form.calendar = false">Cancel</v-btn>
                    <v-btn
                        flat
                        color="primary"
                        @click="$refs.birthdate.save(user.profile.birthdate)"
                    >OK</v-btn>
                    </v-date-picker>
                </v-dialog>
                <div class="caption grey--text">ALAMAT</div>
                <v-text-field v-model="user.profile.home_address"></v-text-field>
                <div class="caption grey--text">NO HP</div>
                <v-text-field v-model="user.profile.contact"></v-text-field>
                <div class="caption grey--text">ASAL SEKOLAH/ INSTANSI</div>
                <v-text-field v-model="user.profile.school_place"></v-text-field>
                <div class="caption grey--text">PROVINSI</div>
                <v-select
                    :items="provinces"
                    v-model="user.profile.province_id"
                    item-text="name"
                    item-value="id"
                    @input="getCities()"
                ></v-select>
                <div class="caption grey--text">KAB.KOTA</div>
                <v-select
                    :items="cities"
                    v-model="user.profile.city_id"
                    item-text="name"
                    item-value="id"
                    @input="getDistricts()"
                ></v-select>
                <div class="caption grey--text">KECAMATAN</div>
                <v-select
                    :items="districts"
                    v-model="user.profile.district_id"
                    item-text="name"
                    item-value="id"
                ></v-select>
            </v-col>
        </v-row>
        <v-row>
            <v-spacer></v-spacer>
            <v-col>
                <v-btn text @click="update()" :loading="loading" :disabled="loading">perbarui</v-btn>
            </v-col>
            <v-spacer></v-spacer>
        </v-row>
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    data(){
        return {
            provinces:[],
            cities:[],
            districts:[],
            loading: false,
            form:{
                calendar: false,
                date: false
            }
        }
    },
    computed: {
        ...mapState(["user",'educationallevels'])
    },
    mounted(){

        if(this.educationallevels.length == 0){
            this.getEducationalLevels()
        }

        if(this.provinces.length == 0){
            this.getProvinces()
        }

        if(this.user.profile.province_id !== null){
            this.getCities()
        }

        if(this.user.profile.city_id !== null){
            this.getDistricts()
        }
    },
    methods:{
        getEducationalLevels(){
            this.$store.dispatch('getEducationalLevels').then(res=>{
                this.$store.commit('setEducationalLevels',{educationallevels:res.data})
            }).catch(err=>{

            })
        },
        getProvinces(){
            this.$store.dispatch('getProvinces').then(res=>{
                this.provinces = [...res.data]
            }).catch(err=>{

            })
        },
        getCities(){
            this.$store.dispatch('getCities',this.user.profile.province_id).then(res=>{
                this.cities = [...res.data.cities]
            }).catch(err=>{

            })
        },
        getDistricts(){
            this.$store.dispatch('getDistricts',this.user.profile.city_id).then(res=>{
                this.districts = [...res.data.districts]
            }).catch(err=>{

            })
        },
        update(){
            this.loading = true
            this.$store.dispatch('updateUser',this.user).then(res=>{
                this.$store.commit('setUser',{user:res.data})
                this.loading = false
                this.$router.push('/profile')
            }).catch(err=>{

            })
        }
    }
}
</script>

<style>

</style>
