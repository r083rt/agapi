<template>
  <div>
    <ul class="info-list" v-if="user.user_activated_at == null">
      <li>
        <span class="title">Maaf</span>
        <span class="value">Akun anda belum aktif. Silahkan melakukan pembayaran</span>
      </li>
    </ul>
    <ul class="info-list" v-else>
      <li>
        <span class="title">NIK</span>
      </li>
      <li>
        <span class="value">{{ user.profile.nik ? user.profile.nik : 'Kosong' }}</span>
      </li>
      <li>
        <span class="title">Tanggal Lahir</span>
      </li>
      <li v-if="user.profile.birthdate">
        <span class="value">{{ getIndoDate(new Date(user.profile.birthdate)) }}</span>
      </li>
      <li v-else>
        <span class="value">Kosong</span>
      </li>
      <li>
        <span class="title">Alamat</span>
      </li>
      <li>
        <span class="value">{{ user.profile.home_address ? user.profile.home_address : 'Kosong' }}</span>
      </li>
      <li>
        <span class="title">Asal Sekolah</span>
      </li>
      <li>
        <span class="value">
          {{ user.profile.school_place ? `${user.profile.school_place}` : 'Kosong' }}
          <br />
          {{ `${user.profile.district ? user.profile.district.name : ''} ${user.profile.city ? user.profile.city.name : ''} ${user.profile.province ? user.profile.province.name : ''}` }}
        </span>
      </li>
      <li>
        <span class="title">e-mail</span>
      </li>
      <li>
        <span class="value">{{ user.email ? user.email : 'Kosong' }}</span>
      </li>
      <li>
        <span class="title">No HP</span>
      </li>
      <li>
        <span class="value">{{ user.profile.contact ? user.profile.contact : 'Kosong' }}</span>
      </li>
      <li>
        <span class="title"></span>
        <span class="value">
          <v-btn flat icon @click="edit">
            <v-icon>edit</v-icon>
          </v-btn>
        </span>
      </li>
    </ul>

    <!-- form edit -->
    <v-layout row justify-center>
      <v-dialog v-model="form.edit" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">User Profile</span>
          </v-card-title>
          <v-card-text>
            <v-container grid-list-md>
              <v-form ref="form" lazy-validation>
                <v-layout wrap>
                  <v-flex xs12>
                    <v-text-field v-model="user.name" label="Nama" type="text" :rules="form.rules"></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-select
                      v-model="user.profile.educational_level_id"
                      label="Jenjang Pendidikan"
                      :rules="form.rules"
                      :items="form.educationallevels"
                      item-text="name"
                      item-value="id"
                    ></v-select>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field
                      v-model="user.profile.nik"
                      label="NIK"
                      type="number"
                      :rules="form.rules"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-dialog
                      ref="birthdate"
                      v-model="form.date"
                      :return-value.sync="user.profile.birthdate"
                      persistent
                      lazy
                      full-width
                      width="290px"
                    >
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          label="Tanggal Lahir"
                          v-model="user.profile.birthdate"
                          readonly
                          v-on="on"
                          :rules="form.rules"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="user.profile.birthdate" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn flat color="primary" @click="form.calendar = false">Cancel</v-btn>
                        <v-btn
                          flat
                          color="primary"
                          @click="$refs.birthdate.save(user.profile.birthdate)"
                        >OK</v-btn>
                      </v-date-picker>
                    </v-dialog>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field
                      v-model="user.profile.home_address"
                      label="Alamat"
                      :rules="form.rules"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field
                      v-model="user.profile.contact"
                      label="No Hp"
                      type="number"
                      :rules="form.rules"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field
                      v-model="user.profile.school_place"
                      label="Asal Sekolah/ Instansi"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-alert :value="true" type="info">Lokasi Sekolah/ Instansi</v-alert>
                  </v-flex>
                  <v-flex xs4>
                    <v-autocomplete
                      :items="form.provinces"
                      label="Provinsi"
                      item-value="id"
                      item-text="name"
                      v-model="user.profile.province_id"
                      :rules="form.rules"
                      @input="getCities"
                    ></v-autocomplete>
                  </v-flex>
                  <v-flex xs4>
                    <v-autocomplete
                      :items="form.cities"
                      label="Kab./Kota"
                      item-value="id"
                      item-text="name"
                      v-model="user.profile.city_id"
                      :rules="form.rules"
                      @input="getDistricts"
                    ></v-autocomplete>
                  </v-flex>
                  <v-flex xs4>
                    <v-autocomplete
                      :items="form.districts"
                      label="Kecamatan"
                      item-value="id"
                      item-text="name"
                      :rules="form.rules"
                      v-model="user.profile.district_id"
                    ></v-autocomplete>
                  </v-flex>
                  <v-flex xs12>
                    <v-alert
                      :value="true"
                      type="warning"
                    >Password dikosongkan jika tidak mau mengganti</v-alert>
                  </v-flex>
                  <v-flex xs12>
                    <v-layout row wrap>
                      <v-flex xs6>
                        <v-text-field
                          label="Password Lama"
                          type="password"
                          v-model="user.old_password"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          label="Password Baru"
                          type="password"
                          v-model="user.new_password"
                        ></v-text-field>
                      </v-flex>
                    </v-layout>
                  </v-flex>
                </v-layout>
              </v-form>
            </v-container>
            <small>*indicates required field</small>
          </v-card-text>
          <v-card-actions>
            <v-btn color="blue darken-1" flat @click="form.edit = false">Close</v-btn>
            <v-spacer></v-spacer>
            <v-btn
              color="blue darken-1"
              flat
              @click="update"
              :loading="form.loading"
              :disabled="form.loading"
            >Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-layout>
    <!-- end form edit -->

    <!-- snackbar -->
    <v-snackbar bottom v-model="snackbar.display" multi-line>
      {{ snackbar.text }}
      <v-btn color="pink" flat @click="snackbar.display = false">Close</v-btn>
    </v-snackbar>
    <!-- end snackbar -->
  </div>
