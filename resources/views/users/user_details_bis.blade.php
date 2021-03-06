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


</div>
<div class="d-flex justify-content-center">

      <a href="#" ></a>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">User Details</h4>
 <a href="{{route ('users')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg>
</a>
<i class="bi bi-arrow-return-left"></i>
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
    #customers {

  border-collapse: collapse;
  width: 100%;
    }
    table {
    width: 100%;
    border: 1px solid #D8D8D8;
    border-top: 1px solid #D8D8D8;
    background-color: #FDFDFF;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
    }

    #customers td, #customers th {
    padding: 28px;
    border-top: 1px solid #D8D8D8;
    }

    #customers tr:nth-child(even){background-color: #FDFDFF;
    ;}

#customers tr:hover {background-color: #F2F6FF;}
</style>

  <div class="container emp-profile">
    @foreach ($userss as $user)
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>{{ucwords(UserController::GetUserName($user->user_id)) }}</h5>
                        <h6>   </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"  role="tab" aria-controls="profile" aria-selected="false">Transaction</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-10" id="customers">
                <div class="tab-content profile-tab" id="myTabContent ">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                <th scope="row">Email</th>
                                <td>{{ucwords(UserController::GetUserEmail($user->user_id)) }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Phone Number</th>
                                <td>{{$user->phone_number}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Company Address</th>
                                <td>{{$user->business_address}}</td>
                              </tr>

                              <tr>
                                <th scope="row">business Name </th>
                                <td>{{$user->business_name}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Office Address</th>
                                <td>{{$user->business_desc}}</td>
                              </tr>
                              <tr>
                                <th scope="row">CAC Number</th>
                                <td>{{$user->website}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Phone Number Verified At</th>
                                <td>{{$user->phone_number_verified_at}}</td>
                              </tr>
                              <tr>
                                <th scope="row">State ID</th>
                                <td>{{$user->rc_number}}</td>
                              </tr>
                              <tr>
                                <th scope="row">State ID</th>
                                <td>{{$user->rc_number}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Created At</th>
                                <td>{{$user->created_at}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Updated At</th>
                                <td>{{$user->updated_at}}</td>
                              </tr>
                            </tbody>
                          </table>

                </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                            <div class="col-md-4">
                                                <label>Pending Transaction</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p></p>
                                            </div>
                                            <div class="col-md-4"><a href="" class="btn btn-outline-primary mr-2"></i>View </a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ongoing Transaction</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p></p>
                                            </div>
                                            <div class="col-md-4"><a href="" class="btn btn-outline-primary mr-2"></i>View </a></div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Successful Transaction </label>
                                            </div>
                                            <div class="col-md-4">
                                                <p></p>
                                            </div>
                                            <div class="col-md-4"><a href="" class="btn btn-outline-primary mr-2"></i>View </a></div>
                                        </div>
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
