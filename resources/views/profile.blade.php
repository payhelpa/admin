@php use \App\Http\Controllers\UserController; @endphp
<x-app-layout>
    <x-slot name="header">
        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>-->
    </x-slot>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventura.dreamguystech.com/template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:42 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Ventura - Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body>

<div class="main-wrapper">
<!--
<div class="header">

<div class="header-left">
<a href="index-2.html" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="index-2.html" class="logo logo-small">
<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<a href="javascript:void(0);" id="toggle_btn">
<i class="fe fe-text-align-left"></i>
</a>
<div class="top-nav-search">
<form>
<input type="text" class="form-control" placeholder="Search here">
<button class="btn" type="submit"><i class="fa fa-search"></i></button>
</form>
</div>

<a class="mobile_btn" id="mobile_btn">
<i class="fa fa-bars"></i>
</a>


<ul class="nav user-menu">

<li class="nav-item dropdown app-dropdown">
<a class="nav-link dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#"><i class="fe fe-app-menu"></i></a>
<ul class="dropdown-menu app-dropdown-menu">
<li>
<div class="app-list">
<div class="row">
<div class="col"><a class="app-item" href="inbox.html"><i class="fa fa-envelope"></i><span>Email</span></a></div>
<div class="col"><a class="app-item" href="calendar.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></div>
<div class="col"><a class="app-item" href="chat.html"><i class="fa fa-comments"></i><span>Chat</span></a></div>
</div>
</div>
</li>
</ul>
</li>


<li class="nav-item dropdown noti-dropdown">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="#">View all Notifications</a>
</div>
</div>
</li>


<li class="nav-item dropdown has-arrow">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="avatar avatar-sm">
<img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
</div>
<div class="user-text">
<h6>Ryan Taylor</h6>
<p class="text-muted mb-0">Administrator</p>
</div>
</div>
<a class="dropdown-item" href="profile.html">My Profile</a>
<a class="dropdown-item" href="profile.html">Account Settings</a>
<a class="dropdown-item" href="login.html">Logout</a>
</div>
</li>

</ul>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="menu-title">
<span>Main</span>
</li>
<li>
<a href="index-2.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
</li>
<li class="submenu">
    <a href="#"><i class="fe fe-cart"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="products.html">Create Blog</a></li>
        <li><a href="product-details.html">View Blogs</a></li>
    </ul>
</li>
<li class="submenu">
    <a href="#"><i class="fe fe-tiled"></i> <span> Application</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="chat.html">Chat</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="inbox.html">Email</a></li>
    </ul>
</li>
<li class="menu-title">
 <span>Pages</span>
</li>
<li class="active">
<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="login.html"> Login </a></li>
<li><a href="register.html"> Register </a></li>
<li><a href="forgot-password.html"> Forgot Password </a></li>
<li><a href="lock-screen.html"> Lock Screen </a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="error-404.html">404 Error </a></li>
<li><a href="error-500.html">500 Error </a></li>
</ul>
</li>
<li>
<a href="users.html"><i class="fe fe-users"></i> <span>Users</span></a>
</li>
<li>
<a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
</li>
<li>
<a href="maps-vector.html"><i class="fe fe-map"></i> <span>Vector Maps</span></a>
</li>
<li class="menu-title">
<span>UI Interface</span>
</li>
<li>
<a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
<li><a href="form-input-groups.html">Input Groups </a></li>
<li><a href="form-horizontal.html">Horizontal Form </a></li>
<li><a href="form-vertical.html"> Vertical Form </a></li>
<li><a href="form-mask.html"> Form Mask </a></li>
<li><a href="form-validation.html"> Form Validation </a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="tables-basic.html">Basic Tables </a></li>
<li><a href="data-tables.html">Data Table </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li class="submenu">
<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
<li class="submenu">
<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="javascript:void(0);">Level 3</a></li>
<li><a href="javascript:void(0);">Level 3</a></li>
</ul>
</li>
<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
</ul>
</li>
<li>
<a href="javascript:void(0);"> <span>Level 1</span></a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</div>
-->

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Profile</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
<li class="breadcrumb-item active">Profile</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-header">
<div class="row align-items-center">
<div class="col-auto profile-image">
<a href="#">
<!--<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-0.jpg">-->
</a>
</div>
<div class="col ml-md-n2 profile-user-info">
<h4 class="user-name mb-0">{{ \Auth::user()->name}}</h4>
<h6 class="text-muted">Administrator</h6>
<div class="user-Location"><i class="fa fa-map-marker"></i> {{ \Auth::user()->address}}</div>
</div><!--
<div class="col-auto profile-btn">

<a href="#" class="btn btn-primary">
Edit
</a>
</div>-->
</div>
</div>
<div class="profile-menu">
<ul class="nav nav-tabs nav-tabs-solid">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
</li>
</ul>
</div>
<div class="tab-content profile-tab-cont">

<div class="tab-pane fade show active" id="per_details_tab">

<div class="row">
<div class="col-lg-9">
<div class="card">
<div class="card-body">
<h5 class="card-title d-flex justify-content-between">
<span>Personal Details</span>
<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
</h5>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
<p class="col-sm-9">{{ \Auth::user()->name}} </p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
<p class="col-sm-9">{{ \Auth::user()->email}}</p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
<p class="col-sm-9">{{ \Auth::user()->phone_number}}</p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
<p class="col-sm-9 mb-0">{{ \Auth::user()->address}}<br></p>
</div>
</div>
</div>

    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('profileupdate')}}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="email" class="form-control" id ="email" name="email" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" id ="phone_number" name="phone_number" value="{{Auth::user()->phone_number}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Address</span></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id ="address" name="address" value="{{Auth::user()->address}}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                        <div class="col-lg-3">

                        <div class="card">
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                        <span>Account Status</span>
                        <!--<a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i> Edit</a>-->
                        </h5>
                        <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
                        </div>
                        </div>

                        <!--
                        <div class="card">
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                        <span>Skills </span>
                        <a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i> Edit</a>
                        </h5>
                        <div class="skill-tags">
                        <span>Html5</span>
                        <span>CSS3</span>
                        <span>WordPress</span>
                        <span>Javascript</span>
                        <span>Android</span>
                        <span>iOS</span>
                        <span>Angular</span>
                        <span>PHP</span>
                        </div>
                        </div>
                        </div>
                        -->
                        </div>
                        </div>

                        </div>


                        <div id="password_tab" class="tab-pane fade">

                        <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <div class="row">
                        <div class="col-md-10 col-lg-6">
                        <form method="POST" action="{{ url('changePassword') }}">
                            @csrf
                        <!--<div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control">
                        </div>-->
                        <div class="form-group">
                        <label>New Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>

                        </div>
</div>
</div>
</div>
</div>

</div>


<script data-cfasync="false" src="https://ventura.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.2.1.min.js"></script>


<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>

</body>

<!-- Mirrored from ventura.dreamguystech.com/template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:42 GMT -->
</html>

</x-app-layout>
