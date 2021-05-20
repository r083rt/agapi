@extends('voyager::master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
@stop

    @section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-receipt"></i> SPK Topsis Paket Soal
        </h1>
    </div>
    @stop

        @section('content')
        <div id="app">
            <v-app id="inspire">
                <v-main>
                    <v-data-table item-key="id"
                        :loading="loading" :headers="headers" :items="items" class="elevation-1" :search="search">
                        <template v-slot:top>
                            <v-text-field v-model="search" label="Cari" class="mx-4"></v-text-field>
                        </template>
                      

                    </v-data-table>
                </v-main>
            </v-app>

        </div>
        @stop

            @section('javascript')
            <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

            <script>
                new Vue({
                    el: '#app',
                    vuetify: new Vuetify(),
                    data() {
                        return {
                            search: '',
                            totalItems: 0,
                            loading: false,
                            test: 'rieqy',
                            options: {},
                            items: [],
                            headers: [{
                                    text: '#',
                                    sortable: true,
                                    value: 'id',
                                },
                                {
                                    text: 'Pembuat paket soal',
                                    value: 'user_name',
                                },
                                {
                                    text: 'Kelas',
                                    value: 'grade',
                                },
                                {
                                    text: 'Jenis',
                                    value: 'name',
                                },
                                {
                                    text: 'Jumlah dikerjakan',
                                    sortable: true,
                                    value: 'scores_count',
                                },
                                {
                                    text: 'Std',
                                    value: 'score',
                                },
                                {
                                    text: 'Skor',
                                    value: 'preference_score',
                                },
                                {
                                    text: 'Dibuat',
                                    value: 'created_at',
                                }
                            ]
                        }
                    },
                    // watch: {
                    //     options: {
                    //         handler(val) {
                    //             console.log('options:', val);
                    //             this.getDataFromApi()
                    //         },
                    //         deep: true,
                    //     },
                    // },
                    methods: {
                        getDataFromApi() {
                            this.loading = true;
                         
                            axios.get("/admin/api/topsis/question_package_analytic").then(res => {
                                // console.log(res.data);
                              
                                this.items = res.data
                                this.loading = false;
                            }).finally(() => {

                            });
                        }
                    },
                    mounted() {
                        this.getDataFromApi();
                        // this.loading = true;
                        // axios.get("/testgan").then(res => {
                        //     console.log(res.data);
                        //     this.items = res.data.data
                        // }).finally(() => {
                        //     this.loading = false;
                        // });
                    }
                })

            </script>
            @stop
