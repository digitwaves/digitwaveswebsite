<?php
function digitwaves_roofing_demo_path() {
	return 'demos/roofing' === trim( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH ), '/' );
}

add_filter( 'pre_handle_404', function ( $preempt, $wp_query ) {
	if ( digitwaves_roofing_demo_path() ) {
		$wp_query->is_404 = false;
		return true;
	}

	return $preempt;
}, 0, 2 );

add_action( 'template_redirect', function () {
	$request_path = trim( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH ), '/' );

	if ( 'demos/roofing' === $request_path ) {
		status_header( 200 );
		nocache_headers();

		$video_url = 'https://digitwaves.com/wp-content/uploads/2026/05/finalhero.mp4';
		$poster_url = 'https://digitwaves.com/wp-content/uploads/2026/05/roofing-hero-video-ref.jpg';
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vanguard Roofing - Roofing Website Demo</title>
	<meta name="description" content="A DigitWaves roofing website hero demo focused on premium roof visuals, curb appeal, and quote requests.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<style>
		:root {
			--gold-start: #f8cf89;
			--gold-end: #d19e4a;
			--text-main: #ffffff;
			--text-muted: #d0d0d0;
			--glass-border: rgba(255, 255, 255, 0.15);
		}

		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			font-family: 'Inter', sans-serif;
		}

		body {
			overflow-x: hidden;
			background: #0a0e17;
			color: var(--text-main);
		}

		.hero-section {
			position: relative;
			display: flex;
			flex-direction: column;
			width: 100%;
			min-height: 100vh;
			overflow: hidden;
			background: linear-gradient(to right, rgba(10, 14, 23, 0.9), rgba(10, 14, 23, 0.58), rgba(10, 14, 23, 0.18)), url('<?php echo esc_url( $poster_url ); ?>') center / cover no-repeat;
		}

		.hero-section::before {
			content: '';
			position: absolute;
			inset: 0;
			z-index: 1;
			background: linear-gradient(to right, rgba(10, 14, 23, 0.9), rgba(10, 14, 23, 0.58), rgba(10, 14, 23, 0.18));
			pointer-events: none;
		}

		.hero-video {
			position: absolute;
			inset: 0;
			z-index: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center;
		}

		.navbar {
			position: relative;
			z-index: 10;
			display: flex;
			align-items: center;
			justify-content: space-between;
			width: 100%;
			padding: 1.5rem 4rem;
			border-bottom: 1px solid var(--glass-border);
			background: linear-gradient(to bottom, rgba(10, 14, 23, 0.8), rgba(10, 14, 23, 0));
			backdrop-filter: blur(4px);
		}

		.logo {
			color: var(--text-main);
			font-size: 1.5rem;
			font-weight: 700;
		}

		.nav-links {
			display: flex;
			gap: 3rem;
		}

		.nav-links a {
			position: relative;
			color: var(--text-muted);
			font-size: 0.95rem;
			font-weight: 500;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		.nav-links a:hover,
		.nav-links a.active {
			color: var(--gold-start);
		}

		.nav-links a.active::after {
			content: '';
			position: absolute;
			bottom: -6px;
			left: 0;
			width: 100%;
			height: 2px;
			border-radius: 2px;
			background: var(--gold-start);
		}

		.btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			border-radius: 4px;
			font-weight: 600;
			text-decoration: none;
			transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
		}

		.btn-quote-nav,
		.btn-quote-main {
			background: linear-gradient(90deg, var(--gold-start), var(--gold-end));
			color: #111;
			box-shadow: 0 8px 25px rgba(209, 158, 74, 0.25);
		}

		.btn-quote-nav {
			padding: 0.7rem 1.8rem;
			font-size: 0.9rem;
		}

		.btn-quote-main,
		.btn-portfolio {
			padding: 1.2rem 2.8rem;
			font-size: 1.1rem;
		}

		.btn:hover {
			transform: translateY(-2px);
		}

		.btn-portfolio {
			border: 1px solid var(--glass-border);
			background: rgba(255, 255, 255, 0.05);
			color: var(--text-main);
			backdrop-filter: blur(10px);
		}

		.hero-content {
			position: relative;
			z-index: 5;
			flex: 1;
			display: flex;
			flex-direction: column;
			justify-content: center;
			max-width: 1200px;
			margin-top: -5vh;
			padding: 0 4rem;
		}

		.tag-pill {
			align-self: flex-start;
			margin-bottom: 2rem;
			padding: 0.4rem 1.2rem;
			border: 1px solid var(--glass-border);
			border-radius: 30px;
			background: rgba(255, 255, 255, 0.03);
			color: var(--gold-start);
			font-size: 0.75rem;
			font-weight: 700;
			letter-spacing: 2px;
			text-transform: uppercase;
			backdrop-filter: blur(8px);
		}

		.hero-heading {
			margin-bottom: 1.8rem;
			font-size: clamp(3rem, 7vw, 5rem);
			font-weight: 800;
			letter-spacing: 0;
			line-height: 1.05;
			text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
		}

		.gradient-text {
			background: linear-gradient(90deg, var(--gold-start), var(--gold-end));
			-webkit-background-clip: text;
			background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		.hero-subtext {
			max-width: 600px;
			margin-bottom: 2.5rem;
			color: var(--text-muted);
			font-size: 1.15rem;
			font-weight: 400;
			line-height: 1.6;
			text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
		}

		.hero-actions {
			display: flex;
			gap: 1.5rem;
		}

		@media (max-width: 992px) {
			.nav-links {
				display: none;
			}
		}

		@media (max-width: 768px) {
			.navbar,
			.hero-content {
				padding-right: 2rem;
				padding-left: 2rem;
			}

			.hero-content {
				margin-top: 0;
			}

			.hero-subtext {
				font-size: 1rem;
			}

			.hero-actions {
				flex-direction: column;
			}

			.btn {
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<div class="hero-section">
		<video class="hero-video" autoplay muted loop playsinline poster="<?php echo esc_url( $poster_url ); ?>" aria-hidden="true">
			<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
		</video>

		<nav class="navbar">
			<div class="logo">Vanguard Roofing</div>
			<div class="nav-links">
				<a href="#" class="active">Services</a>
				<a href="#">Projects</a>
				<a href="#">Reviews</a>
				<a href="#">About</a>
			</div>
			<a href="https://digitwaves.com/contact/" class="btn btn-quote-nav">Get a Free Quote</a>
		</nav>

		<main class="hero-content">
			<div class="tag-pill">Structural Excellence</div>
			<h1 class="hero-heading">The Standard In<br><span class="gradient-text">Roofing</span> Integrity.</h1>
			<p class="hero-subtext">IronRidge Roofing delivers architectural precision and unyielding protection. We do not just cover homes; we engineer shields for your most valuable investment.</p>
			<div class="hero-actions">
				<a href="https://digitwaves.com/contact/" class="btn btn-quote-main">Get a Free Quote</a>
				<a href="https://digitwaves.com/work/" class="btn btn-portfolio">View Portfolio</a>
			</div>
		</main>
	</div>
</body>
</html>
		<?php
		exit;
	}

	if ( ! is_page( 'work' ) ) {
		return;
	}

	$work_tiles = array(
		array(
			'type'  => 'med-spa',
			'style' => 'medspa-hero',
			'label' => 'Med Spa',
			'title' => 'Premium Med Spa Demo',
			'copy'  => 'Visual-first treatment pages, booking prompts, and trust-building service flow.',
			'url'   => 'https://digitwaves.com/demos/med-spa/hero-fullscreen.html',
			'cta'   => 'View Demo',
			'image' => 'https://digitwaves.com/wp-content/themes/DigitWaves/images/work/med-spa-luma-square.jpg',
		),
		array(
			'type'  => 'misc',
			'style' => 'teacup-doggy',
			'label' => 'Misc',
			'title' => 'Teacup Doggy Website',
			'copy'  => 'A playful WordPress sample site with bright visual sections and simple navigation.',
			'url'   => 'https://teacupdoggy.com',
			'cta'   => 'Plan Similar',
			'image' => 'https://digitwaves.com/wp-content/themes/DigitWaves/images/work/teacup-doggy-square.jpg',
		),
		array(
			'type'  => 'roofing',
			'style' => 'roofing-hero',
			'label' => 'Roofing',
			'title' => 'Roofing Website Hero',
			'copy'  => 'A cinematic roofing homepage concept built around trust, curb appeal, and quote requests.',
			'url'   => 'https://digitwaves.com/demos/roofing/',
			'cta'   => 'View Demo',
			'image' => 'https://digitwaves.com/wp-content/uploads/2026/05/roofing-hero-square.jpg',
		),
		array(
			'type'  => 'misc',
			'style' => 'fashion-editorial',
			'label' => 'Misc',
			'title' => 'Fashion Editorial Site',
			'copy'  => 'Image-led layout for launches, articles, looks, and brand storytelling.',
			'url'   => 'https://thefashiongal.com',
			'cta'   => 'Plan Similar',
			'image' => 'https://digitwaves.com/wp-content/themes/DigitWaves/images/work/fashion-gal-square.jpg',
		),
		array(
			'type'  => 'hero',
			'style' => 'hvac-emergency',
			'label' => 'Hero Demo',
			'title' => 'Emergency Service Page',
			'copy'  => 'Fast mobile action for repair calls, service areas, and urgent requests.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Build Flow',
		),
		array(
			'type'  => 'misc',
			'style' => 'ai-lead',
			'label' => 'AI Lead Flow',
			'title' => 'AI Intake Assistant',
			'copy'  => 'A guided question path that helps visitors choose the right next step.',
			'url'   => 'https://digitwaves.com/ai-enabled-websites/',
			'cta'   => 'Explore AI',
		),
		array(
			'type'  => 'hero',
			'style' => 'hvac-quote',
			'label' => 'Hero Demo',
			'title' => 'Quote Request UI',
			'copy'  => 'Clean service selection and quote-prep structure for local teams.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Plan Similar',
		),
		array(
			'type'  => 'misc',
			'style' => 'remodel-portfolio',
			'label' => 'Remodeling',
			'title' => 'Project Portfolio Grid',
			'copy'  => 'Before visitors call, they can see quality, process, and project fit.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Plan Site',
		),
		array(
			'type'  => 'misc',
			'style' => 'unlock-flow',
			'label' => 'Lead Flow',
			'title' => 'Service Fit Gateway',
			'copy'  => 'A simple flow that turns vague interest into a clearer inquiry.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Map Flow',
		),
		array(
			'type'  => 'misc',
			'style' => 'fashion-mobile',
			'label' => 'Misc',
			'title' => 'Mobile Launch Page',
			'copy'  => 'A visual landing page for product drops, booking, or brand campaigns.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Plan Similar',
		),
		array(
			'type'  => 'med-spa',
			'style' => 'medspa-menu',
			'label' => 'Med Spa',
			'title' => 'Treatment Menu UI',
			'copy'  => 'Service cards that make treatment discovery feel easier and more premium.',
			'url'   => 'https://digitwaves.com/demos/med-spa/hero-fullscreen.html',
			'cta'   => 'View Demo',
		),
		array(
			'type'  => 'misc',
			'style' => 'legal-intake',
			'label' => 'Local Services',
			'title' => 'Trust + Intake Page',
			'copy'  => 'A careful trust-building page for consultations, questions, and next steps.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Plan Similar',
		),
		array(
			'type'  => 'misc',
			'style' => 'dashboard',
			'label' => 'Operations',
			'title' => 'Lead Overview Concept',
			'copy'  => 'A clean view of requests, service fit, and follow-up priorities.',
			'url'   => 'https://digitwaves.com/contact/',
			'cta'   => 'Discuss Build',
		),
	);

	get_header();
	?>
<script>
	document.body.classList.add('dw-work-page-live');
</script>
<style id="dw-work-toolbar-live">
	body.dw-work-page-live #wrapper > header,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) #wrapper > header {
		background: rgba(255, 255, 255, 0.96) !important;
		backdrop-filter: blur(14px) !important;
		box-shadow: 0 10px 28px rgba(8, 24, 36, 0.08) !important;
		border-bottom: 1px solid rgba(10, 29, 47, 0.06) !important;
	}

	body.dw-work-page-live #wrapper > header .container2,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) #wrapper > header .container2 {
		padding: 2px 10px 4px !important;
	}

	body.dw-work-page-live .menu-item a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item.current-menu-item > a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item.current_page_item > a {
		color: #10263a !important;
		text-shadow: none !important;
	}

	body.dw-work-page-live .menu-item a:hover,
	body.dw-work-page-live .menu-item.current-menu-item > a,
	body.dw-work-page-live .menu-item.current_page_item > a,
	body.dw-work-page-live .menu-item.current-menu-ancestor > a,
	body.dw-work-page-live .menu-item.current-page-ancestor > a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item a:hover,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item a:focus-visible,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item.current-menu-item > a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item.current_page_item > a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item.current-menu-ancestor > a,
	body.page-id-1024.dw-work-page-live:not(.dw-header-solid) .menu-item.current-page-ancestor > a {
		color: var(--dw-accent) !important;
	}

	.dw-work-gallery-toolbar {
		width: 100%;
		padding: clamp(88px, 7.5vw, 104px) clamp(18px, 3.4vw, 44px) 12px;
		background: #f4f7f8;
	}

	.page-id-1024 .dw-work-gallery-toolbar {
		width: 100%;
		margin-left: 0;
		margin-right: 0;
		padding: clamp(88px, 7.5vw, 104px) clamp(18px, 3.4vw, 44px) 12px !important;
	}

	.dw-work-gallery-toolbar .dw-work-gallery-head {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(220px, 260px);
		align-items: end;
		gap: 16px;
		width: min(100%, 1380px);
		margin: 0 auto;
	}

	.dw-work-gallery-toolbar .dw-work-gallery-title {
		max-width: 650px;
	}

	.dw-work-gallery-toolbar .dw-work-gallery-title h1 {
		max-width: 650px;
		margin: 0;
		color: #081b2b;
		font-family: "Roboto Condensed", "Roboto", sans-serif;
		font-size: clamp(2.2rem, 4.4vw, 4rem);
		font-weight: 800;
		letter-spacing: 0;
		line-height: 0.95;
	}

	.dw-work-gallery-toolbar .dw-work-gallery-controls {
		display: grid;
		gap: 8px;
		justify-self: end;
		width: min(100%, 260px);
		min-width: min(100%, 220px);
		padding: 0;
		border: 0;
		border-radius: 8px;
		background: transparent;
		box-shadow: none;
	}

	.dw-work-gallery-toolbar .dw-work-gallery-controls label {
		color: rgba(8, 27, 43, 0.62);
		font-size: 0.76rem;
		font-weight: 800;
		letter-spacing: 0.12em;
		line-height: 1;
		text-transform: uppercase;
	}

	.dw-work-gallery-toolbar .dw-work-gallery-controls select {
		width: 100%;
		min-height: 48px;
		padding: 0 42px 0 16px;
		border: 1px solid rgba(15, 93, 106, 0.32);
		border-radius: 8px;
		background:
			linear-gradient(45deg, transparent 50%, #0f5d6a 50%),
			linear-gradient(135deg, #0f5d6a 50%, transparent 50%),
			#ffffff;
		background-position:
			calc(100% - 20px) 20px,
			calc(100% - 14px) 20px,
			0 0;
		background-size:
			6px 6px,
			6px 6px,
			100% 100%;
		background-repeat: no-repeat;
		color: #081b2b;
		font-size: 0.98rem;
		font-weight: 800;
		appearance: none;
		box-shadow: 0 12px 28px rgba(8, 24, 36, 0.08);
	}

	@media (max-width: 980px) {
		.dw-work-gallery-toolbar .dw-work-gallery-head {
			grid-template-columns: 1fr;
			gap: 18px;
		}

		.dw-work-gallery-toolbar .dw-work-gallery-controls {
			justify-self: start;
			width: min(100%, 360px);
		}
	}

	@media (max-width: 640px) {
		.dw-work-gallery-toolbar {
			padding-top: 96px;
		}

		.dw-work-gallery-toolbar .dw-work-gallery-title h1 {
			font-size: clamp(2.2rem, 16vw, 3.6rem);
		}
	}
</style>
<main class="dw-work-gallery">
	<section class="dw-work-gallery-toolbar">
		<div class="dw-work-gallery-head">
			<div class="dw-work-gallery-title">
				<h1>Work</h1>
			</div>
			<div class="dw-work-gallery-controls">
				<label for="dw-work-type-filter">Type</label>
				<select id="dw-work-type-filter" class="browser-default" data-dw-work-filter>
					<option value="all">All work</option>
					<option value="roofing">Roofing</option>
					<option value="hero">Hero demos</option>
					<option value="med-spa">Med spa</option>
					<option value="misc">Misc</option>
				</select>
			</div>
		</div>
	</section>

	<section class="dw-work-gallery-grid-wrap" aria-label="DigitWaves visual work examples">
		<div class="dw-work-gallery-grid">
			<?php foreach ( $work_tiles as $tile ) : ?>
				<a class="dw-work-tile dw-work-tile-<?php echo esc_attr( $tile['style'] ); ?>" href="<?php echo esc_url( $tile['url'] ); ?>" data-dw-work-card data-type="<?php echo esc_attr( $tile['type'] ); ?>">
					<?php if ( ! empty( $tile['image'] ) ) : ?>
						<span class="dw-work-art dw-work-art-image" aria-hidden="true">
							<img class="dw-work-image" src="<?php echo esc_url( $tile['image'] ); ?>" alt="" loading="lazy">
						</span>
					<?php else : ?>
						<span class="dw-work-art" aria-hidden="true">
							<span class="dw-work-art-device"></span>
							<span class="dw-work-art-ui"></span>
							<span class="dw-work-art-pill"></span>
						</span>
					<?php endif; ?>
					<span class="dw-work-overlay">
						<span class="dw-work-tile-label"><?php echo esc_html( $tile['label'] ); ?></span>
						<strong><?php echo esc_html( $tile['title'] ); ?></strong>
						<span><?php echo esc_html( $tile['copy'] ); ?></span>
						<em><?php echo esc_html( $tile['cta'] ); ?></em>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
		<p class="dw-work-gallery-note">Concept builds and demo use cases. No fake client claims, fake reviews, or regulated outcome promises.</p>
	</section>
</main>

<script>
	(function () {
		var filter = document.querySelector('[data-dw-work-filter]');
		var cards = Array.prototype.slice.call(document.querySelectorAll('[data-dw-work-card]'));

		if (!filter || !cards.length) {
			return;
		}

		function applyFilter() {
			var value = filter.value;

			cards.forEach(function (card) {
				var visible = value === 'all' || card.getAttribute('data-type') === value;
				card.classList.toggle('dw-work-tile-hidden', !visible);
			});
		}

		filter.addEventListener('change', applyFilter);
		applyFilter();
	})();
</script>
	<?php
	get_footer();
	exit;
}, 0 );
