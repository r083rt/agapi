<template>
  <v-app>
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
                  <h1 class="educationallevel">{{ educationallevel.name }}</h1>
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
        >Format RPP untuk Jenjang {{ educationallevel.name }}</v-card-title>

        <v-card-text>
          <v-btn color="success" @click="addLessonPlanFormat">
            <v-icon>add</v-icon>Tambah
          </v-btn>
          <v-container grid-list-xs>
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
                      >{{ lessonplanformat.name }}</v-text-field>
                    </v-flex>
                    <v-flex xs1>
                      <v-btn color="error" icon @click="removeLessonPlanFormat(lpf)">
                        <v-icon>delete</v-icon>
                      </v-btn>
                    </v-flex>
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
            flat
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
  </v-app>
</template>

<script>
import Swal from "sweetalert2";
export default {
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
};
</script>
<style>
@import url("https://fonts.googleapis.com/css?family=Caveat+Brush&display=swap");
.educationallevel {
  font-family: "Caveat Brush", cursive;
}
</style>
