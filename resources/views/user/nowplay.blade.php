<!DOCTYPE HTML>
<html lang="zxx">
	
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Now Playing - CineGo</title>
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
							<li><a href="{{ route('nowplay') }}" class="nav-item active"><i class="icofont icofont-play"></i> NOW PLAYING</a></li>
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

		<!-- Main Content -->
		<main class="main-content" style="padding-top: 80px; min-height: 100vh;">
			<div class="container">
				<div class="row mt-5">
					<div class="col-lg-12">
						<h1 style="color: #333; font-weight: bold; margin-bottom: 30px;">
							<i class="icofont icofont-play" style="color: #ff6b6b;"></i> NOW PLAYING
						</h1>
					</div>
				</div>

				<!-- Movies Grid -->
				<div class="row">
					<!-- Movie Card 1 -->
					<div class="col-md-3 col-sm-6 mb-30 animate-fade-up">
						<div class="movie-card">
							<div class="movie-image">
								<img src="{{ asset('assets/img/video/video1.png') }}" alt="movie" />
								<div class="movie-overlay">
									<a href="#" class="movie-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
									<div class="movie-badge">NOW PLAYING</div>
								</div>
							</div>
							<div class="movie-content">
								<h3>Angle of Death</h3>
								<div class="movie-info">
									<span class="genre">Action, Thriller</span>
									<span class="duration">2h 10m</span>
								</div>
								<div class="movie-rating">
									<div class="stars">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<span class="rating-text">4.5/5</span>
								</div>
								<p class="movie-description">An intense thriller that will keep you on edge of your seat with breathtaking action sequences.</p>
								<a href="#" class="btn-book-ticket">Book Tickets</a>
							</div>
						</div>
					</div>

					<!-- Movie Card 2 -->
					<div class="col-md-3 col-sm-6 mb-30 animate-fade-up delay-1">
						<div class="movie-card">
							<div class="movie-image">
								<img src="{{ asset('assets/img/video/video2.png') }}" alt="movie" />
								<div class="movie-overlay">
									<a href="#" class="movie-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
									<div class="movie-badge">NOW PLAYING</div>
								</div>
							</div>
							<div class="movie-content">
								<h3>The Witch Queen</h3>
								<div class="movie-info">
									<span class="genre">Fantasy, Adventure</span>
									<span class="duration">2h 25m</span>
								</div>
								<div class="movie-rating">
									<div class="stars">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-half"></i>
									</div>
									<span class="rating-text">4.7/5</span>
								</div>
								<p class="movie-description">An epic fantasy adventure with stunning visuals and an enchanting storyline.</p>
								<a href="#" class="btn-book-ticket">Book Tickets</a>
							</div>
						</div>
					</div>

					<!-- Movie Card 3 -->
					<div class="col-md-3 col-sm-6 mb-30 animate-fade-up delay-2">
						<div class="movie-card">
							<div class="movie-image">
								<img src="{{ asset('assets/img/video/video3.png') }}" alt="movie" />
								<div class="movie-overlay">
									<a href="#" class="movie-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
									<div class="movie-badge">NOW PLAYING</div>
								</div>
							</div>
							<div class="movie-content">
								<h3>Dreams of Tomorrow</h3>
								<div class="movie-info">
									<span class="genre">Drama, Romance</span>
									<span class="duration">2h 00m</span>
								</div>
								<div class="movie-rating">
									<div class="stars">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<span class="rating-text">4.3/5</span>
								</div>
								<p class="movie-description">A touching story about love, dreams, and the journey to find one's true purpose.</p>
								<a href="#" class="btn-book-ticket">Book Tickets</a>
							</div>
						</div>
					</div>

					<!-- Movie Card 4 -->
					<div class="col-md-3 col-sm-6 mb-30 animate-fade-up delay-1">
						<div class="movie-card">
							<div class="movie-image">
								<img src="{{ asset('assets/img/video/video1.png') }}" alt="movie" />
								<div class="movie-overlay">
									<a href="#" class="movie-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
									<div class="movie-badge">NOW PLAYING</div>
								</div>
							</div>
							<div class="movie-content">
								<h3>Code Red</h3>
								<div class="movie-info">
									<span class="genre">Action, Sci-Fi</span>
									<span class="duration">2h 15m</span>
								</div>
								<div class="movie-rating">
									<div class="stars">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<span class="rating-text">4.6/5</span>
								</div>
								<p class="movie-description">A futuristic action thriller featuring advanced technology and intense combat scenes.</p>
								<a href="#" class="btn-book-ticket">Book Tickets</a>
							</div>
						</div>
					</div>

					<!-- Movie Card 5 -->
					<div class="col-md-3 col-sm-6 mb-30 animate-fade-up delay-2">
						<div class="movie-card">
							<div class="movie-image">
								<img src="{{ asset('assets/img/video/video2.png') }}" alt="movie" />
								<div class="movie-overlay">
									<a href="#" class="movie-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
									<div class="movie-badge">NOW PLAYING</div>
								</div>
							</div>
							<div class="movie-content">
								<h3>Midnight Echo</h3>
								<div class="movie-info">
									<span class="genre">Mystery, Thriller</span>
									<span class="duration">1h 55m</span>
								</div>
								<div class="movie-rating">
									<div class="stars">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-half"></i>
									</div>
									<span class="rating-text">4.4/5</span>
								</div>
								<p class="movie-description">A mysterious tale of secrets and hidden truths waiting to be discovered in the dark.</p>
								<a href="#" class="btn-book-ticket">Book Tickets</a>
							</div>
						</div>
					</div>

					<!-- Movie Card 6 -->
					<div class="col-md-3 col-sm-6 mb-30 animate-fade-up">
						<div class="movie-card">
							<div class="movie-image">
								<img src="{{ asset('assets/img/video/video3.png') }}" alt="movie" />
								<div class="movie-overlay">
									<a href="#" class="movie-play-btn">
										<i class="icofont icofont-ui-play"></i>
									</a>
									<div class="movie-badge">NOW PLAYING</div>
								</div>
							</div>
							<div class="movie-content">
								<h3>Eternal Bonds</h3>
								<div class="movie-info">
									<span class="genre">Drama, Family</span>
									<span class="duration">2h 05m</span>
								</div>
								<div class="movie-rating">
									<div class="stars">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<span class="rating-text">4.8/5</span>
								</div>
								<p class="movie-description">A heartwarming story about family bonds and the power of love across generations.</p>
								<a href="#" class="btn-book-ticket">Book Tickets</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<img src="{{ asset('assets/img/logo.png') }}" alt="about" />
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
        <style>
            /* Preloader */
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: white;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #preloader::after {
                content: '';
                width: 50px;
                height: 50px;
                border: 4px solid #f3f3f3;
                border-top: 4px solid #ff6b6b;
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
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

            /* Navigation Menu */
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

            .nav-item:hover,
            .nav-item.active {
                color: #ff6b6b;
                background: rgba(255, 107, 107, 0.08);
                transform: translateY(-2px);
            }

            .nav-item:hover i,
            .nav-item.active i {
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

            .nav-item:hover::after,
            .nav-item.active::after {
                width: 80%;
            }

            /* Header Right */
            .header-right {
                display: flex;
                align-items: center;
                gap: 20px;
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

            .header-search {
                flex: 0 0 auto;
                min-width: 280px;
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

            /* Profile Menu Dropdown */
            .profile-menu {
                position: relative;
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

            /* Login Button */
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

            /* Responsive */
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

            /* Main Content Styling */
            .main-content {
                background: linear-gradient(135deg, rgba(255, 107, 107, 0.02) 0%, rgba(255, 82, 82, 0.02) 100%);
            }

            .main-content h1 {
                animation: fadeInDown 0.6s ease;
            }

            /* ===== NOW PLAYING MOVIES CARD ===== */
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

            .movie-card {
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
                border: 1px solid rgba(255, 107, 107, 0.1);
            }

            .movie-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 16px 45px rgba(255, 107, 107, 0.25);
                border-color: rgba(255, 107, 107, 0.3);
            }

            .movie-image {
                position: relative;
                width: 100%;
                height: 280px;
                overflow: hidden;
                background: linear-gradient(135deg, #f5f5f5, #f0f0f0);
            }

            .movie-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.4s ease;
            }

            .movie-card:hover .movie-image img {
                transform: scale(1.08);
            }

            .movie-overlay {
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

            .movie-card:hover .movie-overlay {
                opacity: 1;
            }

            .movie-play-btn {
                width: 70px;
                height: 70px;
                background: rgba(255, 107, 107, 0.95);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 28px;
                text-decoration: none;
                transition: all 0.3s ease;
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
            }

            .movie-play-btn:hover {
                background: #ff5252;
                transform: scale(1.15);
                box-shadow: 0 12px 40px rgba(255, 107, 107, 0.4);
            }

            .movie-badge {
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
                letter-spacing: 0.5px;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
                animation: scaleInBounce 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            @keyframes scaleInBounce {
                0% {
                    opacity: 0;
                    transform: scale(0.8) translateY(10px);
                }
                50% {
                    opacity: 0.8;
                }
                100% {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }

            .movie-content {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .movie-content h3 {
                color: #333;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                line-height: 1.3;
            }

            .movie-info {
                display: flex;
                justify-content: space-between;
                gap: 10px;
                margin-bottom: 12px;
                font-size: 12px;
            }

            .movie-info .genre {
                color: #ff6b6b;
                font-weight: 600;
            }

            .movie-info .duration {
                color: #999;
                font-weight: 500;
            }

            .movie-rating {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 12px;
            }

            .movie-rating .stars {
                display: flex;
                gap: 2px;
            }

            .movie-rating i {
                color: #ff6b6b;
                font-size: 13px;
            }

            .movie-rating .rating-text {
                color: #666;
                font-size: 12px;
                font-weight: 600;
            }

            .movie-description {
                color: #666;
                font-size: 13px;
                line-height: 1.5;
                margin-bottom: 15px;
                flex-grow: 1;
            }

            .btn-book-ticket {
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
                border: none;
                cursor: pointer;
                width: 100%;
            }

            .btn-book-ticket:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(255, 107, 107, 0.35);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .movie-image {
                    height: 240px;
                }

                .movie-content {
                    padding: 15px;
                }

                .movie-content h3 {
                    font-size: 16px;
                }

                .movie-description {
                    font-size: 12px;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
            }

            @media (max-width: 480px) {
                .movie-image {
                    height: 200px;
                }

                .movie-content {
                    padding: 12px;
                }

                .movie-content h3 {
                    font-size: 14px;
                }

                .movie-description {
                    font-size: 11px;
                    display: -webkit-box;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

                .btn-book-ticket {
                    padding: 8px 12px;
                    font-size: 11px;
                }
            }

            /* Footer Styling */
            .footer {
                background: rgba(26, 26, 46, 0.9);
                color: white;
                padding: 50px 0 0 0;
                margin-top: 80px;
            }

            .footer .widget {
                margin-bottom: 30px;
            }

            .footer .widget img {
                max-width: 150px;
                margin-bottom: 15px;
            }

            .footer .widget p {
                color: rgba(255, 255, 255, 0.7);
                font-size: 14px;
                line-height: 1.6;
                margin-bottom: 15px;
            }

            .footer .widget h6 {
                color: white;
                font-size: 14px;
                font-weight: 600;
            }

            .footer .widget h6 span {
                color: #ff6b6b;
            }

            .footer .widget h4 {
                color: white;
                font-size: 16px;
                font-weight: 700;
                margin-bottom: 20px;
            }

            .footer .widget ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .footer .widget ul li {
                margin-bottom: 10px;
            }

            .footer .widget ul li a {
                color: rgba(255, 255, 255, 0.7);
                text-decoration: none;
                font-size: 14px;
                transition: all 0.3s ease;
            }

            .footer .widget ul li a:hover {
                color: #ff6b6b;
                padding-left: 5px;
            }

            .footer .widget form {
                display: flex;
                gap: 5px;
            }

            .footer .widget input[type="text"] {
                flex: 1;
                padding: 10px 15px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 4px;
                background: rgba(255, 255, 255, 0.1);
                color: white;
                font-size: 13px;
            }

            .footer .widget input[type="text"]::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }

            .footer .widget button {
                background: linear-gradient(135deg, #ff6b6b, #ff5252);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-weight: 600;
                font-size: 12px;
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .footer .widget button:hover {
                background: linear-gradient(135deg, #ff5252, #ff4242);
                transform: translateY(-2px);
            }

            .footer hr {
                background: rgba(255, 107, 107, 0.2);
                border: none;
                height: 1px;
                margin: 30px 0;
            }

            .copyright {
                background: rgba(0, 0, 0, 0.3);
                padding: 25px 0;
                border-top: 1px solid rgba(255, 107, 107, 0.1);
            }

            .copyright-content {
                color: rgba(255, 255, 255, 0.7);
                font-size: 13px;
            }

            .copyright-content a {
                color: #ff6b6b;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .copyright-content a:hover {
                color: #ff5252;
            }

            .scrollToTop {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: #ff6b6b;
                text-decoration: none;
                font-weight: 600;
                font-size: 13px;
                transition: all 0.3s ease;
            }

            .scrollToTop:hover {
                color: #ff5252;
                gap: 12px;
            }

            .scrollToTop i {
                font-size: 14px;
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
        </script>
	</body>
</html>
