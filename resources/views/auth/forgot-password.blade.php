@extends('layouts.auth-layout')

@section('content')
<section class="sign-in-page">
        <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 col-sm-12 col-12 ">
                <div class="sign-user_card ">
                    <div class="d-flex justify-content-center">
                        <div class="sign-user_logo">
                        <img src="{{ asset('admin-images/login/user.png') }}" class=" img-fluid" alt="Logo">
                        </div>
                    </div>
                    <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto pt-5">
                        <h1 class="mb-0">Reset Password</h1>
                        <p class="text-white">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                        <form class="mt-4" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="d-inline-block w-100">
                                <button type="submit" class="btn btn-primary float-right">Reset Password</button>
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