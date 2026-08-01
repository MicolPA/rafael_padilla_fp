<html lang="es_ES">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap4.min.css?v=1') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css?v=4') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTable/datatables.min.css?v=3') ?>">

	<?php $image = isset($image)?$image:'logo.png' ?>
	<title><?php echo $title ?> | Rafael Padilla</title>
    <meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title ?> | Rafael Padilla" />
	<meta property="og:site_name" content="Rafael Padilla" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $title ?> | Rafael Padilla" />
	<meta property="og:image" content="<?php echo base_url('assets/images/rafael-padilla-2.jpg') ?>" />
	<meta property="og:image:secure_url" content="<?php echo base_url('assets/images/rafael-padilla-2.jpg') ?>" />
	<meta name="twitter:image" content="<?php echo base_url('assets/images/rafael-padilla-2.jpg') ?>" />

	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logo-fp.png') ?>">
  	</head>
  	
  	<body>
	<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
		
		<a class="navbar-brand font-weight-bold pl-2" href="/"><img class='pr-1' src="<?= base_url('assets/images/logo-fp.png') ?>" width='25px' class='mr-2' style='margin-top: -0.8rem'>  Rafael Padilla (ADI)</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  	</button>
	  	<div class="collapse navbar-collapse text-right" id="navbarCollapse">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		    <?php if (isset($_SESSION['user'])): ?>
		    <div class="form-inline mt-2 mt-md-0">
		      <ul class="navbar-nav mr-auto">
			      <li class="nav-item mr-2 mb-2">
			    		<a class="nav-link text-success font-weight-bold" href="<?php echo base_url('registrar/subcoordinador') ?>">Registrar</a>
			      </li>
			      <li class="nav-item mr-2 mb-2">
			  			<a class="nav-link text-success font-weight-bold" href="<?php echo base_url('registrar') ?>">Mis Registrados</a>
			      </li>
			      <?php if ($_SESSION['user']->username == '00109692343' or $_SESSION['user']->username == '00114126634'): ?>
			      <li class="nav-item mr-2 mb-2">
			  			<a class="nav-link text-success font-weight-bold" href="<?php echo base_url('registrar/coordinadores') ?>">Coordinadores</a>
			      </li>
			      <li class="nav-item mr-2 mb-2">
			  			<a class="nav-link text-success font-weight-bold" href="<?php echo base_url('registrar/listadoSub') ?>">Sub Coordinadores</a>
			      </li>	
			      <?php endif ?>
			      <li class="nav-item mr-2 mb-2">
			  			<a class="btn btn-outline-danger btn-block" href="<?php echo base_url('/auth/logout') ?>">Salir</a>
			      </li>
		    	</ul>
		    </div>
		    <?php else: ?>
		    <div class="form-inline mt-2 mt-md-0">
		      <ul class="navbar-nav mr-auto">
			      <li class="nav-item mr-2 mb-2">
			    		<a class="nav-link text-success font-weight-bold" href="<?php echo base_url('auth/registro') ?>">Regístrarse</a>
			      </li>
			      <li class="nav-item mr-2 mb-2">
			  			<a class="btn btn-success btn-block" href="<?php echo base_url('/auth/login') ?>">Iniciar Sesión</a>
			      </li>
			    </ul>
		    </div>	
		    <?php endif ?>
		    
		</div>
	</nav>

	<div class="jumbotron2 bg-white" style="height: 70px"></div>

	<div class="text-center pt-sm-5 div_loader" style="display: none">
		<img src="<?= base_url('assets/images/loading.gif') ?>" width='80%' >
	</div>

    <?php $this->load->view($content);?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  	<script src="<?php echo base_url('assets/js/jquery.mask.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/main.js?v=8') ?>"></script>
	<script src="<?php echo base_url('assets/js/fontawesome.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/DataTable/datatables.min.js') ?>"></script>

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
	<style>
	@media (max-width: 992px){
      	.hide_cel{
			display: none;
		} 
    }
	
</style>
  </body>
</html>
