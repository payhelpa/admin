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
                            <h3 class="page-title">Nigerian Users </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
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
                            <div class="col-md-12">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                                        <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Individual</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Business</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="solid-justified-tab1">
                                            <div class="btn-group" style="float:right;">
                                                <a class="btn btn-primary" href="{{route('export')}}">Export</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="datatable table table-stripped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Send Message</th>
                                                            <th>Login as User</th>
                                                            <th>Tier</th>
                                                            <th class="text-right">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                        <tr>
                                                            <td><a href="{{route('user_details',$user->user_id)}}">{{ucwords(UserController::GetUserName($user->user_id)) }}</a></td>
                                                            <td>{{ucwords(UserController::GetUserEmail($user->user_id)) }}</td>
                                                            <td>{{$user->phone_number}}</td>
                                                            <td class="text-center"><a href = "{{url('message/'.$user->user_id)}}" ><i class="fa fa-envelope" style="text-align:center"></i></a></td>
                                                            <td><a href="{{'https://payhelpa.com/auth/admin/login?token=PAY-HELPER#@1~89982+?f6a919HelpERXX&username='.$user->id}}" target="_blank" class="btn btn-sm bg-success">Login</a></td>
                                                            @if($user->verification_level == 'tier_three')
                                                                <td><span class="badge badge-success text-white">Tier three</span></td>
                                                            @elseif($user->verification_level == 'tier_two')
                                                                <td><span class="badge badge-warning text-white">Tier two</span></td>
                                                            @else
                                                            <td><span class="badge badge-danger text-white">Tier one</span></td>
                                                            @endif

                                                            <td class="text-left">
                                                                <div class="actions text-center">
                                                                @if($user->user->active_status)
                                                                    <a href="{{route('update_status',$user->user_id)}}" onclick="return confirm('ARE YOU SURE YOU WANT TO SUSPEND THIS USER?')" class="btn btn-sm bg-danger-light">Suspend</a>
                                                                @else
                                                                    <a href="{{route('update_status',$user->user_id)}}" onclick="return confirm('ARE YOU SURE YOU WANT TO UNSUSPEND THIS USER?')" class="btn btn-sm bg-success-light mr-2"></i>Unsuspend</a>
                                                                @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="solid-justified-tab2">
                                            <div class="btn-group" style="float:right;">
                                                <a class="btn btn-primary" href="{{route('exportbiz')}}">Export</a>
                                            </div>
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
                                                    <th class="text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($businessusers as $user)
                                                    <tr>
                                                        <td><a href="{{route('user_details_bis',$user->user_id)}}">{{ucwords(UserController::GetUserName($user->user_id)) }}</a></td>
                                                        <td>{{ucwords(UserController::GetUserEmail($user->user_id)) }}</td>
                                                        <td>{{$user->phone_number}}</td>
                                                        <td class="text-center"><a href = "#" ><i class="fa fa-envelope" style="text-align:center"></i></a></td>
                                                        <td><a href="{{'https://payhelpa.com/auth/admin/login?token=PAY-HELPER#@1~89982+?f6a919HelpERXX&business_name='.$user->id}}" target="_blank" class="btn btn-sm bg-success">Login</a></td>
                                                        <td>{{$user->created_at}}</td>
                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a href="#" onclick="return confirm('ARE YOU SURE YOU WANT TO SUSPEND THIS USER?')" class="btn btn-sm bg-danger-light">Suspend</a>
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
