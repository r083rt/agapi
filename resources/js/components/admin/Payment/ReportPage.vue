<template>
    <v-app>
        <v-container>
            <v-row>
                <v-col cols="12">
                    <v-card width="100%">
                        <v-toolbar>
                            <v-toolbar-title>Laporan Keuangan Simple</v-toolbar-title>
                        </v-toolbar>
                        <v-row>
                            <v-col cols="12">
                                <v-card width="100%">
                                    <v-card-text>
                                        <v-autocomplete
                                            label="buka pembayaran dari provinsi"
                                            :items="provinces"
                                            item-text="name"
                                            return-object
                                            v-model="selectedProvince"
                                            @input="()=>{
                                                getPaymentByProvince()
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
                                            @input="getPaymentByCity"
                                        >
                                        </v-autocomplete>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                            <v-col cols="12">
                                <v-data-table
                                    :headers="headers"
                                    :items="payments"
                                    class="elevation-1"
                                >
                                    <template v-slot:item.updated_at="props">
                                            {{
                                                new Date(
                                                    props.item.updated_at
                                                ).getDate()
                                            }}
                                            {{
                                                months[
                                                    new Date(
                                                        props.item.updated_at
                                                    ).getMonth()
                                                ]
                                            }}
                                            {{
                                                new Date(
                                                    props.item.updated_at
                                                ).getFullYear()
                                            }}
                                    </template>
                                    <template v-slot:item.value="props">
                                            {{
                                                    props.item.value.toLocaleString()
                                            }}
                                    </template>
                                    <template v-slot:top>
                                        <v-toolbar flat>
                                            <v-toolbar-title
                                                >Setting</v-toolbar-title
                                            >
                                            <v-spacer></v-spacer>
                                            <v-text-field
                                                type="date"
                                                v-model="from"
                                            ></v-text-field>
                                            <v-text-field
                                                type="date"
                                                v-model="to"
                                            ></v-text-field>
                                            <v-btn text :loading="loading" :disabled="loading" @click="getPayments()"
                                                >Cari Semua Daerah</v-btn
                                            >
                                        </v-toolbar>
                                    </template>
                                </v-data-table>
                            </v-col>
                            <v-col cols="12">
                                <div class="body-1">Total Rp. {{ total.toLocaleString() }}</div>
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
    data() {
        return {
            loading: false,
            months: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            provinces: [],
            cities: [],
            selectedProvince: null,
            selectedCity: null,
            from: new Date(),
            to: new Date(),
            payments: [],
            total: 0,
            headers: [
                { text: "Nama", value: "user.name" },
                {
                    text: "Tanggal",
                    align: "left",
                    sortable: false,
                    value: "updated_at"
                },
                { text: "Nilai", value: "value" },
                { text: "Status", value: "status" }
            ]
        };
    },
    mounted() {
        this.getProvinces();
    },
    methods: {
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
                        this.cities = res.data.cities;
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        getPayments() {
            return new Promise((resolve, reject) => {
                console.log(this.from, this.to);
                this.loading = true
                axios
                    .get(
                        `/api/v1/payments/paymentreport/${this.from}/${this.to}`
                    )
                    .then(res => {
                        this.payments = res.data;
                        this.total = 0
                        this.payments.forEach(payment => {
                            this.total += payment.value;
                        });
                        this.loading = false
                        resolve(res);
                    })
                    .catch(err => {
                        this.loading = false
                        reject(err);
                    });
            });
        },
        getPaymentByProvince() {
            return new Promise((resolve, reject) => {
                console.log(this.from, this.to);
                this.loading = true
                axios
                    .get(
                        `/api/v1/payments/paymentreportbyprovince/${this.from}/${this.to}/${this.selectedProvince.id}`
                    )
                    .then(res => {
                        this.payments = res.data;
                        this.total = 0
                        this.payments.forEach(payment => {
                            this.total += payment.value;
                        });
                        this.loading = false
                        resolve(res);
                    })
                    .catch(err => {
                        this.loading = false
                        reject(err);
                    });
            });
        },
        getPaymentByCity() {
            return new Promise((resolve, reject) => {
                console.log(this.from, this.to);
                this.loading = true
                axios
                    .get(
                        `/api/v1/payments/paymentreportbycity/${this.from}/${this.to}/${this.selectedCity.id}`
                    )
                    .then(res => {
                        this.payments = res.data;
                        this.total = 0
                        this.payments.forEach(payment => {
                            this.total += payment.value;
                        });
                        this.loading = false
                        resolve(res);
                    })
                    .catch(err => {
                        this.loading = false
                        reject(err);
                    });
            });
        }
    }
};
</script>

<style></style>
