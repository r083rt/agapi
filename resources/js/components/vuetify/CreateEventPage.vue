<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-form ref="createEvent" lazy-validation>
        <v-text-field label="Nama Acara*" required v-model="event.name" :rules="form.rules.common"></v-text-field>
        <v-textarea
          label="Deskripsi Acara"
          required
          v-model="event.description"
          :rules="form.rules.common"
        ></v-textarea>
        <v-datetime-picker label="Tanggal/ Jam Acara" v-model="event.start_at"></v-datetime-picker>
        <v-textarea
          label="Tempat dan Alamat Acara*"
          required
          v-model="event.address"
          :rules="form.rules.common"
        ></v-textarea>
        <center><v-btn text @click="storeEvent()" :loading="loading" :disabled="loading">Submit Acara</v-btn></center>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import { mapState } from "vuex"
export default {
  data() {
    return {
      event: {

      },
      loading: false,
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
  computed: {
        ...mapState(["user"])
    },
  mounted(){

  },
  methods:{
      storeEvent: function() {
        if (this.$refs.createEvent.validate()) {
            this.loading = true
            this.$store.dispatch('storeEvent',this.event).then(res=>{
                this.user.events.push(res.data)
                this.$store.commit('setUser',{user:this.user})
                this.loading = false
                this.$router.push('contribution')
            }).catch(err=>{

            })
        }
    },
  }
};
</script>

<style>
</style>
