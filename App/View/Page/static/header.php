<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Çelik Yayınevi</title>	

		<meta name="keywords" content="WebSite Template" />
		<meta name="description" content="Porto - Multipurpose Website Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo assets('img/logo.jpg'); ?>" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo assets('vendor/bootstrap/css/bootstrap.min.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('vendor/fontawesome-free/css/all.min.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('vendor/animate/animate.compat.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('vendor/simple-line-icons/css/simple-line-icons.min.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('vendor/owl.carousel/assets/owl.carousel.min.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('vendor/owl.carousel/assets/owl.theme.default.min.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('vendor/magnific-popup/magnific-popup.min.css') ?>">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo assets('css/theme.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('css/theme-elements.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('css/theme-blog.css') ?>">
		<link rel="stylesheet" href="<?php echo assets('css/theme-shop.css') ?>">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo assets('vendor/circle-flip-slideshow/css/component.css') ?>">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="<?php echo assets('css/skins/default.css') ?>">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo assets('css/custom.css') ?>">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"/>

	</head>

	<body data-plugin-page-transition>		
		<div class="body">
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="index.html">
											<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="25" src="<?php echo assets('img/celikyayinevi-logo.png'); ?>">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row pt-3">
									<div class="header-nav-features">
										<div class="header-nav-feature header-nav-features-search d-inline-flex">
											<a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" aria-label="Search"><i class="fas fa-search header-nav-top-icon"></i></a>
											<div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
												<form role="search" action="page-search-results.html" method="get">
													<div class="simple-search input-group">
														<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
														<button class="btn" type="submit" aria-label="Search">
															<i class="fas fa-search header-nav-top-icon"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
										<div class="header-nav-feature header-nav-features-cart d-inline-flex ms-2">
											<a href="#" class="header-nav-features-toggle" aria-label="">
												<img src="img/icons/icon-cart.svg" width="14" alt="" class="header-nav-top-icon-img">
												<span class="cart-info d-none">
													<span class="cart-qty">1</span>
												</span>
											</a>
											<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
												<ol class="mini-products-list">
													<li class="item">
														<a href="#" title="Camera X1000" class="product-image"><img src="img/products/product-1.jpg" alt="Camera X1000"></a>
														<div class="product-details">
															<p class="product-name">
																<a href="#">Camera X1000 </a>
															</p>
															<p class="qty-price">
																 1X <span class="price">$890</span>
															</p>
															<a href="#" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
														</div>
													</li>
												</ol>
												<div class="totals">
													<span class="label">Total:</span>
													<span class="price-total"><span class="price">$890</span></span>
												</div>
												<div class="actions">
													<a class="btn btn-dark" href="#">View Cart</a>
													<a class="btn btn-primary" href="#">Checkout</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="header-row">
									<div class="header-nav pt-1">
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills text-warning" id="mainNav">
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle active" href="<?php echo _link(''); ?>">
															Anasayfa
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="#">
															Yazar
														</a>
														<ul class="dropdown-menu">
															<li>
																<a class="dropdown-item" href="<?php echo _link('index_author'); ?>">Yazarlar</a>
															</li>
															<li>
																<a class="dropdown-item" href="<?php echo _link('translator_index'); ?>">Mütercimler</a>
															</li>
															<li>
																<a class="dropdown-item" href="<?php echo _link('editor_index'); ?>">Düzenleyenler</a>
															</li>
														</ul>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?php echo _link('book_index'); ?>">
															Kitaplar
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?php echo _link('editor_notes'); ?>">
															Editör Notları
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?php echo _link('communication'); ?>">
															Bize Ulaşın
														</a>
													</li>
												</ul>
											</nav>
										</div>
										<ul class="header-social-icons social-icons d-none d-sm-block">
											<li class="social-icons-facebook"><a href="<?php echo $socialmedia->facebook; ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
											<li class="social-icons-twitter"><a href="<?php echo $socialmedia->twitter; ?>" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li class="social-icons-instagram"><a href="<?php echo $socialmedia->instagram; ?>" target="_blank" title="İnstagram"><i class="fab fa-instagram"></i></a></li>
										</ul>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
