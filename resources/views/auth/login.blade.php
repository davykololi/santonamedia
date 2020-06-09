@extends('layouts.app')

@section('content')
<div class="container" id="main">
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header blue">{{ __('Login') }}</div>
                    @include('partials.messages')
                    @include('partials.errors')
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Login With</label>
                            <div class="col-md-6">
                                <a href="{{url('/auth/redirect/facebook')}}" class="btn btn-social-icon btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="{{url('/auth/redirect/twitter')}}" class="btn btn-social-icon btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="{{url('/auth/redirect/linkedin')}}" class="btn btn-social-icon btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="{{url('/auth/redirect/google')}}" class="btn btn-social-icon btn-google-plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="{{url('/auth/redirect/github')}}" class="btn btn-social-icon btn-github">
                                    <i class="fa fa-github"></i>
                                </a>
                                <a href="{{url('/auth/redirect/bitbucket')}}" class="btn btn-social-icon btn-bitbucket">
                                    <i class="fa fa-bitbucket"></i>
                                </a>
                            </div>
                        </div>  
                        <hr/>
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">
                                {{ __('Username Or Email') }}
                            </label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? 'is_valid' : ''}}" name="login" value="{{ old('username') }}" autocorrect="off" required autofocus>

                                @if($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autocorrect="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} autocorrect="off"><br/>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br/>
</div>
@endsection
