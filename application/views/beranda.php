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

		<!-- Hero Section -->
		<section id="hero" class="hero section blue-background">

			<div class="container">
				<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
					<div class="carousel-inner">
						<?php $no = 1;
						foreach ($caraousel as $aa) { ?>
							<div class="carousel-item <?php if ($no == 1) echo 'active'; ?>">
								<img class="d-block w-100" src="<?= base_url('assets/upload/caraousel/' . $aa['foto']) ?>" alt="Slide <?= $no ?>">
							</div>
						<?php $no++;
						} ?>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>


			<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
				<defs>
					<path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
				</defs>
				<g class="wave1">
					<use xlink:href="#wave-path" x="50" y="3"></use>
				</g>
				<g class="wave2">
					<use xlink:href="#wave-path" x="50" y="0"></use>
				</g>
				<g class="wave3">
					<use xlink:href="#wave-path" x="50" y="9"></use>
				</g>
			</svg>

		</section><!-- /Hero Section -->

		<!-- Team Section -->
		<section id="team" class="team section">

			<!-- Section Title -->
			<div class="container section-title" data-aos="fade-up">
				<h2>Welcome to Hamz77 land</h2>
				<div><span class="description-title">Latest Articles From Blog</span></div>
			</div><!-- End Section Title -->

			<div class="container">

				<div class="row gy-5">

					<?php foreach ($konten as $uu) { ?>
						<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
							<div class="member">
								<div class="pic">
									<img src="<?= base_url('assets/upload/konten/' . $uu['foto']) ?>" class="img-fluid" alt="<?= $uu['judul'] ?>">
								</div>
								<div class="member-info">
									<h4><?= $uu['judul'] ?></h4>
									<span><?= $uu['nama_kategori'] ?></span>
									<a href="<?= base_url('home/artikel/' . $uu['slug']) ?>" class="btn btn-primary mx-auto my-2">Baca Selengkapnya</a>
								</div>
							</div>
						</div>
					<?php } ?>


				</div>

			</div>

		</section><!-- /Team Section -->

		</div>

		</div>

		</section><!-- /Contact Section -->

	</main>

	<footer id="footer" class="footer dark-background">

		<div class="container footer-top">
			<div class="row gy-4">
				<div class="col-lg-4 col-md-6 footer-about">
					<a href="<?= base_url() ?>" class="logo d-flex align-items-center">
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
