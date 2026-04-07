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
			<div class="container-fluid">
				<div class="header-area">
					<!-- Logo -->
					<div class="logo">
                        <a href="{{ route('welcome') }}" class="logo-link">
                        	<i class="icofont icofont-film"></i>
                        	<span>CINEGO</span>
                        </a>
					</div>

					<!-- Navigation Menu -->
					<nav class="nav-menu">
						<ul class="nav-list">
							<li><a href="{{ route('welcome') }}" class="nav-item"><i class="icofont icofont-home"></i> HOME</a></li>
							<li><a href="{{ Auth::check() ? route('nowplay') : '#' }}" class="nav-item"><i class="icofont icofont-play"></i> NOW PLAYING</a></li>
							<li><a href="#" class="nav-item"><i class="icofont icofont-calendar"></i> COMING SOON</a></li>
							<li><a href="#" class="nav-item"><i class="icofont icofont-building"></i> BIOSKOP</a></li>
						</ul>
					</nav>

					<!-- Header Right -->
					<div class="header-right">
						<!-- Search Bar -->
						<div class="header-search">
							<form action="#">
								<div class="search-input-wrapper">
									<i class="icofont icofont-search"></i>
									<input type="text" placeholder="Cari film & bioskop..."/>
								</div>
							</form>
						</div>

						<!-- Profile Menu -->
						@if (Auth::check())
							<div class="profile-menu">
								<button class="profile-btn" onclick="toggleProfileMenu()">
									<span class="profile-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
								</button>
								<div class="profile-dropdown" id="profileDropdown">
									<div class="dropdown-header">
										<span class="user-name">{{ Auth::user()->name }}</span>
										<span class="user-role">{{ Auth::user()->role === 'admin' ? 'Admin' : 'User' }}</span>
									</div>
									<div class="dropdown-divider"></div>
									<a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('home') }}" class="dropdown-item">
										<i class="icofont icofont-dashboard"></i> Dashboard
									</a>
									<a href="#" class="dropdown-item">
										<i class="icofont icofont-user"></i> Profil
									</a>
									<a href="#" class="dropdown-item">
										<i class="icofont icofont-ticket"></i> Riwayat Pemesanan
									</a>
									<div class="dropdown-divider"></div>
									<form method="POST" action="{{ route('logout') }}" class="w-100">
										@csrf
										<button type="submit" class="dropdown-item logout-item">
											<i class="icofont icofont-logout"></i> Logout
										</button>
									</form>
								</div>
							</div>
						@else
							<button class="login-btn" onclick="showLoginModal()">
								<i class="icofont icofont-sign-in"></i> LOGIN
							</button>
						@endif
					</div>

					<!-- Mobile Menu Toggle -->
					<div class="menu-toggle" onclick="toggleMobileMenu()">
						<span></span>
						<span></span>
						<span></span>
					</div>
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
		</section>
		<!-- hero area end -->
		<!-- trending movies section start -->
		<section class="trending-movies pt-60 pb-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h1><i class="icofont icofont-fire"></i> Trending Movies</h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="trending-movie-card">
							<div class="trending-img">
								<img src="assets/img/portfolio/portfolio1.png" alt="trending" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube trending-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
								<div class="trending-badge">
									<span>Trending</span>
								</div>
							</div>
							<div class="trending-content">
								<h3>Boyz II Men</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>A captivating story about friendship and dreams...</p>
								<a href="#" class="btn-trending">Book Tickets</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="trending-movie-card">
							<div class="trending-img">
								<img src="assets/img/portfolio/portfolio2.png" alt="trending" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube trending-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
								<div class="trending-badge">
									<span>Trending</span>
								</div>
							</div>
							<div class="trending-content">
								<h3>Tale of Revenge</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>An epic tale of justice and redemption...</p>
								<a href="#" class="btn-trending">Book Tickets</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="trending-movie-card">
							<div class="trending-img">
								<img src="assets/img/portfolio/portfolio3.png" alt="trending" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube trending-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
								<div class="trending-badge">
									<span>Trending</span>
								</div>
							</div>
							<div class="trending-content">
								<h3>The Lost City of Z</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>Adventure awaits in the heart of the jungle...</p>
								<a href="#" class="btn-trending">Book Tickets</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="trending-movie-card">
							<div class="trending-img">
								<img src="assets/img/portfolio/portfolio4.png" alt="trending" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube trending-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
								<div class="trending-badge">
									<span>Trending</span>
								</div>
							</div>
							<div class="trending-content">
								<h3>Beast Beauty</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>A magical tale of love and transformation...</p>
								<a href="#" class="btn-trending">Book Tickets</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- trending movies section end -->
		<!-- portfolio section start -->
		<section class="portfolio-area pt-60 pb-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-12 text-center">
					    <div class="section-title">
							<h1><i class="icofont icofont-movie"></i> Movie Updates</h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="update-movie-card">
							<div class="update-img">
								<img src="assets/img/portfolio/portfolio1.png" alt="update" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube update-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="update-content">
								<h3>Boyz II Men</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>A captivating story about friendship and dreams...</p>
								<a href="#" class="btn-update">Watch Now</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="update-movie-card">
							<div class="update-img">
								<img src="assets/img/portfolio/portfolio2.png" alt="update" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube update-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="update-content">
								<h3>Tale of Revenge</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>An epic tale of justice and redemption...</p>
								<a href="#" class="btn-update">Watch Now</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="update-movie-card">
							<div class="update-img">
								<img src="assets/img/portfolio/portfolio3.png" alt="update" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube update-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="update-content">
								<h3>The Lost City of Z</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>Adventure awaits in the heart of the jungle...</p>
								<a href="#" class="btn-update">Notify Me</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="update-movie-card">
							<div class="update-img">
								<img src="assets/img/portfolio/portfolio4.png" alt="update" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube update-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="update-content">
								<h3>Beast Beauty</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>A magical tale of love and transformation...</p>
								<a href="#" class="btn-update">Watch Now</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="update-movie-card">
							<div class="update-img">
								<img src="assets/img/portfolio/portfolio5.png" alt="update" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube update-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="update-content">
								<h3>In The Fade</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>Experience the power of love and loss...</p>
								<a href="#" class="btn-update">Watch Now</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 mb-30">
						<div class="update-movie-card">
							<div class="update-img">
								<img src="assets/img/portfolio/portfolio6.png" alt="update" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube update-play">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="update-content">
								<h3>Last Hero</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>The final battle begins in this epic adventure...</p>
								<a href="#" class="btn-update">Watch Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- portfolio section end -->
		<!-- video section start -->
		<section class="video ptb-90">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-12 text-center">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-play"></i> Terbaru Tayang</h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-4 col-sm-6 mb-30">
						<div class="video-card">
							<div class="video-img">
								<img src="assets/img/video/video1.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube video-play-btn">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-content">
								<h3>Angle of Death</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k</h4>
								</div>
								<p>An intense thriller that will keep you on edge...</p>
								<a href="#" class="btn-video">Watch Trailer</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-30">
						<div class="video-card">
							<div class="video-img">
								<img src="assets/img/video/video2.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube video-play-btn">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-content">
								<h3>Mystery Unveiled</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>160k</h4>
								</div>
								<p>A captivating mystery that will blow your mind...</p>
								<a href="#" class="btn-video">Watch Trailer</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-30">
						<div class="video-card">
							<div class="video-img">
								<img src="assets/img/video/video3.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube video-play-btn">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-content">
								<h3>Epic Adventure</h3>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>200k</h4>
								</div>
								<p>An epic journey across mythical landscapes...</p>
								<a href="#" class="btn-video">Watch Trailer</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- video section end -->
		<!-- news section start -->
		<section class="news" id="news-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-star"></i> FILM PALING DITUNGGU</h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-4 col-sm-6 mb-30 animate-fade-up">
						<div class="awaited-card">
							<div class="awaited-image">
								<div class="awaited-bg awaited-bg-1"></div>
								<div class="awaited-overlay">
									<div class="awaited-badge coming-soon">COMING SOON</div>
									<a href="#" class="awaited-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							</div>
							<div class="awaited-content">
								<h3>The Witch Queen</h3>
								<div class="awaited-release">
									<i class="icofont icofont-calendar"></i>
									<span>JAN 2026</span>
								</div>
								<p>Witch Queen is a tall woman with a slim build. An epic fantasy adventure with stunning visuals and thrilling action sequences.</p>
								<div class="awaited-footer">
									<a href="#" class="awaited-btn">Baca Selengkapnya</a>
									<span class="anticipation-meter">
										<span class="meter-label">Antusiasme</span>
										<div class="meter-bar">
											<div class="meter-fill" style="width: 95%;"></div>
										</div>
										<span class="meter-percent">95%</span>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-6 mb-30 animate-fade-up delay-1">
						<div class="awaited-card">
							<div class="awaited-image">
								<div class="awaited-bg awaited-bg-2"></div>
								<div class="awaited-overlay">
									<div class="awaited-badge coming-soon">COMING SOON</div>
									<a href="#" class="awaited-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							</div>
							<div class="awaited-content">
								<h3>The Witch Queen</h3>
								<div class="awaited-release">
									<i class="icofont icofont-calendar"></i>
									<span>FEB 2026</span>
								</div>
								<p>Witch Queen is a tall woman with a slim build. An epic fantasy adventure with stunning visuals and thrilling action sequences.</p>
								<div class="awaited-footer">
									<a href="#" class="awaited-btn">Baca Selengkapnya</a>
									<span class="anticipation-meter">
										<span class="meter-label">Antusiasme</span>
										<div class="meter-bar">
											<div class="meter-fill" style="width: 88%;"></div>
										</div>
										<span class="meter-percent">88%</span>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-6 mb-30 animate-fade-up delay-2">
						<div class="awaited-card">
							<div class="awaited-image">
								<div class="awaited-bg awaited-bg-3"></div>
								<div class="awaited-overlay">
									<div class="awaited-badge coming-soon">COMING SOON</div>
									<a href="#" class="awaited-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							</div>
							<div class="awaited-content">
								<h3>The Witch Queen</h3>
								<div class="awaited-release">
									<i class="icofont icofont-calendar"></i>
									<span>MAR 2026</span>
								</div>
								<p>Witch Queen is a tall woman with a slim build. An epic fantasy adventure with stunning visuals and thrilling action sequences.</p>
								<div class="awaited-footer">
									<a href="#" class="awaited-btn">Baca Selengkapnya</a>
									<span class="anticipation-meter">
										<span class="meter-label">Antusiasme</span>
										<div class="meter-bar">
											<div class="meter-fill" style="width: 92%;"></div>
										</div>
										<span class="meter-percent">92%</span>
									</span>
								</div>
							</div>
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
            // Profile Dropdown Toggle
            function toggleProfileMenu() {
                const dropdown = document.getElementById('profileDropdown');
                if (dropdown) {
                    dropdown.classList.toggle('show');
                }
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                const profileMenu = document.querySelector('.profile-menu');
                const dropdown = document.getElementById('profileDropdown');
                
                if (dropdown && !profileMenu.contains(e.target)) {
                    dropdown.classList.remove('show');
                }
            });

            // Show Login Modal
            function showLoginModal() {
                const loginModal = document.getElementById('login-modal');
                if (loginModal) {
                    loginModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
            }

            // Toggle Mobile Menu
            function toggleMobileMenu() {
                const navMenu = document.querySelector('.nav-menu');
                if (navMenu) {
                    navMenu.style.display = navMenu.style.display === 'none' ? 'block' : 'none';
                }
            }

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
                if (loginModal) {
                    loginModal.addEventListener('click', function(e) {
                        if (e.target === loginModal) {
                            closeLoginModal();
                        }
                    });
                }

                // Close modal when pressing Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && loginModal && loginModal.style.display === 'flex') {
                        closeLoginModal();
                    }
                });

                // Close button
                const closeBtn = loginModal ? loginModal.querySelector('a[onclick="closeLoginModal()"]') : null;
                if (closeBtn) {
                    closeBtn.addEventListener('click', closeLoginModal);
                }
            });

            function openLoginModal() {
                const loginModal = document.getElementById('login-modal');
                if (loginModal) {
                    loginModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeLoginModal() {
                const loginModal = document.getElementById('login-modal');
                if (loginModal) {
                    loginModal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
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
                color: #000 !important;
                width: 100%;
                transition: all 0.3s ease;
            }

            .search-input-wrapper input::placeholder {
                color: rgba(0, 0, 0, 0.4) !important;
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

            /* ===== TRENDING MOVIES SECTION ===== */
            .trending-movies {
                background: linear-gradient(135deg, rgba(26, 26, 46, 0.5) 0%, rgba(22, 33, 62, 0.5) 100%);
                backdrop-filter: blur(10px);
                padding: 60px 0;
            }

            .trending-movies .section-title h1 {
                color: white;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }

            .trending-movies .section-title h1 i {
                color: #ff6b6b;
                font-size: 40px;
            }

            .trending-movies hr {
                background: rgba(255, 107, 107, 0.2);
                border: none;
                height: 2px;
                margin: 30px 0;
            }

            .trending-movie-card {
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .trending-movie-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 30px rgba(255, 107, 107, 0.2);
            }

            .trending-img {
                position: relative;
                width: 100%;
                height: 280px;
                overflow: hidden;
                background: #f0f0f0;
            }

            .trending-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.4s ease;
            }

            .trending-movie-card:hover .trending-img img {
                transform: scale(1.08);
            }

            .trending-play {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 60px;
                height: 60px;
                background: rgba(255, 107, 107, 0.9);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 24px;
                opacity: 0;
                transition: all 0.3s ease;
                cursor: pointer;
                z-index: 2;
            }

            .trending-movie-card:hover .trending-play {
                opacity: 1;
            }

            .trending-play:hover {
                background: #ff5252;
                transform: translate(-50%, -50%) scale(1.1);
            }

            .trending-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 11px;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 1px;
                z-index: 1;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
            }

            .trending-content {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .trending-content h3 {
                color: #333;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                line-height: 1.3;
            }

            .trending-content .review {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 12px;
            }

            .trending-content .author-review {
                display: flex;
                gap: 3px;
            }

            .trending-content .author-review i {
                color: #ff6b6b;
                font-size: 14px;
            }

            .trending-content .review h4 {
                color: #999;
                font-size: 12px;
                margin: 0;
                font-weight: 600;
            }

            .trending-content p {
                color: #666;
                font-size: 13px;
                line-height: 1.5;
                margin-bottom: 15px;
                flex-grow: 1;
            }

            .btn-trending {
                display: inline-block;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                padding: 10px 18px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 12px;
                text-transform: uppercase;
                transition: all 0.3s ease;
                text-align: center;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.25);
            }

            .btn-trending:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(255, 107, 107, 0.35);
            }

            .btn-trending:active {
                transform: translateY(0);
            }

            /* ===== MOVIE UPDATES SECTION ===== */
            .portfolio-area {
                padding: 60px 0;
            }

            .portfolio-area .section-title h1 {
                color: #333;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }

            .portfolio-area .section-title h1 i {
                color: #ff6b6b;
                font-size: 40px;
            }

            .portfolio-area hr {
                background: rgba(255, 107, 107, 0.2);
                border: none;
                height: 2px;
                margin: 30px 0;
            }

            .update-movie-card {
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .update-movie-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 35px rgba(255, 107, 107, 0.25);
            }

            .update-img {
                position: relative;
                width: 100%;
                height: 280px;
                overflow: hidden;
                background: #f0f0f0;
            }

            .update-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.4s ease;
            }

            .update-movie-card:hover .update-img img {
                transform: scale(1.08);
            }

            .update-play {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 60px;
                height: 60px;
                background: rgba(255, 107, 107, 0.9);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 24px;
                opacity: 0;
                transition: all 0.3s ease;
                cursor: pointer;
                z-index: 2;
            }

            .update-movie-card:hover .update-play {
                opacity: 1;
            }

            .update-play:hover {
                background: #ff5252;
                transform: translate(-50%, -50%) scale(1.1);
            }

            .update-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                color: white;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 11px;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 1px;
                z-index: 1;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            }

            .update-badge.latest {
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
            }

            .update-badge.top-rated {
                background: linear-gradient(135deg, #ffa500, #ff8c00);
            }

            .update-badge.coming-soon {
                background: linear-gradient(135deg, #6c5ce7, #5f27cd);
            }

            .update-badge.recently-released {
                background: linear-gradient(135deg, #00b894, #00a085);
            }

            .update-content {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .update-content h3 {
                color: #333;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                line-height: 1.3;
            }

            .update-content .review {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 12px;
            }

            .update-content .author-review {
                display: flex;
                gap: 3px;
            }

            .update-content .author-review i {
                color: #ff6b6b;
                font-size: 14px;
            }

            .update-content .review h4 {
                color: #999;
                font-size: 12px;
                margin: 0;
                font-weight: 600;
            }

            .update-content p {
                color: #666;
                font-size: 13px;
                line-height: 1.5;
                margin-bottom: 15px;
                flex-grow: 1;
            }

            .btn-update {
                display: inline-block;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                padding: 10px 18px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 12px;
                text-transform: uppercase;
                transition: all 0.3s ease;
                text-align: center;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.25);
            }

            .btn-update:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(255, 107, 107, 0.35);
            }

            .btn-update:active {
                transform: translateY(0);
            }

            @media (max-width: 768px) {
                .portfolio-area .section-title h1 {
                    font-size: 28px;
                }

                .update-img {
                    height: 240px;
                }

                .update-content {
                    padding: 15px;
                }

                .update-content h3 {
                    font-size: 16px;
                }

                .update-content p {
                    font-size: 12px;
                }
            }

            @media (max-width: 480px) {
                .portfolio-area {
                    padding: 40px 0;
                }

                .portfolio-area .section-title h1 {
                    font-size: 22px;
                    gap: 10px;
                }

                .portfolio-area .section-title h1 i {
                    font-size: 28px;
                }

                .update-img {
                    height: 200px;
                }

                .update-content {
                    padding: 12px;
                }

                .update-content h3 {
                    font-size: 14px;
                }
            }

            /* ===== VIDEO SECTION (TERBARU TAYANG) ===== */
            .video {
                padding: 60px 0;
            }

            .video .section-title h1 {
                color: #333;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }

            .video .section-title h1 i {
                color: #ff6b6b;
                font-size: 40px;
            }

            .video hr {
                background: rgba(255, 107, 107, 0.2);
                border: none;
                height: 2px;
                margin: 30px 0;
            }

            .video-card {
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .video-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 35px rgba(255, 107, 107, 0.25);
            }

            .video-img {
                position: relative;
                width: 100%;
                height: 280px;
                overflow: hidden;
                background: #f0f0f0;
            }

            .video-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.4s ease;
            }

            .video-card:hover .video-img img {
                transform: scale(1.08);
            }

            .video-play-btn {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 70px;
                height: 70px;
                background: rgba(255, 107, 107, 0.9);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 28px;
                opacity: 0;
                transition: all 0.3s ease;
                cursor: pointer;
                z-index: 2;
            }

            .video-card:hover .video-play-btn {
                opacity: 1;
            }

            .video-play-btn:hover {
                background: #ff5252;
                transform: translate(-50%, -50%) scale(1.15);
            }

            .video-content {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .video-content h3 {
                color: #333;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                line-height: 1.3;
            }

            .video-content .review {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 12px;
            }

            .video-content .author-review {
                display: flex;
                gap: 3px;
            }

            .video-content .author-review i {
                color: #ff6b6b;
                font-size: 14px;
            }

            .video-content .review h4 {
                color: #999;
                font-size: 12px;
                margin: 0;
                font-weight: 600;
            }

            .video-content p {
                color: #666;
                font-size: 13px;
                line-height: 1.5;
                margin-bottom: 15px;
                flex-grow: 1;
            }

            .btn-video {
                display: inline-block;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                padding: 10px 18px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 12px;
                text-transform: uppercase;
                transition: all 0.3s ease;
                text-align: center;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.25);
            }

            .btn-video:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(255, 107, 107, 0.35);
            }

            .btn-video:active {
                transform: translateY(0);
            }

            @media (max-width: 768px) {
                .video .section-title h1 {
                    font-size: 28px;
                }

                .video-img {
                    height: 240px;
                }

                .video-content {
                    padding: 15px;
                }

                .video-content h3 {
                    font-size: 16px;
                }

                .video-content p {
                    font-size: 12px;
                }
            }

            @media (max-width: 480px) {
                .video {
                    padding: 40px 0;
                }

                .video .section-title h1 {
                    font-size: 22px;
                    gap: 10px;
                }

                .video .section-title h1 i {
                    font-size: 28px;
                }

                .video-img {
                    height: 200px;
                }

                .video-content {
                    padding: 12px;
                }

                .video-content h3 {
                    font-size: 14px;
                }
            }

            /* ===== KEYFRAME ANIMATIONS ===== */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes scaleInBounce {
                0% {
                    opacity: 0;
                    transform: scale(0.8) translateY(30px);
                }
                50% {
                    opacity: 0.8;
                }
                100% {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }

            @keyframes shimmer {
                0%, 100% {
                    opacity: 0.5;
                }
                50% {
                    opacity: 1;
                }
            }

            .animate-fade-up {
                animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                opacity: 0;
            }

            .animate-fade-up.delay-1 {
                animation-delay: 0.2s;
            }

            .animate-fade-up.delay-2 {
                animation-delay: 0.4s;
            }

            /* ===== AWAITED MOVIES SECTION (FILM PALING DITUNGGU) ===== */
            .news {
                padding: 60px 0;
                background: linear-gradient(135deg, rgba(255, 107, 107, 0.02) 0%, rgba(255, 82, 82, 0.02) 100%);
            }

            .news .section-title h1 {
                color: #333;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }

            .news .section-title h1 i {
                color: #ff6b6b;
                font-size: 40px;
                animation: shimmer 2s ease-in-out infinite;
            }

            .news hr {
                background: rgba(255, 107, 107, 0.2);
                border: none;
                height: 2px;
                margin: 30px 0;
            }

            .awaited-card {
                background: white;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
                position: relative;
                border: 1px solid rgba(255, 107, 107, 0.1);
            }

            .awaited-card:hover {
                transform: translateY(-12px);
                box-shadow: 0 16px 45px rgba(255, 107, 107, 0.3);
                border-color: rgba(255, 107, 107, 0.3);
            }

            .awaited-image {
                position: relative;
                width: 100%;
                height: 280px;
                overflow: hidden;
                background: linear-gradient(135deg, #f5f5f5, #f0f0f0);
            }

            .awaited-bg {
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center;
                transition: all 0.5s ease;
            }

            .awaited-bg-1 {
                background-image: linear-gradient(rgba(26, 26, 46, 0.3), rgba(26, 26, 46, 0.3)), url("assets/img/video/video1.png");
            }

            .awaited-bg-2 {
                background-image: linear-gradient(rgba(26, 26, 46, 0.3), rgba(26, 26, 46, 0.3)), url("assets/img/video/video2.png");
            }

            .awaited-bg-3 {
                background-image: linear-gradient(rgba(26, 26, 46, 0.3), rgba(26, 26, 46, 0.3)), url("assets/img/video/video3.png");
            }

            .awaited-card:hover .awaited-bg {
                transform: scale(1.12);
            }

            .awaited-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(26, 26, 46, 0.4);
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .awaited-card:hover .awaited-overlay {
                opacity: 1;
            }

            .awaited-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 11px;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                z-index: 3;
                animation: scaleInBounce 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            .awaited-badge.coming-soon {
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            }

            .awaited-play-btn {
                width: 80px;
                height: 80px;
                background: rgba(255, 255, 255, 0.95);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ff6b6b;
                font-size: 32px;
                transition: all 0.3s ease;
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
                z-index: 2;
                animation: scaleInBounce 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s backwards;
            }

            .awaited-play-btn:hover {
                background: white;
                transform: scale(1.15);
                box-shadow: 0 12px 40px rgba(255, 107, 107, 0.4);
            }

            .awaited-content {
                padding: 25px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                position: relative;
            }

            .awaited-content::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, #ff6b6b, #ff5252, transparent);
            }

            .awaited-content h3 {
                color: #333;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 12px;
                line-height: 1.3;
            }

            .awaited-release {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 15px;
                color: #ff6b6b;
                font-size: 13px;
                font-weight: 600;
            }

            .awaited-release i {
                font-size: 16px;
            }

            .awaited-content p {
                color: #666;
                font-size: 13px;
                line-height: 1.6;
                margin-bottom: 18px;
                flex-grow: 1;
            }

            .awaited-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
            }

            .awaited-btn {
                display: inline-block;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                padding: 10px 18px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                font-size: 12px;
                text-transform: uppercase;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.25);
                white-space: nowrap;
            }

            .awaited-btn:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(255, 107, 107, 0.35);
            }

            .anticipation-meter {
                display: flex;
                align-items: center;
                gap: 6px;
                font-size: 11px;
            }

            .meter-label {
                color: #999;
                font-weight: 600;
                min-width: 50px;
            }

            .meter-bar {
                width: 60px;
                height: 4px;
                background: #eee;
                border-radius: 2px;
                overflow: hidden;
            }

            .meter-fill {
                height: 100%;
                background: linear-gradient(90deg, #ff6b6b, #ff5252);
                border-radius: 2px;
                animation: fadeInUp 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s backwards;
                box-shadow: 0 0 8px rgba(255, 107, 107, 0.5);
            }

            .meter-percent {
                color: #ff6b6b;
                font-weight: bold;
                min-width: 28px;
                text-align: right;
            }

            @media (max-width: 768px) {
                .news {
                    padding: 40px 0;
                }

                .news .section-title h1 {
                    font-size: 28px;
                    gap: 12px;
                }

                .news .section-title h1 i {
                    font-size: 32px;
                }

                .awaited-image {
                    height: 240px;
                }

                .awaited-content {
                    padding: 18px;
                }

                .awaited-content h3 {
                    font-size: 18px;
                }

                .awaited-footer {
                    flex-wrap: wrap;
                }

                .anticipation-meter {
                    width: 100%;
                    margin-top: 10px;
                }
            }

            @media (max-width: 480px) {
                .news {
                    padding: 30px 0;
                }

                .news .section-title h1 {
                    font-size: 22px;
                    gap: 8px;
                }

                .news .section-title h1 i {
                    font-size: 28px;
                }

                .awaited-image {
                    height: 200px;
                }

                .awaited-content {
                    padding: 15px;
                }

                .awaited-content h3 {
                    font-size: 16px;
                    margin-bottom: 8px;
                }

                .awaited-content p {
                    font-size: 12px;
                    margin-bottom: 12px;
                }

                .awaited-footer {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .awaited-btn {
                    width: 100%;
                    text-align: center;
                }

                .anticipation-meter {
                    width: 100%;
                }

                .awaited-play-btn {
                    width: 60px;
                    height: 60px;
                    font-size: 24px;
                }
            }

            /* Responsive */
            @media (max-width: 768px) {
                .trending-movies .section-title h1 {
                    font-size: 28px;
                }

                .trending-img {
                    height: 240px;
                }

                .trending-content {
                    padding: 15px;
                }

                .trending-content h3 {
                    font-size: 16px;
                }

                .trending-content p {
                    font-size: 12px;
                }
            }

            @media (max-width: 480px) {
                .trending-movies {
                    padding: 40px 0;
                }

                .trending-movies .section-title h1 {
                    font-size: 22px;
                    gap: 10px;
                }

                .trending-movies .section-title h1 i {
                    font-size: 28px;
                }

                .trending-img {
                    height: 200px;
                }

                .trending-content {
                    padding: 12px;
                }

                .trending-content h3 {
                    font-size: 14px;
                }
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

            /* ===== NEW NAVIGATION MENU ===== */
            .nav-menu {
                flex: 1;
                animation: fadeInDown 0.6s ease 0.1s both;
            }

            .nav-list {
                list-style: none;
                display: flex;
                gap: 25px;
                margin: 0;
                padding: 0;
                justify-content: center;
            }

            .nav-item {
                display: flex;
                align-items: center;
                gap: 8px;
                text-decoration: none;
                color: #333;
                font-size: 13px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                padding: 8px 12px;
                border-radius: 6px;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
            }

            .nav-item i {
                font-size: 16px;
                transition: all 0.3s ease;
            }

            .nav-item:hover {
                color: #ff6b6b;
                background: rgba(255, 107, 107, 0.08);
                transform: translateY(-2px);
            }

            .nav-item:hover i {
                transform: scale(1.15);
                color: #ff6b6b;
            }

            .nav-item::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #ff6b6b, #ff5252);
                transform: translateX(-50%);
                transition: width 0.3s ease;
            }

            .nav-item:hover::after {
                width: 80%;
            }

            /* ===== HEADER RIGHT LAYOUT ===== */
            .header-right {
                display: flex;
                align-items: center;
                gap: 20px;
                flex-shrink: 0;
            }

            .header-search {
                flex: 0 0 auto;
                min-width: 280px;
            }

            /* ===== PROFILE MENU DROPDOWN ===== */
            .profile-menu {
                position: relative;
                animation: fadeInRight 0.6s ease 0.2s both;
            }

            .profile-btn {
                width: 42px;
                height: 42px;
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                border: none;
                border-radius: 50%;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.2);
                padding: 0;
            }

            .profile-btn:hover {
                transform: scale(1.1) rotate(5deg);
                box-shadow: 0 6px 20px rgba(255, 107, 107, 0.3);
            }

            .profile-btn:active {
                transform: scale(0.95) rotate(0);
            }

            .profile-avatar {
                color: white;
                font-weight: bold;
                font-size: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .profile-dropdown {
                position: absolute;
                top: 100%;
                right: 0;
                background: white;
                border-radius: 12px;
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
                min-width: 240px;
                margin-top: 12px;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px) scale(0.95);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 1000;
                border: 1px solid rgba(255, 107, 107, 0.1);
            }

            .profile-dropdown.show {
                opacity: 1;
                visibility: visible;
                transform: translateY(0) scale(1);
            }

            .dropdown-header {
                padding: 16px 18px;
                border-bottom: 1px solid #f0f0f0;
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .user-name {
                font-size: 14px;
                font-weight: 700;
                color: #333;
            }

            .user-role {
                font-size: 11px;
                color: #ff6b6b;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .dropdown-item {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 18px;
                color: #333;
                text-decoration: none;
                font-size: 13px;
                font-weight: 600;
                background: transparent;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
                width: 100%;
                text-align: left;
            }

            .dropdown-item i {
                font-size: 16px;
                color: #ff6b6b;
                transition: all 0.3s ease;
                min-width: 20px;
                text-align: center;
            }

            .dropdown-item:hover {
                background: rgba(255, 107, 107, 0.08);
                color: #ff6b6b;
                padding-left: 22px;
            }

            .dropdown-item:hover i {
                transform: scale(1.2);
            }

            .dropdown-divider {
                height: 1px;
                background: #f0f0f0;
                margin: 8px 0;
            }

            .logout-item {
                color: #e74c3c;
            }

            .logout-item i {
                color: #e74c3c;
            }

            .logout-item:hover {
                background: rgba(231, 76, 60, 0.08);
                color: #e74c3c;
            }

            /* ===== LOGIN BUTTON ===== */
            .login-btn {
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                border: none;
                padding: 10px 22px;
                border-radius: 8px;
                font-size: 13px;
                font-weight: 700;
                text-transform: uppercase;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 8px;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.25);
                letter-spacing: 0.5px;
            }

            .login-btn:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.35);
            }

            .login-btn:active {
                transform: translateY(0);
            }

            /* ===== RESPONSIVE NAVIGATION ===== */
            @media (max-width: 1024px) {
                .nav-list {
                    gap: 15px;
                }

                .nav-item {
                    font-size: 12px;
                    padding: 6px 10px;
                }

                .header-search {
                    min-width: 220px;
                }

                .search-input-wrapper input {
                    font-size: 12px;
                }
            }

            @media (max-width: 768px) {
                .nav-menu {
                    display: none;
                }

                .header-area {
                    gap: 12px;
                }

                .header-search {
                    flex: 1;
                    min-width: 150px;
                }

                .search-input-wrapper {
                    padding: 8px 15px;
                }

                .search-input-wrapper input {
                    font-size: 12px;
                }

                .search-input-wrapper i {
                    font-size: 16px;
                    margin-right: 8px;
                }

                .profile-dropdown {
                    min-width: 200px;
                }

                .dropdown-item {
                    padding: 10px 15px;
                    font-size: 12px;
                }
            }

            @media (max-width: 480px) {
                .logo-link {
                    font-size: 18px;
                    padding: 6px 10px;
                    gap: 6px;
                }

                .logo-link i {
                    font-size: 24px;
                }

                .header-search {
                    min-width: 120px;
                }

                .search-input-wrapper {
                    padding: 6px 12px;
                }

                .search-input-wrapper input {
                    font-size: 11px;
                }

                .search-input-wrapper i {
                    font-size: 14px;
                    margin-right: 6px;
                }

                .profile-btn {
                    width: 38px;
                    height: 38px;
                }

                .profile-avatar {
                    font-size: 14px;
                }

                .profile-dropdown {
                    min-width: 180px;
                    right: -20px;
                }

                .menu-toggle {
                    display: flex;
                }
            }
        </style>

        <script>
            // Hide preloader when page loads
            window.addEventListener('load', function() {
                const preloader = document.getElementById('preloader');
                if (preloader) {
                    preloader.style.display = 'none';
                }
            });
        </script>
	</body>

</html>