<div class="main-wrapper">

<div class="header">

<div class="header-left">

<a href="" class="logo">
<img src="{{asset('assets/img/logo.png')}}" alt="Logo">
</a>
<a href="/cms/index" class="logo logo-small">
<img src="{{asset('assets/img/payhelpa_icon_light.png')}}" alt="Logo" width="30" height="30">
</a>
</div>

<a href="javascript:void(0);" id="toggle_btn">
<i class="fe fe-text-align-left"></i>
</a>


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
<div class="col"><a class="app-item" href="calendar.html"><i class="fa fa-calendar"></i><span>Activity Log</span></a></div>
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
<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets/img/profiles/avatar-02.jpg')}}">
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
<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets/img/profiles/avatar-11.jpg')}}">
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
<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets/img/profiles/avatar-17.jpg')}}">
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
<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets/img/profiles/avatar-13.jpg')}}">
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
<span class="user-img"><img class="rounded-circle" src="{{asset('assets/img/profiles/avatar-01.png')}}" width="31" alt="Ryan Taylor"></span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="avatar avatar-sm">
<img src="{{asset('assets/img/profiles/avatar-01.png')}}" alt="User Image" class="avatar-img rounded-circle">
</div>
<div class="user-text">
    <div class="px-4">
                <h6 class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</h6>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
</div>
</div>
<a class="dropdown-item" href="{{route ('profile')}}">My Profile</a>
<a class="dropdown-item" href="{{route ('profile')}}">Account Settings</a>
<form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-responsive-nav-link>
                </form>
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
                    <li class="active">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"><i class="fe fe-home"></i>
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                        <!--<a href="/cms/public/index"><i class="fe fe-home"></i> <span>Dashboard</span></a>-->
                    </li>
                    <li class="submenu">
                        <a href="{{route ('blog')}}"><i class="fe fe-globe"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{route('blog')}}">Create Blog</a></li>
                            <li><a href="{{route('allblog')}}">View Blogs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route ('charges')}}"><i class="fe fe-credit-card"></i> <span>Charges</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Pages</span>
                    </li>
                    <li class="submenu">
                        <a href="{{route ('users')}}"><i class="fe fe-users"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{route ('users')}}">All Users</a></li>
                            <li><a href="{{route ('individualusers')}}">Individual Users</a></li>
                            <li><a href="{{route ('businessusers')}}">Business Users</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="{{route ('verify')}}"><i class="fe fe-document"></i> <span> Verify</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{route ('verify')}}">Verify Individual Users</a></li>
                            <li><a href="#">Verify Business Users</a></li>
                            <li><a href="{{route ('unverified')}}">Unverified Users</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-activity"></i> <span> Services</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{route ('addServices')}}">Create Services</a></li>
                            <li><a href="{{route('services')}}">View Services</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url ('/industry')}}"><i class="fe fe-tiled"></i> <span>Industry</span></a>
                    </li>
                    <li>
                        <a href="{{url ('/status')}}"><i class="fe fe-file"></i> <span>Transaction</span></a>
                    </li>
                    <li>
                        <a href="{{route ('wallet')}}"><i class="fe fe-money"></i> <span>Wallet</span></a>
                    </li>
                    <li>
                        <a href="{{route ('withdrawals')}}"><i class="fe fe-map"></i> <span>Withdrawals</span></a>
                    </li>
                    <li>
                        <a href="{{route ('providuslog')}}"><i class="fe fe-book"></i> <span>Providus Logs</span></a>
                    </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="fe fe-user-plus"></i>
                                        {{ __('Logout') }}
                                        </x-responsive-nav-link>
                        </form>
                    <!--<a href="/cms/public/logout"><i class="fe fe-user-plus"></i> <span>Logout</span></a>-->
                    </li>
                </ul>
            </div>
        </div>
    </div>






<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links --><!--
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
-->


                <!-- Settings Dropdown -->
            <!--<div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">-->
                        <!-- Authentication --><!--
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>-->


            <!-- Hamburger -->
            <!--
                <div class="flex">-->
                <!-- Logo -->
                <!--<div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>-->

                <!-- Navigation Links --><!--
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>-->
            </div>


        </div>
    </div>

    <!-- Responsive Navigation Menu --><!--
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
-->
        <!-- Responsive Settings Options -->
        <!--<div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">-->
                <!-- Authentication --><!--
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>--><!--
            </div>
        </div>-->
    </div>
</nav>


<!--



-->