</template>

<script>
import { User, Profile } from "../../objects.js";
export default {
  data() {
    return {
      user: new User(),
      form: {
        edit: false,
        calendar: false,
        date: false,
        loading: false,
        provinces: [],
        cities: [],
        districts: [],
        rules: [v => !!v || "Harus Diisi"],
        educationallevels:[]
      },
      snackbar: {
        display: false,
        text: ""
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
    axios.get("/api/user").then(res => {
      this.user = res.data;
      if (res.data.profile != null) {
        this.getCities();
        this.getDistricts();
        if(this.user.kta_id == null){
          this.update();
        }
      } else {
        this.user.profile = new Profile();
      }

    });

    axios.get("/api/v1/province").then(res => {
      this.form.provinces = res.data;
    });

    this.getEducationalLevel()
  },
  methods: {
    edit: function() {
      this.form.edit = true
    },
    update: function() {
      if (true) {
        this.form.loading = true
        axios.put(`/api/v1/user/${this.user.id}`, this.user).then(
          res => {
            this.$parent.$parent.user = this.user = res.data
            this.$parent.$parent.$refs.printCard.getUser()
            this.form.edit = false
            this.form.loading = false
            this.snackbar.text = "Berhasil update user.profile"
            this.snackbar.display = true
          },
          err => {
            this.form.edit = false
            this.form.loading = false
          }
        );
      }
    },
    getCities: function() {
      this.form.districts = []
      this.form.cities = []
      axios
        .get(`/api/v1/province/${this.user.profile.province_id}`)
        .then(res => {
          this.form.cities = res.data.cities
        });
    },
    getEducationalLevel(){
      axios.get(`/api/v1/educationallevel`).then(res=>{
        this.form.educationallevels = [...res.data]
      }).catch(err=>{

      })
    },
    getDistricts: function() {
      axios.get(`/api/v1/city/${this.user.profile.city_id}`).then(res => {
        this.form.districts = res.data.districts
      });
    },
    getIndoDate: function(dt) {
      let mlist = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
      ];
      return dt.getDate() + " " + mlist[dt.getMonth()] + " " + dt.getFullYear()
    }
  }
};
</script>
