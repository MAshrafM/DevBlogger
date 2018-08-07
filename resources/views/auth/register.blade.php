@extends('layouts.app')

@section('content')
<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title"> Join Us </h1>
        
        <form action="{{ route('register') }}" method="POST" role="form">
          @csrf
          <div class="field">
            <label for="name" class="label">Name</label>
            <p class="control">
              <input class="input {{$errors->has('name') ? 'is-danger' : ''}}" type="text" name="name" id="name" value="{{old('name')}}" required>
            </p>
            @if ($errors->has('name'))
              <p class="help is-danger" role="alert">
                {{ $errors->first('name') }}
              </p>
            @endif
          </div>
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
          
          <button class="button is-primary is-outlined is-fullwidth m-t-30">Register</button>
        </form>
      </div>
    </div>
    
    <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a></h5>
  </div>
</div>
@endsection
