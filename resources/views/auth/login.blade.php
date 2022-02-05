<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventura.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:42 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>PayHelpa - Login</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
</head>
<body>

<x-guest-layout>
    <x-auth-card>
       <!-- <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

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
<h1>Login</h1>
<p class="account-subtitle">Access to our dashboard</p>

 <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="form-group">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
    <div class="form-group">        
        <x-button class="btn btn-primary btn-block">
            {{ __('Log in') }}
        </x-button>
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




