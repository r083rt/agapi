<template>
<v-app>
        <v-container>
            <v-row>
                <v-col cols="12">
                    <v-card width="100%">
                        <v-toolbar>
                            <v-toolbar-title>Laporan Keuangan Total dan Yang Diterima Kas</v-toolbar-title>
                        </v-toolbar>
                        <v-row>
                            <v-col cols="12">
                                <v-data-table
                                    :headers="headers"
                                    :items="payments"
                                    class="elevation-1"
                                >
                                    <template v-slot:item.total="props">
                                            {{
                                                    props.item.total.toLocaleString()
                                            }}
                                    </template>
                                    <template v-slot:item.toPaid="props">
                                            {{
                                                    props.item.toPaid.toLocaleString()
                                            }}
                                    </template>
                                    <template v-slot:item.toReceive="props">
                                            {{
                                                    props.item.toReceive.toLocaleString()
                                            }}
                                    </template>
                                    <template v-slot:item.rest="props">
                                            {{
                                                    props.item.rest.toLocaleString()
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
            headers: [
                { text: "Tanggal", value: "date" },
                { text: "Total", value: "total" },
                { text: "Yang Dikirim", value: "toPaid" },
                { text: "Yang Diterima", value: "toReceive" },
                { text: "Sisa", value: "rest" },
            ]
        }
    },
    mounted(){
        this.getPaymentReportForArdata()
    },
    methods:{
        getPaymentReportForArdata(){
            return new Promise((resolve,reject)=>{
                axios.get(`/api/v1/payments/getpaymentreportforardata`).then(res=>{
                    this.payments = res.data
                })
            })
        }
    }
}
</script>

<style>

</style>
