<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?> | Rafael Padilla Diputado</title>

	<?php $image = isset($image)?$image:'logo.png' ?>
 	 <!-- META TAGS -->
  	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title ?> | Rafael Padilla" />
	<meta property="og:site_name" content="Rafael Padilla Diputado" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $title ?> | Rafael Padilla" />
	<meta property="og:image" content="<?php echo base_url('assets/images/rafael-padilla-2.jpg') ?>" />
	<meta property="og:image:secure_url" content="<?php echo base_url('assets/images/rafael-padilla-2.jpg') ?>" />
	<meta name="twitter:image" content="<?php echo base_url('assets/images/rafael-padilla-2.jpg') ?>" />

	  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logo-fp.png') ?>">

<!-- 	  <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/pricing/">
 -->	  
	<link rel='icon' type='img/png' href="<?php echo base_url('assets/images/logo.png') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap4.min.css?v=1') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css?v=3') ?>">

</head>
<body>

	
	<?php if (!isset($_SESSION['user'])): ?>
	<div class="d-flex flex-column flex-md-row align-items-center p-md-3 p-sm-0 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
	  <h5 class="my-0 mr-md-auto font-weight-normal">
	  	<img class='hidden_cell pr-1' src="<?= base_url('assets/images/logo-fp.png') ?>" width='30px' class='mr-2' style='margin-top: -0.8rem'> 
	  	<a href='/' class="mt-2 font-weight-bold link-no text-dark" style="display: inline-block;">Rafael Padilla (ADI)
	  	</a>
	  </h5>
	  <nav class="my-2 my-md-0 mr-md-3">
	    <a class="btn btn-outline-primary" href="<?php echo base_url('/auth/registro') ?>">Regístrarse</a>
	  	<a class="btn btn-success" href="<?php echo base_url('/auth/login') ?>">Iniciar Sesión</a>
	  </nav>
	</div>
	<?php else: ?>
	<div class="d-flex flex-column flex-md-row align-items-center p-md-3 p-sm-0 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
	  <h5 class="my-0 mr-md-auto font-weight-normal">
	  	<img class='hidden_cell pr-1' src="<?= base_url('assets/images/logo-fp.png') ?>" width='30px' class='mr-2' style='margin-top: -0.8rem'> 
	  	<a href='/' class="mt-2 font-weight-bold link-no text-dark" style="display: inline-block;">Rafael Padilla (ADI)
	  	</a>
	  </h5>
	  <nav class="my-2 my-md-0 mr-md-3">
	  	<a class="btn btn-success pr-4 pl-4" href="<?php echo base_url('/registrar/subcoordinador') ?>">Registrar</a>
	    <a class="btn btn-outline-primary" href="<?php echo base_url('/registrar') ?>">Mis Registrados</a>
	  	<a class="btn btn-outline-danger pr-4 pl-4" href="<?php echo base_url('/auth/logout') ?>">Salir</a>
	  </nav>
	</div>	
	<?php endif ?>

	<div class="jumbotron2 bg-white" style="height: 70px"></div>

	<div class="text-center pt-sm-5 div_loader" style="display: none">
		<img src="<?= base_url('assets/images/loading.gif') ?>" width='80%' >
	</div>
	<?php $this->load->view($content);?>

	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  	<script src="<?php echo base_url('assets/js/jquery.mask.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/main.js?v=3') ?>"></script>
	<script src="<?php echo base_url('assets/js/fontawesome.min.js') ?>"></script>

	<?php if ($alert = $this->session->flashdata('alert')): ?>
	<script>
		swal("Alerta", <?= json_encode($alert) ?>, "warning");
	</script>	
	<?php endif ?>

	<?php if ($alert = $this->session->flashdata('success')): ?>
	<script>
		swal("Correcto", <?= json_encode($alert) ?>, "success");
	</script>	
	<?php endif ?>

	<?php if ($alert = $this->session->flashdata('error')): ?>
	<script>
		swal("Error", <?= json_encode($alert) ?>, "error");
	</script>	
	<?php endif ?>
</body>
</html>
