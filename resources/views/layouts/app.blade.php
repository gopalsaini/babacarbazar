<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="google-signin-client_id" content="{{env('GOOGLE_CLIENT_ID')}}">
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
    <title>@yield('meta_title')</title>
    <meta name="title" content="@yield('meta_title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    
<meta name="robots" content="index, follow">
<meta http-equiv="content-language" content="en">
  	<meta name="rating" content="babacarbazar" />
	<!-- ------------------------------------seo done by shadowdevelopers.in ------------------------------- -->
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
        <meta name="Buy-Sell-Cars" content="yes">
        <meta name="second-hand-cars" content="yes">
        <meta name="theme-color" content="#fffff" />
        <meta name="msapplication-TileColor" content="#1a73e9">
		<meta itemprop="author" content="baba car bazar ">

        <meta name="web-author" content="baba car bazar" />
        <meta name="googlebot" content="all">
        <meta name="revisit-after" content="1 days">
        <meta name="copyright" content="baba car bazar">
        <meta name="language" content="English">
        
        <meta name="distribution" content="Cars" />
        <meta name="rating" content="General" />



    
    <!-- Twitter Meta -->
    <meta name="twitter:title" content="Used Car in Alwar at Affordable Price | Baba Car Bazar">
    <meta name="twitter:description" content="Baba car bazar brings a super market of used car in Alwar. So, buy now certified Pre-owned second hand car in your city Alwar.">
    <meta name="twitter:image" content="#">

    <!-- Facebook Meta -->
    <meta property="og:url" content="https://www.babacarbazar.com/">
    <meta property="og:title" content="Used Car in Alwar at Affordable Price | Baba Car Bazar">
    <meta property="og:description" content="Baba car bazar brings a super market of used car in Alwar. So, buy now certified Pre-owned second hand car in your city Alwar.">
    <meta property="og:image" content="https://babacarbazar.com/public/assets/images/logo.png">
    <meta property="og:image:secure_url" content="https://babacarbazar.com/public/assets/images/logo.png">

    <link rel="shortcut icon" type="image/x-icon" href="https://babacarbazar.com/public/assets/images/logo.png" />
    <link rel="icon" type="image/x-icon" href="https://babacarbazar.com/public/assets/images/logo.png" id="light-scheme-icon">
    <link rel="icon" type="image/x-icon" href="https://babacarbazar.com/public/assets/images/logo.png" id="dark-scheme-icon">
    <meta name="classification" content="Used Car in Alwar at Affordable Price | Baba Car Bazar" />
   
    <meta name="robots" content="index, follow" />
    <meta name="tatacars-TileImage" content="https://babacarbazar.com/public/assets/logo.png">
    <link rel="bmw" href="https://babacarbazar.com/public/assets/logo.png">
    <meta name="audi" content="https://babacarbazar.com/public/assets/logo.png">
    <link rel="range rover" href="https://babacarbazar.com/public/assets/logo.png">
	<meta name="google-site-verification" content="n6UpIgoPjK59eN1M0_iocetxPHQ3uoN0wOdOfSYG5t0" />




    <link href="{{ asset('public/assets/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('public/assets/css/icon-font.css')}}">
    <link rel='stylesheet' href="{{ asset('public/assets/css/jquery-ui.css')}}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="{{ asset('public/assets/css/app.css')}}" rel="stylesheet" />
	<link href="{{ asset('public/assets/css/custom.css?v=1')}}" rel="stylesheet" />
	
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" id="switcher-css" type="text/css" href="{{ asset('public/assets/vendor/demo/preview/css/switcher.css')}}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendor/demo/preview/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendor/demo/preview/plugins/colorpicker/css/evol-colorpicker.min.css')}}" media="all" />

		<!-- ------------------------------------seo done by shadowdevelopers.in ------------------------------- -->


	

		<!-- ------------------------------------seo done by shadowdevelopers.in ------------------------------- -->
	@stack('custom_css')
	

    <style>
    .chat-box.chatroom{
	       height: 420px !important;
        overflow-x: scroll !important;
	   }
	@media only screen and (min-width:320px) and (max-width:767px){
	   
	   
.footer-content {
    padding: 15px 0 100px !important;
}
.copy-info {
    display: block;
    font-size: 17px;
    margin-top: 10px;
    padding-left: 0;
}
.toast {
    position: fixed;
    padding: 5px;
    bottom: -100px;
    left: 50%;
    transition: 0.3s;
    transform: translateX(-50%);
    background: #333;
    color: #fff;
    font-size: 16px;
    padding: 12px 15px !important;
    text-align: center;
    width: 73% !Important;
    z-index: 9999;
}
.main-sidebar.show-main-sidebar .inner-sidebar {
    top: 33px !important;
	height:15%;
}
.ads-img-v2 #bx-pager .thumb-item-link {
    border-bottom: 4px solid #ccc;
    display: inline-block;
    float: none;
    height: auto;
    margin: 0 7px !important;
    outline: medium none;
    overflow: hidden;
    position: relative;
    width: auto;
    display: table-cell !important;
}
.abcRioButtonLightBlue {
	background-color: #4285f4;
    color: #FFF;
    width: 100% !important;
    box-shadow: 3px 0px 6px 0 rgb(0 0 0 / 25%) !important;
    margin-bottom: 10px;
}
.abcRioButtonIcon {
    float: left;
    background: #fff !important;
}
.abcRioButton {
    width: 100% !important;
    background: #4267b2;
    color: #fff !important;
	display:block !important
}
}
    #preloader {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 99999;
        background-color: rgba(0, 0, 0, .5);
        height: 100vh;
        width: 100%;
        display: block;
        overflow-y: hidden;
    }

    .loader_spinner_inside {
        box-sizing: border-box;
        border: 8px solid #f3f3f3;
        border-top-color: #f3f3f3;
        border-top-style: solid;
        border-top-width: 8px;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 60px;
        height: 60px;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 42%;
        animation-name: spin;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .loader_spinner_text {
        display: block;
        margin-top: 60px;
        width: 100%;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        color: #fff;
        top: 44%;
    }

.whatsapp-integration{
	height: 50px;
    width: 50px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 2px 2px 6px rgb(0 0 0 / 40%);
    font-size: 28px;
    text-align: center;
    line-height: 50px;
    color: white;
    position: fixed;
    bottom: 90px;
    z-index: 9;
    background: #2fb343;
    right: 20px;
	color: #fff;
}
.whatsapp-integration a i{
	color: #fff;
    display: block;
	line-height:50px;
}
.whatsapp-integration a:hover{
	color: #fff;
    display: block;
}

.phone-integration{
	height: 50px;
    width: 50px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 2px 2px 6px rgb(0 0 0 / 40%);
    font-size: 28px;
    text-align: center;
    line-height: 50px;
    color: white;
    position: fixed;
    bottom: 90px;
    z-index: 9;
    background: #2fb343;
    left: 20px;
	color: #fff;
}
.phone-integration a i{
	color: #fff;
    display: block;
	line-height:50px;
}
.phone-integration a:hover{
	color: #fff;
    display: block;
}
    .toast {
        position: fixed;
        padding: 5px;
        bottom: -100px;
        left: 50%;
        transition: 0.3s;
        transform: translateX(-50%);
        background: #333;
        color: #fff;
        font-size: 16px;
        padding: 16px 36px !important;
        text-align: center;
        width: auto;
        z-index: 9999;
    }

    .toast-body {
        display: flex;
        align-items: center;
    }

    .toast i {
        margin-right: 10px;
        font-size: 20px;
    }

    .toast i.green {
        color: #26bc4e;
    }

    .toast i.red {
        color: #ff4343;
    }

    .toast i.warning {
        color: #f0ad4e;
    }

    .toast.show {
        bottom: 30px;
    }

    .load-btn {
        border: 3px solid #fff;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
        border-top: 3px solid #007bff;
        border-radius: 50%;
        width: 20px;
        height: 20px;
    }


    /* Safari */

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .load-btn-footer {
        border: 3px solid #fff;
        -webkit-animation: spinfooter 1s linear infinite;
        animation: spinfooter 1s linear infinite;
        border-top: 3px solid #007bff;
        border-radius: 50%;
        width: 12px;
        height: 12px;
    }


    /* Safari */

    @-webkit-keyframes spinfooter {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spinfooter {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .user_profile {
        position: absolute;
        right: auto;
        left: auto;
        margin-top: -23px;
    }
    .img-fluid{
        object-fit:contain;
    }
    .img-thumbnail {
        
    object-fit: contain;
}
    
</style>




<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-989ZSZP6SM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-989ZSZP6SM');
</script>


<!-- ----------------------------------------------seo by shadowdevelopers.in---------------------------- -->

	<script>
		paceOptions = {
			elements: true,
		};
	</script>
		<script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-messaging.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-analytics.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script>
	  // Your web app's Firebase configuration
	  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
	  var firebaseConfig = {
        apiKey: "AIzaSyA0G_coVwzCcKEpNSwP3tDY4NXfYWGXPfU",
        authDomain: "industrial-a0d65.firebaseapp.com",
        projectId: "industrial-a0d65",
        storageBucket: "industrial-a0d65.appspot.com",
        messagingSenderId: "198847731526",
        appId: "1:198847731526:web:d0cd56533efc8c682ef747",
        measurementId: "G-L410FNKT2C"
      };
	  // Initialize Firebase
	  firebase.initializeApp(firebaseConfig);
	  firebase.analytics();
	</script>

	<script src="{{ asset('public/assets/assets/js/pace.min.js')}}"></script>
	<script src="{{ asset('public/assets/assets/plugins/modernizr/modernizr-custom.js')}}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body class="skin-blue">

<div id="wrapper">
	<div class="header">
		<nav class="navbar fixed-top navbar-site navbar-light bg-light navbar-expand-md" role="navigation">
			<div class="container">
				<div class="navbar-identity">
					<a href="{{url('/')}}" class="navbar-brand logo logo-title">
						<img
							src="{{asset('public/assets/logo.png')}}"
							alt="laraclassified"
							class="tooltipHere main-logo"
							title=""
							data-placement="bottom"
							data-toggle="tooltip"
							data-original-title="LaraClassified United States"
						/>
					</a>
					<button data-target=".navbar-collapsess" data-toggle="collapse" class="navbar-toggler pull-right" type="button" id="open-menu">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
							<title>Menu</title>
							<path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
						</svg>
					</button>
					
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav ml-auto navbar-right">
						<li class="nav-item">
							<div class="search-row ">
							<form id="search" name="search" action="" method="GET">
								<div class="row m-0 width-search">
									
									<div class="col-md-11 col-sm-12 search-col relative locationicon">
										<input
											type="text"
											id="locSearch"
											name="location"
											class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
											placeholder="Find Cars, Bike At Baba car bazar"
											value=""
											title=""
											data-placement="bottom"
											data-toggle="tooltip"
											data-original-title='Enter a city name OR a state name with the prefix "area:" like: area:State Name'
										/>
									</div>
									<div class="col-md-1 col-sm-12 search-col">
										<button class="btn btn-primary btn-search btn-block"><i class="fa fa-search"></i> </button>
									</div>
								</div>
							</form>
						</div>
						</li>
						@if(!Auth::check())
						<li class="nav-item">
							<a href="{{url('login')}}" class="nav-link" ><i class="fa fa-login"></i> Login</a>
						</li>
						@else
							
						<li class="nav-item dropdown ml-2">
							<button href="#" class="btn btn-secondary dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true">
								<span>@if(auth()->user()->name){{ auth()->user()->name }} @else User @endif</span>
							</button>
							<ul id="userMenuDropdown" class="dropdown-menu user-menu dropdown-menu-right ">
								<li class="dropdown-item active">
									<a href="{{route('account')}}">
									<i class="fa fa-home" aria-hidden="true"></i> Deshboard
									</a>
								</li>
								<li class="dropdown-item"><a href="{{route('my.post')}}"><i class="fa fa-book fa-fw" aria-hidden="true"></i> My Posts </a></li>
								<li class="dropdown-item"><a href="{{route('my.favourite')}}"><i class="fa fa-heart"></i> My Adds </a></li>
								<li class="dropdown-item"><a href="{{ route('pending.approval') }}"><i class="fas fa-hourglass"></i> Pending Approval </a></li>
								<li class="dropdown-item"><a href="{{route('my.enquery')}}"><i class="fas fa-shopping-cart"></i> Buy Product Enquery</a></li>
								<li class="dropdown-item"><a href="{{ url('/message')}}"><i class="fas fa-comments"></i> Chat</a></li>

								<li class="dropdown-divider"></li>
								<li class="dropdown-item">
									<a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
								</li>
							</ul>
						</li>
										
							
						@endif
						<li class="nav-item postadd">
							<a class="btn btn-secondary btn-border  btn-add-listing" href="{{ route('user.add.products')}}"> <i class="fa fa-plus-circle"></i> SELL </a>
						</li>
						
						
					</ul>
				</div>
			</div>
		</nav>
	</div>
	
@yield('content')
  
<footer class="main-footer">
	<div class="footer-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-6">
					<div class="footer-col">
						<h4 class="footer-title">About us</h4>
						<ul class="list-unstyled footer-nav">
							<li><a href="{{url('setting/about')}}"> About </a></li>
							<li><a href="{{url('setting/terms-and-condition')}}"> Terms & Condition </a></li>
							<li><a href="{{url('setting/privacy-policy')}}"> Privacy Policy </a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-6">
					<div class="footer-col">
						<h4 class="footer-title">Contact</h4>
						<ul class="list-unstyled footer-nav">
							<li><a href="{{ url('contact')}}"> Contact Us </a></li>
							<li><a href="https://babacarbazar.com/public/sitemap.xml"> Sitemap </a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-12">
					<div class="footer-col">
						<h4 class="footer-title">My Account</h4>
						<ul class="list-unstyled footer-nav">
							<li><a href="{{url('login')}}" > Log In </a></li>
							<li><a href="{{url('register')}}"> Register </a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-12">
					<div class="footer-col row">
						<div class="col-sm-12 col-12 no-padding-lg">
							<div class="">
								<h4 class="footer-title">Follow us on</h4>
								<ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
									<li>
										<a class="icon-color fb" title="" data-placement="top" data-toggle="tooltip" href="https://www.facebook.com/BABASCARBAZAR" data-original-title="Facebook"> <i class="fab fa-facebook"></i> </a>
									</li>
									<!-- <li>
										<a class="icon-color tw" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Twitter"> <i class="fab fa-twitter"></i> </a>
									</li> -->
									<li>
										<a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="https://www.instagram.com/babacarbazaralwar/" data-original-title="Instagram"> <i class="icon-instagram-filled"></i> </a>
									</li>
									<li>
										<a class="icon-color gp" title="" data-placement="top" data-toggle="tooltip" href="https://www.google.com/search?q=baba+motors&oq=baba+motors&aqs=chrome..69i57j35i39j46i175i199i512j0i457i512j46i175i199i512l3j69i60.2953j0j7&sourceid=chrome&ie=UTF-8" data-original-title="Google+"> <i class="fab fa-google-plus"></i> </a>
									</li>
									<!-- <li>
										<a class="icon-color lin" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="LinkedIn"> <i class="fab fa-linkedin"></i> </a>
									</li>
									<li>
										<a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Pinterest"> <i class="fab fa-pinterest-p"></i> </a>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div style="clear: both;"></div>
				<div class="col-xl-12">
					<hr />
					<div class="copy-info text-center">© 2021 Baba Car Bazar. All Rights Reserved. Developed by Gopal Saini</div>
				</div>
			</div>
		</div>
	</div>

</footer>
	<div class="toast" data-autohide="true" style="padding:20px;border-radius: 10px;">
        <div class="toast-body">

        </div>
    </div>
	<div id="preloader" style="display:none">
		 <div class="loader_spinner_inside"></div>
		 <span class="loader_spinner_text">Please Wait...</span>
	</div>
</div>

   <!-- /.Mobile Menu -->
    <div id="mobile-userprofile">
		<div class="row">
			<div class="col"><a href="{{url('/')}}"><i class="fa fa-home"></i><span>Home</span></a></div>
			<div class="col"><a href="{{route('my.favourite')}}"><i class="fa fa-heart"></i><span>My Adds</span></a></div>
			<div class="col"><a href="{{ route('user.add.products')}}"><i class="fa fa-shopping"></i><span>Sell</span>
				<span class="ap-total-addtocart headerAddToCartShowTotal mobile-cartitem"><i class="fa fa-plus"></i></span> </a>
			</div>
			<div class="col"><a href="{{ url('/message')}}"><i class="fas fa-comments" aria-hidden="true"></i><span>Chat</span></a></div>
			<div class="col"><a href="#0" id="userprofile-open"><i class="fa fa-user"></i><span>Account</span></a></div>
		</div>
	</div>
		
		
    <!--- mobile Userprofile -->
    <div class="userprofile-sec">
        <div class="userprofile-inner-sec">
            <div class="content-boxpage">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <div class="title-box"> @if(Auth::id()) {{ auth()->user()->name }} @else User Profile @endif</div>
                    <div class="close-box"><i class="fas fa-times"></i></div>
                </div>
                <div class="mobile-list-userprofile">
                     @if(!Auth::id())
					 <li><a class="login" href="{{url('/login')}}"><i class="fa fa-user"></i><span>Log in</span></a></li>
                     <li><a class="login" href="{{url('register')}}"><i class="fa fa-user"></i><span>Register</span></a></li>
                    @else
					<li >
						<a href="{{route('account')}}">
						<i class="fa fa-home" aria-hidden="true"></i> Deshboard
						</a>
					</li>
					<li ><a href="{{route('my.post')}}"><i class="fa fa-book" aria-hidden="true"></i> My Posts </a></li>
					<li ><a href="{{route('my.favourite')}}"><i class="fa fa-heart"></i> My Adds </a></li>
					<li ><a href="{{ route('pending.approval') }}"><i class="fas fa-hourglass"></i> Pending Approval </a></li>
					<li ><a href="{{route('my.enquery')}}"><i class="fas fa-shopping-cart"></i> Buy Product Enquery</a></li>
					<li ><a href="{{ url('/message')}}"><i class="fas fa-comments"></i> Chat</a></li>
					
					<li >
						<a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
					</li>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--- End Userprofile Cart -->
	
	
	
	 <!--- Toogle Toggle -->
	         <div class="main-sidebar">
                <div class="inner-sidebar">
						<div class="inner-sidebar">
							<div class="sidebar-menu">
								<ul>
									<li><a href="{{url('products/cars')}}"> Buy Car</a> </li>
									<li><a href="{{ route('user.add.products')}}"> Sell Car</a> </li>
								</ul>
							</div>
						</div>
					</div>
                </div>
	
	
	
 <!--- whatsapp integration ---->
	  <div class="whatsapp-integration">
	    <a href="https://api.whatsapp.com/send?phone=917877012740" target="_blank"><i class="fab fa-whatsapp"></i></a>
	  </div>
	  
	  <div class="phone-integration">
	    <a href="tel:7877012740" target="_blank"><i class="fa fa-phone"></i></a>
	  </div>
	
<script src="{{ asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- User profile JS-->
<script>
$(document).ready(function() {
    $('#userprofile-open').click(function() {
        $('.userprofile-sec').addClass('user-profile-active');
    });
    $('.close-box').click(function() {
        $('.userprofile-sec').removeClass('user-profile-active');
    });
});
</script>

<!--toogle -->

  <!--sidebar -->
  <script>
  $(document).ready(function() {
	  $('#open-menu').click(function() {
		  $('.main-sidebar').toggleClass('show-main-sidebar');
	  });
  });
  </script>
</script>	
<script>
var siteUrl = "{{url('/')}}";
var languageCode = "en";
var countryCode = "US";
var timerNewMessagesChecking = 0;
var isLogged = false;
var isLoggedAdmin = false;
var langLayout = {
	hideMaxListItems: {
		moreText: "View More",
		lessText: "View Less",
	},
	select2: {
		errorLoading: function () {
			return "The results could not be loaded.";
		},
		inputTooLong: function (e) {
			var t = e.input.length - e.maximum,
				n = "Please delete " + t + " character";
			return t != 1 && (n += "s"), n;
		},
		inputTooShort: function (e) {
			var t = e.minimum - e.input.length,
				n = "Please enter " + t + " or more characters";
			return n;
		},
		loadingMore: function () {
			return "Loading more results…";
		},
		maximumSelected: function (e) {
			var t = "You can only select " + e.maximum + " item";
			return e.maximum != 1 && (t += "s"), t;
		},
		noResults: function () {
			return "No results found";
		},
		searching: function () {
			return "Searching…";
		},
	},
};
var fakeLocationsResults = "1";
var stateOrRegionKeyword = "area:";
var errorText = {
	errorFound: "Error found",
};
try {
	if (window.top.location !== window.location) {
		window.top.location.replace(siteUrl);
	}
} catch (e) {
	console.error(e);
}
</script>
<script>
var maxSubCats = 3;
</script>
<script>
/* Carousel Parameters */
var carouselItems = 12;
var carouselAutoplay = 1;
var carouselAutoplayTimeout = 1500;
var carouselLang = {
	navText: {
		prev: "prev",
		next: "next",
	},
};
</script>
<script src="{{ asset('public/assets/js/app.js')}}"></script>
<script src="{{ asset('public/assets/assets/plugins/select2/js/i18n/en.js')}}"></script>
<script>
$(document).ready(function () {
	$(".selecter").select2({
		language: langLayout.select2,
		dropdownAutoWidth: "true",
		minimumResultsForSearch: Infinity,
		width: "100%",
	});
	$(".sselecter").select2({
		language: langLayout.select2,
		dropdownAutoWidth: "true",
		width: "100%",
	});
	
	$('[data-toggle="popover"]').popover();
});
</script>
<!-- DEMO -->
<!-- UI jQuery v1.8.23 (For Module #5 and #6): v1.9.2 is load in /webpack.mix.js file  -->
<!-- Bootstrap Select Tool (For Module #4) -->
<script src="{{ asset('public/assets/vendor/demo/preview/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<!-- Evol Color Picker jQuery (For Module #5 and #6) -->
<script src="{{ asset('public/assets/vendor/demo/preview/plugins/colorpicker/js/evol-colorpicker.min.js')}}" type="text/javascript"></script>
<!-- All Scripts & Plugins -->
<script src="{{ asset('public/assets/vendor/demo/preview/js/dmss.js')}}"></script>
<!-- END DEMO -->
<script src="{{ asset('public/assets/assets/plugins/autocomplete/jquery.mockjax.js')}}"></script>
<script src="{{ asset('public/assets/assets/plugins/autocomplete/jquery.autocomplete.min.js')}}"></script>
<script>
/* Default view (See in /js/script.js) */
listView(".list-view");
/* Save the Search page display mode */
var listingDisplayMode = readCookie("listing_display_mode");
if (!listingDisplayMode) {
	createCookie("listing_display_mode", ".grid-view", 7);
}
/* Favorites Translation */

</script>

<script src="{{ asset('public/assets/assets/plugins/twism/jquery.twism.js')}}"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
$(document).ready(function () {
	$("#countryMap").css("cursor", "pointer");
	$("#countryMap").twism("create", {
		map: "custom",
		customMap: "images/maps/us.svg",
		backgroundColor: "transparent",
		border: "#4682B4",
		hoverBorder: "#4682B4",
		borderWidth: 4,
		color: "#d5e3ef",
		width: "300px",
		height: "300px",
		click: function (region) {
			if (typeof region == "undefined") {
				return false;
			}
			if (isBlankValue(region)) {
				return false;
			}
			region = rawurlencode(region);
			var searchPage = "https://laraclassified.bedigit.com/search";
			var queryStringSeparator = searchPage.indexOf("?") !== -1 ? "&" : "?";
			searchPage = searchPage + queryStringSeparator + "r=" + region;
			redirect(searchPage);
		},
		hover: function (regionId) {
			if (typeof regionId == "undefined") {
				return false;
			}
			var selectedIdObj = document.getElementById(regionId);
			if (typeof selectedIdObj == "undefined") {
				return false;
			}
			selectedIdObj.style.fill = "#4682B4";
			return;
		},
		unhover: function (regionId) {
			if (typeof regionId == "undefined") {
				return false;
			}
			var selectedIdObj = document.getElementById(regionId);
			if (typeof selectedIdObj == "undefined") {
				return false;
			}
			selectedIdObj.style.fill = "#d5e3ef";
			return;
		},
	});
});



	
	$('img').on("error", function() {
	  $(this).attr('src', url+'/public/assets/images/default-image.jpg');
	});
	
	$('img').on("error", function() {
	  $(this).attr('src', url+'/public/assets/images/default-image.jpg');
	});
</script>

<script src="{{ asset('public/assets/assets/plugins/bxslider/jquery.bxslider.min.js')}}"></script>
    <script>
		/* Carousel Parameters */
		var carouselItems = 20;
		var carouselAutoplay = true;
		var carouselAutoplayTimeout = 1500;
		var carouselLang = {
			'navText': {
				'prev': "prev",
				'next': "next"
			}
		};
	</script>
	
    <!-- Bootstrap js -->
    <script src="{{ asset('public/web-layouts/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{ asset('public/web-layouts/assets/js/bootstrap/bootstrap.min.js')}}"></script>


	<script>
		$('.bxslider').bxSlider({
			touchEnabled: true,
			speed: 1000,
			pagerCustom: '#bx-pager',
			adaptiveHeight: true,
			nextText: 'Next',
			prevText: 'Prev',
			startText: 'Start',
			stopText: 'Stop'
		});
		
</script>

	<script>
   //toster
   
	function showMsg(type,msg){
		if(type=='error'){
			$('.toast-body').html('<i class="fa fa-times-circle red"></i> '+msg);
		}else if(type=='success'){
			$('.toast-body').html('<i class="fa fa-check-circle green"></i> '+msg);
		}else{
			$('.toast-body').html('<i class="fa fa-exclamation-circle warning"></i> '+msg);
		}

		$(".toast").toast({ delay: 5000 });
		$('.toast').toast('show');
	}

	$('.toast').mouseleave(function(){
		$('.toast').toast('hide');
	});
	

    @if(Session::has('error'))
    showMsg('error', "{{ Session::get('error') }}")
    @elseif(Session::has('success'))
    showMsg('success', "{{ Session::get('success') }}")
    @endif

addToWishlist();
function addToWishlist(){ 
    $('.add_to_wishlist').click(function(){
        var newData=true;
		var productId=$(this).data('product_id');
        $.ajax({
            type: "get",
            dataType:"json",
            url: "{{route('add.wishlist')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
            },
            data:{
                product_id: productId       
            },
            beforeSend: function(){
                $('#preloader').css('display','inline-block');
                
            },
            error:function(xhr,textStatus){
                if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display','none');
                }else{
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display','none');
                }
            },
            success: function(data){
                $('#preloader').css('display','none'); 
                if(data.error){
                    showMsg('error',data.msg);
                }else{ 
					showMsg('success',data.msg);
					$('#add_to_wishlist'+productId).addClass("wishlistActive");	
                }
            }
        }); 
    }); 
}
</script>
@stack('custom_js')
</body>
</html>
