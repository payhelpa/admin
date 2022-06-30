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
                <div class="col-sm-12">
                <h3 class="page-title">PayHelpa's Blog </h3>
                <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Blog's Details</li>
                </ul>
                </div>
                </div>
                </div>
                <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6 col-sm-12">
                <div class="product-view">
                    @include('flash-message')
                <div class="proimage-wrap">
                    @foreach($blogs as $blog)
                <div class="pro-image" id="pro_popup">
                <a href="{{$blog->cover_image}}">
                <img class="img-fluid" style="height: 15rem; width:20rem" src="{{$blog->cover_image}}" alt="Cover Image">
                </a>
                </div>

                </div>
                </div>
                </div>
                <div class="col-md-6 col-sm-12">
                <div class="product-info">
                <h2>{{$blog->title}}</h2>
                <i class="text-muted">{{date('l jS \of F Y h:i:s A',strtotime($blog->created_at))}}</i>
                <!--<p class="mb-0">Product ID: PRO-0001</p>-->
                <div class="rating">
                <p>
                <span><i class="fa fa-star rated"></i></span>
                <span><i class="fa fa-star rated"></i></span>
                <span><i class="fa fa-star rated"></i></span>
                <span><i class="fa fa-star rated"></i></span>
                <span><i class="fa fa-star-o "></i></span>
                <span>/ Reviews (3)</span>
                </p>

                </div>
                <a  style="float:right;" href="{{ route('blog.delete',$blog->id) }}" class="btn btn-sm bg-danger-light">
                    <i class="fe fe-trash"></i> Delete
                </a>
                <!--<p class="product_price">$5528</p>
                <p><b>Availability:</b> In Stock</p>-->
                </div>
                </div>
                <div class="col-sm-12">
                <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active" href="#product_desc" data-toggle="tab">Description</a></li>
                <li class="nav-item"><a class="nav-link" href="#product_reviews" data-toggle="tab">Reviews</a></li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane show active" id="product_desc">
                <div class="product-content">
                <p>{!!($blog->body)!!}</p>
                </div>
                </div>
                @endforeach
                <div class="tab-pane" id="product_reviews">
                <div class="product-reviews">
                <h4 class="mb-3">Reviews (3)</h4>
                <ul class="review-list">
                    @foreach($blogdetails as $blogdetail)
                <li>
                <div class="review">
                <div class="review-author">
                <img class="avatar" alt="User Image" src="assets/img/profiles/avatar-09.jpg">
                </div>
                <div class="review-block">
                <div class="review-by">
                <span class="review-author-name">{{$blogdetail->name}}Mark Boydston</span>
                <div class="rating">
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star-o"></i>
                </div>
                </div>
                <p>{{$blogdetail->comment}}</p>
                <span class="review-date">{{$blogdetail->created_at}}</span>
                </div>
                </div>
                </li>
                @endforeach



                <!-- <li>
                <div class="review">
                <div class="review-author">
                <img class="avatar" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
                </div>
                <div class="review-block">
                <div class="review-by">
                <span class="review-author-name">Julie Rodriguez</span>
                <div class="rating">
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                </div>
                </div>
                <p>Excellent quality and Excellent Battery Backup</p>
                <span class="review-date">Dec 13, 2018</span>
                </div>
                </div>
                </li>-->
                </ul><!--
                <div class="all-reviews">
                <button type="button" class="btn btn-primary">View All Reviews</button>
                </div>-->
                </div>
                <!--<div class="product-write-review">
                <h4 class="mb-3">Write Review</h4>
                <form>
                <div class="row">
                <div class="col-sm-8">
                <div class="form-group">
                <label>Name <span class="text-red">*</span></label>
                <input type="text" class="form-control">
                </div>
                <div class="form-group">
                <label>Your email address <span class="text-red">*</span></label>
                <input type="email" class="form-control">
                </div>
                <div class="form-group">
                <label>Rating <span class="text-red">*</span></label>
                <div class="rating">
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star-o"></i>
                </div>
                </div>
                <div class="form-group">
                <label>Review Comments</label>
                <textarea rows="4" class="form-control"></textarea>
                </div>
                <div class="review-submit">
                <input type="submit" value="Submit" class="btn">
                </div>
                </div>
                </div>
                </form>
                </div>-->
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
