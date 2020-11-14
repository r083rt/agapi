<template>
  <div>
    <v-tabs fixed-tabs>
      <v-tab key="as_guest">
        <v-icon>fingerprint</v-icon>
      </v-tab>
      <v-tab key="as_event">
        <v-icon>event_note</v-icon>
      </v-tab>
      <v-tab key="as_paid">
        <v-icon>card_membership</v-icon>
      </v-tab>
      <v-tab-item key="as_guest">
        <v-subheader>Partisipasi Kegiatan</v-subheader>
        <div v-for="(guest_event,ge) in user.guest_events" :key="guest_event.id">
          <v-divider v-if="ge != 0"></v-divider>
          <v-card flat>
            <v-container grid-list-xs>
              <v-layout row wrap align-center>
                <v-flex xs2>
                  <v-icon>starr_border</v-icon>
                </v-flex>
                <v-flex xs10 style="overflow-wrap:break-word">
                  <h4>{{ guest_event.name }}</h4>
                  <div
                    class="caption grey--text"
                  >{{ moment(guest_event.pivot.created_at).format('LLLL') || 'Kosong' }}</div>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card>
        </div>
      </v-tab-item>
      <v-tab-item key="as_event">
        <v-subheader>
          Kegiatan Anda
          <v-spacer></v-spacer>
          <v-btn icon flat small @click="createEvent">
            <v-icon>add</v-icon>
          </v-btn>
        </v-subheader>
        <div v-for="(event, e) in user.events" :key="event.id">
          <v-divider v-if="e != 0"></v-divider>
          <v-card flat>
            <v-container grid-list-xs>
              <v-layout row wrap align-center>
                <v-flex xs2>
                  <v-icon>calendar_today</v-icon>
                </v-flex>
                <v-flex xs8 style="overflow-wrap:break-word">
                  <h4>{{ event.name }}</h4>
                  <div
                    class="caption grey--text"
                  >{{ moment(event.created_at).format('LLLL') || 'Kosong' }}</div>
                </v-flex>
                <v-flex xs2>
                  <v-btn icon ripple @click="openScanner(event)">
                    <v-icon>center_focus_strong</v-icon>
                  </v-btn>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card>
        </div>
      </v-tab-item>
      <v-tab-item key="as_paid">
        <v-list three-line>
          <v-subheader>Partisipasi Iuran</v-subheader>
          <template v-for="(payment, p) in user.payments">
            <v-divider v-if="p != 0" :key="payment.id"></v-divider>

            <v-list-tile avatar :key="payment.id">
              <v-list-tile-avatar>
                <v-icon>attach_money</v-icon>
              </v-list-tile-avatar>

              <v-list-tile-content>
                <v-list-tile-title>
                  Rp.{{ payment.value.toLocaleString() }}
                  <v-spacer></v-spacer>
                  {{ payment.status }}
                </v-list-tile-title>
                <v-list-tile-sub-title>{{ payment.updated_at || payment.created_at }}</v-list-tile-sub-title>
              </v-list-tile-content>
            </v-list-tile>
          </template>
        </v-list>
      </v-tab-item>
    </v-tabs>

    <!-- Dialog create event -->
    <v-dialog fullscreen v-model="form.event.create.display" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline">Buat Absensi Kegiatan</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-form ref="createEvent" v-model="form.event.create.valid" lazy-validation>
              <v-layout wrap>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    label="Nama Acara*"
                    required
                    v-model="event.name"
                    :rules="form.rules.common"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-textarea
                    label="Deskripsi Acara"
                    required
                    v-model="event.description"
                    :rules="form.rules.common"
                  ></v-textarea>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-datetime-picker label="Tanggal/ Jam Acara" v-model="event.start_at"></v-datetime-picker>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-textarea
                    label="Tempat dan Alamat Acara*"
                    required
                    v-model="event.address"
                    :rules="form.rules.common"
                  ></v-textarea>
                </v-flex>
              </v-layout>
            </v-form>
          </v-container>
          <small>*indikasi harus diisi</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click="form.event.create.display = false">Close</v-btn>
          <v-btn
            color="blue darken-1"
            flat
            @click="storeEvent"
            :loading="form.event.create.loading"
            :disabled="form.event.create.loading"
          >Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <!-- End Dialog Create Event -->

    <!-- Dialog Scanner -->
    <v-dialog
      v-model="dialog.scanner.display"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <v-card>
        <v-card-title style="background-color:#2ECA7F" class="headline white--text" primary-title>
          Scanner Kehadiran
          <v-spacer></v-spacer>
          <v-btn flat icon @click="closeScanner">
            <v-icon x-large color="white">close</v-icon>
          </v-btn>
        </v-card-title>

        <v-card-text>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <video id="preview" style="width:100%" ref="preview"></video>
            </div>
            <div class="col-md-6">
              <v-chip outline>
                <v-icon left>camera_alt</v-icon>Ganti Kamera
              </v-chip>
              <v-select
                :items="cameras"
                v-model="camera"
                label="Pilih Kamera"
                return-object
                item-text="name"
                item-value="id"
                @input="changeCamera"
              ></v-select>

              <v-subheader>
                {{ event.name }}
                -
                {{ new Date(event.start_at).toLocaleString() }}
              </v-subheader>

              <v-subheader>Daftar Peserta Hadir</v-subheader>
              <v-list>
                <v-list-tile avatar v-for="user in event.users" :key="user.id">
                  <v-list-tile-avatar>
                    <img :src="`/storage/${user.avatar}`" />
                  </v-list-tile-avatar>
                  <v-list-tile-content>
                    <v-list-tile-title>{{ user.name }} - {{ new Date(user.pivot.created_at).toLocaleString() }}</v-list-tile-title>
                    <v-list-tile-sub-title>Na. {{ user.kta_id == null ? 'Kosong' : user.kta_id }}</v-list-tile-sub-title>
                  </v-list-tile-content>
                </v-list-tile>
              </v-list>
            </div>
          </div>
        </v-card-text>
      </v-card>
    </v-dialog>
    <!-- End Dialog Scanner -->
  </div>
