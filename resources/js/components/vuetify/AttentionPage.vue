<template>
<div>
    <center><v-img src="/img/lock.jpg" width="400px"></v-img></center>
    <v-btn
        block
        color="success"
        href="https://play.google.com/store/apps/details?id=org.agpaiidigital.kta2&hl=in"
    >
        <v-icon>mdi-android</v-icon>download di playstore
    </v-btn>
</div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
    mounted(){
        Swal.fire({
            type: 'warning',
            title: 'Perhatian',
            text: 'Kami tidak melakukan pengembangan untuk WEB, Silahkan Download Aplikasi AGPAII DIGITAL yang lebih baik',
            icon: 'warning',
            confirmButtonText: 'Bawa saya kesana sekarang',
        }).then(res => {
            if (res.value) {
                window.location.href = "https://play.google.com/store/apps/details?id=org.agpaiidigital.kta2&hl=in"
            }
        })
    }
}
</script>

<style>

</style>
