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
                                <h3 class="page-title">Countries </h3>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" ></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                <h4 class="card-title">Edit Country</h4>
                                    <div class="d-flex flex-row-reverse">
                                        <div class="top-nav-search " style="background: linear-gradient(-45deg,#3949ab,#2962ff); border-radius: 50px;">
                                            <form class="form-inline my-2 my-lg-0" action = "" method= "" >
                                                <div class="input-group">
                                                    <input type="search" class="form-control mr-sm-2" placeholder ="Search" name="search">
                                                    <label class="form-label" for="form1"></label>
                                                </div>
                                                <input type="submit" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                        <!-- Alert message (start) -->
                                        <!-- Alert message (end) -->
                                    <div class="table-responsive">
                                            <form method="POST" action="{{url('country/update/'.$country->id) }}" style=" width: 400px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                Name:<br>
                                                <input type="text" name="name" id="name" value="{{$country->name}}" style="border: 1px solid gray;  border-radius: 5px;">
                                                <br>
                                                Logo:
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <span class="btn btn-primary btn-file">
                                                            Browse <input type="file" name="logo" id="logo" value="{{$country->logo}}" >
                                                        </span>
                                                    </span>
                                                    <input type="text" class="form-control" readonly>
                                                </div><br><br>

                                                Country Code:
                                                <input type="text" name="phone_number_code" id="phone_number_code" value="{{$country->phone_number_code}}" style="border: 1px solid gray;  border-radius: 5px;">
                                                <br><br>Currency:
                                                <input type="text" name="currency" id="currency" value="{{$country->currency}}" style="border: 1px solid gray;  border-radius: 5px;">
                                                <br><br>Symbol:
                                                <input type="text" name="currency_symbol" id="currency_symbol" value="{{$country->currency_symbol}}" style="border: 1px solid gray;  border-radius: 5px;">


                                                <br><br>
                                                <input type="submit" value="Update" style="border: 1px solid gray;  border-radius: 5px;">
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
