{{-- @extends('layouts.vuetify.app') --}}
{{-- @extends('layouts.procard') --}}
@extends('layouts.app')
@section('content')
    <v-row>
        <v-col>
            <transition>
                <router-view></router-view>
            </transition>
        </v-col>
    </v-row>
@endsection
