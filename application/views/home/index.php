<link rel="stylesheet" href="<?= base_url('assets/css/home-hero.css?v=3') ?>">

<main class="campaign-home">
	<section class="campaign-hero" aria-labelledby="campaign-title">
		<div class="campaign-copy">
			<div class="campaign-kicker">
				<span>Proyecto Rafael Padilla Diputado</span>
				<strong>2026-2030</strong>
			</div>

			<h1 id="campaign-title">
				<span>Rafael</span>
				<strong>Padilla</strong>
			</h1>

			<div class="campaign-rule" aria-hidden="true"></div>
			<p class="campaign-party">Fuerza del Pueblo</p>
			<p class="campaign-message">Juntos construyendo un mejor futuro para nuestra gente.</p>

			<div class="campaign-actions">
				<a class="campaign-btn campaign-btn-whatsapp" href="https://wa.me/18094966220?text=Hola%20Rafael%20Padilla%2C%20quiero%20ponerme%20en%20contacto%20con%20usted." target="_blank" rel="noopener noreferrer">
					<span class="campaign-whatsapp-icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
					<span><strong>Contactar a Rafael Padilla</strong><small>Escríbele directamente por WhatsApp</small></span>
					<i class="fas fa-chevron-right campaign-btn-arrow" aria-hidden="true"></i>
				</a>
				<?php if (!isset($_SESSION['user'])): ?>
				<a class="campaign-btn campaign-btn-primary" href="<?= base_url('auth/login') ?>">
					<i class="fas fa-user-plus" aria-hidden="true"></i>
					¡Registra a tu gente!
					<i class="fas fa-chevron-right campaign-btn-arrow" aria-hidden="true"></i>
				</a>
				<a class="campaign-btn campaign-btn-secondary" href="<?= base_url('auth/registro') ?>">
					<i class="fas fa-user-check" aria-hidden="true"></i>
					Regístrate como Coordinador
				</a>
				<?php else: ?>
				<a class="campaign-btn campaign-btn-primary" href="<?= base_url('registrar/subcoordinador') ?>">
					<i class="fas fa-user-plus" aria-hidden="true"></i>
					¡Registra a tu gente!
					<i class="fas fa-chevron-right campaign-btn-arrow" aria-hidden="true"></i>
				</a>
				<a class="campaign-btn campaign-btn-secondary" href="<?= base_url('registrar') ?>">
					<i class="fas fa-list" aria-hidden="true"></i>
					Ver mis registrados
				</a>
				<?php endif ?>
			</div>
		</div>

		<div class="campaign-person" aria-hidden="true">
			<img src="<?= base_url('assets/images/hero/padilla-cutout.png?v=2') ?>" alt="">
		</div>
	</section>
</main>
