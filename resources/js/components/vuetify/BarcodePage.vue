<template>
  <div>
      <v-row>
          <v-spacer></v-spacer>
          <v-col>
               <center><div id="barcode"></div></center>
          </v-col>
          <v-spacer></v-spacer>
      </v-row>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    data(){
        return{

        }
    },
    computed: {
        ...mapState(["user"])
    },
    mounted(){
        this.initBarcode()
    },
    methods:{
        initBarcode(){
            var qrcode = new QRCode(document.getElementById("barcode"), {
                text: this.user.id.toString(),
                width: 256,
                height: 256,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        }
    }
}
</script>

<style>

</style>
