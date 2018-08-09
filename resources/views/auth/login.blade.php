@extends('layouts.app')

@section('content')
<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title"> Login </h1>
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
          <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              </p>
              @if ($errors->has('email'))
                  <p class="help is-danger" role="alert">
                      {{ $errors->first('email') }}
                  </p>
              @endif
          </div>
          <div class="field">
            <label for="password" class="label">Password</label>
            <p class="control">
              <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
            </p>                                
            @if ($errors->has('password'))
                <p class="help is-danger" role="alert">
                    {{ $errors->first('password') }}
                </p>
            @endif
          </div>   
          
          <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>
          
          <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
        </form>
      </div>
    </div>
    <h5 class="has-text-centered m-t-20"><a href="{{route('password.request')}}" class="is-muted">Forgot Your Password?</a></h5>
  </div>
</div>
@endsection

@section('scripts')
<script>
  window.addEventListener('DOMContentLoaded', function() {
    var app = new Vue({
      el: '#app',
      data: {}
    });
  });
</script>
@endsection