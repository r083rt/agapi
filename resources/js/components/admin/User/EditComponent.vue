<template>
    <div>
        <v-dialog
            v-if="user != null"
            v-model="display"
            max-width="600px"
        >
            <v-card>
                <v-card-title>
                    <span class="headline">Formulir Edit</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-form lazy-validation ref="formEdit">
                            <v-row>
                                <v-col cols="12">
                                    <v-select
                                        :items="roles"
                                        item-text="name"
                                        item-value="id"
                                        label="Hak Akses"
                                        v-model="user.role_id"
                                        :rules="form.rules"
                                    ></v-select>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        label="Nama*"
                                        required
                                        v-model="user.name"
                                        :rules="form.rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        label="Email*"
                                        required
                                        v-model="user.email"
                                        :rules="form.rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-select
                                        :items="roles"
                                        item-text="name"
                                        item-value="id"
                                        label="Role*"
                                        required
                                        v-model="user.role_id"
                                        :rules="form.rules"
                                    ></v-select>
                                </v-col>
                                <v-col cols="12">
                                    <v-dialog
                                        ref="dialog"
                                        v-model="activation_date"
                                        :return-value.sync="user.user_activated_at"
                                        persistent
                                        width="290px"
                                    >
                                        <template v-slot:activator="{ on }">
                                        <v-text-field
                                            v-model="user.user_activated_at"
                                            label="Tanggal Aktivasi"
                                            readonly
                                            v-on="on"
                                        ></v-text-field>
                                        </template>
                                        <v-date-picker v-model="user.user_activated_at" scrollable>
                                        <v-spacer></v-spacer>
                                        <v-btn text color="primary" @click="activation_date = false">Cancel</v-btn>
                                        <v-btn text color="primary" @click="$refs.dialog.save(user.user_activated_at)">OK</v-btn>
                                        </v-date-picker>
                                    </v-dialog>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        v-model="user.profile.nik"
                                        label="NIK"
                                        type="number"
                                        :rules="form.rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-dialog
                                        ref="birthdate2"
                                        v-model="form.edit.date"
                                        :return-value.sync="
                                            user.profile.birthdate
                                        "
                                        persistent
                                        width="290px"
                                    >
                                        <template v-slot:activator="{ on }">
                                            <v-text-field
                                                label="Tanggal Lahir"
                                                v-model="user.profile.birthdate"
                                                readonly
                                                v-on="on"
                                                :rules="form.rules"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="user.profile.birthdate"
                                            scrollable
                                        >
                                            <v-spacer></v-spacer>
                                            <v-btn
                                                text
                                                color="primary"
                                                @click="
                                                    form.edit.date = false
                                                "
                                                >Cancel</v-btn
                                            >
                                            <v-btn
                                                text
                                                color="primary"
                                                @click="
                                                    $refs.birthdate2.save(
                                                        user.profile.birthdate
                                                    )
                                                "
                                                >OK</v-btn
                                            >
                                        </v-date-picker>
                                    </v-dialog>
                                </v-col>
                                <v-col >
                                    <v-text-field
                                        v-model="user.profile.home_address"
                                        label="Alamat"
                                        :rules="form.rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        v-model="user.profile.contact"
                                        label="No Hp"
                                        type="number"
                                        :rules="form.rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        v-model="user.profile.school_place"
                                        label="Asal Sekolah/ Instansi"
                                        :rules="form.rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-chip label>
                                        <v-icon left>mdi-home</v-icon>Lokasi
                                        Sekolah/ Intansi
                                    </v-chip>
                                </v-col>
                                <v-col cols="12">
                                    <v-autocomplete
                                        :items="form.provinces"
                                        label="Provinsi"
                                        item-value="id"
                                        item-text="name"
                                        v-model="user.profile.province_id"
                                        :rules="form.rules"
                                        @input="getCities"
                                    ></v-autocomplete>
                                </v-col>
                                <v-col cols="12">
                                    <v-autocomplete
                                        :items="form.cities"
                                        label="Kab./Kota"
                                        item-value="id"
                                        item-text="name"
                                        v-model="user.profile.city_id"
                                        :rules="form.rules"
                                        @input="getDistricts"
                                    ></v-autocomplete>
                                </v-col>
                                <v-col cols="12">
                                    <v-autocomplete
                                        :items="form.districts"
                                        label="Kecamatan"
                                        item-value="id"
                                        item-text="name"
                                        :rules="form.rules"
                                        v-model="user.profile.district_id"
                                    ></v-autocomplete>
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="blue darken-1"
                        text
                        @click="display = false"
                        >Close</v-btn
                    >
                    <v-btn color="blue darken-1" text @click="update" :loading="form.edit.loading" :disabled="form.edit.loading"
                        >Update</v-btn
                    >
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    props: {

    },
    data() {
        return {
            user: null,
            display: false,
            roles: [],
            activation_date: false,
            form: {
                edit: {
                    display: false,
                    loading: false,
                    calendar: false,
                    date: false
                },
                create: {
                    display: false,
                    loading: false,
                    calendar: false,
                    date: false
                },
                provinces: [],
                cities: [],
                districts: [],
                rules: [v => !!v || "Harus Diisi"]
            },
        };
    },
    mounted(){
        this.getRole();
        this.getProvince()
    },
    watch:{
        user: function(user){
            console.log(user)
             if (this.user.profile !== null) {
                if(this.user.profile.province_id !== null){
                    console.log('woi')
                    this.getCities().then(res=>{
                        if(this.user.profile.city_id !== null){
                            console.log('we')
                            this.getDistricts().then(res=>{

                            })
                        }
                    })
                }
            }
        }
    },
    methods:{
        getRole: function() {
            axios.get("/api/v1/role").then(res => {
                this.roles = res.data;
            });
        },
        update: function() {
            // if (this.$refs.formEdit.validate()) {
                this.form.edit.loading = true;
                this.user._method = "PUT";
                axios
                    .post(`/api/v1/user/${this.user.id}`, this.user)
                    .then(res => {
                        this.form.edit.loading = false;
                        this.display = false;
                    })
                    .catch(err => {
                        this.form.edit.loading = false;
                    })
            // }
        },
        getProvince: function() {
            return new Promise((resolve,reject)=>{
                 axios.get("/api/v1/province").then(res => {
                    this.form.provinces = res.data;
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                });
            })
        },
        getCities: function() {
            return new Promise((resolve,reject)=>{
                this.form.cities = []
            axios
                .get(`/api/v1/province/${this.user.profile.province_id}`)
                .then(res => {
                    this.form.cities = res.data.cities;
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                });
            })
        },
        getDistricts: function() {
            return new Promise((resolve,reject)=>{
                axios.get(`/api/v1/city/${this.user.profile.city_id}`).then(res => {
                    this.form.districts = res.data.districts;
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                });
            })
        },
    }
};
</script>

<style></style>
