@extends('layouts.auth-layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
        <div class="col-md-6 col-sm-12 col-12 align-self-center">
            <div class="sign-user_card ">
                <div class="d-flex justify-content-center">
                    <div class="sign-user_logo">
                    <img src="{{ asset('admin-images/login/user.png') }}" class=" img-fluid" alt="Logo">
                    </div>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div class="sign-in-page-data">
                    <div class="sign-in-from w-100 pt-5 m-auto">
                    <h1 class="mb-3 text-center">Sign in</h1>
                    <form class="mt-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input
                                type="email"
                                class="form-control mb-0"
                                id="email"
                                placeholder="Enter email"
                                name="email"
                                required
                                autofocus
                                autocomplete="username"
                                value="{{ old('email') }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control mb-0"
                                id="password"
                                placeholder="Password"
                                name="password"
                                required
                                autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="sign-info">
                            <button type="submit" class="btn btn-primary mb-2">Sign in</button>
                            <!-- <span class="dark-color d-block line-height-2">Don't have an account? <a href="sign-up.html">Sign up</a></span> -->
                        </div>
                        <div class="d-inline-block w-100">
                            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                <input type="checkbox" class="custom-control-input" id="remember_me">
                                <label class="custom-control-label" for="remember_me">Remember Me</label>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                @if (Route::has('password.request'))
                <div class="mt-2">
                    <div class="d-flex justify-content-center links">
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        </div>
    </div>
@endsection