<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventura.dreamguystech.com/template/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:25 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Ventura - Calendar</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">


<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
        
        <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body>

<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a href="index-2.html" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="index-2.html" class="logo logo-small">
<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<a href="javascript:void(0);" id="toggle_btn">
<i class="fe fe-text-align-left"></i>
</a>
<div class="top-nav-search">
<form>
<input type="text" class="form-control" placeholder="Search here">
<button class="btn" type="submit"><i class="fa fa-search"></i></button>
</form>
</div>

<a class="mobile_btn" id="mobile_btn">
<i class="fa fa-bars"></i>
</a>


<ul class="nav user-menu">

<li class="nav-item dropdown app-dropdown">
<a class="nav-link dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#"><i class="fe fe-app-menu"></i></a>
<ul class="dropdown-menu app-dropdown-menu">
<li>
<div class="app-list">
<div class="row">
<div class="col"><a class="app-item" href="inbox.html"><i class="fa fa-envelope"></i><span>Email</span></a></div>
<div class="col"><a class="app-item active" href="calendar.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></div>
<div class="col"><a class="app-item" href="chat.html"><i class="fa fa-comments"></i><span>Chat</span></a></div>
</div>
</div>
</li>
</ul>
</li>


<li class="nav-item dropdown noti-dropdown">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
 </li>
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="#">
<div class="media">
<span class="avatar avatar-sm">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="#">View all Notifications</a>
</div>
</div>
</li>


<li class="nav-item dropdown has-arrow">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="avatar avatar-sm">
<img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
</div>
<div class="user-text">
<h6>Ryan Taylor</h6>
<p class="text-muted mb-0">Administrator</p>
</div>
</div>
<a class="dropdown-item" href="profile.html">My Profile</a>
<a class="dropdown-item" href="profile.html">Account Settings</a>
<a class="dropdown-item" href="login.html">Logout</a>
</div>
</li>

</ul>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="menu-title">
<span>Main</span>
</li>
<li>
<a href="index-2.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-cart"></i> <span> Ecommerce</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="products.html">Products</a></li>
<li><a href="product-details.html">Product View</a></li>
<li><a href="orders.html">Orders</a></li>
<li><a href="customers.html">Customers</a></li>
<li><a href="invoice.html">Invoice</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-tiled"></i> <span> Application</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="chat.html">Chat</a></li>
<li><a class="active" href="calendar.html">Calendar</a></li>
<li><a href="inbox.html">Email</a></li>
</ul>
</li>
<li class="menu-title">
<span>Pages</span>
</li>
<li>
<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="login.html"> Login </a></li>
<li><a href="register.html"> Register </a></li>
<li><a href="forgot-password.html"> Forgot Password </a></li>
<li><a href="lock-screen.html"> Lock Screen </a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="error-404.html">404 Error </a></li>
<li><a href="error-500.html">500 Error </a></li>
</ul>
</li>
<li>
<a href="users.html"><i class="fe fe-users"></i> <span>Users</span></a>
</li>
<li>
<a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
</li>
<li>
<a href="maps-vector.html"><i class="fe fe-map"></i> <span>Vector Maps</span></a>
</li>
<li class="menu-title">
<span>UI Interface</span>
</li>
<li>
<a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
<li><a href="form-input-groups.html">Input Groups </a></li>
<li><a href="form-horizontal.html">Horizontal Form </a></li>
<li><a href="form-vertical.html"> Vertical Form </a></li>
<li><a href="form-mask.html"> Form Mask </a></li>
<li><a href="form-validation.html"> Form Validation </a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="tables-basic.html">Basic Tables </a></li>
<li><a href="data-tables.html">Data Table </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li class="submenu">
<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
<li class="submenu">
<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li><a href="javascript:void(0);">Level 3</a></li>
<li><a href="javascript:void(0);">Level 3</a></li>
</ul>
</li>
<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
</ul>
</li>
<li>
<a href="javascript:void(0);"> <span>Level 1</span></a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</div>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Calendar</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html">Dashboard</a></li>
<li class="breadcrumb-item active">Calendar</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="#" class="add-btn" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Create New</a>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-3 col-md-4">
<h4 class="card-title">Drag & Drop Event</h4>
<div id="calendar-events" class="mb-3">
<div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> My Event One</div>
<div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> My Event Two</div>
<div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> My Event Three</div>
<div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> My Event Four</div>
</div>
<div class="checkbox  mb-3">
<input id="drop-remove" type="checkbox">
<label for="drop-remove">
Remove after drop
</label>
</div>
<a href="#" data-toggle="modal" data-target="#add_new_event" class="btn mb-3 btn-primary btn-block">
<i class="fa fa-plus"></i> Add Category
</a>
</div>
<div class="col-lg-9 col-md-8">
<div class="card">
<div class="card-body">
<div id="calendar"></div>
</div>
</div>
</div>
</div>

<div id="add_event" class="modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Add Event</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
<div class="form-group">
<label>Event Name <span class="text-danger">*</span></label>
<input class="form-control" type="text">
</div>
<div class="form-group">
<label>Event Date <span class="text-danger">*</span></label>
<div class="cal-icon">
<input class="form-control datetimepicker" type="text">
</div>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>


<div class="modal fade none-border" id="my_event">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Event</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body"></div>
<div class="modal-footer justify-content-center">
<button type="button" class="btn btn-success save-event submit-btn">Create event</button>
<button type="button" class="btn btn-danger delete-event submit-btn" data-dismiss="modal">Delete</button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="add_new_event">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Category</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<form>
<div class="form-group">
<label>Category Name</label>
<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
</div>
<div class="form-group mb-0">
<label>Choose Category Color</label>
<select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
<option value="success">Success</option>
<option value="danger">Danger</option>
<option value="info">Info</option>
<option value="primary">Primary</option>
<option value="warning">Warning</option>
<option value="inverse">Inverse</option>
</select>
</div>
<div class="submit-section">
<button type="button" class="btn btn-primary save-category submit-btn" data-dismiss="modal">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>

</div>
</div>

</div>


<script src="assets/js/jquery-3.2.1.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from ventura.dreamguystech.com/template/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:17:32 GMT -->
</html>
