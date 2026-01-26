<!DOCTYPE HTML>
<html lang="zxx">
	
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Moviepoint - Online Movie,Vedio and TV Show HTML Template</title>
		<!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favcion.png') }}" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Slick nav CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.min.css') }}" media="all" />
        <!-- Iconfont CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}" media="all" />
        <!-- Owl carousel CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
        <!-- Popup CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!-- Main style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}" media="all" />
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Page loader -->
	    <div id="preloader"></div>
		<!-- header section start -->
		<header class="header">
			<div class="container">
				<div class="header-area">
					<!-- Logo -->
					<div class="logo">
                        <a href="{{ route('welcome') }}" class="logo-link">
                        	<i class="icofont icofont-film"></i>
                        	<span>CINEGO</span>
                        </a>
					</div>

					<!-- Search Bar -->
					<div class="header-search">
						<form action="#">
							<div class="search-input-wrapper">
								<i class="icofont icofont-search"></i>
								<input type="text" placeholder="Cari film..."/>
							</div>
						</form>
					</div>

					<!-- Header Right -->
					<div class="header-right">
						<ul class="header-menu">
							@if (Auth::check())
								<li class="user-menu">
									<a href="{{ route('home') }}" class="user-link">
										<span class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
										<span class="user-name">{{ Auth::user()->name }}</span>
									</a>
								</li>
								<li>
									<a href="{{ route('home') }}" class="nav-link nav-link-home">
										<i class="icofont icofont-home"></i> Home
									</a>
								</li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<button type="submit" class="nav-link logout-link">
											<i class="icofont icofont-logout"></i> Logout
										</button>
									</form>
								</li>
							@else 	
								<li>
									<span class="welcome-text">
										<i class="icofont icofont-user"></i> Welcome Guest!
									</span>
								</li>
								<li>
									<a class="login-popup nav-link nav-link-login" href="#">
										<i class="icofont icofont-sign-in"></i> Login
									</a>
								</li>
							@endif
						</ul>
					</div>

					<!-- Mobile Menu Toggle -->
					<div class="menu-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>

				<!-- Main Menu -->
				<div class="mainmenu">
					<ul id="primary-menu">
						<li><a href="{{ route('welcome') }}" class="active">Home</a></li>
						<li><a href="#movies-section">Movies</a></li>
						<li><a href="#trailers-section">Trailers</a></li>
						<li><a href="#news-section">News</a></li>
						<li><a href="#" class="nav-btn-tickets">
							<i class="icofont icofont-ticket"></i> Book Tickets
						</a></li>
					</ul>
				</div>
			</div>
		</header>
		<!-- Login Popup Modal -->
		<div id="login-modal" class="login-area" style="display: none;">
			<div class="login-box">
				<a href="javascript:void(0);" onclick="closeLoginModal()"><i class="icofont icofont-close"></i></a>
				<h2>LOGIN</h2>
				
				<!-- Session Status -->
				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif

				<form method="POST" action="{{ route('login') }}">
					@csrf

					<!-- Email Address -->
					<div>
						<h6>EMAIL ADDRESS</h6>
						<input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
						@error('email')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<!-- Password -->
					<div class="mt-3">
						<h6>PASSWORD</h6>
						<input type="password" name="password" required autocomplete="current-password" />
						@error('password')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<!-- Remember Me -->
					<div class="login-remember">
						<input type="checkbox" id="remember_me" name="remember">
						<span>Remember Me</span>
					</div>

					<!-- Sign Up Link -->
					<div class="login-signup">
						@if (Route::has('register'))
							<a href="{{ route('register') }}">
								<span>SIGNUP</span>
							</a>
						@endif
					</div>

					<!-- Login Button -->
					<button type="submit" class="theme-btn">LOG IN</button>

					<!-- Social Login -->
					<span>Or Via Social</span>
					<div class="login-social">
						<a href="#"><i class="icofont icofont-social-facebook"></i></a>
						<a href="#"><i class="icofont icofont-social-twitter"></i></a>
						<a href="#"><i class="icofont icofont-social-linkedin"></i></a>
						<a href="#"><i class="icofont icofont-social-google-plus"></i></a>
						<a href="#"><i class="icofont icofont-camera"></i></a>
					</div>

					<!-- Forgot Password -->
					@if (Route::has('password.request'))
						<div class="login-forgot mt-3">
							<a href="{{ route('password.request') }}">
								{{ __('Forgot your password?') }}
							</a>
						</div>
					@endif
				</form>
			</div>
		</div>
		<div class="buy-ticket">
			<div class="container">
				<div class="buy-ticket-area">
					<a href="#"><i class="icofont icofont-close"></i></a>
					<div class="row">
						<div class="col-lg-8">
							<div class="buy-ticket-box">
								<h4>Buy Tickets</h4>
								<h5>Seat</h5>
								<h6>Screen</h6>
								<div class="ticket-box-table">
									<table class="ticket-table-seat">
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
									</table>
									<table>
										<tr>
											<td>1</td>
										</tr>
										<tr>
											<td>2</td>
										</tr>
										<tr>
											<td>3</td>
										</tr>
										<tr>
											<td>4</td>
										</tr>
										<tr>
											<td>5</td>
										</tr>
									</table>
									<table class="ticket-table-seat">
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
									</table>
									<table>
										<tr>
											<td>1</td>
										</tr>
										<tr>
											<td>2</td>
										</tr>
										<tr>
											<td>3</td>
										</tr>
										<tr>
											<td>4</td>
										</tr>
										<tr>
											<td>5</td>
										</tr>
									</table>
									<table class="ticket-table-seat">
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
									</table>
								</div>
								<div class="ticket-box-available">
									<input type="checkbox" />
									<span>Available</span>
									<input type="checkbox" checked />
									<span>Unavailable</span>
									<input type="checkbox" />
									<span>Selected</span>
								</div>
								<a href="#" class="theme-btn">previous</a>
								<a href="#" class="theme-btn">Next</a>
							</div>
						</div>
						<div class="col-lg-3 offset-lg-1">
							<div class="buy-ticket-box mtr-30">
								<h4>Your Information</h4>
								<ul>
									<li>
										<p>Location</p>
										<span>HB Cinema Box Corner</span>
									</li>
									<li>
										<p>TIME</p>
										<span>2018.07.09   20:40</span>
									</li>
									<li>
										<p>Movie name</p>
										<span>Home Alone</span>
									</li>
									<li>
										<p>Ticket number</p>
										<span>2 Adults, 2 Children, 2 Seniors</span>
									</li>
									<li>
										<p>Price</p>
										<span>89$</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- header section end -->
		<!-- hero area start -->
		<section class="hero-area" id="home">
			<div class="container">
				<div class="hero-area-slider">
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
								<img src="assets/img/slide2.png" alt="about" />
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2>The Devil Princess</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
								<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
								<h3>Cast:</h3>
								<div class="slide-cast">
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast1.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast2.html" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast3.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast4.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast5.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast6.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast7.png" alt="about" />
									</div>
									<div class="single-slide-cast text-center">
										5+
									</div>
								</div>
								<div class="slide-trailor">
									<h3>Watch Trailer</h3>
									<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
								<img src="assets/img/slide1.png" alt="about" />
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2>Last Avatar</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
								<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
								<h3>Cast:</h3>
								<div class="slide-cast">
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast1.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast2.html" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast3.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast4.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast5.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast6.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast7.png" alt="about" />
									</div>
									<div class="single-slide-cast text-center">
										5+
									</div>
								</div>
								<div class="slide-trailor">
									<h3>Watch Trailer</h3>
									<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
								<img src="assets/img/slide3.png" alt="about" />
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2>The Deer God</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
								<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
								<h3>Cast:</h3>
								<div class="slide-cast">
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast1.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast2.html" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast3.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast4.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast5.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast6.png" alt="about" />
									</div>
									<div class="single-slide-cast">
										<img src="assets/img/cast/cast7.png" alt="about" />
									</div>
									<div class="single-slide-cast text-center">
										5+
									</div>
								</div>
								<div class="slide-trailor">
									<h3>Watch Trailer</h3>
									<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="hero-area-thumb">
					<div class="thumb-prev">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
									<img src="assets/img/slide3.png" alt="about" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="hero-area-content pr-50">
									<h2>Last Avatar</h2>
									<div class="review">
										<div class="author-review">
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
										</div>
										<h4>180k voters</h4>
									</div>
									<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
									<h3>Cast:</h3>
									<div class="slide-cast">
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast1.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast2.html" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast3.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast4.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast5.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast6.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast7.png" alt="about" />
										</div>
										<div class="single-slide-cast text-center">
											5+
										</div>
									</div>
									<div class="slide-trailor">
										<h3>Watch Trailer</h3>
										<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="thumb-next">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
									<img src="assets/img/slide1.png" alt="about" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="hero-area-content pr-50">
									<h2>The Deer God</h2>
									<div class="review">
										<div class="author-review">
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
											<i class="icofont icofont-star"></i>
										</div>
										<h4>180k voters</h4>
									</div>
									<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
									<h3>Cast:</h3>
									<div class="slide-cast">
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast1.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast2.html" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast3.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast4.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast5.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast6.png" alt="about" />
										</div>
										<div class="single-slide-cast">
											<img src="assets/img/cast/cast7.png" alt="about" />
										</div>
										<div class="single-slide-cast text-center">
											5+
										</div>
									</div>
									<div class="slide-trailor">
										<h3>Watch Trailer</h3>
										<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- hero area end -->
		<!-- portfolio section start -->
		<section class="portfolio-area pt-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
						</div>
					</div>
					<div class="col-lg-6 text-center text-lg-right">
					    <div class="portfolio-menu">
							<ul>
								<li data-filter="*" class="active">Latest</li>
								<li data-filter=".soon">Comming Soon</li>
								<li data-filter=".top">Top Rated</li>
								<li data-filter=".released">Recently Released</li>
							</ul>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-lg-9">
						<div class="row portfolio-item">
							<div class="col-md-4 col-sm-6 soon released">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										<img src="assets/img/portfolio/portfolio1.png" alt="portfolio" />
										<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
											<i class="icofont icofont-ui-play"></i>
										</a>
									</div>
									<div class="portfolio-content">
										<h2>Boyz II Men</h2>
										<div class="review">
											<div class="author-review">
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
											</div>
											<h4>180k voters</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 top">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										<img src="assets/img/portfolio/portfolio2.png" alt="portfolio" />
										<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
											<i class="icofont icofont-ui-play"></i>
										</a>
									</div>
									<div class="portfolio-content">
										<h2>Tale of Revemge</h2>
										<div class="review">
											<div class="author-review">
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
											</div>
											<h4>180k voters</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 soon">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										<img src="assets/img/portfolio/portfolio3.png" alt="portfolio" />
										<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
											<i class="icofont icofont-ui-play"></i>
										</a>
									</div>
									<div class="portfolio-content">
										<h2>The Lost City of Z</h2>
										<div class="review">
											<div class="author-review">
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
											</div>
											<h4>180k voters</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 top released">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										<img src="assets/img/portfolio/portfolio4.png" alt="portfolio" />
										<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
											<i class="icofont icofont-ui-play"></i>
										</a>
									</div>
									<div class="portfolio-content">
										<h2>Beast Beauty</h2>
										<div class="review">
											<div class="author-review">
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
											</div>
											<h4>180k voters</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 released">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										<img src="assets/img/portfolio/portfolio5.png" alt="portfolio" />
										<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
											<i class="icofont icofont-ui-play"></i>
										</a>
									</div>
									<div class="portfolio-content">
										<h2>In The Fade</h2>
										<div class="review">
											<div class="author-review">
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
											</div>
											<h4>180k voters</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 soon top">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										<img src="assets/img/portfolio/portfolio6.png" alt="portfolio" />
										<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
											<i class="icofont icofont-ui-play"></i>
										</a>
									</div>
									<div class="portfolio-content">
										<h2>Last Hero</h2>
										<div class="review">
											<div class="author-review">
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
												<i class="icofont icofont-star"></i>
											</div>
											<h4>180k voters</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 text-center text-lg-left">
					    <div class="portfolio-sidebar">
							<img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar3.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
						</div>
					</div>
				</div>
			</div>
		</section><!-- portfolio section end -->
		<!-- video section start -->
		<section class="video ptb-90">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
                    <div class="col-md-9">
						<div class="video-area">
							<img src="assets/img/video/video1.png" alt="video" />
							<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
								<i class="icofont icofont-ui-play"></i>
							</a>
							<div class="video-text">
								<h2>Angle of Death</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-md-3">
						<div class="row">
							<div class="col-md-12 col-sm-6">
								<div class="video-area">
									<img src="assets/img/video/video2.png" alt="video" />
									<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<div class="video-area">
									<img src="assets/img/video/video3.png" alt="video" />
									<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							</div>
						</div>
                    </div>
				</div>
			</div>
		</section><!-- video section end -->
		<!-- news section start -->
		<section class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-coffee-cup"></i> Latest News</h1>
						</div>
					</div>
				</div>
				<hr />
			</div>
			<div class="news-slide-area">
				<div class="news-slider">
					<div class="single-news">
						<div class="news-bg-1"></div>
						<div class="news-date">
							<h2><span>NOV</span> 25</h2>
							<h1>2017</h1>
						</div>
						<div class="news-content">
							<h2>The Witch Queen</h2>
							<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
						</div>
						<a href="#">Read More</a>
					</div>
					<div class="single-news">
						<div class="news-bg-2"></div>
						<div class="news-date">
							<h2><span>NOV</span> 25</h2>
							<h1>2017</h1>
						</div>
						<div class="news-content">
							<h2>The Witch Queen</h2>
							<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
						</div>
						<a href="#">Read More</a>
					</div>
					<div class="single-news">
						<div class="news-bg-3"></div>
						<div class="news-date">
							<h2><span>NOV</span> 25</h2>
							<h1>2017</h1>
						</div>
						<div class="news-content">
							<h2>The Witch Queen</h2>
							<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
						</div>
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="news-thumb">
					<div class="news-next">
						<div class="single-news">
							<div class="news-bg-3"></div>
							<div class="news-date">
								<h2><span>NOV</span> 25</h2>
								<h1>2017</h1>
							</div>
							<div class="news-content">
								<h2>The Witch Queen</h2>
								<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
							</div>
							<a href="#">Read More</a>
						</div>
					</div>
					<div class="news-prev">
						<div class="single-news">
							<div class="news-bg-2"></div>
							<div class="news-date">
								<h2><span>NOV</span> 25</h2>
								<h1>2017</h1>
							</div>
							<div class="news-content">
								<h2>The Witch Queen</h2>
								<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
							</div>
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- news section end -->
		<!-- footer section start -->
		<footer class="footer">
			<div class="container">
				<div class="row">
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<img src="assets/img/logo.png" alt="about" />
							<p>7th Harley Place, London W1G 8LZ United Kingdom</p>
							<h6><span>Call us: </span>(+880) 111 222 3456</h6>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Legal</h4>
							<ul>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Security</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Account</h4>
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Watchlist</a></li>
								<li><a href="#">Collections</a></li>
								<li><a href="#">User Guide</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter system now to get latest news from us.</p>
							<form action="#">
								<input type="text" placeholder="Enter your email.."/>
								<button>SUBSCRIBE NOW</button>
							</form>
						</div>
                    </div>
				</div>
				<hr />
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 text-center text-lg-left">
							<div class="copyright-content">
								<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
							</div>
						</div>
						<div class="col-lg-6 text-center text-lg-right">
							<div class="copyright-content">
								<a href="#" class="scrollToTop">
									Back to top<i class="icofont icofont-arrow-up"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- footer section end -->
		<!-- jquery main JS -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- Slick nav JS -->
        <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
        <!-- owl carousel JS -->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <!-- Popup JS -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Isotope JS -->
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <!-- main JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        
        <!-- Login Modal Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const loginPopup = document.querySelector('.login-popup');
                const loginModal = document.getElementById('login-modal');

                if (loginPopup) {
                    loginPopup.addEventListener('click', function(e) {
                        e.preventDefault();
                        openLoginModal();
                    });
                }

                // Close modal when clicking outside the box
                loginModal.addEventListener('click', function(e) {
                    if (e.target === loginModal) {
                        closeLoginModal();
                    }
                });

                // Close modal when pressing Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && loginModal.style.display === 'flex') {
                        closeLoginModal();
                    }
                });

                // Close button
                const closeBtn = loginModal.querySelector('a[onclick="closeLoginModal()"]');
                if (closeBtn) {
                    closeBtn.addEventListener('click', closeLoginModal);
                }
            });

            function openLoginModal() {
                const loginModal = document.getElementById('login-modal');
                loginModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            function closeLoginModal() {
                const loginModal = document.getElementById('login-modal');
                loginModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        </script>

        <style>
            #login-modal {
                position: fixed;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                display: none;
                align-items: center;
                justify-content: center;
                overflow: auto;
            }

            #login-modal.show {
                display: flex !important;
            }

            .login-area {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100%;
            }

            .login-box {
                position: relative;
                background: white;
                width: 90%;
                max-width: 450px;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                z-index: 10000;
            }

            .login-box input[type="email"],
            .login-box input[type="password"],
            .login-box input[type="text"] {
                position: relative;
                z-index: 10001;
                color: #000 !important;
                background-color: #fff !important;
            }

            .login-box input[type="email"]::placeholder,
            .login-box input[type="password"]::placeholder,
            .login-box input[type="text"]::placeholder {
                color: #999 !important;
            }

            .login-box input[type="email"]:focus,
            .login-box input[type="password"]:focus,
            .login-box input[type="text"]:focus {
                color: #000 !important;
                background-color: #fff !important;
                border-color: #007bff !important;
                outline: none;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }

            .login-box .theme-btn {
                background-color: #ff6b6b !important;
                color: white !important;
                border: none !important;
                padding: 12px 30px !important;
                border-radius: 5px !important;
                font-weight: bold !important;
                font-size: 16px !important;
                cursor: pointer !important;
                transition: all 0.3s ease !important;
                width: 100% !important;
                text-transform: uppercase !important;
            }

            .login-box .theme-btn:hover {
                background-color: #ff5252 !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4) !important;
            }

            .login-box .theme-btn:active {
                transform: translateY(0) !important;
                box-shadow: 0 3px 10px rgba(255, 107, 107, 0.3) !important;
            }

            /* ===== HEADER STYLING ===== */
            .header {
                background: rgba(255, 255, 255, 0.35);
                backdrop-filter: blur(15px);
                -webkit-backdrop-filter: blur(15px);
                padding: 15px 0;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                position: sticky;
                top: 0;
                z-index: 100;
                border-bottom: 1px solid rgba(255, 107, 107, 0.15);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .header:hover {
                background: rgba(255, 255, 255, 0.45);
                box-shadow: 0 6px 30px rgba(0, 0, 0, 0.12);
            }

            .header-area {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 30px;
                flex-wrap: wrap;
                transition: all 0.4s ease;
            }

            /* Logo */
            .logo {
                flex-shrink: 0;
                animation: fadeInDown 0.6s ease;
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .logo-link {
                display: flex;
                align-items: center;
                gap: 10px;
                text-decoration: none;
                font-size: 24px;
                font-weight: bold;
                background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                padding: 8px 12px;
                border-radius: 8px;
            }

            .logo-link:hover {
                background: linear-gradient(135deg, #ff5252 0%, #ff4242 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                transform: scale(1.05);
                box-shadow: 0 8px 20px rgba(255, 107, 107, 0.2);
            }

            .logo-link i {
                font-size: 32px;
                background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            /* Search Bar */
            .header-search {
                flex: 1;
                min-width: 250px;
                animation: fadeInUp 0.6s ease 0.1s both;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .header-search form {
                position: relative;
            }

            .search-input-wrapper {
                display: flex;
                align-items: center;
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1.5px solid rgba(255, 107, 107, 0.2);
                border-radius: 25px;
                padding: 10px 20px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .search-input-wrapper:hover {
                background: rgba(255, 255, 255, 0.9);
                border-color: rgba(255, 107, 107, 0.4);
            }

            .search-input-wrapper:focus-within {
                background: rgba(255, 255, 255, 1);
                border-color: #ff6b6b;
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.15);
                transform: translateY(-2px);
            }

            .search-input-wrapper i {
                color: #ff6b6b;
                margin-right: 10px;
                font-size: 18px;
                transition: all 0.3s ease;
            }

            .search-input-wrapper:focus-within i {
                transform: scale(1.1);
            }

            .search-input-wrapper input {
                border: none;
                background: transparent;
                outline: none;
                font-size: 14px;
                color: #333;
                width: 100%;
                transition: all 0.3s ease;
            }

            .search-input-wrapper input::placeholder {
                color: rgba(0, 0, 0, 0.4);
            }

            /* Header Right */
            .header-right {
                flex-shrink: 0;
                animation: fadeInRight 0.6s ease 0.2s both;
            }

            @keyframes fadeInRight {
                from {
                    opacity: 0;
                    transform: translateX(20px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .header-menu {
                list-style: none;
                display: flex;
                align-items: center;
                gap: 10px;
                margin: 0;
                padding: 0;
            }

            .header-menu li {
                margin: 0;
            }

            .header-menu a,
            .header-menu button {
                text-decoration: none;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                display: flex;
                align-items: center;
                gap: 8px;
            }

            /* User Menu */
            .user-menu .user-link {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 8px 14px;
                color: #333;
                border-radius: 8px;
                background: rgba(255, 107, 107, 0.05);
            }

            .user-menu .user-link:hover {
                background: rgba(255, 107, 107, 0.15);
                color: #ff6b6b;
                transform: translateY(-2px);
            }

            .user-avatar {
                width: 36px;
                height: 36px;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 14px;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.2);
                transition: all 0.3s ease;
            }

            .user-menu .user-link:hover .user-avatar {
                transform: scale(1.1) rotate(5deg);
                box-shadow: 0 6px 16px rgba(255, 107, 107, 0.3);
            }

            .user-name {
                font-size: 13px;
                font-weight: 600;
                max-width: 120px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                transition: all 0.3s ease;
            }

            /* Welcome Text */
            .welcome-text {
                display: flex;
                align-items: center;
                gap: 6px;
                color: rgba(0, 0, 0, 0.6);
                font-size: 13px;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .welcome-text:hover {
                color: #ff6b6b;
            }

            /* Navigation Links */
            .nav-link {
                padding: 8px 16px;
                border-radius: 8px;
                color: rgba(0, 0, 0, 0.6);
                font-size: 13px;
                font-weight: 600;
                border: none;
                background: transparent;
                cursor: pointer;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .nav-link:hover {
                background: rgba(255, 107, 107, 0.1);
                color: #ff6b6b;
                transform: translateY(-2px);
            }

            .nav-link-home {
                color: rgba(0, 0, 0, 0.7);
            }

            .nav-link-login {
                background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%);
                color: white !important;
                padding: 8px 18px;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.25);
                border-radius: 8px;
            }

            .nav-link-login:hover {
                background: linear-gradient(135deg, #ff5252 0%, #ff4242 100%);
                color: white !important;
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.35);
            }

            .nav-link-login:active {
                transform: translateY(-1px);
            }

            /* Logout Button */
            .logout-link {
                background: transparent;
                border: none;
                color: rgba(0, 0, 0, 0.6);
                cursor: pointer;
                font-size: 13px;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 6px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                padding: 8px 16px;
                border-radius: 8px;
            }

            .logout-link:hover {
                color: #ff6b6b;
                background: rgba(255, 107, 107, 0.1);
                transform: translateY(-2px);
            }

            /* Main Menu */
            .mainmenu {
                width: 100%;
                border-top: 1px solid rgba(255, 107, 107, 0.1);
                padding-top: 12px;
                margin-top: 12px;
                animation: slideDown 0.5s ease;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            #primary-menu {
                list-style: none;
                display: flex;
                gap: 5px;
                margin: 0;
                padding: 0;
                flex-wrap: wrap;
            }

            #primary-menu li {
                margin: 0;
            }

            #primary-menu a {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 10px 18px;
                color: rgba(0, 0, 0, 0.6);
                text-decoration: none;
                font-weight: 600;
                border-radius: 8px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                font-size: 13px;
                position: relative;
            }

            #primary-menu a::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #ff6b6b, #ff5252);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                transform: translateX(-50%);
            }

            #primary-menu a.active,
            #primary-menu a:hover {
                color: #ff6b6b;
                background: rgba(255, 107, 107, 0.08);
            }

            #primary-menu a:hover::before,
            #primary-menu a.active::before {
                width: 30px;
            }

            .nav-btn-tickets {
                background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%) !important;
                color: white !important;
                padding: 10px 20px !important;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.25);
                border-radius: 8px;
            }

            .nav-btn-tickets:hover {
                background: linear-gradient(135deg, #ff5252 0%, #ff4242 100%) !important;
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.35);
            }

            .nav-btn-tickets:before {
                display: none !important;
            }

            /* Mobile Menu Toggle */
            .menu-toggle {
                display: none;
                flex-direction: column;
                gap: 5px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .menu-toggle span {
                width: 25px;
                height: 3px;
                background: linear-gradient(90deg, #ff6b6b, #ff5252);
                border-radius: 2px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .header-area {
                    gap: 15px;
                }

                .header-search {
                    min-width: 200px;
                }

                .search-input-wrapper input::placeholder {
                    font-size: 12px;
                }

                .header-menu {
                    gap: 5px;
                }

                .nav-link {
                    padding: 6px 12px;
                    font-size: 12px;
                }

                .user-name {
                    max-width: 100px;
                }

                .menu-toggle {
                    display: flex;
                }

                .mainmenu {
                    display: none;
                }

                #primary-menu a {
                    padding: 8px 16px;
                }
            }

            @media (max-width: 480px) {
                .header-area {
                    gap: 10px;
                }

                .logo-link {
                    font-size: 18px;
                }

                .logo-link i {
                    font-size: 24px;
                }

                .header-search {
                    min-width: 150px;
                }

                .search-input-wrapper {
                    padding: 6px 12px;
                }

                .header-menu {
                    gap: 3px;
                }

                .user-name {
                    display: none;
                }

                .nav-link-login span {
                    display: none;
                }

                .nav-link-home span {
                    display: none;
                }
            }
        </style>
	</body>

</html>