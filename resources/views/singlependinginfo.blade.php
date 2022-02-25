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
<h4 class="card-title" style="text-align: center;">Local User Pending Transaction </h4>
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

            <form method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h4> Transaction created at {{date('l jS \of F Y h:i:s A', strtotime($user->created_at))}}</h4>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row">User Id</th>
                                            <td>{{$user->user_id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ucwords(UserController::GetUserName($user->user_id)) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Service</th>
                                                @if($user->service_id == '4')
                                            <td>School Fees Payment</td>
                                            @elseif ($user->service_id == '14')
                                                <td>Marriage Payment</td>
                                            @else
                                                <td>Amazon Payment</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Title</th>
                                            <td>{{$user->title}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rate</th>
                                            <td>₦{{number_format($user->rate,2)}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Dollar Amount</th>
                                            <td>${{number_format($user->dollar_amount,2)}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Amount Requested in Naira</th>
                                            <td>₦{{number_format($user->amount_requested_for_in_naira,2)}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Website Link</th>
                                            <td>{{$user->web_link}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Document Submitted</th>
                                            <td><a href="{{route('showdoc',$user->id)}}" class="btn btn-outline-primary mr-2"></i>Show </a></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Description</th>
                                            <td>{{$user->description}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Time Created</th>
                                            <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
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
