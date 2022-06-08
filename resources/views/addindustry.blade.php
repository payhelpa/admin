
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
<h3 class="page-title">Industry </h3>

</div>

</div>

<div class="d-flex justify-content-center">

      <a href="#" ></a>
</div>
</div>
<style>
    /* Dropdown Button */
    .dropbtn {
    background-color: #2962ff;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd;}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {background-color: #2962ff;}

    /* blog css */
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    input[readonly] {
    background-color: white !important;
    cursor: text !important;
    }


</style>
<!--<div class="d-flex dropdown "style="float:left;">
    <button class="dropbtn" >Menu</button>
    <div class="dropdown-content">
        <a href="{{route('industry')}}">View Industries</a>
        <a href="{{route ('addindustry')}}">Create Industry</a>

    </div>
</div>-->
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Create New Industry</h4>

<div class="d-flex flex-row-reverse">
<div class="top-nav-search " style="background: linear-gradient(-45deg,#3949ab,#2962ff); border-radius: 50px;">

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
        <!-- Alert message (start) -->

        <!-- Alert message (end) -->
<div class="table-responsive">


    <form method="POST" action="{{route('createindustry')}}" style=" width: 400px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;">
        @csrf
        Title:<br>
        <input type="text" name="name" id="name" style="border: 1px solid gray;  border-radius: 5px;">
        <br>
        Description:<br>
        <input type="text" name="description" id="description" style="border: 1px solid gray;  border-radius: 5px;">
        <br><br>
        <input type="submit" value="Submit" style="border: 1px solid gray;  border-radius: 5px;">
    </form>


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
