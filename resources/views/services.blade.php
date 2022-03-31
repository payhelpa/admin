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
<h3 class="page-title">Services </h3>

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
<h4 class="card-title">List of Services</h4>
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
    <div style="display: flex; float: right; margin-buttom:-40px; ">
        <a href="{{route ('addServices')}}" class='btn btn-primary mr-2' >Create</a>
    </div>
<div class="table-responsive">
    @include('flash-message')
    <!-- Alert message (start) -->

    <!-- Alert message (end) -->

<table class="datatable table table-stripped">
<thead>
<tr>


<th>ID</th>
<th>Title</th>
<th>Description </th>
<th>Created at</th>
<th class="text-right">Action</th>

</tr>
</thead>
<tbody>
    @foreach ($services as $service)
    <tr>
        <td>{{$service->id}}</td>
        <td>{{$service->title}}</td>
        <td>{{$service->description}}</td>
        <td>{{$service->created_at}}</td>
        <td class="text-right">
            <div class="actions">
                <a href="{{ route('services.edit',$service->id) }}"><i class="fe fe-edit" style="margin-right: 10px; margin-left: 10px"></i></a>
                <a href="{{ route('services.delete',$service->id) }}"><i class="fe fe-trash"></i></a>
            </div>
        </td>
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
