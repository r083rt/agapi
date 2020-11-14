@extends('layouts.iofrm2.app')
@section('content')
<div class="form-items">
   <h3>Masuk ke Akun AGPAII Digital</h3>
   <p>Dapatkan akses kedalam sistem kartu tanda anggota dengan baragam fitur</p>
   <div class="page-links">
      <a href="login1.html" class="active">Login</a>
   </div>
   <form method="POST" action="{{ route('login') }}">
      @csrf
      <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
      @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"  type="password" name="password" placeholder="Password" required>
      @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
      <div class="form-check">
         <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
         <label class="form-check-label" for="remember">
         {{ __('Remember Me') }}
         </label>
      </div>
      <div class="form-button">
         <button id="submit" type="submit" class="ibtn">  {{ __('Login') }}</button> 
         @if (Route::has('password.request'))
         <a  href="{{ route('password.request') }}">Forget password?</a>
         @endif
      </div>
   </form>
   <!-- <div class="other-links">
      <span>Syarat dan ketentuan</span><a href="#">Bantuan pendaftaran manual</a>
      </div> -->
</div>
@endsection