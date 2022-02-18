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
<div class="col-sm-12">
<h3 class="page-title">Welcome Admin!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item active">Dashboard</li>
</ul>
</div>
</div>
</div>
<div class="d-flex justify-content-center">

      <a href="#" ></a>
</div>
<div class="row">
<div class="col-xl-3 col-sm-6 col-12"><a href="{{route ('users')}}">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon bg-primary">
<i class="fe fe-users"></i>
</span>

</div>
<div class="dash-widget-info">
<h3>{{$count}}</h3>
<h6 class="text-muted">Total Registered Users</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-primary w-50"></div>
</div>
</div>
</div>
</div></a>
</div>
<div class="col-xl-3 col-sm-6 col-12"><a href="{{route ('verify')}}">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon bg-warning">
<i class="fe fe-folder"></i>
</span>
<div class="dash-count">
<i class="fa fa-arrow-up text-success"></i> 17%
</div>
</div>
<div class="dash-widget-info">
<h3>{{$ver}}</h3>
<h6 class="text-muted">Total Verified Users</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-warning w-50"></div>
</div>
</div>
</div>
</div></a>
</div>
<div class="col-xl-3 col-sm-6 col-12"><a href="{{route ('transactions')}}">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon bg-success">
<i class="fe fe-money"></i>
</span>
<div class="dash-count">
<i class="fa fa-arrow-down text-danger"></i>%
</div>
</div>
<div class="dash-widget-info">
<h3>{{$counttrans}}</h3>
<h6 class="text-muted">Total Transaction</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-success w-50"></div>
</div>
</div>
</div>
</div></a>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon bg-danger">
<i class="fe fe-credit-card"></i>
</span>
<div class="dash-count">
 AS:
</div>
</div>
<div class="dash-widget-info">
<h3>$</h3>
<h6 class="text-muted">Sales</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-danger w-50"></div>
</div>
</div>
</div>
</div>
</div>

</div>

<div class="row">
<div class="col-md-12 col-lg-12">

<div class="card card-chart">
<div class="card-header">
<h4 class="card-title">Registered Users</h4>
</div>
<div class="card-body">
<div>
    <canvas id="myChart" width="400" height="130"></canvas>


</div>
</div>
</div>

</div>
<div class="col-md-12 col-lg-12">

<div class="card card-chart">
<div class="card-header">
<h4 class="card-title">Transaction </h4>
</div>
<div class="card-body">
 <canvas id="myChartt" width="400" height="130"></canvas>
</div>
</div>

</div>
</div>
<div class="row">
<div class="col-md-12 d-flex">

<div class="card card-table flex-fill">
<div class="card-header">
<h4 class="card-title">Recent Transactions</h4>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center">
<thead>
<tr>
    <th>Transaction ID</th>
    <th>Forieng User</th>
    <th>Local User</th>
    <th>Date</th>
    <th class="text-center"> Rate</th>
    <th class="text-right">Amount Requested</th>
    <th class="text-center">Status</th>

</tr>
</thead>
<tbody>

</tbody>
</table>
</div>
</div>
</div>

</div>
<!--<div class="col-md-6 d-flex">

<div class="card flex-fill">
<div class="card-header">
<h4 class="card-title">Feed Activity</h4>
</div>
<div class="card-body">
<ul class="activity-feed">
<li class="feed-item">
<div class="feed-date">Apr 13</div>
<span class="feed-text"><a href="profile.html">John Doe</a> added new product <a href="product-details.html">"Smart Watch"</a></span>
</li>
<li class="feed-item">
<div class="feed-date">Mar 21</div>
<span class="feed-text"><a href="profile.html">Justin Lee</a> requested amount of <a href="invoice.html">$5,781</a></span>
</li>
<li class="feed-item">
<div class="feed-date">Feb 2</div>
<span class="feed-text">New user registered <a href="profile.html">"Mary Wiley"</a></span>
</li>
<li class="feed-item">
<div class="feed-date">Jan 27</div>
<span class="feed-text"><a href="profile.html">Robert Martin</a> gave a review for <a href="product-details.html">"Dell Laptop"</a></span>
</li>
<li class="feed-item">
<div class="feed-date">Jan 14</div>
<span class="feed-text">New customer registered <a href="profile.html">"Tori Carter"</a></span>
</li>
</ul>
</div>
</div>

</div>
----script---
   //var _xidata=JSON.parse(' json_encode($susmonthCounts) ');

 /*  var pending = {
    label: "pending",
    data: _xidata,
    lineTension: 0,
    fill: false,
    borderColor: 'red',
    borderWidth: 1
  };
*/

-->

<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    var userdata=<?php echo json_encode($userdata)?>;
    Highcharts.chart('container',{
        title:{
            text:"A chart for new users"
        }
        xAxis:{
            categories: ['jan','feb', 'march', 'april']
        }
        yAxis:{
            title:{
                text:"Num of new users"
            }
        },
        series:[{
            name:"new users",
            data:userdata
        }],
    });

</script>
</div>
</div>
</div>

</div>

<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/js/chart.morris.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

<script src="{{asset('assets/js/script.js')}}"></script>

<script type="text/javascript">

</script>




</x-app-layout>

</body>
</html>

