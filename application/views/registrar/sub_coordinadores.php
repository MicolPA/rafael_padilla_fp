<link rel="stylesheet" href="<?= base_url('assets/css/admin-directory.css?v=1') ?>">
<?php
	$get = $_GET;
	$circ = isset($get['circ']) ? $get['circ'] : '';
	$municipio = isset($get['municipio']) ? $get['municipio'] : '';
	$mesa = isset($get['mesa']) ? $get['mesa'] : '';
	$is_admin = isset($admin);
	$show_coordinator = !$is_admin && !isset($user_info);
	$title = isset($user_info) ? 'Listado de Sub Coordinadores' : ($is_admin ? 'Listado de Coordinadores' : 'Listado Total de Sub Coordinadores');
?>

<main class="directory-page">
	<section class="directory-card" aria-labelledby="directory-title">
		<header class="directory-header">
			<div class="directory-title-wrap">
				<div class="directory-title-icon"><i class="fas <?= $is_admin ? 'fa-users' : 'fa-address-book' ?>"></i></div>
				<div>
					<h1 id="directory-title"><?= $title ?></h1>
					<?php if (isset($user_info)): ?><p class="directory-owner"><?= html_escape($user_info->nombre.' '.$user_info->apellido) ?></p><?php endif ?>
					<p class="directory-total"><span></span>Total <?= $is_admin ? 'Coordinadores' : 'Sub Coordinadores' ?>: <strong><?= number_format($total) ?></strong></p>
				</div>
			</div>
		</header>

		<?php if (!$is_admin && !isset($user_info)): ?>
		<form class="directory-filters" method="get">
			<div class="directory-filter"><label for="municipio">Municipio</label><select id="municipio" name="municipio"><option value="">Todos</option><option value="223" <?= $municipio == '223' ? 'selected' : '' ?>>Santo Domingo Este</option><option value="226" <?= $municipio == '226' ? 'selected' : '' ?>>Boca Chica</option><option value="286" <?= $municipio == '286' ? 'selected' : '' ?>>La Caleta</option><option value="291" <?= $municipio == '291' ? 'selected' : '' ?>>San Luis</option><option value="227" <?= $municipio == '227' ? 'selected' : '' ?>>San Antonio de Guerra</option></select></div>
			<div class="directory-filter"><label for="circ">Circunscripción</label><select id="circ" name="circ"><option value="">Todas</option><option value="1" <?= $circ == '1' ? 'selected' : '' ?>>01</option><option value="2" <?= $circ == '2' ? 'selected' : '' ?>>02</option><option value="3" <?= $circ == '3' ? 'selected' : '' ?>>03</option></select></div>
			<div class="directory-filter"><label for="mesa">Mesa</label><input id="mesa" type="text" name="mesa" value="<?= html_escape($mesa) ?>" placeholder="Número de mesa"></div>
			<button type="submit" class="directory-filter-submit"><i class="fas fa-search"></i> Buscar</button>
		</form>
		<?php endif ?>

		<div class="directory-table-wrap">
			<table class="table directory-table directory-table-wide">
				<thead><tr><th>Nombre</th><th>Apellido</th><th>Cédula</th><th>Celular</th><th>Municipio</th><th>Circ.</th><th>Fecha Nacimiento</th><th>Recinto</th>
				<?php if ($is_admin): ?><th>Registrados</th><th>Acciones</th><?php elseif ($show_coordinator): ?><th>Coordinador</th><th>Acciones</th><?php endif ?></tr></thead>
				<tbody>
				<?php foreach ($result as $r): ?>
					<?php
						$initials = mb_strtoupper(mb_substr(trim($r->nombre), 0, 1).mb_substr(trim($r->apellido), 0, 1));
						$user = NULL; $user_total = 0;
						if ($is_admin) {
							$query = $this->db->query('SELECT * FROM user WHERE username = '.$this->db->escape($r->cedula));
							if ($query->result()) { $user = $query->first_row(); $user_total = $this->db->where('user_id', $user->id)->count_all_results('sub_coordinadores'); }
						} elseif ($show_coordinator) {
							$query = $this->db->query('SELECT * FROM user WHERE id = '.(int) $r->user_id); $user = $query->result() ? $query->first_row() : NULL;
						}
					?>
					<tr>
						<td data-label="Nombre"><div class="directory-person"><span class="directory-avatar"><?= html_escape($initials) ?></span><strong><?= html_escape($r->nombre) ?></strong></div></td>
						<td data-label="Apellido"><?= html_escape($r->apellido) ?></td><td data-label="Cédula"><?= html_escape($r->cedula) ?></td><td data-label="Celular"><?= html_escape($r->celular) ?></td><td data-label="Municipio"><?= html_escape($r->municipio_nombre) ?></td><td data-label="Circ."><?= html_escape($r->circunscripcion) ?></td><td data-label="Nacimiento"><?= html_escape($r->fecha_nacimiento) ?></td><td data-label="Recinto" class="directory-venue"><?= html_escape($r->recinto_nombre) ?></td>
						<?php if ($is_admin): ?><td data-label="Registrados"><?php if ($user): ?><a class="directory-count" href="<?= base_url('registrar/subcoordinadores') ?>?id=<?= (int) $user->id ?>"><?= $user_total ?></a><?php else: ?>0<?php endif ?></td><td class="directory-actions"><?php if ($user): ?><a class="directory-edit" href="<?= base_url('auth/usuario') ?>?cedula=<?= rawurlencode($user->username) ?>"><i class="fas fa-pen"></i><span>Editar</span></a><?php endif ?></td>
						<?php elseif ($show_coordinator): ?><td data-label="Coordinador"><?= $user ? html_escape($user->nombre.' '.$user->apellido) : '' ?></td><td class="directory-actions"><a class="directory-edit" href="<?= base_url('registrar/editar_sub') ?>?cedula=<?= rawurlencode($r->cedula) ?>"><i class="fas fa-pen"></i><span>Editar</span></a></td><?php endif ?>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</main>
