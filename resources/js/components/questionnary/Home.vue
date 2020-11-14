<template>
<v-app>
    <v-container>
        <v-row>
            <v-col cols="6">
                <v-combobox v-model="select" :items="items" label="Pilih kuesioner" @change="getData" :append-icon="select?'edit':''" @click:append="editSurvey()"></v-combobox>
            </v-col>
            <v-col cols="2">
                <v-btn v-if="select && !loading" @click="download(1)">Download excel</v-btn>
            </v-col>
            <v-col cols="2">
                <v-btn v-if="select && !loading" @click="download(2)">Download excel 2</v-btn>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="6">

                <v-dialog v-model="dialog" width="500" v-if="select">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn color="red lighten-2" dark v-bind="attrs" v-on="on">
                            Filter Data
                        </v-btn>
                    </template>

                    <v-card>
                        <v-card-title class="">
                            Filter data
                        </v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col cols="3">
                                    Rentang umur
                                </v-col>
                                <v-col>
                                    <v-range-slider dense :thumb-size="24" thumb-label="always" v-model="filter_options.age_range" min="0" max="100"></v-range-slider>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="3">
                                    Jenis kelamin
                                </v-col>
                                <v-col>

                                    <v-radio-group dense v-model="filter_options.gender" row>
                                        <v-radio size="24px" label="Semua" value="-"></v-radio>
                                        <v-radio label="Laki-laki" value="L"></v-radio>
                                        <v-radio label="Perempuan" value="P"></v-radio>
                                    </v-radio-group>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="3">
                                    Status guru
                                </v-col>
                                <v-col>
                                    <v-radio-group dense v-model="filter_options.is_pns" row>
                                        <v-radio dense label="Semua" value="-"></v-radio>
                                        <v-radio dense label="PNS" value="1"></v-radio>
                                        <v-radio dense label="Non-PNS" value="0"></v-radio>
                                    </v-radio-group>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="3">
                                    Status sekolah
                                </v-col>
                                <v-col>
                                    <v-radio-group dense v-model="filter_options.school_status" row>
                                        <v-radio label="Semua" value="-"></v-radio>
                                        <v-radio label="Negeri" value="1"></v-radio>
                                        <v-radio label="Swasta" value="0"></v-radio>
                                    </v-radio-group>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="4">
                                    Jenjang yang diajar
                                </v-col>
                                <v-col>
                                    <v-combobox v-model="filter_options.educational_level" item-text="name" item-value="id" :items="educational_level_options" label="Jenjang yang diajar" outlined dense></v-combobox>

                                </v-col>
                            </v-row>

                        </v-card-text>
                        <v-progress-linear indeterminate v-if="loading"></v-progress-linear>
                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="primary" :disabled="loading" text @click="filterData">
                                Filter data
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

            </v-col>
        </v-row>
        <v-row>
            <v-col offset-md="4" cols='8' v-for="(question, n) in data" :key="n">
                {{n+1}}. {{question.name}}
                <apexchart width="500" type="pie" :options="itemChart[n].chartOptions" :series="itemChart[n].series"></apexchart>

            </v-col>
        </v-row>
    </v-container>

</v-app>
</template>

<script>
export default {
    props: {
        educationalLevels: null
    },
    components: {
        //downloadExcel: JsonExcel,
        //userEdit: UserEdit
    },
    data() {
        return {
            loading: false,
            data: [],
            itemChart: [],
            series: [44, 55, 13, 43, 22],
            select: null,
            dialog: false,
            items: [

            ],
            filter_options: {
                age_range: [0, 100],
                gender: '-',
                is_pns: '-',
                school_status: '-',
                educational_level: '-'
            },
            educational_level_options: [

            ]

        };
    },
    mounted() {
        this.educational_level_options = [{
            name: 'Semua',
            id: '-1'
        }, ...this.educationalLevels]
        this.filter_options.educational_level = this.educational_level_options[0]
        //this.getData();
        axios.get('/getquestionnaries').then(res => {
            res.data.forEach(v => {
                this.items.push({
                    text: v.name + ' (' + v.sessions_count + ' partisipan)',
                    value: v.id
                })
            })
        })
        // this.getUser();
        // this.getProvince();
    },

    methods: {
        createChart: function (data) {
            this.itemChart = [];
            data.forEach((v, k) => {
                let series = []
                let labels = []
                v.answer_lists.forEach((v2, k2) => {
                    labels.push(v2.name);
                    series.push(v2.answers_count);
                })
                let chart = {
                    series: series,
                    chartOptions: {
                        chart: {
                            type: 'pie',
                        },
                        labels: labels,
                        legend: {
                            horizontalAlign: 'center',
                            show: true,
                            position: 'bottom'

                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    }
                }
                this.itemChart.push(chart)
            })
        },
        download: function (val = 1) {
            console.log(this.select)
            window.location = "/questionnary/download" + val + "/" + this.select.value
        },
        filterData: function () {
            this.loading = true
            if (!this.select.value) return;
            console.log(this.filter_options)
            // return;
            //alert(this.loading)
            //this.itemChart = []
            axios.post('/questionnary/filter_data/' + this.select.value, this.filter_options).then(res => {
                console.log('asu')
                console.log(this.loading)

                this.data = res.data;
                this.dialog = false;

                this.createChart(res.data);
                console.log(res.data);
                this.loading = false;

            });
        },
        getData: function () {

            if (!this.select.value) return;
            this.loading = true;
            axios.post('/questionnary/data/' + this.select.value).then(res => {
                this.data = res.data;

                this.createChart(res.data)
                this.loading = false;
            });
        },
        editSurvey: function () {
            alert('as')
        }
    }
};
</script>
