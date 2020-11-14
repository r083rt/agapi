<template>
    <v-card width="100%">
        <v-container>
            <v-row align="center">
                <v-col cols="2">
                    <v-img style="border-radius:50%" width="40" :src="`${storageUrl}/${comment.user.avatar}`" @error="setDefaultAvatar()"/>
                </v-col>
                <v-col cols="8">
                    <div class="caption">{{comment.user.name}}</div>
                    <div
                        class="caption grey--text"
                        style="overflow-wrap:break-word; white-space:pre-wrap"
                    >{{ comment.value }}</div>
                    <div class="caption grey--text" v-show="comment.likes_count > 0">{{comment.likes_count}} Guru menyukai</div>
                    <div class="caption grey--text">{{comment.created_at | moment("from","now")}}</div>
                </v-col>
                <v-col cols="2">
                    <v-btn
                    icon
                    @click="comment.liked_count ? dislike() : like()"
                    :color="comment.liked_count ? 'red': null">
                        <v-icon>{{ comment.liked_count ? 'mdi-heart': 'mdi-heart-outline' }}</v-icon>
                    </v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
import {mapState} from 'vuex'
export default {
    props:{
        comment: null
    },
    data(){
        return {

        }
    },
    mounted(){

    },
    computed:{
        ...mapState(['storageUrl'])
    },
    methods:{
        like(){
            this.$store.dispatch('likeComment',this.comment).then(res=>{
                this.comment.liked_count = res.data.liked_count
                this.comment.likes_count = res.data.likes_count
            }).catch(err=>{

            })
        },
        dislike(){
            this.$store.dispatch('dislikeComment',this.comment).then(res=>{
                this.comment.liked_count = res.data.liked_count
                this.comment.likes_count = res.data.likes_count
            }).catch(err=>{

            })
        },
        setDefaultAvatar(){
            this.comment.user.avatar = "users/default.png"
        },
    }
}
</script>

<style>

</style>
