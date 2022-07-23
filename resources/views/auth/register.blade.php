<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventura.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:42 GMT -->
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>PayHelpa - Register</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
</head>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            <div class="container">
            <div class="loginbox">
            <div class="login-left">
            <img class="img-fluid" src="{{asset('assets/img/logo.png')}}" alt="Logo">
            </div>
            <div class="login-right">
            <div class="login-right-wrap">
            <h1>Register</h1>
            <p class="account-subtitle">Access to our dashboard</p>

        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <!-- Name -->
            <div class="form-group">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />

            </div>

             <!-- Phone Number  -->
             <div class="form-group">
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="form-control" type="phone_number" name="phone_number" :value="old('phone_number')" required />

             </div>

             <!-- Address -->
             <div class="form-group">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="form-control" type="address" name="address" :value="old('address')" required />

             </div>

            <!-- Password -->
            <div class="form-group">
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
            </div>
            <div class="form-group mt-4">
                <div class="mt-4">
                    <x-label for="role" :value="__('Role')" />

                    <select class="custom-select" id="role" name="role" required>
                    <option value="" disabled selected>Select a role</option>
                    <option value="0">Super Admin</option>
                    <option value="1">Content Admin</option>
                    <option value="2">Finance Admin</option>
                    </select>
                    <div class="invalid-feedback">Please select a role</div>
                </div>
                </div>
            <!--<div class="form-group">
                <div class="mt-4">
                    <x-label for="role" :value="__('Role 0 or 1')" />

                    <x-input id="role" class="form-control"
                                    type="number"
                                    name="role"
                                    required />
                </div>
            </div>-->


            <div class="form-group">
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="btn btn-primary btn-block">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>
</body>

<!-- Mirrored from ventura.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:42 GMT -->
</html>

