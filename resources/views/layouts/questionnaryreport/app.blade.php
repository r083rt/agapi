<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Scripts -->
    <!-- <script>
        window.Laravel = {!!json_encode(['csrfToken' => csrf_token()]) !!}
    </script> -->
      <!-- Styles -->
      <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  
</head>

<body>
    <div id="app">
    <template>
    <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
      <v-list-item-group v-model="item" color="primary">
        <v-list-item active link @click="$route.name!='questionnaryhome'?$router.push({name:'questionnaryhome'}):''">
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title >Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link @click="$route.name!='createsurvey'?$router.push({name:'createsurvey'}):''">
          <v-list-item-action>
            <v-icon>mdi-email</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title >Buat Survey</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-divider></v-divider>
        <v-list-item link @click="logout">
          <v-list-item-action>
            <v-icon>mdi-account-arrow-right</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title >Logout</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </v-list-group>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      color="indigo"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>{{ config('app.name', 'Laravel') }}</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col>
          <router-view :educational-levels="{{$educational_levels}}"></router-view>

            <!-- <v-tooltip left>
              <template v-slot:activator="{ on }">
                <v-btn
                  :href="source"
                  icon
                  large
                  target="_blank"
                  v-on="on"
                >
                  <v-icon large>mdi-code-tags</v-icon>
                </v-btn>
              </template>
              <span>Source</span>
            </v-tooltip> -->
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    <v-footer
      color="indigo"
      app
    >
      <span class="white--text">&copy; @yield('footer')</span>
    </v-footer>
  </v-app>
  </template>
  <form id="logout-form" ref="logout" action="{{ route('logout2') }}" method="POST" style="display: none;">
     @csrf
     </form> 
    </div>
   
</body>
<script>
console.log('set Auth for localstorage')
//console.log({!!$auth!!})
window.localStorage.setItem('auth',JSON.stringify({!!$auth!!}))
//console.log(JSON.parse(window.localStorage.getItem('auth')))
</script>
</html>



