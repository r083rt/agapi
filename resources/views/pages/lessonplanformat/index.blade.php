@extends('voyager::master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
<style>
  .flex{
    border: none
  }
</style>
@stop

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> Halaman Format RPP
        </h1>
    </div>
@stop

@section('content')
	<div class="page-content container-fluid">
		<v-app id="app">
		<v-container grid-list-xs>
      <v-layout row wrap>
        <v-flex md3 v-for="(educationallevel,el) in educationallevels" :key="el" pa-1>
          <v-card
            width="270px"
            height="270px"
            style="background-image:url(/img/cover.jpg);background-size:cover"
            ripple
            @click="getEducationalLevel(educationallevel)"
          >
            <v-card-text style="height:100%">
              <v-container grid-list-xs full-height style="height:100%">
                <v-layout fill-height align-center justify-center>
                  <h1 class="educationallevel">@{{ educationallevel.name }}</h1>
                </v-layout>
              </v-container>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
    <v-dialog v-model="dialog.display" width="500">
      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >Format RPP untuk Jenjang @{{ educationallevel.name }}</v-card-title>

        <v-card-text>
          <v-container grid-list-xs>
            <v-layout row wrap>
                <v-btn color="success" @click="addLessonPlanFormat">
                  <v-icon>add</v-icon>Tambah
                </v-btn>
            </v-layout>
            <v-layout row wrap>
              <v-flex xs12 v-for="(lessonplanformat,lpf) in lessonplanformats" :key="`lpf${lpf}`">
                <v-form style="width:100%">
                  <v-layout row wrap>
                    <v-flex xs11>
                      <v-text-field
                        name="Point"
                        :label="lessonplanformat.name"
                        id="id"
                        placeholder="Point Baru"
                        v-model="lessonplanformat.name"
                      >@{{ lessonplanformat.name }}</v-text-field>
                    </v-flex>
                    <v-flex xs1>
                      <v-btn color="error" icon @click="removeLessonPlanFormat(lpf)">
                        <v-icon>delete</v-icon>
                      </v-btn>
                    </v-flex >			
                  </v-layout>
                </v-form>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            :loading="dialog.loading"
            :disabled="dialog.loading"
            text
            @click="updateEducationalLevel"
          >Perbarui</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- loading -->
    <v-dialog v-model="loading.display" hide-overlay persistent width="300">
      <v-card color="primary" dark>
        <v-card-text>
          Please stand by
          <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>

	<!-- loading -->
    <v-dialog v-model="loading.display" hide-overlay persistent width="300">
      <v-card color="primary" dark>
        <v-card-text>
          Please stand by
          <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-app>
</template>

@stop

@section('javascript')
	<script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
	<script type="text/javascript" src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
	<script>
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
      educationallevels: [],
      educationallevel: {},
      lessonplanformats: [],
      dialog: {
        loading: false,
        display: false
      },
      loading: {
        display: false
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
    axios.get("/api/v1/educationallevel").then(res => {
      this.educationallevels = res.data;
    });
  },
  methods: {
    getEducationalLevel: function(educationallevel) {
      this.educationallevel = educationallevel;
      this.lessonplanformats = this.educationallevel.lesson_plan_formats;
      this.dialog.display = true;
    },
    addLessonPlanFormat: function() {
      this.lessonplanformats.push({ name: "" });
    },
    removeLessonPlanFormat: function(key) {
      this.$delete(this.lessonplanformats, key);
    },
    updateEducationalLevel: function() {
      this.dialog.loading = true;
      this.educationallevel.lesson_plan_formats = this.lessonplanformats;
      let access = {
        _method: "put",
        ...this.educationallevel
      };
      axios
        .post(`/api/v1/educationallevel/${this.educationallevel.id}`, access)
        .then(res => {
          this.dialog.loading = false;
          this.dialog.display = false;
          Swal.fire(
            "Okay",
            `Format RPP ${this.educationallevel.name} Berhasil Diperbarui`,
            "success"
          );
        });
	}
}
		})
	</script>
@stop