<template>
    <v-app>
        <v-container>
            <v-row>
                <v-col cols="12">
                    <v-card width="100%">
                        <v-toolbar>
                            <v-toolbar-title>Laporan Keuangan Per Kota</v-toolbar-title>
                        </v-toolbar>
                        <v-row>
                            <v-col cols="12">
                                <v-card width="100%">
                                    <v-card-text>
                                        <v-autocomplete
                                            label="Pilih Provinsi"
                                            :items="provinces"
                                            item-text="name"
                                            return-object
                                            v-model="selectedProvince"
                                            @input="()=>{
                                                getCities()
                                            }"
                                        >
                                        </v-autocomplete>
                                        <v-autocomplete
                                            label="buka pembayaran dari Kota"
                                            :items="cities"
                                            item-text="name"
                                            return-object
                                            v-model="selectedCity"
                                            @input="getPaymentReportForCity"
                                        >
                                        </v-autocomplete>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12">
                                <v-data-table
                                    :headers="headers"
                                    :items="payments"
                                    class="elevation-1"
                                >
                                    <template v-slot:item.toPaid="props">
                                            {{
                                                    props.item.toPaid.toLocaleString()
                                            }}
                                    </template>
                                </v-data-table>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
export default {
    data(){
        return{
            payments:[],
            provinces: [],
            selectedProvince: null,
            cities: [],
            selectedCity: null,
            headers: [
                { text: "Tanggal", value: "date" },
                { text: "Yang Dikirim", value: "toPaid" },
            ]
        }
    },
    mounted(){
        this.getProvinces();
    },
    methods:{
        getProvinces() {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/v1/province")
                    .then(res => {
                        this.provinces = res.data;
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        getCities() {
            return new Promise((resolve, reject) => {
                this.cities = [];
                axios
                    .get(`/api/v1/province/${this.selectedProvince.id}`)
                    .then(res => {
                        this.cities = res.data.cities
                        resolve(res)
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        getPaymentReportForCity(){
            return new Promise((resolve,reject)=>{
                axios.get(`/api/v1/payments/getpaymentreportforcity/${this.selectedCity.id}`).then(res=>{
                    this.payments = res.data
                })
            })
        }
    }
}
</script>

<style>

</style>
