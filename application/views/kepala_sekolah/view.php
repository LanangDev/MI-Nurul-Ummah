<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $judul ?></title>
	<!-- base:css -->
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/feather/feather.css">
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/flag-icon-css/css/flag-icon.min.css" />
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/jquery-bar-rating/fontawesome-stars-o.css">
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/jquery-bar-rating/fontawesome-stars.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/css/style.css">
	<!-- endinject -->
	<link rel="icon" type="image/png"
		href="<?= base_url(!empty($profil->logo) ? 'upload/profil/' . $profil->logo : 'regal-1.0.0/images/MI.png') ?>" />
	<style>
		:root {
			--hijau-nu: #0B6E4F;
			/* hijau utama NU */
			--hijau-nu-tua: #0A5A40;
			/* hijau lebih tua untuk active */
			--hijau-nu-terang: #14875F;
			/* hijau terang untuk hover */
			--hijau-nu-lembut: #E8F5EE;
			/* hijau lembut untuk hover item terang */
		}

		/* GENERAL RESET */
		a,
		a:hover,
		a:focus {
			text-decoration: none !important;
			outline: none !important;
			box-shadow: none !important;
		}

		/* ===== NAVBAR (TOP BAR) PERBAIKAN TOTAL ===== */
		.navbar,
		.navbar .navbar-brand-wrapper,
		.navbar .navbar-menu-wrapper {
			background-color: var(--hijau-nu) !important;
			background: var(--hijau-nu) !important;
			color: #ffffff !important;
			border-bottom: none !important;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12) !important;
		}

		/* Tombol & Link di Navbar */
		.navbar .navbar-toggler,
		.navbar .navbar-nav .nav-item .nav-link {
			background: transparent !important;
			border: none !important;
			box-shadow: none !important;
		}

		/* Ikon Hamburger (Minimize & Mobile) */
		.navbar .navbar-toggler .icon-menu,
		.navbar .navbar-toggler span,
		.navbar .navbar-toggler i {
			color: #ffffff !important;
		}

		/* Ikon Gear / Setting di Kanan — dibuat jadi tombol bulat agar lebih hidup */
		.navbar #notificationDropdown {
			width: 40px;
			height: 40px;
			border-radius: 50% !important;
			transition: background-color 0.2s ease-in-out;
		}

		.navbar #notificationDropdown i,
		.navbar #notificationDropdown i.icon-cog,
		.navbar .navbar-nav-right .nav-link i {
			color: #ffffff !important;
			font-size: 1.25rem;
		}

		/* Hover pada Ikon Navbar */
		.navbar .navbar-nav-right .nav-link:hover i,
		.navbar .navbar-toggler:hover .icon-menu {
			color: #d1e8dc !important;
		}

		.navbar #notificationDropdown:hover {
			background-color: rgba(255, 255, 255, 0.12) !important;
		}

		/* Dropdown Menu Setting (Profil & Logout) */
		.navbar-dropdown.dropdown-menu {
			background: #ffffff !important;
			border: none !important;
			border-radius: 10px !important;
			box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15) !important;
			padding: 0.5rem 0 !important;
			overflow: hidden;
			margin-top: 0.75rem !important;
			width: 220px !important;
			min-width: 220px !important;
			max-width: 220px !important;
			left: auto !important;
			right: 0.75rem !important;
			transform: none !important;
		}

		/* Supaya dropdown tetap rapi & tidak full-width di layar kecil */
		@media (max-width: 575.98px) {
			.navbar-dropdown.dropdown-menu {
				width: 200px !important;
				min-width: 200px !important;
				max-width: calc(100vw - 1.5rem) !important;
				right: 0.75rem !important;
			}
		}

		.navbar-dropdown.dropdown-menu .dropdown-header {
			padding: 0.5rem 1.25rem 0.5rem !important;
			font-size: 0.75rem;
			letter-spacing: 0.04em;
			text-transform: uppercase;
			color: #8a9a92 !important;
		}

		.navbar-dropdown.dropdown-menu .dropdown-item {
			display: flex !important;
			align-items: center !important;
			gap: 0.6rem;
			padding: 0.65rem 1.25rem !important;
			color: #333333 !important;
			font-size: 0.9rem;
			transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out;
		}

		.navbar-dropdown.dropdown-menu .dropdown-item i {
			color: var(--hijau-nu) !important;
			font-size: 1rem;
			width: 18px;
			text-align: center;
		}

		.navbar-dropdown.dropdown-menu .dropdown-item:hover {
			background: var(--hijau-nu-lembut) !important;
			color: var(--hijau-nu-tua) !important;
		}

		/* ===== SIDEBAR BASE & CLEANUP ===== */
		.sidebar,
		.sidebar .user-profile {
			background: var(--hijau-nu) !important;
		}

		.sidebar .user-profile {
			padding: 1.5rem 0 1rem !important;
		}

		.sidebar .user-profile .user-image img {
			border: 3px solid rgba(255, 255, 255, 0.35) !important;
		}

		.sidebar .user-name,
		.sidebar .user-designation,
		.sidebar .nav .nav-item .nav-link i.menu-icon,
		.sidebar .nav .nav-item .nav-link .menu-title {
			color: #ffffff !important;
		}

		.sidebar .user-designation {
			opacity: 0.75;
			font-size: 0.8rem;
		}

		/* Hapus Garis/Border/Shadow Ungu Sidebar */
		.sidebar .nav .nav-item,
		.sidebar .nav .nav-item .nav-link {
			border: none !important;
			outline: none !important;
			box-shadow: none !important;
			background: transparent !important;
			transition: all 0.2s ease-in-out;
		}

		.sidebar .nav .nav-item::before,
		.sidebar .nav .nav-item::after,
		.sidebar .nav .nav-item .nav-link::before,
		.sidebar .nav .nav-item .nav-link::after {
			display: none !important;
			content: none !important;
			border: none !important;
			background: none !important;
		}

		.sidebar .nav .nav-item {
			margin: 2px 10px;
		}

		/* Hover Sidebar */
		.sidebar .nav .nav-item:hover>.nav-link,
		.sidebar .nav .nav-item .nav-link:hover {
			background: var(--hijau-nu-terang) !important;
			border: none !important;
			border-radius: 8px !important;
		}

		/* Active Sidebar */
		.sidebar .nav .nav-item.active>.nav-link,
		.sidebar .nav .nav-item.active {
			background: var(--hijau-nu-tua) !important;
			border: none !important;
			border-radius: 8px !important;
		}

		/* FORM FOCUS */
		.form-control:focus {
			border-color: var(--hijau-nu) !important;
			box-shadow: 0 0 0 0.2rem rgba(11, 110, 79, 0.2) !important;
		}

		/* ===== FIX SIDEBAR MINIMIZE (SIDEBAR-ICON-ONLY) ===== */
		body.sidebar-icon-only .sidebar .user-profile {
			padding: 10px 0 !important;
			text-align: center !important;
		}

		body.sidebar-icon-only .sidebar .user-profile .user-image img {
			width: 38px !important;
			height: 38px !important;
			margin: 0 auto !important;
		}

		body.sidebar-icon-only .sidebar .user-profile .user-name,
		body.sidebar-icon-only .sidebar .user-profile .user-designation {
			display: none !important;
		}

		body.sidebar-icon-only .sidebar .nav .nav-item .nav-link {
			justify-content: center !important;
			padding: 12px 0 !important;
		}

		body.sidebar-icon-only .sidebar .nav .nav-item .nav-link i.menu-icon {
			margin-right: 0 !important;
		}

		/* ===== FOOTER: pin ke bawah, jangan sampai "menumpuk" naik dekat navbar
       saat konten halaman pendek ===== */
		html,
		body {
			height: 100%;
		}

		.container-scroller {
			display: flex !important;
			flex-direction: column !important;
			min-height: 100vh;
		}

		/* page-body-wrapper tumbuh mengisi sisa ruang di bawah navbar, jadi
       footer selalu terdorong ke dasar layar, bukan menumpuk di atas */
		.page-body-wrapper {
			flex: 1 0 auto !important;
		}

		.footer {
			flex-shrink: 0;
			background: #ffffff !important;
			border-top: 1px solid #eef2ef !important;
			position: relative !important;
			z-index: 1;
		}
	</style>
