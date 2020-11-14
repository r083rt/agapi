<template>
  <div v-if="event != null">
    <div class="title">Peserta Acara {{this.event.name}}</div>
    <v-row>
      <v-card width="100%" class="mt-5">
        <v-card-text>
          <v-list two-line>
              <v-list-item v-for="(user,u) in users" :key="user.id">
                <v-list-item-avatar>
                  <v-img
                    :src="`${storageUrl}/${user.avatar}`"
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
                </v-list-item-avatar>

                <v-list-item-content>
                  <v-list-item-title>{{ user.name }}</v-list-item-title>
                  <v-list-item-subtitle>{{ user.kta_id || 'Kosong' }}</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
          </v-list>
        </v-card-text>
      </v-card>
    </v-row>
  </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
  props: {
    event: null
  },
  data() {
    return {
        users:[]
    };
  },
  computed:{
      ...mapState(['storageUrl'])
  },
  mounted() {
    if (this.event == null) {
      this.$router.back();
    } else {
      this.getEventGuests().then(res=>{
          this.users = res.data.users
      })
    }
  },
  methods: {
    getEventGuests() {
      return new Promise((resolve, reject) => {
          this.$store.dispatch('getEvent',this.event).then(res=>{
              resolve(res)
          }).catch(err=>{
              reject(err)
          })
      });
    }
  }
};
</script>

<style>
</style>
