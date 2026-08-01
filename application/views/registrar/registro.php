<link rel="stylesheet" href="<?= base_url('assets/css/registro-sub.css?v=1') ?>">

<main class="registration-page">
	<div class="registration-shell">
		<a class="registration-back" href="<?= base_url('/') ?>">
			<i class="fas fa-arrow-left" aria-hidden="true"></i>
			Volver al inicio
		</a>

		<section class="registration-card" aria-labelledby="registration-title">
			<header class="registration-heading">
				<div class="registration-heading-icon" aria-hidden="true">
					<i class="fas fa-user-plus"></i>
				</div>
				<h1 id="registration-title">Formulario de Registro</h1>
				<p>Registra tus Sub Coordinadores</p>
			</header>

			<form method="post" id="formulario" class="registration-form">
				<div class="registration-field">
					<div class="registration-field-icon" aria-hidden="true"><i class="fas fa-id-card"></i></div>
					<div class="registration-control">
						<label for="cedula">Cédula del Sub Coordinador</label>
						<input
							type="text"
							class="form-control"
							name="cedula"
							id="cedula"
							placeholder="Ingrese la cédula"
							autocomplete="off"
							inputmode="numeric"
							required
							value="<?= isset($post['cedula']) ? html_escape($post['cedula']) : '' ?>"
						>
					</div>
				</div>

				<div class="registration-field">
					<div class="registration-field-icon" aria-hidden="true"><i class="fas fa-phone-alt"></i></div>
					<div class="registration-control">
						<label for="celular">Celular</label>
						<input
							type="text"
							class="form-control"
							name="celular"
							id="celular"
							placeholder="Ingrese el número de celular"
							autocomplete="tel"
							inputmode="tel"
							required
							value="<?= isset($post['celular']) ? html_escape($post['celular']) : '' ?>"
						>
					</div>
				</div>

				<div class="registration-field">
					<div class="registration-field-icon" aria-hidden="true"><i class="fas fa-calendar-alt"></i></div>
					<div class="registration-control">
						<label for="fecha_nacimiento">Fecha Nacimiento</label>
						<input
							type="date"
							class="form-control"
							name="fecha_nacimiento"
							id="fecha_nacimiento"
							required
							value="<?= isset($post['fecha_nacimiento']) ? html_escape($post['fecha_nacimiento']) : '' ?>"
						>
					</div>
				</div>

				<div class="div_cargando registration-loading" style="display:none">
					<img src="<?= base_url('assets/images/loading-sm.gif') ?>" alt="" width="42">
					<span>Registrando Sub Coordinador...</span>
				</div>

				<button type="submit" class="registration-submit btn_submit">
					<i class="fas fa-save" aria-hidden="true"></i>
					Registrar Persona
				</button>
			</form>
		</section>
	</div>
</main>
