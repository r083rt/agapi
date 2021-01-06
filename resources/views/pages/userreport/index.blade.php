@extends('voyager::master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

@stop

    @section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> Laporan Iuran Pendaftaran Baru
        </h1>
    </div>
    @stop

        @section('content')
        <div id="app" style="width:600px">
            <v-app id="inspire">
                <v-main>
                    <v-container fluid>
                        <v-tabs-items v-model="tab">
                            <v-tab-item>
                                <v-card flat>
                                    <v-row class="d-flex justify-center">
                                        <v-progress-circular v-if="paymentDetails.length==0" :size="70" :width="7"
                                            color="blue" indeterminate class="align-self-center"></v-progress-circular>
                                    </v-row>
                                    <v-list>
                                        <v-list-item>
                                            <v-list-item-content>
                                                <v-list-item-title v-text="'Total Semua Iuran DPP'"></v-list-item-title>
                                            </v-list-item-content>

                                            <v-list-item-icon>
                                                <v-chip color="primary" class="mr-2">@{{ usersCountTotal }} orang</v-chip>
                                                <v-chip color="primary">@{{ paymentsTotalCurrency }}</v-chip>
                                                <v-btn :disabled="isLoading" @click="showTransferDialog" class="mx-2" fab dark small
                                                    color="purple">
                                                    <v-icon dark>
                                                        mdi-send
                                                    </v-icon>
                                                </v-btn>
                                            </v-list-item-icon>
                                        </v-list-item>
                                        <v-subheader>
                                            <v-switch
                                            :disabled="isLoading"
                                            @change="switch1Change"
                                            v-model="switch1"
                                            inset
                                            :label="switch1? 'Total Iuran Perbulan':'Total Iuran Perprovinsi'"
                                            ></v-switch>
                                        </v-subheader>
                                        
                                            <v-tabs-items v-model="tab3">
                                                <v-tab-item>
                                                    <v-list-item v-for="(paymentDetail,n) in paymentDetails" :key="n">
                                                        <v-list-item-content>
                                                            <v-list-item-title class="text-wrap" v-text="getDateString(paymentDetail.timestamp)">
                                                            </v-list-item-title>
                                                        </v-list-item-content>

                                                        <v-list-item-icon>

                                                            <v-chip @click="goToPayment1(paymentDetail)" class="mr-2">
                                                                @{{ paymentDetail.users_count }} orang</v-chip>
                                                            <v-chip @click="goToPayment1(paymentDetail)">
                                                                @{{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(4000*paymentDetail.users_count) }}
                                                            </v-chip>

                                                        </v-list-item-icon>
                                                    </v-list-item>
                                                </v-tab-item>
                                                <v-tab-item>
                                                    <v-row v-if="provincePayments.length==0" class="d-flex justify-center">
                                                        <v-progress-circular :size="70" :width="7"
                                                            color="blue" indeterminate class="align-self-center"></v-progress-circular>
                                                    </v-row>
                                                    <v-list-item v-for="(payment,n) in provincePayments" :key=`njir-${n}`>
                                                        <v-list-item-content>
                                                            <v-list-item-title class="text-wrap" v-text="payment.name"></v-list-item-title>
                                                        </v-list-item-content>
                                                        
                                                        <v-list-item-icon>
                                                            <v-chip class="mr-2" @click="goToSubPayment2(payment)">
                                                                @{{ payment.users_count }} orang</v-chip>
                                                            <v-chip @click="goToSubPayment2(payment)">
                                                                @{{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(6000*payment.users_count) }}
                                                            </v-chip>
                                                            <v-btn :disabled="isLoading" @click="showTransferDialogDPW(payment)" class="mx-2" fab dark small
                                                                color="purple">
                                                                <v-icon dark>
                                                                    mdi-send
                                                                </v-icon>
                                                            </v-btn>
                                                        </v-list-item-icon>
                                                    </v-list-item>
                                                </v-tab-item>

                                                <v-tab-item>
                                                    <v-row v-if="cityPayments.length==0" class="d-flex justify-center">
                                                        <v-progress-circular :size="70" :width="7"
                                                            color="blue" indeterminate class="align-self-center"></v-progress-circular>
                                                    </v-row>
                                                    <v-list-item v-for="(payment,n) in cityPayments" :key=`njir-${n}`>
                                                        <v-list-item-content>
                                                            <v-list-item-title class="text-wrap" v-text="payment.name"></v-list-item-title>
                                                        </v-list-item-content>
                                                        
                                                        <v-list-item-icon>
                                                            <v-chip class="mr-2">
                                                                @{{ payment.users_count }} orang</v-chip>
                                                            <v-chip >
                                                                @{{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(10000*payment.users_count) }}
                                                            </v-chip>
                                                            <v-btn :disabled="isLoading" @click="showTransferDialogDPD(payment)" class="mx-2" fab dark small
                                                                color="purple">
                                                                <v-icon dark>
                                                                    mdi-send
                                                                </v-icon>
                                                            </v-btn>
                                                        </v-list-item-icon>
                                                    </v-list-item>
                                                </v-tab-item>

                                            </v-tabs-items>

                                        

                                        <v-divider></v-divider>
                                    </v-list>
                                </v-card>
                            </v-tab-item>

                            <v-tab-item>
                                <v-card flat>



                                    <v-list>
                                       
                                        <v-subheader>Iuran provinsi periode
                                            @{{ getMonthYearName(monthyear.month,monthyear.year) }}</v-subheader>
                                        <v-row class="d-flex justify-center">
                                            <v-progress-circular v-if="paymentDetailsbyMonthYear.length==0" :size="70"
                                                :width="7" color="blue" indeterminate class="align-self-center">
                                            </v-progress-circular>
                                        </v-row>

                                        <v-list-item v-for="(paymentDetail,n) in paymentDetailsbyMonthYear" :key="n">
                                            <v-list-item-content>
                                                <v-list-item-title class="text-wrap" v-text="paymentDetail.name"></v-list-item-title>
                                            </v-list-item-content>
                                            
                                            <v-list-item-icon>
                                                <v-chip class="mr-2" @click="goToPayment2(paymentDetail)">
                                                    @{{ paymentDetail.users_count }} orang</v-chip>
                                                <v-chip @click="goToPayment2(paymentDetail)">
                                                    @{{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(6000*paymentDetail.users_count) }}
                                                </v-chip>
                                            </v-list-item-icon>
                                        </v-list-item>

                                        <v-divider></v-divider>
                                    </v-list>

                                </v-card>
                            </v-tab-item>

                            <v-tab-item>
                                <v-card flat>

                                    <v-list>

                                        <v-subheader>Iuran provinsi @{{ province }} periode
                                            @{{ getMonthYearName(monthyear.month,monthyear.year) }}</v-subheader>

                                        <v-row class="d-flex justify-center">
                                            <v-progress-circular v-if="paymentDetailsbyProvince.length==0" :size="70"
                                                :width="7" color="blue" indeterminate class="align-self-center">
                                            </v-progress-circular>
                                        </v-row>

                                        <v-list-item v-for="(paymentDetail,n) in paymentDetailsbyProvince" :key="n">
                                            <v-list-item-content>
                                                <v-list-item-title class="text-wrap" v-text="paymentDetail.name"></v-list-item-title>
                                            </v-list-item-content>

                                            <v-list-item-icon>
                                                <v-chip class="mr-2">@{{ paymentDetail.users_count }} orang</v-chip>
                                                <v-chip>
                                                    @{{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(10000*paymentDetail.users_count) }}
                                                </v-chip>
                                            </v-list-item-icon>
                                            </v->

                                        </v-list-item>

                                        <v-divider></v-divider>
                                    </v-list>

                                </v-card>
                            </v-tab-item>

                        </v-tabs-items>



                    </v-container>
                </v-main>

                <v-dialog v-model="dialog" width="500">

                    <v-card>
                        <v-card-title class="headline lighten-2">
                            Transfer ke DPP
                        </v-card-title>

                        <v-card-text>
                        
                        
                        <v-tabs
                            centered
                            v-model="tab2"
                            align-with-title
                            >
                            <v-tabs-slider color="primary"></v-tabs-slider>

                            <v-tab>
                                Transfer
                            </v-tab>
                            <v-tab>
                                History
                            </v-tab>
                        </v-tabs>

                        <v-tabs-items v-model="tab2">
                            <v-tab-item>
                                <v-autocomplete class="mt-4"  chips return-object item-text="custom_name" item-value="id"
                                        :items="entries" :loading="isLoading" :search-input.sync="search"
                                        v-model="model" label="Rekening Sumber" hide-no-data hide-selected
                                        prepend-icon="mdi-database-search"></v-autocomplete>
                                <v-autocomplete chips return-object item-text="custom_name" item-value="id"
                                        :items="entries2" :loading="isLoading2" :search-input.sync="search2"
                                        v-model="model2" label="Rekening Tujuan" hide-no-data hide-selected
                                        prepend-icon="mdi-database-search"></v-autocomplete>
                                <v-text-field
                                        @keydown="keyDownTransfer($event)"
                                        @input="currencyTextInput"
                                        v-model="transferTotal"
                                        label="Jumlah yang ditransfer"
                                        clearable
                                    >
                                    <template v-slot:prepend>
                                        Rp
                                    </template>
                                </v-text-field>
                                    Sisa: <span class="font-weight-medium">@{{getCurrency(paymentsTotal-total_payment_out).replace(/,\d+/g, '')}} - </span>
                                    <span :class="'font-weight-medium '+transferTextColor">Rp @{{transferTotal}}</span > = <span :class="'font-weight-medium '+remainingPayment.class">@{{remainingPayment.value}}</span>
                            </v-tab-item>
                            <v-tab-item>
                              <v-list>
                              <v-list-item v-for="(transaction, i) in transactions" :key="i">
                                <v-list-item-content>
                                    <v-list-item-title class="text-wrap">@{{transaction.bank_account_from.name+' '+transaction.payment.necessary.name+' ke '+transaction.bank_account_to.name}}</v-list-item-title>
                                    <v-list-item-subtitle>@{{transaction.moment_time}}</v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-action>
                                    @{{transaction.payment.value}}
                                </v-list-item-action>
                                </v-list-item>
                              </v-list>
                            </v-tab-item>

                        </v-tabs-items>

                            <!-- <v-text-field label="Main input" hide-details="auto"></v-text-field> -->
                            
                        </v-card-text>

                        <v-divider></v-divider> 

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="primary" @click="submitDPP" :disabled="isSubmitDisable || isLoadingSubmit">
                                Transfer
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

                <v-dialog v-model="dialogDPW" width="500">
                <v-card>
                    <v-card-title class="headline lighten-2">
                        Transfer ke DPW @{{province.name}}
                    </v-card-title>

                    <v-card-text>
                    
                    
                    <v-tabs
                        centered
                        v-model="tabDPWTransfer"
                        align-with-title
                        >
                        <v-tabs-slider color="primary"></v-tabs-slider>

                        <v-tab>
                            Transfer
                        </v-tab>
                        <v-tab>
                            History
                        </v-tab>
                    </v-tabs>

                    <v-tabs-items v-model="tabDPWTransfer">
                        <v-tab-item>
                            <v-autocomplete class="mt-4"  chips return-object item-text="custom_name" item-value="id"
                                    :items="entries" :loading="isLoading" :search-input.sync="searchDPW"
                                    v-model="modelDPW" label="Rekening Sumber" hide-no-data hide-selected
                                    prepend-icon="mdi-database-search"></v-autocomplete>
                            <v-autocomplete chips return-object item-text="custom_name" item-value="id"
                                    :items="entries2" :loading="isLoading2" :search-input.sync="search2DPW"
                                    v-model="model2DPW" label="Rekening Tujuan" hide-no-data hide-selected
                                    prepend-icon="mdi-database-search"></v-autocomplete>
                            <v-text-field
                                    @keydown="keyDownTransfer($event)"
                                    @input="currencyTextInputDPW"
                                    v-model="transferTotalDPW"
                                    label="Jumlah yang ditransfer"
                                    clearable
                                >
                                <template v-slot:prepend>
                                    Rp
                                </template>
                            </v-text-field>
                                <div>
                                    Sisa: <span class="font-weight-medium">@{{getCurrency(province.users_count*6000-(province.total_payment_out?parseInt(province.total_payment_out):0)).replace(/,\d+/g, '')}} - </span>
                                    <span :class="'font-weight-medium '+transferTextColor">Rp @{{transferTotalDPW}}</span > = <span :class="'font-weight-medium '+remainingSubPayment.class">@{{remainingSubPayment.value}}</span>
                                </div>
                        </v-tab-item>
                        <v-tab-item>
                        <v-list>
                        <v-list-item v-for="(transaction, i) in transactions" :key="i">
                            <v-list-item-content>
                                <v-list-item-title class="text-wrap">@{{transaction.bank_account_from.name+' '+transaction.payment.necessary.name+' ke '+transaction.bank_account_to.name}}</v-list-item-title>
                                <v-list-item-subtitle>@{{transaction.moment_time}}</v-list-item-subtitle>
                            </v-list-item-content>
                            <v-list-item-action>
                                @{{transaction.payment.value}}
                            </v-list-item-action>
                            </v-list-item>
                        </v-list>
                        </v-tab-item>

                    </v-tabs-items>

                        <!-- <v-text-field label="Main input" hide-details="auto"></v-text-field> -->
                        
                    </v-card-text>

                    <v-divider></v-divider> 

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" @click="submitDPW" :disabled="isSubmitDisable || isLoadingSubmit">
                            Transfer
                        </v-btn>
                    </v-card-actions>
                </v-card>
                </v-dialog>

                <v-dialog v-model="dialogDPD" width="500">
                <v-card>
                    <v-card-title class="headline lighten-2">
                        Transfer ke DPD @{{city.name}}
                    </v-card-title>

                    <v-card-text>
                    
                    
                    <v-tabs
                        centered
                        v-model="tabDPDTransfer"
                        align-with-title
                        >
                        <v-tabs-slider color="primary"></v-tabs-slider>

                        <v-tab>
                            Transfer
                        </v-tab>
                        <v-tab>
                            History
                        </v-tab>
                    </v-tabs>

                    <v-tabs-items v-model="tabDPDTransfer">
                        <v-tab-item>
                            <v-autocomplete class="mt-4"  chips return-object item-text="custom_name" item-value="id"
                                    :items="entries" :loading="isLoading" :search-input.sync="searchDPD"
                                    v-model="modelDPD" label="Rekening Sumber" hide-no-data hide-selected
                                    prepend-icon="mdi-database-search"></v-autocomplete>
                            <v-autocomplete chips return-object item-text="custom_name" item-value="id"
                                    :items="entries2" :loading="isLoading2" :search-input.sync="search2DPD"
                                    v-model="model2DPD" label="Rekening Tujuan" hide-no-data hide-selected
                                    prepend-icon="mdi-database-search"></v-autocomplete>
                            <v-text-field
                                    @keydown="keyDownTransfer($event)"
                                    @input="currencyTextInputDPD"
                                    v-model="transferTotalDPD"
                                    label="Jumlah yang ditransfer"
                                    clearable
                                >
                                <template v-slot:prepend>
                                    Rp
                                </template>
                            </v-text-field>
                                <div>
                                    Sisa: <span class="font-weight-medium">@{{getCurrency(city.users_count*10000-(city.total_payment_out?parseInt(city.total_payment_out):0)).replace(/,\d+/g, '')}} - </span>
                                    <span :class="'font-weight-medium '+transferTextColor">Rp @{{transferTotalDPD}}</span > = <span :class="'font-weight-medium '+remainingSubPayment2.class">@{{remainingSubPayment2.value}}</span>
                                </div>
                        </v-tab-item>
                        <v-tab-item>
                        <v-list>
                        <v-list-item v-for="(transaction, i) in transactions" :key="i">
                            <v-list-item-content>
                                <v-list-item-title class="text-wrap">@{{transaction.bank_account_from.name+' '+transaction.payment.necessary.name+' ke '+transaction.bank_account_to.name}}</v-list-item-title>
                                <v-list-item-subtitle>@{{transaction.moment_time}}</v-list-item-subtitle>
                            </v-list-item-content>
                            <v-list-item-action>
                                @{{transaction.payment.value}}
                            </v-list-item-action>
                            </v-list-item>
                        </v-list>
                        </v-tab-item>

                    </v-tabs-items>

                        <!-- <v-text-field label="Main input" hide-details="auto"></v-text-field> -->
                        
                    </v-card-text>

                    <v-divider></v-divider> 

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" @click="submitDPD" :disabled="isSubmitDisable || isLoadingSubmit">
                            Transfer
                        </v-btn>
                    </v-card-actions>
                </v-card>
                </v-dialog>

            </v-app>

        </div>
        @stop

            @section('javascript')
            <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
            <script type="text/javascript"
                src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
            <script src="https://unpkg.com/http-vue-loader"></script>
            <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"></script>


            <script>
                moment.locale('id');
                window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

                /**
                 * Next we will register the CSRF Token as a common header with Axios so that
                 * all outgoing HTTP requests automatically have it attached. This is just
                 * a simple convenience so we don't have to attach every token manually.
                 */

                let token = document.head.querySelector('meta[name="csrf-token"]');

                if (token) {
                    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
                } else {
                    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
                }
             
                var app = new Vue({
                    vuetify: new Vuetify(),
                    el: '#app',

                    data() {
                        return {
                            province:{
                                id:null,
                                users_count:null,
                                name:null,
                                total_payment_out:null
                            },
                            city:{
                                id:null,
                                province_id:null,
                                users_count:null,
                                name:null,
                                total_payment_out:null
                            },
                            city:{
                                id:null,
                                users_count:null,
                                name:null,
                                total_payment_out:null
                            },
                            switch1: false,
                            transferTotal:'0',
                            transferTotalDPW:'0',
                            transferTotalDPD:'0',
                            model: null,
                            model2:null,
                            modelDPW:null,
                            model2DPW:null,
                            modelDPD:null,
                            model2DPD:null,
                            search: null,
                            search2:null,
                            searchDPW:null,
                            search2DPW:null,
                            searchDPD:null,
                            search2DPD:null,
                            isLoading: false,
                            isLoading2: false,
                            isLoadingSubmit: false,
                            isLoadingHistory: false,
                            entries: [],
                            entries2: [],
                            dialog: false,
                            dialogDPW:false,
                            dialogDPD:false,
                            monthyear: {},
                            route: window.location.hash,
                            tab: 0,
                            tab2: 0,
                            tab3:1,
                            tabDPWTransfer:0,
                            tabDPDTransfer:0,
                            educationallevels: [],
                            educationallevel: {},
                            lessonplanformats: [],
                            paymentDetails: [],
                            paymentDetailsbyMonthYear: [],
                            paymentDetailsbyProvince: [],
                            provincePayments:[],
                            cityPayments:[],
                            transactions:[],
                            loading: {
                                display: false
                            },
                            total_payment_out:0,
                        };
                    },
                    created() {},
                    mounted() {
                        this.goToPayment0();
                        this.getTransactionHistory();
                        this.getValueTransactionsTotal();
                        this.goToSubPayment();
                    },
                    computed: {

                        isSubmitDisable:function(){
                            if(this.getNumber(this.remainingPayment.value)<0)return true;
                            return false;
                        },
                        transferTextColor:function(){
                            let total = 0;
                            this.paymentDetails.forEach((item, v) => {
                                total += 4000 * item.users_count;
                            })
                            return total-this.getNumber(this.transferTotal)<0?'red--text':'';
                        },
                        remainingSubPayment:function(){
                            let total = this.province.users_count? this.province.users_count*6000:0;
                            total -= this.province.total_payment_out?this.province.total_payment_out:0;
                            
                            if(!this.transferTotalDPW)this.transferTotalDPW='0';
                            let remaining=total-this.getNumber(this.transferTotalDPW);
                            console.log('sub. total '+total);
                            console.log('sub. remaining '+remaining);
                            console.log('sub. total_payment_out '+( this.province.total_payment_out));

                            const classHtml=remaining>0?'black--text':'red--text';
                            return {value:this.getCurrency(remaining.toString()), class:classHtml};
                        },
                        remainingSubPayment2:function(){
                            let total = this.city.users_count? this.city.users_count*10000:0;
                            total -= this.city.total_payment_out?this.city.total_payment_out:0;
                            
                            if(!this.transferTotalDPD)this.transferTotalDPD='0';
                            let remaining=total-this.getNumber(this.transferTotalDPD);
                            console.log('sub2. total '+total);
                            console.log('sub2. remaining '+remaining);
                            console.log('sub2. total_payment_out '+( this.city.total_payment_out));

                            const classHtml=remaining>0?'black--text':'red--text';
                            return {value:this.getCurrency(remaining.toString()), class:classHtml};
                        },
                     
                        remainingPayment:function(){
                            let total = 0;
                            this.paymentDetails.forEach((item, v) => {
                                total += 4000 * item.users_count;
                            });
                            total -= this.total_payment_out;

                            if(!this.transferTotal)this.transferTotal='0';
                            let remaining=total-this.getNumber(this.transferTotal);
                            console.log('total '+total);
                            console.log('remaining '+remaining);
                            console.log('total_payment_out '+(this.total_payment_out));

                            const classHtml=remaining>0?'black--text':'red--text';
                            return {value:this.getCurrency(remaining.toString()), class:classHtml};
                        },
                        paymentsTotal:function(){
                          
                            return this.usersCountTotal*4000;
                        },
                        provincePaymentsTotal:function(){
                            return this.provinceUsersCountTotal*6000;
                        },
                        paymentsTotalCurrency: function () {
                            return new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(this.paymentsTotal);
                        },
                        usersCountTotal: function () {
                            let total = 0;
                            this.paymentDetails.forEach((item, v) => {
                                total += item.users_count;
                            });
                            return total;
                        },
                        provinceUsersCountTotal:function(){
                            let total = 0;
                            this.provincePayments.forEach((item, v) => {
                                total += item.users_count;
                            });
                            return total;
                        }
                       
                        
                        

                    },
                    watch: {
                        // transferTotal:function(newVal, oldVal){
                        //     //console.log(newVal)
                        //     //this.transferTotal=new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(newVal);
                        //    // console.log(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(newVal))
                        // },
                        search(newVal, oldVal) {
                            console.log('search')
                            console.log(newVal)
                            this.searchText(newVal);
                        },
                        search2(newVal, oldVal) {
                            console.log('search')
                            console.log(newVal)
                            this.searchText2(newVal);
                        },
                        searchDPW(newVal, oldVal) {
                            console.log('search DPW')
                            console.log(newVal)
                            this.searchText(newVal);
                        },
                        search2DPW(newVal, oldVal) {
                            console.log('search 2 DPW')
                            console.log(newVal)
                            this.searchText2(newVal,{type:'dpw',id:this.province.id});
                        },
                        searchDPD(newVal, oldVal) {
                            console.log('search DPD')
                            console.log(newVal)
                            this.searchText(newVal);
                        },
                        search2DPD(newVal, oldVal) {
                            console.log('search 2 DPD')
                            console.log(newVal)
                            this.searchText2(newVal,{type:'dpd',id:this.city.id});
                        },
                    },
                    methods: {
                        switch1Change(){
                            if(!this.switch1){
                                this.goToSubPayment();
                            }else this.goToPayment0();
                        },
                        submitDPP(){
                            let data={
                                from:this.model,
                                to:this.model2,
                                transfer_value:this.getNumber(this.transferTotal)
                            };
                            this.isLoadingSubmit=true;
                            axios.post('/api/v1/payments/transfer',data).then(res=>{
                                //console.log(res.data)
                                if(res.data.error){
                                    Swal.fire({
                                        title: 'Error',
                                        text: res.data.error,
                                        icon: 'error',
                                    });
                                }else{
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: 'Input sukses',
                                        icon: 'success',
                                    });
                                    this.model=this.model2=null;
                                    this.transferTotal='0';
                                    this.tab2=1;
                                    this.getValueTransactionsTotal();
                                    this.getTransactionHistory();
                                }
                            }).finally(res=>{
                                this.isLoadingSubmit=false;
                             
                            });
                        },
                        submitDPW(){
                            let data={
                                from:this.modelDPW,
                                to:this.model2DPW,
                                transfer_value:this.getNumber(this.transferTotalDPW)
                            };
                            this.isLoadingSubmit=true;
                            axios.post('/api/v1/payments/transfer/dpw',data).then(res=>{
                                //console.log(res.data)
                                if(res.data.error){
                                    Swal.fire({
                                        title: 'Error',
                                        text: res.data.error,
                                        icon: 'error',
                                    });
                                }else{
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: 'Input sukses',
                                        icon: 'success',
                                    });
                                    this.tabDPWTransfer=1;
                                    this.transferTotalDPW='0';
                                    this.modelDPW=this.model2DPW=null;
                                    this.getValueTransactionsTotalDpw();
                                    this.getTransactionHistoryDpw();
                                }
                            }).finally(res=>{
                                this.isLoadingSubmit=false;
                                
                            });
                        },
                        submitDPD(){
                            let data={
                                from:this.modelDPD,
                                to:this.model2DPD,
                                transfer_value:this.getNumber(this.transferTotalDPD)
                            };
                            this.isLoadingSubmit=true;
                            axios.post('/api/v1/payments/transfer/dpd',data).then(res=>{
                                //console.log(res.data)
                                if(res.data.error){
                                    Swal.fire({
                                        title: 'Error',
                                        text: res.data.error,
                                        icon: 'error',
                                    });
                                }else{
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: 'Input sukses',
                                        icon: 'success',
                                    });
                                    this.tabDPDTransfer=1;
                                    this.transferTotalDPD='0';
                                    this.modelDPD=this.model2DPD=null;
                                    this.getValueTransactionsTotalDpd();
                                    this.getTransactionHistoryDpd();
                                }
                            }).finally(res=>{
                                this.isLoadingSubmit=false;
                                
                            });
                        },
                        getNumber(str){
                            
                            if(str==null)return 0;

                            return parseInt(str.trim().replace(/\./g,'').replace(/,\d+/i,'').replace(/rp\s+/i,''));
                        },
                        keyDownTransfer(val){
                            //console.log(val)
                            if(val.key.match(/[^0-9]/) && val.keyCode!==8)val.preventDefault();
                        },
                        currencyTextInput() {
                            if(!this.transferTotal)return;
                            const target=this.transferTotal.trim().replace(/\./g,'');
                            this.transferTotal = (new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(target)).replace(/,\d+/i,'').replace(/rp\s+/i,'');

                        },
                        currencyTextInputDPW() {
                         
                         if(!this.transferTotalDPW)return;
                         const target=this.transferTotalDPW.trim().replace(/\./g,'');
                         this.transferTotalDPW = (new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(target)).replace(/,\d+/i,'').replace(/rp\s+/i,'');

                        },
                        currencyTextInputDPD() {
                         
                         if(!this.transferTotalDPD)return;
                         const target=this.transferTotalDPD.trim().replace(/\./g,'');
                         this.transferTotalDPD = (new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(target)).replace(/,\d+/i,'').replace(/rp\s+/i,'');

                        },
                        getCurrency(str){
                            //if(str==null)return alert('babi');
                            const target=str.toString().trim().replace(/\./g,'').replace(/,\d+/g,'').replace(/rp\s+/i,'');
                            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(target);
                        },
                        searchText:_.debounce(function(val,type={}){
                            if(!val){
                                return;
                            }
                            // Items have already been loaded
                            // if (this.bankAccountItems.length > 0) return

                            // // Items have already been requested
                            // if (this.isLoading) return

                            this.isLoading = true

                            // Lazily load input items
                            let param=type.type+'='+type.id
                            axios.get('/api/v1/bank_account?q=' + val+'&'+param).then(res => {
                                    this.entries = res.data
                                })
                                .catch(err => {
                                    console.log('error')
                                    console.log(err)
                                })
                                .finally(() => {
                                    console.log('model')
                                    console.log(this.model)
                                    this.isLoading = false
                                })
                        }, 500),
                        searchText2:_.debounce(function(val,type={}){
                            if(!val){
                                return;
                            }
                            // Items have already been loaded
                            // if (this.bankAccountItems.length > 0) return

                            // // Items have already been requested
                            // if (this.isLoading) return

                            this.isLoading2 = true

                            // Lazily load input items
                            let param=type.type+'='+type.id
                            axios.get('/api/v1/bank_account?q=' + val+'&'+param).then(res => {
                                    this.entries2 = res.data
                                })
                                .catch(err => {
                                    console.log('error2')
                                    console.log(err)
                                })
                                .finally(() => {
                                    console.log('model2')
                                    console.log(this.model2)
                                    this.isLoading2 = false
                                })
                        }, 500),
                        showTransferDialog() {
                            this.dialog = true;
                            this.getValueTransactionsTotal();
                            this.getTransactionHistory();
                        },
                        showTransferDialogDPW(province) {
                            this.province = {...province, total_payment_out:null};
                            this.getValueTransactionsTotalDpw();
                            this.getTransactionHistoryDpw();
                            axios.get('/api/v1/bank_account?dpw='+province.id).then(res=>{
                                this.entries2 = res.data                                
                            });
                            this.dialogDPW = true;

                        },
                        showTransferDialogDPD(city) {
                            this.city = {...city, total_payment_out:null};
                            this.getValueTransactionsTotalDpd();
                            this.getTransactionHistoryDpd();
                            axios.get('/api/v1/bank_account?dpd='+city.id).then(res=>{
                                this.entries2 = res.data                                
                            });
                            this.dialogDPD = true;

                        },
                        getMonthYearName(month, year) {
                            return moment(new Date(year, month)).format('MMMM YYYY');

                        },
                        getDateString: function (timestamp) {

                            return moment.unix(timestamp).format('MMMM YYYY');
                        },
                        goToPayment0:function(){
                            this.paymentDetails = [];
                            this.isLoading=true;
                            axios.get("/api/v1/payments/bymonthyear?threshold=35000").then(res => {
                                this.paymentDetails = res.data;
                            }).finally(res=>{
                                this.isLoading=false;
                            });
                            this.tab3=0;
                        },
                        goToPayment1: function (paymentDetail) {

                            //this.monthyear.month=moment(new Date(paymentDetail.year,paymentDetail.month-1)).format('MMMM');
                            this.monthyear.month = paymentDetail.month - 1;
                            this.monthyear.year = paymentDetail.year;
                            axios.get(
                                `/api/v1/payments/bymonthyear/${paymentDetail.month}/${paymentDetail.year}?threshold=35000`
                            ).then(res => {
                                this.paymentDetailsbyMonthYear = res.data;
                                console.log(res.data);

                            });
                            this.tab = 1;
                            //window.location='#tab-'+this.tab;

                        },
                        goToPayment2: function (paymentDetail) {

                            this.province = paymentDetail.name;
                            //alert('test')
                            axios.get(
                                `/api/v1/payments/bymonthyear/city/${paymentDetail.id}/${this.monthyear.month+1}/${this.monthyear.year}?threshold=35000`
                            ).then(res => {
                                this.paymentDetailsbyProvince = res.data;
                                console.log(res.data);

                            });
                            this.tab = 2;
                            //window.location='#tab-'+this.tab;

                        },
                        goToSubPayment: function () {

                            //alert('test')
                            this.provincePayments=[]
                            this.isLoading=true;
                            axios.get(
                                `/api/v1/payments/getprovincepayment?threshold=35000`
                            ).then(res => {
                                this.provincePayments = res.data;
                                
                                console.log(res.data);

                            }).finally(res=>{
                                this.isLoading=false;
                            });;
                            this.tab3 = 1;
                            //window.location='#tab-'+this.tab;

                        },
                        goToSubPayment2: function (payment) {
                            //alert('test')
                            this.cityPayments=[]
                            this.isLoading=true;
                            axios.get(
                                `/api/v1/payments/getcitypayment?threshold=35000&province_id=${payment.id}`
                            ).then(res => {
                                this.cityPayments = res.data;
                                
                                console.log(res.data);

                            }).finally(res=>{
                                this.isLoading=false;
                            });;
                            this.tab3 = 2;
                            //window.location='#tab-'+this.tab;
                        },
                        getTransactionHistory(){
                            this.isLoadingHistory = true;
                            axios.get('/api/v1/payments/transfer/history').then(res=>{
                                this.transactions = res.data.map(item=>{
                                    item.moment_time = moment(item.created_at).format("DD MMMM YYYY HH:mm");
                                    item.payment.value = this.getCurrency(item.payment.value).replace(/,\d+/,'');
                                    return item;
                                });
                                console.log(this.transactions)
                            }).finally(res=>{
                                this.isLoadingHistory=false;
                            });
                        },
                        getTransactionHistoryDpw(){
                            this.isLoadingHistory = true;
                            axios.get('/api/v1/payments/transfer/history/dpw/'+this.province.id).then(res=>{
                                this.transactions = res.data.map(item=>{
                                    item.moment_time = moment(item.created_at).format("DD MMMM YYYY HH:mm");
                                    item.payment.value = this.getCurrency(item.payment.value).replace(/,\d+/,'');
                                    return item;
                                });
                                console.log(this.transactions)
                            }).finally(res=>{
                                this.isLoadingHistory=false;
                            });
                        },
                        getTransactionHistoryDpd(){
                            this.isLoadingHistory = true;
                            axios.get('/api/v1/payments/transfer/history/dpd/'+this.city.id).then(res=>{
                                this.transactions = res.data.map(item=>{
                                    item.moment_time = moment(item.created_at).format("DD MMMM YYYY HH:mm");
                                    item.payment.value = this.getCurrency(item.payment.value).replace(/,\d+/,'');
                                    return item;
                                });
                                console.log(this.transactions)
                            }).finally(res=>{
                                this.isLoadingHistory=false;
                            });
                        },
                        getValueTransactionsTotal(){
                            axios.get('/api/v1/payments/getvaluetransactionstotal').then(res=>{
                                if(res.data.total_payment_out)this.total_payment_out=parseInt(res.data.total_payment_out);
                            }).finally(res=>{
                                //this.isLoadingHistory=false;
                            });
                        },
                        getValueTransactionsTotalDpw(){
                            axios.get('/api/v1/payments/getvaluetransactionstotaldpw/'+this.province.id).then(res=>{
                                if(res.data.total_payment_out)this.province.total_payment_out=parseInt(res.data.total_payment_out);
                            }).finally(res=>{
                                //this.isLoadingHistory=false;
                            });
                        },
                        getValueTransactionsTotalDpd(){
                            axios.get('/api/v1/payments/getvaluetransactionstotaldpd/'+this.city.id).then(res=>{
                                if(res.data.total_payment_out)this.city.total_payment_out=parseInt(res.data.total_payment_out);
                            }).finally(res=>{
                                //this.isLoadingHistory=false;
                            });
                        }


                    }
                })

            </script>
            @stop
