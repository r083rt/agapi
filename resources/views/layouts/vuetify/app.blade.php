<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.css">
    {{-- <link rel="stylesheet" href="{{asset('css/introjs-dark.css')}}"> --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!!json_encode(['csrfToken' => csrf_token()]) !!}
    </script>
    <style>
        [v-cloak]>* {
            display: none
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        [v-cloak]:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #333;
            animation: spinner 0.6s linear infinite;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div id="app" v-cloak>
        <v-app>
            <v-content>
                <v-card class="overflow-hidden">
                    <v-app-bar
                    color="#6A76AB"
                    app
                    dark
                    {{-- shrink-on-scroll --}}
                    prominent
                    src="https://picsum.photos/1920/1080?random"
                    {{-- fade-img-on-scroll --}}
                    {{-- scroll-target="#scrolling-techniques-3" --}}
                    >
                        <template v-slot:img="{ props }">
                        <v-img
                          v-bind="props"
                          gradient="to top right, rgba(100,115,201,.7), rgba(25,32,72,.7)"
                        ></v-img>
                      </template>

                        <v-app-bar-nav-icon
                        v-intro="'Tekan disini untuk melihat list semua guru AGPAII yang sudah terdaftar dan aktif'"
                        @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

                        <v-toolbar-title>
                            {{-- <div class="title">@{{user ? user.name || 'Sedang melakukan perubahan sistem' : 'Sedang melakukan perubahan sistem'}}</div> --}}
                        </v-toolbar-title>

                        <div class="body-1" style="margin-top:50px">@{{user ? user.name || 'Sedang melakukan perubahan sistem' : 'Sedang melakukan perubahan sistem'}}</div>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="startGuide()">
                            <v-icon v-intro="'Tombol untuk melakukan penjelasan aplikasi'">mdi-comment-question-outline</v-icon>
                        </v-btn>

                        <v-btn
                        icon @click="push('searchuser')">
                            <v-icon v-intro="'Tekan disini untuk mencari guru yang tergabung dalam sistem AGPAII'">mdi-magnify</v-icon>
                        </v-btn>

                        <v-menu bottom left>
                            <template v-slot:activator="{ on }">
                        <v-btn
                            icon
                            v-on="on"
                        >
                            <v-icon v-intro="'Tap disini untuk melihat menu lainnya termasuk profil anda, di halaman profile juga dapat untuk edit biodata anda, Informasi jumlah anggota AGPAII, Barcode untuk Scan Absensi di Acara AGPAII, dan Download Kartu Anggota anda (Kartu Anggota akan lengkap jika sudah mengisi biodata)'">mdi-dots-vertical</v-icon>
                        </v-btn>
                        </template>

                            <v-list>
                                <v-list-item @click="push('profile')">
                                    <v-list-item-title>Profile</v-list-item-title>
                                </v-list-item>
                                <v-list-item @click="push('information')">
                                    <v-list-item-title>Informasi</v-list-item-title>
                                </v-list-item>
                                <v-list-item @click="push('barcode')">
                                    <v-list-item-title>Barcode</v-list-item-title>
                                </v-list-item>
                                <v-list-item @click="push('membercard')">
                                    <v-list-item-title>Kartu Anggota</v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title onclick="event.preventDefault();localStorage.clear();
                                    document.getElementById('logout-form').submit();">Keluar</v-list-item-title>
                                </v-list-item>
                            </v-list>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </v-menu>

                        <template v-slot:extension>
                        <v-tabs
                          v-intro="'Menu disini untuk membuka fitur-fitur AGPAII DIGITAL seperti Ruang Diskusi untuk Anggota AGPAII, Jadwal Acara untuk melihat acara-acara AGPAII juga dapat melihat peserta acara tersebut, dan Ruang Kontribusi untuk melihat list acara yang pernah diikuti disini anda juga dapat membuat acara sendiri dan melakukan absensi digital'"
                          align-with-title
                          background-color="transparent"
                        >
                          <v-tab @click="push('chatgroup')">Chat</v-tab>
                          <v-tab
                          @click="push('dashboard')">Ruang Diskusi</v-tab>
                          <v-tab
                          @click="push('event')">Jadwal Acara</v-tab>
                          <v-tab
                          @click="push('contribution')">Kontribusi</v-tab>
                          <v-tab
                          @click="push('murottal')"
                          >Murottal</v-tab>
                          {{-- <v-tab>Marketplace</v-tab> --}}
                        </v-tabs>
                      </template>
                    </v-app-bar>
                    <v-sheet app id="scrolling-techniques-3" class="overflow-y-auto"
                    {{-- max-height="700" --}}
                    >
                        <v-container
                        style="min-height: 100vh;"
                        >
                            @yield('content')
                        </v-container>
                    </v-sheet>
                </v-card>
                <v-navigation-drawer app style="background-image: linear-gradient(to top right, rgba(100,115,201,.7), rgba(25,32,72,.7))" v-model="drawer" fixed dark left temporary>
                    <v-list nav dense>
                        <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4">
                            <v-list-item v-show="users.prev_page_url" @click="getPrevUsers()">
                                <v-list-item-content>
                                    <v-list-item-title class="white--text">Sebelumnya</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-list-item v-for="user in users.data" :key="user.id">
                                <v-list-item-avatar>
                                <v-img class="grey lighten-2" :src="`${storageUrl}/${user.avatar}`"></v-img>
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title class="white--text">@{{user.name}}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-list-item v-show="users.next_page_url" @click="getNextUsers()">
                                <v-list-item-content>
                                    <v-list-item-title class="white--text">Selanjutnya</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>
                    </v-list>
                </v-navigation-drawer>

            </v-content>
        </v-app>
    </div>
    <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
    <script type="text/javascript" src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</body>

</html>
