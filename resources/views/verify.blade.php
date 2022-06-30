@php use \App\Http\Controllers\UserController; @endphp
<x-app-layout>
    <x-slot name="header">
        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>-->
    </x-slot>

<!DOCTYPE html>
<html lang="en">
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
    <div class="d-flex justify-content-center">
        <a href="#" ></a>
    </div>
    @include('flash-message')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Verify Users </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List of Individual users to be verified</h4>
                            <div class="d-flex flex-row-reverse">
                                <form class="form-inline my-2 my-lg-0" action = "" method= "" >
                                    <div class="input-group">
                                        <input type="search" class="form-control mr-sm-2" placeholder ="Search" name="search">
                                        <label class="form-label" for="form1"></label>
                                        <input type="submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Send Message</th>
                                            <th>Documents</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-left"><a href = "{{url('message/'.$user->id)}}" ><i class="fa fa-envelope"></i></a></td>
                                            <td><a href="{{route('show',$user->id)}}" class="btn btn-outline-primary mr-2"></i>Show </a></td>
                                            <td><a href="{{url('update_verify',$user->id)}}" onclick="return confirm('ARE YOU SURE YOU WANT TO VERIFY THIS USER?')"  class="btn btn-outline-primary mr-2"></i>Verify </a></td>
                                        </tr>
                                    @endforeach
                                    @include('flash-message')
                                    </tbody>
                                </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

</body>
</html>
</x-app-layout>