</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
				<a class="navbar-brand brand-logo" href="<?= base_url('Kepala_Sekolah/dashboard'); ?>">
					<img src="<?= base_url('regal-1.0.0')?>/images/Tulisan.png" alt="Logo"
						style="width: 180px; height: 70px; object-fit: contain;">
				</a>
				<a class="navbar-brand brand-logo-mini" href="<?= base_url('Kepala_Sekolah/dashboard'); ?>">
					<img src="<?= base_url('regal-1.0.0')?>/images/MI.png" alt="Logo"
						style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="icon-menu"></span>
				</button>
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item dropdown d-flex mr-4 ">
						<a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
							id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="icon-cog"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
							aria-labelledby="notificationDropdown">
							<p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
							<a href="<?= base_url('kepala_sekolah/profil');?>" class="dropdown-item preview-item">
								<i class="icon-head"></i> Profile
							</a>
							<a href="<?= base_url('auth/logout');?>" class="dropdown-item preview-item">
								<i class="icon-inbox"></i> Logout
							</a>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
					data-toggle="offcanvas">
					<span class="icon-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<div class="user-profile">
					<div class="user-image">
						<img src="<?= base_url('upload/foto_user/' . $this->session->userdata('foto')) ?>"
							alt="Foto Profil" style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%;">
					</div>
					<div class="user-name">
						<?= $this->session->userdata('email'); ?>
					</div>
					<div class="user-designation">
						<?= ucwords(str_replace('_', ' ', $this->session->userdata('role'))); ?>
					</div>
				</div>
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/dashboard'); ?>">
							<i class="mdi mdi-home menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/users'); ?>">
							<i class="mdi mdi-account menu-icon"></i>
							<span class="menu-title">Users</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/data_guru'); ?>">
							<i class="mdi mdi-account-multiple menu-icon"></i>
							<span class="menu-title">Data Guru</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/Galeri'); ?>">
							<i class="mdi mdi-calendar-clock menu-icon"></i>
							<span class="menu-title">Galeri Kegiatan</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/fasilitas'); ?>">
							<i class="mdi mdi-home-assistant menu-icon"></i>
							<span class="menu-title">Fasilitas</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/pengumuman'); ?>">
							<i class="mdi mdi-note-plus menu-icon"></i>
							<span class="menu-title">Pengumuman</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/ppdb'); ?>">
							<i class="mdi mdi-book-open menu-icon"></i>
							<span class="menu-title">PPDB</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/ekstrakulikuler'); ?>">
							<i class="mdi mdi-dumbbell menu-icon"></i>
							<span class="menu-title">Ekstrakulikuler</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/kategori_prestasi'); ?>">
							<i class="mdi mdi-format-list-bulleted menu-icon"></i>
							<span class="menu-title">Kategori Prestasi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/prestasi'); ?>">
							<i class="mdi mdi-trophy menu-icon"></i>
							<span class="menu-title">Prestasi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/profil_sekolah'); ?>">
							<i class="mdi mdi-school menu-icon"></i>
							<span class="menu-title">Profil Sekolah</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/log_aktivitas'); ?>">
							<i class="mdi mdi-account-clock menu-icon"></i>
							<span class="menu-title">Log Aktivitas</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Kepala_Sekolah/kontak'); ?>">
							<i class="mdi mdi-account-convert menu-icon"></i>
							<span class="menu-title">Kontak</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="container-fluid px-3 px-lg-4 py-4">
						<div class="container-fluid">
							<?php 
                            $notifikasi = $this->session->flashdata('notifikasi');
                            if($notifikasi) echo $notifikasi;
                            echo $contents; 
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
		<!-- partial:partials/_footer.html -->
		<footer class="footer">
			<div class="d-sm-flex justify-content-center justify-content-sm-between">
				<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
					<?= date('Y'); ?> MI Nurul Ummah</span>
			</div>
		</footer>

		<!-- partial -->
	</div>
	<!-- main-panel ends -->
	</div>
	<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

	<!-- base:js -->
	<script src="<?= base_url('regal-1.0.0'); ?>/vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="<?= base_url('regal-1.0.0'); ?>/js/off-canvas.js"></script>
	<script src="<?= base_url('regal-1.0.0'); ?>/js/hoverable-collapse.js"></script>
	<script src="<?= base_url('regal-1.0.0'); ?>/js/template.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="<?= base_url('regal-1.0.0'); ?>/vendors/chart.js/Chart.min.js"></script>
	<script src="<?= base_url('regal-1.0.0'); ?>/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
	<!-- End plugin js for this page -->
	<!-- Custom js for this page-->
	<script src="<?= base_url('regal-1.0.0'); ?>/js/dashboard.js"></script>
	<!-- End custom js for this page-->

	<script>
		$(function () {
			var currentPath = window.location.pathname.replace(/\/+$/, '');

			// Reset semua active dulu
			$('#sidebar .nav-item').removeClass('active');

			// Set active hanya untuk href yang PERSIS sama dengan URL sekarang
			$('#sidebar .nav-link').each(function () {
				var a = document.createElement('a');
				a.href = $(this).attr('href');
				var linkPath = a.pathname.replace(/\/+$/, '');

				if (linkPath === currentPath) {
					$(this).closest('.nav-item').addClass('active');
				}
			});
		});
	</script>
</body>

</html>