@php use \App\Http\Controllers\UserController; @endphp
<x-app-layout>
    <x-slot name="header">
        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('subadmin.Dashboard') }}
        </h2>-->
    </x-slot>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventura.dreamguystech.com/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:16:17 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>PayHelpa - Dashboard</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!--[if lt IE 9]>
            <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
            <script src="{{asset('assets/js/respond.min.js')}}"></script>
        <![endif]-->
</head>
<body>
    <div class="d-flex justify-content-center">
        <a href="#" ></a>
    </div>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">PayHelpa's Individual Users </h3>

</div>

</div>

<div class="d-flex justify-content-center">

      <a href="#" ></a>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">List of Individual Users</h4>
<!--<p class="card-text">
This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
</p>-->
<div class="d-flex flex-row-reverse">
<div class="top-nav-search " style="background: linear-gradient(-45deg,#3949ab,#2962ff); border-radius: 50px;">
<!--<form action="" method="">
<input type="search" name="search" class="form-control" placeholder="Search here...">
<button class="btn" type="submit"><i class="fa fa-search"></i></button>
</form>-->

<form class="form-inline my-2 my-lg-0" action = "" method= "" >
<div class="input-group">
  <div >
    <input type="search" class="form-control mr-sm-2" placeholder ="Search" name="search">
    <label class="form-label" for="form1"></label>
  </div>
  <input type="submit" class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>
<div class="card-body">
    <div class="btn-group" style="float:right;">
        <a class="btn btn-primary" href="{{route('export')}}">Export</a>
    </div>
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>

<th>Type</th>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Created at</th>


</tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        @if($user->country == 'NG')
        <td class="text-center"><img src="{{asset('assets/img/NGN 1.png')}}"></td>
     @elseif($user->country == 'US')
        <td class="text-center"><img src="{{asset('assets/img/USA 1.png')}}"></td>
        @else
        <td class="text-center"><img src=""></td>

     @endif
        <td><a href="#">{{ucwords(UserController::GetUserName($user->user_id)) }}</a></td>
        <td>{{ucwords(UserController::GetUserEmail($user->user_id)) }}</td>
        <td>{{$user->phone_number}}</td>
        <td>{{date('Y/m/d', strtotime($user->created_at))}}</td>





    </tr>
    @endforeach
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>


<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
</x-app-layout>
