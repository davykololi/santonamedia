@extends('layouts.app')

@section('content')
<div class="container" id="main">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="all">{{ __('Login') }}</div>
                    @include('partials.messages')
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <section id="footer">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                            <p style="color: white; text-align: center;font-size: 20px">Login with:</p>
                                <ul class="list-unstyled list-inline social text-center">
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
                            <label for="email" class="col-md-4 col-form-label text-md-right" id="cwhite">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
