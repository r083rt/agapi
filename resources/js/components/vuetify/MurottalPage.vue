<template>
<div>
    <v-list shaped>
      <v-subheader>MUROTTAL</v-subheader>
      <v-list-item-group v-model="activeMurottal" color="primary">
        <v-list-item
          v-for="(sound, s) in murottals"
          :key="sound.id"
          two-line
        >
          <!-- <v-list-item-icon> -->
            <!-- <v-icon>{{sound.isPlaying ? 'mdi-pause-circle-outline' : 'mdi-play-circle-outline' }}</v-icon> -->
          <!-- </v-list-item-icon> -->
          <v-list-item-content>
            <v-list-item-title>{{sound.name}}</v-list-item-title>
            <v-list-item-subtitle><audio :src="sound.url" controls preload="none"></audio></v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
</div>
</template>

<script>
import {mapState} from 'vuex'
export default {
  data() {
    return {

    };
  },
  computed:{
      ...mapState(['murottals','activeMurottal'])
  },
  mounted(){

  },
  methods:{
    playSound (id,index) {
      return new Promise((resolve,reject)=>{
          this.$store.dispatch('playMurottal',id)
      })
    }
  }
};
</script>

<style>
</style>
