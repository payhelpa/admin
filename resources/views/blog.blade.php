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
                                <h3 class="page-title">PayHelpa's Blog </h3>
                            </div>

                        </div>
                        <style>
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
                        </style><!--
                        <div class="d-flex dropdown "style="float:left;">
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
                                <div class="card-header">
                                    <h4 class="card-title">Create New Blog</h4>
                                </div>
                                @include('flash-message')
                                <div class="card-body">
                                    <div class="">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="{{route('createblog')}}" enctype="multipart/form-data" role="form">
                                                        @csrf
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="blog_description" id="blog_description" placeholder="Blog Description" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cover Image </label>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                Browse <input type="file" name="cover_image" id="cover_image" value="cover_image" required>
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="25" cols="5" id="body" name="body"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label for="division">Tags</label>
                                                            <p class="text-muted">Please select the tag(s) this post falls under.</p>
                                                            @foreach($tags as $tag)
                                                            <label class="checkbox-inline  mr-2">
                                                                <input type="checkbox" id="tags" name="tags[]" value="{{$tag->title}}"> {{$tag->title}}
                                                            </label>
                                                            @endforeach
                                                            <div class="form-group  mt-2" >
                                                                <label>Tag not found?</label>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="open">Add Tag</button>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                            Please select a tag.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control" />
                                                    </div>
                                                    </form><!--
                                                    <form method="POST" action="{{route('createtag')}}">
                                                        @csrf
                                                        <div class="form-group  mt-2" >
                                                            <label>Tag not found? Add Tag</label>
                                                            <input style=" width: 400px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;" type="text" class="form-control" name="title" id="title" placeholder="Add New Tag"   />
                                                            <input style=" width: 400px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;" type="text" class="form-control" name="description" id="description" placeholder="Add Tag Description"   />
                                                            <input type="submit" class="btn btn-primary btn-sm" name= "submit" />
                                                        </div>
                                                    </form>-->

    <form method="post" action="{{url('createtag')}}" id="form">
        @csrf
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">

        <h5 class="modal-title">Add Tag for Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-4">
              <label for="Title">Title:</label>
              <input style=" width: 400px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;" type="text" class="form-control" name="title" id="title" placeholder="Add New Tag"   />
            </div>
          </div>
          <div class="row">
              <div class="form-group col-md-4">
                <label for="Description">Description:</label>
                <input style=" width: 400px; display: flex; flex-direction: column; margin-top: 10px; font-weight: 600;" type="text" class="form-control" name="description" id="description" placeholder="Add Tag Description"   />

              </div>
          </div>

      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
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


            <script type="text/javascript">
                function display() {
                    var z = prompt("enter a tag");
                    if(z != null) {
                        document.getElementById("demo").innerHTML = "Tad Added! " + z + "..";
                        document.getElementById("case").style.visibility = 'visible';
                    } else {
                        document.getElementById("demo").innerHTML = "Tad Added!";
                    }
                }
                </script>

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
