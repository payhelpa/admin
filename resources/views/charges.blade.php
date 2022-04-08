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
<h3 class="page-title">Charge</h3>

</div>

</div>

<div class="d-flex justify-content-center">

      <a href="#" ></a>
</div>
</div>

<div class="row">
    <div class="col-xl-4 col-sm-6 col-12"><a href="">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-success">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <i></i>₦5
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3></h3>
                    <h6 class="text-muted">Current LU Rate</h6>
                </div>
            </div>
        </div></a>
    </div>
    <div class="col-xl-4 col-sm-6 col-12"><a href="">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-success">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <i></i>₦5
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3></h3>
                    <h6 class="text-muted">Current LU Rate</h6>
                </div>
            </div>
        </div></a>
    </div>
    <div class="col-xl-4 col-sm-6 col-12"><a href="">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-success">
                        <i class="fe fe-clock"></i>
                    </span>
                    <div class="dash-count">
                        <i></i>72MINS
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3></h3>
                    <h6 class="text-muted">CURRENT TRANSACTION TIMER</h6>
                </div>
            </div>
        </div></a>
    </div>
</div>


    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Update FU Charge</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <!-- Alert message (start) -->
                        <!-- Alert message (end) -->
                    <div class="table-responsive">
                            <form method="POST" action="" style=" width: 280px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;">
                            @csrf
                            @method('PUT')
                            Enter FU Charge:<br>
                            <input type="text" name="title" id="title" value="" style="border: 1px solid gray;  border-radius: 5px;">
                            <br>
                            Confirm FU Charge:<br>
                            <input type="text" name="description" id="description" value="" style="border: 1px solid gray;  border-radius: 5px;">
                            <br><br>
                            <input type="submit" value="Update FU Charge" style="border: 1px solid gray;  border-radius: 5px;">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Update LU Charge</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <!-- Alert message (start) -->
                        <!-- Alert message (end) -->
                    <div class="table-responsive">
                            <form method="POST" action="" style=" width: 280px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;">
                            @csrf
                            @method('PUT')
                            Enter LU Charge:<br>
                            <input type="text" name="title" id="title" value="" style="border: 1px solid gray;  border-radius: 5px;">
                            <br>
                            Confirm LU Charge:<br>
                            <input type="text" name="description" id="description" value="" style="border: 1px solid gray;  border-radius: 5px;">
                            <br><br>
                            <input type="submit" value="Update LU Charge" style="border: 1px solid gray;  border-radius: 5px;">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Update Timer</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <!-- Alert message (start) -->
                        <!-- Alert message (end) -->
                    <div class="table-responsive">
                            <form method="POST" action="" style=" width: 280px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;">
                            @csrf
                            @method('PUT')
                            Current Timer:<br>
                            <input type="text" name="title" id="title" value="" style="border: 1px solid gray;  border-radius: 5px;">
                            <br>
                            Enter New Timer:<br>
                            <input type="text" name="description" id="description" value="" style="border: 1px solid gray;  border-radius: 5px;">
                            <br><br>
                            <input type="submit" value="Update Timer" style="border: 1px solid gray;  border-radius: 5px;">
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
