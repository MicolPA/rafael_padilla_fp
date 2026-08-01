<?php $post = $_POST; ?>
<link rel="stylesheet" href="<?= base_url('assets/css/auth-login.css?v=1') ?>">

<main class="auth-login-page">
	<section class="auth-login-card" aria-labelledby="auth-login-title">
		<aside class="auth-login-aside">
			<img class="auth-login-watermark" src="<?= base_url('assets/images/logo-fp.png') ?>" alt="">
			<div class="auth-login-aside-content">
				<img class="auth-login-logo" src="<?= base_url('assets/images/logo-fp.png') ?>" alt="Fuerza del Pueblo">
				<p class="auth-login-eyebrow">Proyecto Rafael Padilla</p>
				<h2>Bienvenido de nuevo</h2>
				<p>Ingresa a tu cuenta para registrar y gestionar a tu equipo de subcoordinadores.</p>
			</div>
		</aside>

		<div class="auth-login-content">
			<header class="auth-login-heading">
				<div class="auth-login-icon" aria-hidden="true"><i class="fas fa-sign-in-alt"></i></div>
				<div>
					<h1 id="auth-login-title">Iniciar sesión</h1>
					<p>Accede con tus credenciales</p>
				</div>
			</header>

			<form method="post" id="formulario" class="auth-login-form">
				<div class="auth-login-field">
					<label for="cedula">Cédula</label>
					<div class="auth-login-input">
						<i class="fas fa-id-card" aria-hidden="true"></i>
						<input type="text" name="cedula" id="cedula" required inputmode="numeric" autocomplete="username" placeholder="Ingrese su cédula" value="<?= isset($post['cedula']) ? html_escape($post['cedula']) : '' ?>">
					</div>
				</div>

				<div class="auth-login-field">
					<label for="clave">Contraseña</label>
					<div class="auth-login-input">
						<i class="fas fa-lock" aria-hidden="true"></i>
						<input type="password" name="clave" id="clave" required autocomplete="current-password" placeholder="Ingrese su contraseña">
					</div>
				</div>

				<button type="submit" class="auth-login-submit">
					<i class="fas fa-sign-in-alt" aria-hidden="true"></i> Iniciar sesión
				</button>

				<p class="auth-login-register">¿Aún no tienes una cuenta? <a href="<?= base_url('auth/registro') ?>">Regístrate aquí</a></p>
			</form>
		</div>
	</section>
</main>