</template>

<script>
import { Event } from "./../../../objects";
import DatetimePicker from "vuetify-datetime-picker";
import "vuetify-datetime-picker/src/stylus/main.styl";
Vue.use(DatetimePicker);
import Swal from "sweetalert2";
import moment from "moment";
moment.locale("id");
export default {
  props: {
    user: {}
  },
  data() {
    return {
      event: new Event(),
      sound: "Ding",
      cameras: [],
      camera: null,
      scanner: null,
      dialog: {
        guest_list: {
          display: false,
          users: []
        },
        scanner: {
          display: false
        }
      },
      form: {
        rules: {
          common: [v => !!v || "Harus Diisi"]
        },
        event: {
          create: {
            valid: true,
            display: false,
            loading: false
          }
        }
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    moment,
    createEvent: function() {
      this.event = { start_at: new Date() };
      this.form.event.create.display = true;
    },
    storeEvent: function() {
      if (this.$refs.createEvent.validate()) {
        this.form.event.create.loading = true;
        axios.post("/api/v1/event", this.event).then(res => {
          this.form.event.create.loading = false;
          this.user.events.push(res.data);
          this.form.event.create.display = false;
        });
      }
    },
    openScanner: function(event) {
      this.event.users = [];
      axios.get(`/api/v1/event/${event.id}`).then(res => {
        this.event = res.data;

        this.dialog.scanner.display = true;
        createjs.Sound.registerSound("/audio/ding.wav", this.sound);
        this.scanner = new Instascan.Scanner({ video: this.$refs.preview });
        this.scanner.addListener("scan", content => {
          if (this.event.id == null) {
            alert("Pilih jadwal dulu gan");
          } else {
            let access = {
              event_id: this.event.id,
              user_id: content
            };
            createjs.Sound.play(this.sound);
            axios.post("/api/v1/attendance", access).then(res => {
              this.event = res.data;
            });
          }
        });
        Instascan.Camera.getCameras()
          .then(cameras => {
            this.cameras = cameras;
            if (cameras.length > 0) {
              this.camera = cameras[0];
              this.scanner.start(cameras[0]);
            } else {
              Swal.fire({
                type: "error",
                title: "Aduh",
                text: "Kamera tidak ditemukan"
              });
            }
          })
          .catch(function(e) {
            console.error(e);
          });
      });
    },
    closeScanner: function() {
      this.scanner.stop();
      this.dialog.scanner.display = false;
    },
    changeCamera: function() {
      this.scanner.start(this.camera);
    }
  }
};
</script>
