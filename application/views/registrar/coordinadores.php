<link rel="stylesheet" href="<?= base_url('assets/css/admin-directory.css?v=1') ?>">
<?php
	$is_admin = isset($admin);
	$show_coordinator = !$is_admin && !isset($user_info);
	$title = isset($user_info) ? 'Listado de Sub Coordinadores' : ($is_admin ? 'Listado de Coordinadores' : 'Listado de Sub Coordinadores');
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

		<div class="directory-table-wrap">
			<table class="table directory-table">
				<thead><tr>
					<th>Nombre</th><th>Apellido</th><th>Cédula</th><th>Celular</th><th>Recinto</th>
					<?php if ($is_admin): ?><th>Registrados</th><th class="directory-action-heading">Acciones</th>
					<?php elseif ($show_coordinator): ?><th>Coordinador</th><th class="directory-action-heading">Acciones</th><?php endif ?>
				</tr></thead>
				<tbody>
				<?php foreach ($result as $r): ?>
					<?php
						$initials = mb_strtoupper(mb_substr(trim($r->nombre), 0, 1).mb_substr(trim($r->apellido), 0, 1));
						$user = NULL;
						$user_total = 0;
						if ($is_admin) {
							$query = $this->db->query('SELECT * FROM user WHERE username = '.$this->db->escape($r->cedula));
							if ($query->result()) {
								$user = $query->first_row();
								$user_total = $this->db->where('user_id', $user->id)->count_all_results('sub_coordinadores');
							}
						} elseif ($show_coordinator) {
							$query = $this->db->query('SELECT * FROM user WHERE id = '.(int) $r->user_id);
							$user = $query->result() ? $query->first_row() : NULL;
						}
					?>
					<tr>
						<td data-label="Nombre"><div class="directory-person"><span class="directory-avatar"><?= html_escape($initials) ?></span><strong><?= html_escape($r->nombre) ?></strong></div></td>
						<td data-label="Apellido"><?= html_escape($r->apellido) ?></td>
						<td data-label="Cédula"><?= html_escape($r->cedula) ?></td>
						<td data-label="Celular"><?= html_escape($r->celular) ?></td>
						<td data-label="Recinto" class="directory-venue"><?= html_escape($r->recinto_nombre) ?></td>
						<?php if ($is_admin): ?>
						<td data-label="Registrados"><?php if ($user): ?><a class="directory-count" href="<?= base_url('registrar/subcoordinadores') ?>?id=<?= (int) $user->id ?>"><?= $user_total ?></a><?php else: ?>0<?php endif ?></td>
						<td class="directory-actions"><?php if ($user): ?><a class="directory-edit" href="<?= base_url('auth/usuario') ?>?cedula=<?= rawurlencode($user->username) ?>" title="Editar coordinador"><i class="fas fa-pen"></i><span>Editar</span></a><?php endif ?></td>
						<?php elseif ($show_coordinator): ?>
						<td data-label="Coordinador"><?= $user ? html_escape($user->nombre.' '.$user->apellido) : '' ?></td>
						<td class="directory-actions"><a class="directory-edit" href="<?= base_url('registrar/editar_sub') ?>?cedula=<?= rawurlencode($r->cedula) ?>" title="Editar sub coordinador"><i class="fas fa-pen"></i><span>Editar</span></a></td>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</main>
