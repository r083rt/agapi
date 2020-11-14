<template>
  <div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6" v-for="event in events" :key="event.id">
        <div class="block">
          <div class="timeline">
            <!-- Experience 1 -->
            <div class="timeline-item" @click="loadGuestEvent(event)">
              <h3
                class="red--text"
                v-if="moment(event.start_at).diff(moment(),'days') >= 0 && moment(event.start_at).diff(moment(),'days') < 20"
              >[HOT] Sebentar Lagi!!!</h3>
              <h4 class="item-title pb-3" style="overflow-wrap:break-word; white-space:pre-wrap">{{ event.name }}</h4>
              <h5 class="item-title pb-3" style="overflow-wrap:break-word; white-space:pre-wrap">Alamat: {{ event.address || '' }}</h5>
              <span class="item-period">{{ moment(event.start_at).format('LLLL') }}</span>
              <span class="item-period">{{ moment(event.start_at).fromNow() }} dari sekarang</span>
              <span
                class="item-small"
              >{{ event.user.name }} No.HP: {{ event.user.profile.contact || 'Kosong' }}</span>
              <p class="item-description" style="overflow-wrap:break-word; white-space:pre-wrap">{{ event.description }}</p>
            </div>
            <!-- / Experience 1 -->
          </div>
        </div>
      </div>
    </div>
    <!-- loading -->
    <v-dialog v-model="loading.display" hide-overlay persistent width="300">
      <v-card color="primary" dark>
        <v-card-text>
          Please stand by
          <!-- progress -->
          <v-progress-linear
            v-model="loading.buffer"
            :buffer-value="loading.percentage"
            buffer
            :indeterminate="loading.indeterminate"
            color="white"
            class="mb-0"
          ></v-progress-linear>
          <!-- end progress -->
        </v-card-text>
      </v-card>
    </v-dialog>
    <!-- end loading -->

    <!-- list peserta acara -->
    <v-dialog v-model="dialog.guest_list.display" width="500">
      <v-card>
        <v-card-title class="headline green lighten-1 white--text" primary-title>Peserta Acara</v-card-title>

        <v-card-text>
          <v-list two-line>
            <template v-for="(user, u) in dialog.guest_list.users">
              <v-divider v-if="u != 0" :key="`divider_${user.id}`"></v-divider>

              <v-list-tile avatar :key="`list_${user.id}`">
                <v-list-tile-avatar>
                  <v-img
                    :src="`/storage/${user.avatar}`"
                    lazy-src="/img/lazyimage.jpg"
                    aspect-ratio="1"
                    class="grey lighten-2"
                  >
                    <template v-slot:placeholder>
                      <v-layout fill-height align-center justify-center ma-0>
                        <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                      </v-layout>
                    </template>
                  </v-img>
                </v-list-tile-avatar>

                <v-list-tile-content>
                  <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                  <v-list-tile-sub-title>{{ user.kta_id || 'Kosong' }}</v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>
            </template>
          </v-list>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialog.guest_list.display = false">Tutup</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <!-- end list peserta acara -->
  </div>
</template>

<script>
import moment from "moment";
moment.locale("id");

export default {
  data() {
    return {
      events: [],
      loading: {
        display: false,
        buffer: 0,
        percentage: 0,
        indeterminate: false
      },
      dialog: {
        guest_list: {
          display: false,
          users: []
        }
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getEvents();
  },
  methods: {
    moment,
    getEvents: function() {
      axios.get("/api/v1/event").then(res => {
        this.events = res.data;
      });
    },
    loadGuestEvent: function(e) {
      this.loading.indeterminate = true;
      this.loading.display = true;
      axios.get(`/api/v1/event/${e.id}`).then(res => {
        this.dialog.guest_list.users = res.data.users;
        this.loading.display = false;
        this.loading.indeterminate = false;
        this.dialog.guest_list.display = true;
      });
    }
  }
};
</script>
