<div class="container-fluid mt-md-5">
	<div class="row">
		<div class="rounded col-md-6 bg-default m-auto bg-light text-center p-5 col-12">
			<form method="post" id='formulario'>
				<img src="<?= base_url('assets/images/user.png') ?>" class='mb-2' width='80px'>
				<h2 class="mb-3 mt-3">Iniciar sesión</h2>

				<div class="form-group">
					<input type="text" name="cedula" id='cedula' class="form-control text-center" placeholder="Usuario" required>
				</div>

				<div class="form-group">
					<input type="password" name="clave" class="form-control text-center" placeholder="Contraseña" required>
				</div>
				
				<div class="form-group text-left pt-2">
					<p>¿Aún no tienes una cuenta? <a href="/auth/registro">Regístrate aquí</a></p>
					<input type="submit" class="btn btn-success btn-block btn-lg" value="Iniciar sesión">
				</div>

				<div class="form-group text-center mt-5">
					<p>© Movimiento Acción Dominicana Inmediata</p>
				</div>
			</form>
		</div>
	</div>
</div>