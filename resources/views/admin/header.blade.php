<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:06:57 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')dfgdgfgdf</title>
	<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('public/assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
    <!-- Start Global Mandatory Style
         =====================================================================-->
    <!-- jquery-ui css -->
    <link href="{{ asset('public/admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap -->
    <link href="{{ asset('public/admin_assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Lobipanel css -->
    <link href="{{ asset('public/admin_assets/plugins/lobipanel/lobipanel.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Pace css -->
    <link href="{{ asset('public/admin_assets/plugins/pace/flash.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{ asset('public/admin_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Pe-icon -->
    <link href="{{ asset('public/admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Themify icons -->
    <link href="{{ asset('public/admin_assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- End Global Mandatory Style
      Emojionearea -->
    <link href="{{ asset('public/admin_assets/plugins/emojionearea/emojionearea.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- End page Label Plugins -->
	<link href="{{ asset('public/admin_assets/plugins/icheck/skins/all.css')}}" rel="stylesheet" type="text/css"/>
      
    <!--Summernote css-->
    <link href="{{ asset('public/admin_assets/plugins/summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('public/admin_assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_assets/dist/css/inputtag.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style rtl -->
    <link href="{{ asset('public/admin_assets/dist/css/fSelect.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/admin_assets/plugins1/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('public/admin_assets/plugins1/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin_assets/plugins1/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link href="{{ asset('public/admin_assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css')}}" rel="stylesheet" type="text/css"/>
	@stack('custom_css')
    <style>
        .toast-top-right {
            top: 70px !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!--preloader-->
  <!--  <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="{{url('admin/dashboard')}}" class="logo">
                <!-- Logo -->
                <span class="logo-mini">
                    <h1 class="text-white">B</h1>
                </span>
                <span class="logo-lg">
                    <h3 class="text-white">Babacarbazar.com</h3>
                </span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="pe-7s-angle-left-circle"></span>
                </a>
                <!-- searchbar-->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- user -->
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('public/admin_assets/dist/img/avatar5.png')}}" class="img-circle" width="45"
                                    height="45" alt="user"></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('admin/profile')}}">
                                        <i class="fa fa-user"></i> User Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/change-password')}}">
                                        <i class="fa fa-user"></i> Change Password</a>
                                </li>
                                <li><a href="{{ url('admin/logout')}}">
                                        <i class="fa fa-sign-out"></i> Signout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @if(Session::has('error'))
                    <div class="alert">
                    </div>
                    @elseif(Session::has('success'))
                    <div class="alert">
                    </div>
                    @endif
                </div>
            </nav>
        </header>

        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
                <!-- sidebar menu -->
                <ul class="sidebar-menu">
                    <li class="@yield('dashboard')">
                        <a href="{{ route ('admin.dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview @yield('users')">
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-users"></i><span>Users</span>
                        </a>

                    </li>
					<li class="treeview @yield('')">
                        <a href="{{ url('message') }}">
                            <i class="fa fa-comments"></i><span>Chat</span>
                        </a>

                    </li>
                    <li class="treeview @yield('brand')">
                        <a href="#">
                            <i class="fa fa-picture-o"></i><span>Brands</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.insert.brand') }}">Add Brand</a></li>
                            <li><a href="{{ route('admin.brand') }}">Brand List</a></li>
                        </ul>
                    </li>
					<li class="treeview @yield('model')">
                        <a href="#">
                            <i class="fa fa-picture-o"></i><span>Models</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.insert.model') }}">Add Model</a></li>
                            <li><a href="{{ route('admin.model') }}">Model List</a></li>
                        </ul>
                    </li>
					<li class="treeview @yield('variant')">
                        <a href="#">
                            <i class="fa fa-picture-o"></i><span>Variant </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.insert.variant') }}">Add Variant</a></li>
                            <li><a href="{{ route('admin.variant') }}">Variant List</a></li>
                        </ul>
                    </li>
                    <li class="treeview @yield('catelog')" >
                        <a href="#">
                            <i class="fa fa-tag"></i><span>Catelog</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview @yield('category')" >
                                <a href="#">
                                    <i class="fa fa-tag"></i><span>Category</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('admin.add-category') }}">Add Category</a></li>
                                    <li><a href="{{ route('admin.category') }}">Category List</a></li>
                                </ul>
                            </li>
                            <li class="treeview @yield('product')" >
                                <a href="#">
                                    <i class="fa fa-product-hunt"></i><span>Products</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('admin.add-product') }}">Add product</a></li>
                                    <li><a href="{{ route('admin.products') }}">Products List</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="treeview @yield('user_product')">
                        <a href="{{ route('admin.user.products') }}">
                            <i class="fa fa-user"></i><span>User Posts</span>
                        </a>
                    </li>
                    
                    <li class="treeview @yield('siteinfo')">
                        <a href="#">
                            <i class="fa fa-cogs"></i><span>Site Information</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/setting/terms-and-condition') }}">Terms & Condition</a></li>
                            <li><a href="{{ url('admin/setting/privacy-policy') }}">Privacy policy</a></li>
                            <li><a href="{{ url('admin/setting/about-us') }}">About</a></li>
                            
                        </ul>
                    </li>
                    <li class="treeview @yield('enquery')">
                        <a href="{{ url('admin/user/enquery') }}">
                            <i class="fa fa-comment"></i><span>Inquery Messages</span>
                        </a>
                    </li>
					<li class="treeview @yield('contact')">
                        <a href="{{ url('admin/contact') }}">
                            <i class="fa fa-comment"></i><span>Contact form</span>
                        </a>
                    </li>
                    <li class="treeview @yield('posts')">
                        <a href="#">
                            <i class="fa fa-thumb-tack"></i><span>Posts</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview @yield('blog-category')" >
                                <a href="#">
                                    <i class="fa fa-tag"></i><span>Blog Category</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('admin/blogs/add-blog-category') }}">Add Category</a></li>
                                    <li><a href="{{ url('admin/blogs/blog-category') }}">Category List</a></li>
                                </ul>
                            </li>

                            <li class="treeview @yield('blog')">
                                <a href="#">
                                    <i class="fa fa-file-text"></i><span>Blogs</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('admin/blogs/add-blog') }}">Add Blog</a></li>
                                    <li><a href="{{ url('admin/blogs/blog') }}">Blog List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    

                    
                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>