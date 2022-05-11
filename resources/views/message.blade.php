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
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
        <script src="javascript/common.js" type="text/javascript" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>
        <link href="{{asset('assets/plugins/summernote/dist/summernote-bs4.min.css')}}" rel="stylesheet">
        <script src="{{asset('assets/plugins/summernote/dist/summernote-bs4.min.js')}}" defer></script>
        <link href="{{asset('assets/plugins/summernote/summernote.min.js')}}" rel="stylesheet">
        <script src="{{asset('assets/plugins/summernote/summernote.min.js')}}" defer></script>
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
                    <div class="row">  </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" ></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="text-align: center;"> </h4>
                                <div class="d-flex flex-row-reverse">    </div>
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
                                                padding: .5%;
                                                margin-top: .5%;
                                                margin-bottom: 3%;
                                                border-radius: 0.5rem;
                                                background: #fff;
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
                                        <div class="container emp-profile">
                                            <p style="text-align: left;"> To: {{$email}}</p>
                                            @include('flash-message')
                                            <form method="POST" action ="{{route('messagesend')}}" >
                                                @csrf
                                                <input type="hidden" value="{{$email}}" name="email" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="myTabContent">
                                                            <div id="home">
                                                                <textarea name="details" id = "details" required></textarea><br>
                                                                <button type = "submit" style="align: center;" class = 'btn btn-outline-primary mr-2'>Send Message</button>
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
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="bower_components/wysihtml/dist/wysihtml-toolbar.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- rules defining tags, attributes and classes that are allowed -->
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
        <script src="bower_components/wysihtml/parser_rules/advanced_and_extended.js"></script>
        <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('assets/js/script.js')}}"></script>
        <script>
            ClassicEditor
            .create( document.querySelector( '#detailsss' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>



<script>
    $(function() {
        $(".bcontent").wysihtml5({
            toolbar: {
            "image": false
            }
        });

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this);
        var numFiles = input.get(0).files ? input.get(0).files.length : 1;
        console.log(input.get(0).files);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $('.btn-file :file').on('fileselect', function(event, numFiles, label){
        var input = $(this).parents('.input-group').find(':text');
        var log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
        input.val(log);
        } else {
        if( log ){ alert(log); }
        }

    });
    });
</script>

<script src="https://cdn.rawgit.com/bootstrap-wysiwyg/bootstrap3-wysiwyg/master/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#details').summernote({
            placeholder: 'Enter Message',
            tabsize: 2,
            height:100            // set focus to editable area after initializing summernote
        });
    });
</script>
</body>
</html>
</x-app-layout>
