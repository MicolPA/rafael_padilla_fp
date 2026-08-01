<html lang="es_ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap4.min.css?v=1') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css?v=4') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/DataTable/datatables.min.css?v=3') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/app-navigation.css?v=1') ?>">
	<?php $image = isset($image) ? $image : 'logo.png'; ?>
	<title><?= html_escape($title) ?> | Rafael Padilla</title>
	<meta property="og:locale" content="es_ES">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?= html_escape($title) ?> | Rafael Padilla">
	<meta property="og:site_name" content="Rafael Padilla">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?= html_escape($title) ?> | Rafael Padilla">
	<meta property="og:image" content="<?= base_url('assets/images/rafael-padilla-2.jpg') ?>">
	<meta property="og:image:secure_url" content="<?= base_url('assets/images/rafael-padilla-2.jpg') ?>">
	<meta name="twitter:image" content="<?= base_url('assets/images/rafael-padilla-2.jpg') ?>">
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/logo-fp.png') ?>">
</head>
<body>
	<?php $current_section = $this->uri->segment(1); $current_page = $this->uri->segment(2); ?>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top app-navbar">
		<a class="navbar-brand app-brand" href="<?= base_url('/') ?>">
			<img src="<?= base_url('assets/images/logo-fp.png') ?>" alt="FP">
			<span>Rafael Padilla <small>(ADI)</small></span>
		</a>
		<button class="navbar-toggler app-menu-toggle" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Abrir menú">
			<i class="fas fa-bars" aria-hidden="true"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav app-nav-links ml-auto">
			<?php if (isset($_SESSION['user'])): ?>
				<li class="nav-item <?= $current_page === 'subcoordinador' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('registrar/subcoordinador') ?>"><i class="fas fa-user-plus"></i> Registrar</a></li>
				<li class="nav-item <?= $current_section === 'registrar' && !$current_page ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('registrar') ?>"><i class="fas fa-list"></i> Mis Registrados</a></li>
				<?php if ($_SESSION['user']->username == '00109692343' OR $_SESSION['user']->username == '00114126634'): ?>
				<li class="nav-item <?= $current_page === 'coordinadores' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('registrar/coordinadores') ?>"><i class="fas fa-users"></i> Coordinadores</a></li>
				<li class="nav-item <?= $current_page === 'listadoSub' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('registrar/listadoSub') ?>"><i class="fas fa-address-book"></i> Sub Coordinadores</a></li>
				<?php endif ?>
				<li class="nav-item"><a class="app-logout" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
			<?php else: ?>
				<li class="nav-item <?= $current_page === 'registro' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('auth/registro') ?>"><i class="fas fa-user-plus"></i> Registrarse</a></li>
				<li class="nav-item"><a class="app-login" href="<?= base_url('auth/login') ?>"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></li>
			<?php endif ?>
			</ul>
		</div>
	</nav>
	<div class="app-navbar-spacer"></div>

	<div class="text-center pt-sm-5 div_loader" style="display:none">
		<img src="<?= base_url('assets/images/loading.gif') ?>" width="80%" alt="Cargando">
	</div>

	<?php $this->load->view($content); ?>

<script src="<?= base_url('assets/js/jquery-3.2.1.min.js?v=2') ?>"></script>
	<script src="<?= base_url('assets/js/popper.min.js?v=1') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap4.min.js?v=1') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.mask.js') ?>"></script>
	<script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/main.js?v=8') ?>"></script>
	<script src="<?= base_url('assets/js/fontawesome.min.js') ?>"></script>
	<script src="<?= base_url('assets/DataTable/datatables.min.js') ?>"></script>

	<?php if ($alert = $this->session->flashdata('alert')): ?><script>swal("Alerta", <?= json_encode($alert) ?>, "warning");</script><?php endif ?>
	<?php if ($alert = $this->session->flashdata('success')): ?><script>swal("Correcto", <?= json_encode($alert) ?>, "success");</script><?php endif ?>
	<?php if ($alert = $this->session->flashdata('error')): ?><script>swal("Error", <?= json_encode($alert) ?>, "error");</script><?php endif ?>
	<style>@media (max-width:992px){.hide_cel{display:none}}</style>
</body>
</html>
