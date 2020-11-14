<template>
  <div>
      <v-row :justify="chat.user_id == user.id ? `end` : `start`" :class="chat.user_id == user.id ? `text-right pa-3` : `text-left pa-3`">
            <v-card>
                <v-card-text>
                    <div class="caption font-weight-bold" @click="show()" v-show="chat.user_id != user.id">{{chat.name}}</div>
                    <div class="caption">{{chat.value}}</div>
                </v-card-text>
            </v-card>
        </v-row>
        <v-dialog v-model="preview">
            <v-card v-if="member != null">
                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <center>
                                <v-avatar size="100">
                                    <v-img :src="`${storageUrl}/${member.avatar}`"></v-img>
                                </v-avatar>
                                <div class="title">{{member.name}}</div>
                                <div class="caption">{{member.profile.school_place || 'KOSONG'}}</div>
                                <div class="caption" v-if="member.profile.province && member.profile.city && member.profile.district">{{member.profile.province.name || ''}}, {{member.profile.city.name || ''}}, {{member.profile.district.name || ''}}, ID</div>
                                <v-divider></v-divider>
                                <div class="caption">{{member.profile.long_bio || member.profile.short_bio || '-'}}</div>
                            </center>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-dialog>
  </div>
</template>

<script>
import { mapState } from "vuex"
export default {
    props:['chat'],
    computed: {
        ...mapState(["user",'storageUrl'])
    },
    data(){
        return{
            preview: false,
            member:null
        }
    },
    mounted(){
        window.scrollTo(0,this.$parent.$parent.$refs.chatgroup.scrollHeight)
    },
    methods:{
        show(){
            this.preview = true
            this.$store.dispatch('getUser',this.chat.user_id).then(res=>{
                this.member = res.data
            })
        }
    }
}
</script>

<style>

</style>
