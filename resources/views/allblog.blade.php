@php use \App\Http\Controllers\UserController; @endphp
@php use Illuminate\Support\Str; @endphp
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
                                <h3 class="page-title">PayHelpa's Blog </h3>
                            </div>
                        </div>
                        <style>
                            /* Dropdown Button */
                            .dropbtn {
                            background-color: #2962ff;
                            color: white;
                            padding: 16px;
                            font-size: 16px;
                            border: none;
                            }

                            /* The container <div> - needed to position the dropdown content */
                            .dropdown {
                            position: relative;
                            display: inline-block;
                            }

                            /* Dropdown Content (Hidden by Default) */
                            .dropdown-content {
                            display: none;
                            position: absolute;
                            background-color: #f1f1f1;
                            min-width: 160px;
                            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                            z-index: 1;
                            }

                            /* Links inside the dropdown */
                            .dropdown-content a {
                            color: black;
                            padding: 12px 16px;
                            text-decoration: none;
                            display: block;
                            }

                            /* Change color of dropdown links on hover */
                            .dropdown-content a:hover {background-color: #ddd;}

                            /* Show the dropdown menu on hover */
                            .dropdown:hover .dropdown-content {display: block;}

                            /* Change the background color of the dropdown button when the dropdown content is shown */
                            .dropdown:hover .dropbtn {background-color: #2962ff;}

                            /* blog css */
                            .btn-file {
                                position: relative;
                                overflow: hidden;
                            }

                            .btn-file input[type=file] {
                                position: absolute;
                                top: 0;
                                right: 0;
                                min-width: 100%;
                                min-height: 100%;
                                font-size: 100px;
                                text-align: right;
                                filter: alpha(opacity=0);
                                opacity: 0;
                                outline: none;
                                background: white;
                                cursor: inherit;
                                display: block;
                            }

                            input[readonly] {
                            background-color: white !important;
                            cursor: text !important;
                            }


                        </style>
                        <!-- <div class="d-flex dropdown "style="float:left;">
                            <button class="dropbtn" >Menu</button>
                            <div class="dropdown-content">
                                <a href="{{route('blog')}}">Create New Blog</a>
                                <a href="{{route('allblog')}}">View all blogs</a>

                            </div>
                        </div>-->

                        <div class="d-flex justify-content-center"><a href="#" ></a></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <section class="comp-section comp-cards">
                                                        <div class="section-header">
                                                        <h3 class="section-title">Blogs</h3>
                                                        <div class="line"></div>
                                                        </div>

                                                        <div class="row">
                                                            @foreach($blogs as $blog)
                                                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                                                        <div class="card flex-fill">
                                                        <img alt="Card Image" src="{{$blog->cover_image}}" class="card-img-top">
                                                        <div class="card-header">
                                                        <h5 class="card-title mb-0">{{$blog->title}}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                        <p class="card-text">{{Str::words($blog->body, 13, ' >>>')}}</p>
                                                        <a class="btn btn-primary" href="{{route('blogdetails',$blog->id)}}">View more</a>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        @endforeach
                                                        </div>

                                                        </section>
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
            <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="bower_components/wysihtml/dist/wysihtml-toolbar.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<!-- rules defining tags, attributes and classes that are allowed -->

            <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

            <script src="bower_components/wysihtml/parser_rules/advanced_and_extended.js"></script>

            <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
            <script src="{{asset('assets/js/respond.min.js')}}"></script>
            <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
            <script src="{{asset('assets/js/popper.min.js')}}"></script>
            <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
            <script src="{{asset('assets/js/script.js')}}"></script>

            <script>
                ClassicEditor
                .create( document.querySelector( '#body' ) )
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

        </body>
    </html>
</x-app-layout>
