<template>
  <div>
    <div class="title">Informasi</div>
    <v-row>
      <v-tabs centered v-model="tab" background-color="transparent">
        <v-tab>Jumlah Anggota</v-tab>
        <v-tab>Sejarah Pembayaran</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card flat>
            <v-card-text>
              <div class="caption grey--text">Nasional</div>
              <div class="body-1">{{ count.user_total || 0 }} anggota</div>
              <div class="caption grey--text">Provinsi {{ user.profile.province.name }}</div>
              <div class="body-1">{{ count.user_provinces || 0 }} anggota</div>
              <div class="caption grey--text">Kab/Kota {{ user.profile.city.name }}</div>
              <div class="body-1">{{ count.user_cities || 0 }} anggota</div>
              <div class="caption grey--text">Kecamatan/Daerah {{ user.profile.district.name }}</div>
              <div class="body-1">{{ count.user_districts || 0 }} anggota</div>
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <v-card-text>
              <div v-for="payment in user.payments" :key="payment.id">
                <div class="caption grey--text">Rp.{{ payment.value.toLocaleString() }}</div>
                <div class="body-1">{{ payment.status }}</div>
                <div class="body-1">{{ payment.updated_at || payment.created_at }}</div>
              </div>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-row>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      count: {
        user_total: 0
      },
      tab: null
    };
  },
  computed: {
    ...mapState(["user"])
  },
  mounted() {
    this.getCountUser();
    this.getDetailTotalMember();
  },
  methods: {
    getDetailTotalMember: function() {
      axios.get(`/api/v1/getDetailTotalMember`).then(res => {
        this.count = { ...this.count, ...res.data };
      });
    },
    getCountUser: function() {
      axios.get("/api/v1/users/count").then(res => {
        this.count = { ...this.count, user_total: res.data };
      });
    }
  }
};
</script>
