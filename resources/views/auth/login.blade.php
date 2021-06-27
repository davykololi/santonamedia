@extends('layouts.app')

@section('content')
@include('partials.allnews')
<section id="contentSection">
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
            <div class="contact_area">
                <div class="single_page_content">
                    @include('partials.messages')
                    @include('partials.errors')
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Login With</label>
                            @include('partials.social_login')
                        </div>  
                        <hr/>
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">
                                {{ __('Username Or Email') }}
                            </label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? 'is_valid' : ''}}" name="login" value="{{ old('username') }}" autocorrect="off" placeholder="Username Or Email" required autofocus>

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
    </div>
</div>
</section>
@endsection
