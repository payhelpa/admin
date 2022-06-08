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
                            <h3 class="page-title">PayHelpa's Users </h3>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List of Users</h4>
                                <div class="d-flex flex-row-reverse">
                                    <div class="top-nav-search " style="background: linear-gradient(-45deg,#3949ab,#2962ff); border-radius: 50px;">
                                        <form class="form-inline my-2 my-lg-0" action = "" method= "" >
                                            <div class="input-group">
                                                <div>
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
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Send Message</th>
                                                <th>Login as User</th>
                                                <th>Created at</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userss as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{ucwords(UserController::GetUserPhoneNumber($user->id)) }}</td>
                                                <td class="text-center"><a href = "{{url('message/'.$user->id)}}"><i class="fa fa-envelope" style="text-align:center"></i></a></td>
                                                <td><a href="{{'https://payhelpa.com/auth/admin/login?token=PAY-HELPER#@1~89982+?f6a919HelpERXX&username='.$user->name}}" target="_blank" class="btn btn-sm bg-success">Login</a></td>
                                                <td>{{date('Y/m/d', strtotime($user->created_at))}}</td>
                                                <td class="text-left">
                                                    <div class="actions text-center">
                                                    @if($user->active_status == '1')
                                                        <a href="{{route('update_status',$user->id)}}" onclick="return confirm('ARE YOU SURE YOU WANT TO SUSPEND THIS USER?')" class="btn btn-sm bg-danger-light">Suspend</a>
                                                    @else
                                                        <a href="{{route('update_status',$user->id)}}" onclick="return confirm('ARE YOU SURE YOU WANT TO UNSUSPEND THIS USER?')" class="btn btn-sm bg-success-light mr-2"></i>Unsuspend</a>
                                                    @endif
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
