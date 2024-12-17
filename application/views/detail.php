<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?= $judul ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<!-- Favicons -->
	<link href="<?= site_url('assets/Bootslander') ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= site_url('assets/Bootslander') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/Bootslander') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= site_url('assets/Bootslander') ?>/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= site_url('assets/Bootslander') ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/Bootslander') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Main CSS File -->
	<link href="<?= site_url('assets/Bootslander') ?>/assets/css/main.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

			<a href="" class="logo d-flex align-items-center">
				<!-- Uncomment the line below if you also wish to use an image logo -->
				<!-- <img src="assets/img/logo.png" alt=""> -->
				<h1 class="sitename"><?= $konfig->judul_website; ?></h1>
			</a>

			<nav id="navmenu" class="navmenu">
				<ul>
					<li><a href="<?= base_url() ?>">Home</a></li>
					<?php foreach ($kategori as $kate) { ?>
						<li>
							<a href="<?= base_url('home/kategori/' . $kate['id_kategori']) ?>" class="nav-item nav-link"><?= $kate['nama_kategori'] ?></a>
						</li>
					<?php } ?>
					<li><a href="<?= base_url('auth') ?>">Login</a></li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>

		</div>
	</header>

	<main class="main">

		<!-- Detail Start -->
		<div class="container py-5">
			<div class="row pt-5">
				<div class="col-lg-12">
					<div class="d-flex flex-column text-left mb-3">
						<p class="pr-5 text-white">
							<span class="pr-2">Blog Detail Page</span>
						</p>
						<h1 class="mb-3"><?= $konten->judul; ?></h1>
						<div class="d-flex">
							<p class="mb-4 text-white">
								<i class="fa fa-user text-primary"></i> <?= $konten->nama; ?> |
								<i class="fa fa-folder text-primary"></i> <?= $konten->nama_kategori; ?>
							</p>
						</div>
					</div>
					<div class="mb-5">
						<img
							class="img-fluid rounded w-100 mb-4"
							src="<?= base_url('assets/upload/konten/' . $konten->foto) ?>" />
						<p class="text-white"><?= $konten->keterangan; ?></p>
					</div>
				</div>
			</div>
		</div>

		<!-- Detail End -->

		</div>

		</div>

	</main>

	<footer id="footer" class="footer dark-background">

		<div class="container footer-top">
			<div class="row gy-4">
				<div class="col-lg-4 col-md-6 footer-about">
					<a href="index.html" class="logo d-flex align-items-center">
						<span class="sitename"><?= $konfig->judul_website; ?></span>
					</a>
					<div class="social-links d-flex mt-4">
						<a href="<?= $konfig->facebook; ?>"><i class="bi bi-facebook"></i></a>
						<a href="<?= $konfig->instagram; ?>"><i class="bi bi-instagram"></i></a>
					</div>
				</div>

				<div class="col-lg-4 col-md-3 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li><a href="<?= base_url() ?>">Home</a></li>
						<?php foreach ($kategori as $kate) { ?>
							<li>
								<a href="<?= base_url('home/kategori/' . $kate['id_kategori']) ?>" class="nav-item nav-link"><?= $kate['nama_kategori'] ?></a>
							</li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-lg-4 col-md-3 footer-links">
					<h4>Contac us</h4>
					<ul>
						<li><i class="bi bi-geo-alt-fill"></i><?= $konfig->alamat; ?></li>
						<li><i class="bi bi-envelope-fill"></i><?= $konfig->email; ?></li>
						<li><i class="bi bi-telephone-fill"></i>+<?= $konfig->no_wa; ?></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container copyright text-center mt-4">
			<p>© <span>Copyright</span> <strong class="px-1 sitename"><?= $konfig->judul_website; ?></strong> <span>All Rights Reserved</span></p>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you've purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
			</div>
		</div>

	</footer>

	<!-- Scroll Top -->
	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Preloader -->
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="<?= site_url('assets/Bootslander') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= site_url('assets/Bootslander') ?>/assets/vendor/php-email-form/validate.js"></script>
	<script src="<?= site_url('assets/Bootslander') ?>/assets/vendor/aos/aos.js"></script>
	<script src="<?= site_url('assets/Bootslander') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?= site_url('assets/Bootslander') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="<?= site_url('assets/Bootslander') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

	<!-- Main JS File -->
	<script src="<?= site_url('assets/Bootslander') ?>/assets/js/main.js"></script>

</body>

</html>
