@extends('layouts.app')

@section('content')
  @if (session('status'))
    <div class="notification is-success">
    {{ session('status') }}
    </div>
  @endif
  
<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title"> Reset Your Password </h1>
        
        <form action="{{ route('register') }}" method="POST" role="form">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
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
          <div class="columns">
            <div class="column">
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
            </div>
            <div class="column">
              <div class="field">
                <label for="password-confirmation" class="label">Confirm Password</label>
                <p class="control">
                  <input class="input {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" type="password" name="password_confirmation" id="password-confirmation" required>
                </p>
                @if ($errors->has('password_confirmation'))
                  <p class="help is-danger" role="alert">
                    {{ $errors->first('password_confirmation') }}
                  </p>
                @endif
              </div>
            </div>
          </div>
          
          <button class="button is-primary is-outlined is-fullwidth m-t-30">Reset Password</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection
