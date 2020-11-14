<template>
<v-app>
    <v-container>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-row>
                <v-col cols="4">
                    <v-text-field v-model="questionnary.name" :rules="[v => !!v || 'Nama survey harus diisi']" label="Nama survey" required></v-text-field>
                    <v-textarea v-model="questionnary.description" :rules="[v => !!v || 'Deskripsi survey harus diisi']" label="Deskripsi survey" required></v-textarea>

                    <v-menu ref="menu" v-model="menu" :close-on-content-click="false" :return-value.sync="questionnary.start_at" transition="scale-transition" offset-y min-width="290px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field v-model="questionnary.start_at" label="Tanggal mulai survey" prepend-icon="event" readonly v-bind="attrs" v-on="on"></v-text-field>
                        </template>
                        <v-date-picker v-model="date" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu.save(date)">OK</v-btn>
                        </v-date-picker>
                    </v-menu>

                    <v-menu ref="menu1" v-model="menu1" :close-on-content-click="false" :return-value.sync="questionnary.end_at" transition="scale-transition" offset-y min-width="290px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field v-model="questionnary.end_at" label="Tanggal selesai survey" prepend-icon="event" readonly v-bind="attrs" v-on="on"></v-text-field>
                        </template>
                        <v-date-picker v-model="date" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu1.save(date)">OK</v-btn>
                        </v-date-picker>
                    </v-menu>
                    <v-switch v-model="questionnary.is_active" :label="questionnary.is_active?'Aktif seketika ketika disubmit':'Non Aktif'"></v-switch>

                    <v-btn color="primary" large @click="submitSurvey" :disabled="loading">Submit Survey</v-btn>
                </v-col>
                <v-col cols="8">
                    <v-expansion-panels multiple v-model="panels">
                        <v-expansion-panel v-for="(question_list,i) in questionnary.question_lists" :key="i">
                            <v-expansion-panel-header>Pertanyaan #{{i+1}}</v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-text-field v-model="question_list.name" label="Pertanyaan" placeholder="Tulis pertanyaan Anda di sini" outlined append-outer-icon="mdi-close" @click:append-outer="removeQuestionList(i)"></v-text-field>
                                <v-row>
                                    <v-col>
                                        Jawaban
                                    </v-col>
                                </v-row>
                                <div v-for="(answer_list, n) in question_list.answer_lists" :key="`answer${n}`">
                                    <v-text-field v-model="answer_list.name" v-if="n<2" class="ml-6" placeholder="Tulis pilihan jawaban" :label="`Jawaban #${n+1}`" outlined></v-text-field>
                                    <v-text-field v-model="answer_list.name" v-else class="ml-6" placeholder="Tulis pilihan jawaban" :label="`Jawaban #${n+1}`" outlined append-outer-icon="mdi-close" @click:append-outer="removeAnswerList(i,n)"></v-text-field>
                                </div>
                                <div class="justify-end d-flex">
                                    <v-btn @click="addAnswerList(i)">Tambah Jawaban</v-btn>

                                </div>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </v-expansion-panels>
                    <div class="justify-end d-flex mt-2">
                        <v-btn @click="addQuestionList(1)">Tambah Pertanyaan</v-btn>
                    </div>
                </v-col>
            </v-row>
        </v-form>
    </v-container>
</v-app>
</template>

<script>
export default {
    props: {

    },
    components: {
        //downloadExcel: JsonExcel,
        //userEdit: UserEdit
    },
    data() {
        return {
            loading: false,
            panels: [],
            date: new Date().toISOString().substr(0, 10),
            menu: false,
            menu1: false,
            modal: false,
            menu2: false,
            valid: true,
            loading: false,
            questionnary: {
                name: null,
                is_active: false,
                description: null,
                start_at: new Date().toISOString().substr(0, 10),
                end_at: new Date().toISOString().substr(0, 10),
                is_active: false,
                question_lists: [{
                    name: '',
                    answer_lists: [{
                            name: ''
                        },
                        {
                            name: ''
                        }
                    ]
                }]
            }
        };
    },
    mounted() {

    },

    methods: {
        addAnswerList(question_list_index) {
            //let current = this.questionnary.question_lists[question_list_index].answer_lists.length + 1
            this.questionnary.question_lists[question_list_index].answer_lists.push({
                name: ''
            })
        },
        addQuestionList() {
            this.questionnary.question_lists.push({
                name: '',
                answer_lists: [{
                        name: ''
                    },
                    {
                        name: ''
                    }
                ]
            });
            //console.log(this.panels)
            this.panels.push(this.questionnary.question_lists.length - 1);
        },
        removeAnswerList(question_list_index, answer_list_index) {
            this.questionnary.question_lists[question_list_index].answer_lists.splice(answer_list_index, 1);
        },
        removeQuestionList(question_list_index) {
            if (this.questionnary.question_lists.length == 1) {
                this.$swal.fire({
                    title: 'Tidak bisa menghapus',
                    text: 'Survey harus memiliki minimal 1 pertanyaan',
                    icon: 'warning',
                })
            } else {
                this.$swal.fire({
                    title: 'Are you sure?',
                    text: "Hapus pertanyaan ini dari survey?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.questionnary.question_lists.splice(question_list_index, 1);

                    }
                })
            }
        },
        resetForm() {
            this.panels = [];
            this.questionnary = {
                name: null,
                description: null,
                start_at: new Date().toISOString().substr(0, 10),
                end_at: new Date().toISOString().substr(0, 10),
                is_active: false,
                question_lists: [{
                    name: '',
                    answer_lists: [{
                            name: ''
                        },
                        {
                            name: ''
                        }
                    ]
                }]
            }
        },
        submitSurvey() {
            if (this.$refs.form.validate()) {
                this.panels = [];
                this.questionnary.question_lists.forEach((v, k) => {
                    if (!v.name || v.answer_lists.find(item => item.name == '')) {
                        this.panels.push(k)
                    }
                })
                if (this.panels.length == 0) {
                    this.$swal.fire({
                        title: 'Submit survey?',
                        text: "Pastikan semua data yang dimasukkan sudah benar!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, submit!',
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            this.loading = true;
                            return this.$store.dispatch("submitQuestionnary", this.questionnary).then(res => {
                                this.loading = false;
                                this.resetForm();
                                return res;
                            }).catch(err => {
                                Swal.showValidationMessage(
                                    `Request failed: ${error}`
                                )
                            });
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.$swal.fire({
                                title: 'Sukses tambah survey',
                                text: 'Survey yang telah dibuat dapat dilihat di menu Home',
                                icon: 'success',
                            })
                        }
                    })

                } else {
                    this.$swal.fire({
                        title: 'Pastikan semua data terisi',
                        text: 'Semua pertanyaan dan jawaban tidak boleh kosong!',
                        icon: 'warning',
                    })

                }
            }

        }
    }
};
</script>
