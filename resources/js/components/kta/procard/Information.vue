<template>
  <v-layout row wrap>
    <v-flex xs12>
      <v-list two-line subheader>
        <v-subheader>Total member saat ini</v-subheader>

        <v-list-tile avatar>
          <v-list-tile-content>
            <v-list-tile-title>Nasional</v-list-tile-title>
            <v-list-tile-sub-title>{{ count.user_total || 0 }} anggota</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile avatar>
          <v-list-tile-content>
            <v-list-tile-title>Provinsi {{ user.profile.province.name }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ count.user_provinces || 0 }} anggota</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile avatar>
          <v-list-tile-content>
            <v-list-tile-title>Kab/Kota {{ user.profile.city.name }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ count.user_cities || 0 }} anggota</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile avatar>
          <v-list-tile-content>
            <v-list-tile-title>Kecamatan/Daerah {{ user.profile.district.name }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ count.user_districts || 0 }} anggota</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  props: {
    user: {}
  },
  data() {
    return {
      count: {
        user_total: 0
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
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
