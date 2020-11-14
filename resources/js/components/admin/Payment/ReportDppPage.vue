<template>
  <v-app>
        <v-container>
            <v-row>
                <v-col cols="12">
                    <v-card width="100%">
                        <v-toolbar>
                            <v-toolbar-title>Laporan Keuangan DPP</v-toolbar-title>
                        </v-toolbar>
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
            headers: [
                { text: "Tanggal", value: "date" },
                { text: "Yang Dikirim", value: "toPaid" },
            ]
        }
    },
    mounted(){
        this.getPaymentReportForDpp();
    },
    methods:{
        getPaymentReportForDpp(){
            return new Promise((resolve,reject)=>{
                axios.get(`/api/v1/payments/getpaymentreportfordpp`).then(res=>{
                    this.payments = res.data
                })
            })
        }
    }
}
</script>

<style>

</style>
