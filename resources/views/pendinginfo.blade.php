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

<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/feathericon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
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


</div>
<div class="d-flex justify-content-center">
      
      <a href="#" ></a>      
</div>
</div>
 
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" style="text-align: center;">Pending Transaction</h4>
<!--<p class="card-text">
This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
</p>-->
<div class="d-flex flex-row-reverse">

</div>
</div>



<div class="card-body">
    <div class="table-responsive">
        <div class="container">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
<div class="container emp-profile"style="text-align: center;">
    @foreach ($post as $key)
            <form method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Beneficial Helpa</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ucwords(UserController::GetUserName($key->lu_id)) }}</div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Transaction Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{date('l jS \of F Y h:i:s A', strtotime($key->created_at))}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Amount Needed</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${{number_format($key->amount_requested, 2)}}</p>
                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Current Rate </label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>N{{number_format($key->rate,2)}}</p>
                                            </div>
                                        </div>
                                        
                                        <!--<div class="row">
                                            <div class="col-md-6">
                                                <label>Ongoing Transactions</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>-->
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>  
             @endforeach
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


<script src="{{asset('public/assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatables/datatables.min.js')}}"></script>

<script src="{{asset('public/assets/js/script.js')}}"></script>
</body>
</html>
</x-app-layout>
