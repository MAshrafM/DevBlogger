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
        <h1 class="title"> Forget Password ? </h1>
        <form method="POST" action="{{ route('password.email') }}" role="form">
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
          <button class="button is-primary is-outlined is-fullwidth m-t-30">Get Reset Link</button>
        </form>
      </div>
    </div>
    <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted"><i class="fa fa-caret-left m-r-10"></i> Back to Login</a></h5>
  </div>
</div>
@endsection
