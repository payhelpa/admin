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
                        <div class="col">
                            <h3 class="page-title">Transactions </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" ></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                        <div class="card-header">
                        <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-top nav-justified">
                        <li class="nav-item"><a class="nav-link active" href="#top-justified-tab1" data-toggle="tab">LU Pending</a></li>
                        <li class="nav-item"><a class="nav-link" href="#top-justified-tab2" data-toggle="tab">FU Offers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#top-justified-tab3" data-toggle="tab">Ongoing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#top-justified-tab4" data-toggle="tab">Success</a></li>
                        </ul>
                        <div class="tab-content">
                        <div class="tab-pane show active" id="top-justified-tab1">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Rate</th>
                                    <th>Dollar Amount</th>
                                    <th>Amount Requested</th>
                                    <th>Time Created</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lupendingtransactions as $pendingtransaction)
                                    <tr>
                                        <td>{{ucwords(UserController::GetUserName($pendingtransaction->user_id)) }}</td>
                                        <td>₦{{number_format($pendingtransaction->rate / 100,2)}}</td>
                                        <td>${{number_format($pendingtransaction->dollar_amount / 100,2)}}</td>
                                        <td>₦{{number_format($pendingtransaction->amount_requested_for_in_naira / 100,2)}}</td>
                                        <td>{{\Carbon\Carbon::parse($pendingtransaction->created_at)->diffForHumans()}}</td>
                                        <td><a href="{{route('singlependinginfo',$pendingtransaction->id)}}" class="btn btn-outline-primary mr-2"></i>View </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                </table>
                                </div>
                        </div>
                        <div class="tab-pane" id="top-justified-tab2">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Rate</th>
                                    <th>Title</th>
                                    <th>Balance</th>
                                    <th>Time created</th>
                                    <th>Send Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fupendingtransactions as $fupendingtransaction)
                                    <tr>
                                        <td>{{ucwords(UserController::GetUserName($fupendingtransaction->user_id)) }}</td>
                                        <td>₦{{number_format($fupendingtransaction->rate / 100,2)}}</td>
                                        <td>{{$fupendingtransaction->title}}</td>
                                        <td>${{number_format($fupendingtransaction->offer_balance / 100,2)}}</td>
                                        <td>{{\Carbon\Carbon::parse($fupendingtransaction->created_at)->diffForHumans()}}</td>
                                        <td class="text-center"><a href = "{{url('message/'.$fupendingtransaction->user_id)}}" ><i class="fa fa-envelope"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>


                                </table>
                                </div>
                        </div>
                        <div class="tab-pane" id="top-justified-tab3">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Local User</th>
                                            <th>Rate</th>
                                            <th>Dollar Amount</th>
                                            <th>Amount Requested</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ongoingtransactions as $ongoingtransaction)
                                        <tr>
                                            <td>{{ucwords(UserController::GetUserName($ongoingtransaction->user_id)) }}</td>
                                            <td>₦{{number_format($ongoingtransaction->rate /100,2)}}</td>
                                            <td>${{number_format($ongoingtransaction->dollar_amount / 100,2)}}</td>
                                            <td>₦{{number_format($ongoingtransaction->amount_requested_for_in_naira / 100,2)}}</td>
                                            <td>
                                                @if($ongoingtransaction->status == '0')
                                                    <a>Cancel Transfer</a>
                                                @elseif($ongoingtransaction->status == '1')
                                                    <a>Credit Wallet </a>
                                                @elseif($ongoingtransaction->status == '2')
                                                    <a>Confirming Transfer</a>
                                                @elseif($ongoingtransaction->status == '3')
                                                <a>Transfer Confirmed</a>
                                                    @elseif($ongoingtransaction->status == '4')
                                                    <a>Processing Transaction</a>
                                                    @elseif($ongoingtransaction->status == '5')
                                                    <a>Awaiting Confirmation</a>
                                                    @elseif($ongoingtransaction->status == '6')
                                                    <a>Transfer Successful</a>
                                                    @else
                                                        <a>Transaction</a>
                                                    @endif
                                            </td>
                                            <td><a href="{{route('singleOngoinginfo',$ongoingtransaction->id)}}" class="btn btn-outline-primary mr-2"></i>View </a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="top-justified-tab4">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Service</th>
                                    <th>Rate</th>
                                    <th>Dollar</th>
                                    <th>Amount Paid</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($successSolicitations as $successSolicitation)
                                    <tr>
                                        <td>{{ucwords(UserController::GetUserName($successSolicitation->user_id)) }}</td>
                                        <td>{{$successSolicitation->service->title}}</td>
                                        <td>₦{{$successSolicitation->rate / 100}}</td>
                                        <td>${{number_format($successSolicitation->dollar_amount / 100,2)}}</td>
                                        <td>₦{{number_format($successSolicitation->amount_requested_for_in_naira / 100,2)}}</td>
                                        <td><a href="{{url('single-Solicitors',$successSolicitation->id)}}" class="btn btn-outline-primary mr-2">Details</a></td>

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
                        <!--End of the Top line-->

                </div>

            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    </body>
</html>
</x-app-layout>
