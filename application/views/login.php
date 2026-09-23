<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $judul; ?></title>
	<!-- base:css -->
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/feather/feather.css">
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('regal-1.0.0'); ?>/css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?= base_url('regal-1.0.0'); ?>/images/MI.png" />

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}

		.login-bg-wrapper {
			position: relative;
			min-height: 100vh;
			width: 100%;
			background: url('<?= base_url('regal-1.0.0'); ?>/images/Sekolah.png') no-repeat center center;
			background-size: cover;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		/* overlay gelap tipis biar teks/form tetap kebaca */
		.login-bg-wrapper::before {
			content: "";
			position: absolute;
			inset: 0;
			background: rgba(0, 0, 0, 0.35);
		}

		.login-card-transparent {
			position: relative;
			z-index: 2;
			width: 100%;
			max-width: 420px;
			margin: 20px;
			padding: 2.5rem 2rem;
			background: rgba(255, 255, 255, 0.12);
			backdrop-filter: blur(12px);
			-webkit-backdrop-filter: blur(12px);
			border: 1px solid rgba(255, 255, 255, 0.25);
			border-radius: 16px;
			box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
			color: #fff;
		}

		.login-card-transparent .brand-logo img {
			max-width: 180px;
			margin-bottom: 1.5rem;
		}

		.login-card-transparent h4,
		.login-card-transparent h6,
		.login-card-transparent label {
			color: #fff;
		}

		.login-card-transparent .input-group-text {
			background: rgba(255, 255, 255, 0.15) !important;
			border-color: rgba(255, 255, 255, 0.3);
		}

		.login-card-transparent .form-control {
			background: rgba(255, 255, 255, 0.15);
			border-color: rgba(255, 255, 255, 0.3);
			color: #fff;
		}

		.login-card-transparent .form-control::placeholder {
			color: rgba(255, 255, 255, 0.7);
		}

		.login-card-transparent .form-control:focus {
			background: rgba(255, 255, 255, 0.2);
			border-color: rgba(255, 255, 255, 0.5);
			color: #fff;
			box-shadow: none;
		}

		.login-footer-text {
			position: relative;
			z-index: 2;
			position: absolute;
			bottom: 15px;
			width: 100%;
			text-align: center;
			color: #fff;
			font-size: 0.85rem;
		}
	</style>
</head>

<body>
	<div class="login-bg-wrapper">
		<div class="login-card-transparent">
			<div class="brand-logo text-center">
				<img src="<?= base_url('regal-1.0.0'); ?>/images/Tulisan.png" alt="logo">
			</div>
			<h4 class="text-center">Selamat Datang</h4>
			<h6 class="font-weight-light text-center mb-4">Senang bertemu dengan Anda lagi!</h6>

			<?php if ($this->session->flashdata('notifikasi')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('notifikasi') ?>
				</div>
			<?php endif; ?>

			<form class="pt-2" action="<?= base_url('Auth/login') ?>" method="post">
				<div class="form-group">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="mdi mdi-account-outline text-white"></i>
							</span>
						</div>
						<input type="text" name="email" class="form-control form-control-lg border-left-0"
							id="email" placeholder="email" value="<?= set_value('email') ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="mdi mdi-lock-outline text-white"></i>
							</span>
						</div>
						<input type="password" name="password" class="form-control form-control-lg border-left-0"
							id="password" placeholder="Password" required>
					</div>
				</div>
				<div class="my-3">
					<button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
						LOGIN
					</button>
					<p class="mt-2 text-center"><a href="<?= base_url('Landing_page') ?>" class="auth-link text-white">Kembali Ke Halaman Utama</a></p>
				</div>
			</form>
		</div>

		<div class="login-footer-text">
			Copyright &copy; <?= date('Y'); ?> All rights reserved.
		</div>
	</div>

	<!-- base:js -->
	<script src="<?= base_url('regal-1.0.0'); ?>/vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- inject:js -->
	<script src="<?= base_url('regal-1.0.0'); ?>/js/off-canvas.js"></script>
	<script src="<?= base_url('regal-1.0.0'); ?>/js/hoverable-collapse.js"></script>
	<script src="<?= base_url('regal-1.0.0'); ?>/js/template.js"></script>
	<!-- endinject -->
</body>

</html>