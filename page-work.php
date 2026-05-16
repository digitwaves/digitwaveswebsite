<?php
get_header();

$med_spa_demo = 'https://digitwaves.com/demos/med-spa/hero-fullscreen.html';
$roofing_demo = 'https://digitwaves.com/demos/roofing/';

$work_tiles = array(
	array(
		'type'  => 'med-spa',
		'style' => 'medspa-hero',
		'label' => 'Med Spa',
		'title' => 'Premium Med Spa Demo',
		'copy'  => 'Visual-first treatment pages, booking prompts, and trust-building service flow.',
		'url'   => $med_spa_demo,
		'cta'   => 'View Demo',
		'image' => 'images/work/med-spa-luma-square.jpg',
	),
	array(
		'type'  => 'misc',
		'style' => 'teacup-doggy',
		'label' => 'Misc',
		'title' => 'Teacup Doggy Website',
		'copy'  => 'A playful WordPress sample site with bright visual sections and simple navigation.',
		'url'   => 'https://teacupdoggy.com',
		'cta'   => 'Plan Similar',
		'image' => 'images/work/teacup-doggy-square.jpg',
	),
	array(
		'type'  => 'roofing',
		'style' => 'roofing-hero',
		'label' => 'Roofing',
		'title' => 'Roofing Website Hero',
		'copy'  => 'A cinematic roofing homepage concept built around trust, curb appeal, and quote requests.',
		'url'   => $roofing_demo,
		'cta'   => 'View Demo',
		'image' => 'images/work/roofing-hero-square.jpg',
	),
	array(
		'type'  => 'misc',
		'style' => 'fashion-editorial',
		'label' => 'Misc',
		'title' => 'Fashion Editorial Site',
		'copy'  => 'Image-led layout for launches, articles, looks, and brand storytelling.',
		'url'   => 'https://thefashiongal.com',
		'cta'   => 'Plan Similar',
		'image' => 'images/work/fashion-gal-square.jpg',
	),
	array(
		'type'  => 'hero',
		'style' => 'hvac-emergency',
		'label' => 'Hero Demo',
		'title' => 'Emergency Service Page',
		'copy'  => 'Fast mobile action for repair calls, service areas, and urgent requests.',
		'url'   => '/contact/',
		'cta'   => 'Build Flow',
	),
	array(
		'type'  => 'misc',
		'style' => 'ai-lead',
		'label' => 'AI Lead Flow',
		'title' => 'AI Intake Assistant',
		'copy'  => 'A guided question path that helps visitors choose the right next step.',
		'url'   => '/ai-enabled-websites/',
		'cta'   => 'Explore AI',
	),
	array(
		'type'  => 'hero',
		'style' => 'hvac-quote',
		'label' => 'Hero Demo',
		'title' => 'Quote Request UI',
		'copy'  => 'Clean service selection and quote-prep structure for local teams.',
		'url'   => '/contact/',
		'cta'   => 'Plan Similar',
	),
	array(
		'type'  => 'misc',
		'style' => 'remodel-portfolio',
		'label' => 'Remodeling',
		'title' => 'Project Portfolio Grid',
		'copy'  => 'Before visitors call, they can see quality, process, and project fit.',
		'url'   => '/contact/',
		'cta'   => 'Plan Site',
	),
	array(
		'type'  => 'misc',
		'style' => 'unlock-flow',
		'label' => 'Lead Flow',
		'title' => 'Service Fit Gateway',
		'copy'  => 'A simple flow that turns vague interest into a clearer inquiry.',
		'url'   => '/contact/',
		'cta'   => 'Map Flow',
	),
	array(
		'type'  => 'misc',
		'style' => 'fashion-mobile',
		'label' => 'Misc',
		'title' => 'Mobile Launch Page',
		'copy'  => 'A visual landing page for product drops, booking, or brand campaigns.',
		'url'   => '/contact/',
		'cta'   => 'Plan Similar',
	),
	array(
		'type'  => 'med-spa',
		'style' => 'medspa-menu',
		'label' => 'Med Spa',
		'title' => 'Treatment Menu UI',
		'copy'  => 'Service cards that make treatment discovery feel easier and more premium.',
		'url'   => $med_spa_demo,
		'cta'   => 'View Demo',
	),
	array(
		'type'  => 'misc',
		'style' => 'legal-intake',
		'label' => 'Local Services',
		'title' => 'Trust + Intake Page',
		'copy'  => 'A careful trust-building page for consultations, questions, and next steps.',
		'url'   => '/contact/',
		'cta'   => 'Plan Similar',
	),
	array(
		'type'  => 'misc',
		'style' => 'dashboard',
		'label' => 'Operations',
		'title' => 'Lead Overview Concept',
		'copy'  => 'A clean view of requests, service fit, and follow-up priorities.',
		'url'   => '/contact/',
		'cta'   => 'Discuss Build',
	),
);
?>

<main class="dw-work-gallery">
	<section class="dw-work-gallery-toolbar">
		<div class="dw-work-gallery-head">
			<div class="dw-work-gallery-title">
				<p class="dw-work-gallery-eyebrow">DigitWaves Work</p>
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
				<a
					class="dw-work-tile dw-work-tile-<?php echo esc_attr( $tile['style'] ); ?>"
					href="<?php echo esc_url( $tile['url'] ); ?>"
					target="_blank"
					rel="noopener noreferrer"
					data-dw-work-card
					data-type="<?php echo esc_attr( $tile['type'] ); ?>"
				>
					<?php if ( ! empty( $tile['image'] ) ) : ?>
						<span class="dw-work-art dw-work-art-image" aria-hidden="true">
							<img class="dw-work-image" src="<?php echo esc_url( get_template_directory_uri() . '/' . $tile['image'] ); ?>" alt="" loading="lazy">
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
