@php use \App\Http\Controllers\UserController; @endphp
<x-app-layout>
    <x-slot name="header">
        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
            <script src="{{asset('public/assets/js/html5shiv.min.js')}}"></script>
            <script src="{{asset('public/assets/js/respond.min.js')}}"></script>
        <![endif]-->
</head>
<body>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Transactions </h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
<li class="breadcrumb-item active"></li>
</ul>
</div>

</div>
<div class="d-flex justify-content-center">
    <a href="{{route ('statusdeclined')}}" class='btn btn-outline-primary btn-sm mr-2'>LU Pending Transactions</a>
    <a href="{{route ('fupending')}}" class='btn btn-outline-primary btn-sm mr-2'>FU Pending Transactions</a>
    <a href="{{route ('ongoingstatus')}}" class='btn btn-outline-primary btn-sm mr-2'>Ongoing Transactions</a>
    <a href="{{route ('status')}}" class='btn btn-outline-primary btn-sm mr-2'>Successful Transactions</a>

</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">List of Pending Transactions</h4>
<!--<p class="card-text">
This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
</p>-->
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
    <th>User ID</th>
    <th>Service ID</th>
    <th>Rate</th>
    <th>Dollar Amount</th>
    <th>Amount Requested</th>
    <th>Details</th>
</tr>
</thead>
<tbody>
	@foreach ($userss as $user)
	<tr>
		<td>{{$user->user_id}}</td>
		<td>{{$user->service_id}}</td>
        <td>₦{{number_format($user->rate,2)}}</td>
        <td>${{number_format($user->dollar_amount,2)}}</td>
		<td>₦{{number_format($user->amount_requested_for_in_naira,2)}}</td>
		<td><a href="" class="btn btn-outline-primary mr-2"></i>View </a></td>
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
