<template>
    <v-app>
        <v-container grid-list-xs>
            <v-row row wrap no-gutters>
                <v-col cols="12">
                    <v-card
                        color="grey lighten-4"
                        text
                        height="200px"
                        width="100%"
                        tile
                    >
                        <v-toolbar>
                            <v-toolbar-title>List Pengguna</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <download-excel
                                v-show="users.length != 0"
                                :data="users.data"
                                :fields="excel"
                                :worksheet="printName"
                                :name="printName"
                            >
                                <v-btn icon>
                                    <v-icon>mdi-printer</v-icon>
                                </v-btn>
                            </download-excel>
                        </v-toolbar>
                        <v-row>
                            <v-col cols="12">
                                <v-card width="100%">
                                    <v-card-text>
                                        <v-text-field
                                            v-model="search"
                                            append-icon="mdi-magnify"
                                            label="Search"
                                            single-line
                                            hide-details
                                        ></v-text-field>
                                        <v-autocomplete
                                            label="buka pengguna dari provinsi"
                                            :items="form.provinces"
                                            item-text="name"
                                            return-object
                                            v-model="selectedProvince"
                                            @input="getUserByProvince"
                                        >
                                        </v-autocomplete>
                                        <v-autocomplete
                                            label="buka pengguna dari Kota"
                                            :items="form.cities"
                                            item-text="name"
                                            return-object
                                            v-model="selectedCity"
                                            @input="getUserByCity"
                                        >
                                        </v-autocomplete>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                            <v-col cols="12">
                                <v-data-table
                                    id="userTable"
                                    :headers="datatables.headers"
                                    :items="users.data"
                                    :loading="datatables.loading"
                                    :search="search"
                                    class="elevation-1"
                                >
                                    <v-progress-linear
                                        v-slot:progress
                                        color="blue"
                                        indeterminate
                                    ></v-progress-linear>
                                    <template v-slot:item.role="{ item }">
                                        <td class="hidden-sm-and-down">
                                            {{ item.role.name }}
                                        </td>
                                    </template>
                                    <template
                                        v-slot:item.user_activated_at="{ item }"
                                    >
                                        <td>
                                            {{
                                                item.user_activated_at == null
                                                    ? "Belum aktif"
                                                    : "aktif"
                                            }}
                                        </td>
                                    </template>
                                    <template v-slot:item.action="{ item }">
                                        <td class="justify-center layout px-0">
                                            <v-btn icon @click="edit(item)">
                                                <v-icon small
                                                    >mdi-pencil</v-icon
                                                >
                                            </v-btn>
                                        </td>
                                    </template>
                                </v-data-table>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>

        <user-edit ref="userEdit"></user-edit>

        <!-- show avatar dialog -->
        <v-dialog v-model="dialog.avatar.display" width="500">
            <v-card>
                <v-card-title class="headline grey lighten-2" primary-title>{{
                    dialog.avatar.title
                }}</v-card-title>

                <v-card-text>
                    <v-img
                        :src="
                            `https://storage.googleapis.com/agpaiidigital.org/${dialog.avatar.src}`
                        "
                        lazy-src="/img/lazyimage.jpg"
                        aspect-ratio="1"
                        class="grey lighten-2"
                    >
                        <template v-slot:placeholder>
                            <v-row fill-height align-center justify-center ma-0>
                                <v-progress-circular
                                    indeterminate
                                    color="grey lighten-5"
                                ></v-progress-circular>
                            </v-row>
                        </template>
                    </v-img>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="dialog.avatar.display = false"
                        >Tutup</v-btn
                    >
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
import Swal from "sweetalert2";
import { User, Profile } from "./../../objects";
import JsonExcel from "vue-json-excel";
import UserEdit from "./User/EditComponent";

export default {
    components: {
        downloadExcel: JsonExcel,
        userEdit: UserEdit
    },
    data() {
        return {
            excel: {
                nama: "name",
                email: "email",
                "tempat tugas/ Sekolah": "profile.school_place",
                "hak akses": "role.name",
                "nomor KTA": {
                    field: "kta_id",
                    callback: value => {
                        return value == "" ? "belum mengisi" : value;
                    }
                },
                "status member": {
                    field: "user_activated_at",
                    callback: value => {
                        return value == "" ? "belum aktif" : "aktif";
                    }
                }
            },
            selectedProvince: null,
            selectedCity: null,
            printName: null,
            datatables: {
                headers: [
                    {
                        text: "Nama",
                        value: "name"
                    },
                    {
                        text: "Email",
                        value: "email",
                        class: "hidden-sm-and-down"
                    },
                    {
                        text: "Nomor KTA",
                        value: "kta_id",
                        class: "hidden-sm-and-down"
                    },
                    {
                        text: "Hak akses",
                        value: "role",
                        class: "hidden-sm-and-down"
                    },
                    {
                        text: "Point",
                        value: "point",
                        class: "hidden-sm-and-down"
                    },
                    {
                        text: "Status Member",
                        value: "user_activated_at"
                    },
                    {
                        text: "Action",
                        value: "action"
                    }
                ],
                loading: false,
                options: {}
            },
            users: [],
            search: "",
            dialog: {
                avatar: {
                    title: "avatar",
                    display: false,
                    src: "/users/default.png"
                }
            },
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
            }
        };
    },
    mounted() {
        console.log("Component mounted.");
        this.getUser();
        this.getProvince();
    },
    watch: {
        'datatables.options': {
            handler(val){
                console.log(val)
            },
            deep: true
        }
    },
    methods: {
        getUser: function() {
            this.datatables.loading = true;
            axios.get("/api/v1/user?show=100000000").then(res => {
                this.users = res.data;
                this.datatables.loading = false;
            });
        },
        getUserByProvince() {
            this.form.cities = [];
            axios
                .get(
                    `/api/v1/users/getbyprovince/${this.selectedProvince.id}?show=100000`
                )
                .then(res => {
                    this.users = res.data;
                    this.printName = `AGPAII_rekap_pengguna_${this.selectedProvince.name}.xls`;
                    this.getCities();
                });
        },
        getUserByCity() {
            axios
                .get(
                    `/api/v1/users/getbycity/${this.selectedCity.id}?show=100000`
                )
                .then(res => {
                    this.users = res.data;
                    this.printName = `AGPAII_rekap_pengguna_${this.selectedCity.name}.xls`;
                });
        },
        getProvince: function() {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/v1/province")
                    .then(res => {
                        this.form.provinces = res.data;
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        getCities: function() {
            return new Promise((resolve, reject) => {
                this.form.cities = [];
                axios
                    .get(`/api/v1/province/${this.selectedProvince.id}`)
                    .then(res => {
                        this.form.cities = res.data.cities;
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        getDistricts: function() {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/v1/city/${this.user.profile.city_id}`)
                    .then(res => {
                        this.form.districts = res.data.districts;
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        create: function() {
            this.user = new User();
            this.form.create.display = true;
        },
        edit: function(user) {
            this.$refs.userEdit.display = true
            this.$refs.userEdit.user = user
        },
        avatarError: function(e) {
            axios.get(`/api/v1/users/setDefaultAvatar/${e.id}`).then(res => {
                e.avatar = res.data.avatar;
            });
        },
        showAvatar: function(e) {
            this.dialog.avatar.src = e.avatar;
            this.dialog.avatar.title = `Foto ${e.name}`;
            this.dialog.avatar.display = true;
        }
    }
};
</script>
