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
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                                <ul class="list-unstyled list-inline social text-center">
                                    <span class="login"> Login with: </span> 
                                    <li class="list-inline-item"><a href="{{url('/auth/redirect/facebook')}}"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="{{url('/auth/redirect/twitter')}}"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="{{url('/auth/redirect/linkedin')}}"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href="{{url('/auth/redirect/google')}}"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="list-inline-item"><a href="{{url('/auth/redirect/github')}}"><i class="fa fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="{{url('/auth/redirect/bitbucket')}}"><i class="fa fa-bitbucket"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </hr>
                        </div>  

                        <br/><br/>
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right" id="cwhite">
                                {{ __('Username Or Email') }}
                            </label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? 'is_valid' : ''}}" name="login" value="{{ old('username') }}" required autofocus>

                                @if($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" id="cwhite">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><br/>
                                    <label class="form-check-label" for="remember" id="cwhite">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn" id="btn">
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
