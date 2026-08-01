<?php $post = $_POST; ?>
<link rel="stylesheet" href="<?= base_url('assets/css/auth-registration.css?v=2') ?>">
<main class="auth-registration-page">
	<section class="auth-registration-card" aria-labelledby="auth-registration-title">
		<aside class="auth-registration-aside">
			<img class="auth-registration-watermark" src="<?= base_url('assets/images/logo-fp.png') ?>" alt="">
			<div class="auth-registration-aside-content">
				<img class="auth-registration-logo" src="<?= base_url('assets/images/logo-fp.png') ?>" alt="Fuerza del Pueblo">
				<p class="auth-registration-eyebrow">Proyecto Rafael Padilla</p>
				<h2>Súmate al equipo</h2>
				<p>Regístrate como coordinador y ayúdanos a construir un mejor futuro para nuestra gente.</p>
			</div>
		</aside>
		<div class="auth-registration-content">
			<header class="auth-registration-heading">
				<div class="auth-registration-icon" aria-hidden="true"><i class="fas fa-user-plus"></i></div>
				<div><h1 id="auth-registration-title">Regístrate</h1><p>Como Coordinador de tu localidad</p></div>
			</header>
			<form method="post" id="formulario" class="auth-registration-form">
				<div class="auth-form-field auth-form-field-full"><label for="cedula">Cédula</label><div class="auth-input-wrap"><i class="fas fa-id-card"></i><input type="text" id="cedula" name="cedula" required inputmode="numeric" autocomplete="off" placeholder="Ingrese su cédula" value="<?= isset($post['cedula']) ? html_escape($post['cedula']) : '' ?>"></div></div>
				<div class="auth-form-field"><label for="celular">Celular</label><div class="auth-input-wrap"><i class="fas fa-phone-alt"></i><input type="text" name="celular" id="celular" required inputmode="tel" autocomplete="tel" placeholder="Número de celular" value="<?= isset($post['celular']) ? html_escape($post['celular']) : '' ?>"></div></div>
				<div class="auth-form-field"><label for="correo">Correo <span>(Opcional)</span></label><div class="auth-input-wrap"><i class="fas fa-envelope"></i><input type="email" name="correo" id="correo" autocomplete="email" placeholder="correo@ejemplo.com" value="<?= isset($post['correo']) ? html_escape($post['correo']) : '' ?>"></div></div>
				<div class="auth-form-field"><label for="clave1">Contraseña</label><div class="auth-input-wrap"><i class="fas fa-lock"></i><input type="password" name="clave" id="clave1" required minlength="6" autocomplete="new-password" placeholder="Mínimo 6 caracteres"></div></div>
				<div class="auth-form-field"><label for="clave2">Confirmar contraseña</label><div class="auth-input-wrap"><i class="fas fa-shield-alt"></i><input type="password" id="clave2" required minlength="6" autocomplete="new-password" placeholder="Repita la contraseña"></div></div>
				<p class="auth-password-alert" id="pass_alert" style="display:none"><i class="fas fa-exclamation-circle"></i> Las contraseñas deben coincidir.</p>
				<button type="submit" class="auth-registration-submit btn_submit"><i class="fas fa-user-check"></i> Crear mi cuenta</button>
				<p class="auth-registration-login">¿Ya tienes una cuenta? <a href="<?= base_url('auth/login') ?>">Inicia sesión aquí</a></p>
			</form>
		</div>
	</section>
</main>
