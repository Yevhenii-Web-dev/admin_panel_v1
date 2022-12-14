@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Welcome Back!') }}</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" required
                                                   class=" @error('email') is-invalid @enderror form-control form-control-user"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="{{ __('Enter Email Address...') }}" name="email"
                                                   value="{{ old('email') }}"  autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password"
                                                   class=" @error('password') is-invalid @enderror form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="{{ __('Password') }}"
                                                   name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class=" custom-control-input" id="customCheck"
                                                       name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}">
                                                <label class="custom-control-label"
                                                       for="customCheck">{{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Login') }}
                                        </button>

                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> {{ __('Login with Google') }}
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> {{ __('Login with Facebook') }}
                                        </a>

                                        <hr>
                                        @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a class="small"
                                                   href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                            </div>
                                        @endif

                                        <div class="text-center">
                                            <a class="small"
                                               href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

