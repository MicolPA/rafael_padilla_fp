<link rel="stylesheet" href="<?= base_url('assets/css/subcoordinadores.css?v=3') ?>">

<main class="sub-list-page">
	<section class="sub-list-card" aria-labelledby="sub-list-title">
		<header class="sub-list-header">
			<div class="sub-list-heading">
				<div class="sub-list-icon" aria-hidden="true"><i class="fas fa-list"></i></div>
				<div>
					<h1 id="sub-list-title">Listado de Sub Coordinadores</h1>
					<p class="sub-list-total"><span aria-hidden="true"></span>Total Registrados: <?= number_format($total) ?></p>
				</div>
			</div>
		</header>

		<div class="sub-table-wrap">
			<table id="subCoordinadoresTable" class="sub-table">
				<thead>
					<tr>
						<th>Nombre</th><th>Apellido</th><th>Cédula</th><th>Celular</th>
						<th>Fecha Nacimiento</th><th>Recinto</th><th class="sub-actions-title">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $r): ?>
					<?php
						$nombre = trim((string) $r->nombre);
						$apellido = trim((string) $r->apellido);
						$iniciales = strtoupper(substr($nombre, 0, 1).' '.substr($apellido, 0, 1));
					?>
					<tr>
						<td data-label="Nombre" data-order="<?= html_escape($nombre) ?>">
							<div class="sub-person"><span class="sub-avatar" aria-hidden="true"><?= html_escape($iniciales) ?></span><span><?= html_escape($nombre) ?></span></div>
						</td>
						<td data-label="Apellido"><?= html_escape($apellido) ?></td>
						<td data-label="Cédula"><?= html_escape($r->cedula) ?></td>
						<td data-label="Celular"><?= html_escape($r->celular) ?></td>
						<td data-label="Fecha Nacimiento"><?= html_escape($r->fecha_nacimiento) ?></td>
						<td data-label="Recinto"><?= html_escape($r->recinto_nombre) ?></td>
						<td data-label="Acciones" class="sub-actions">
							<details class="sub-action-menu">
								<summary aria-label="Abrir acciones para <?= html_escape($nombre.' '.$apellido) ?>"><i class="fas fa-ellipsis-v" aria-hidden="true"></i></summary>
								<div class="sub-action-options">
									<a href="<?= base_url('registrar/editar_sub') ?>?cedula=<?= rawurlencode($r->cedula) ?>"><i class="fas fa-pen" aria-hidden="true"></i> Editar</a>
									<button type="button" onclick="eliminarSub(<?= (int) $r->id ?>)"><i class="fas fa-trash" aria-hidden="true"></i> Eliminar</button>
								</div>
							</details>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</main>

<script src="<?= base_url('assets/js/subcoordinadores.js?v=2') ?>"></script>
