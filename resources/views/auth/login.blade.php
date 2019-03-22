@extends('layouts.app')

@section('content')

   
        <form class="form-signin"  method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
          <div class="text-center mb-4">
            <img class="mb-4" src="/website/logo/fmf.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">LOGIN</h1>
           
          </div>
          <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
            <div class="form-label-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <label for="email">Email address</label>
                @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
         </div>
          <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
              <div class="form-label-group">
              <input id="password" type="password" class="form-control" name="password" required>

                <label for="password">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
          </div>
          <div class="checkbox mb-3">
            <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          
        </form>
          
@endsection
