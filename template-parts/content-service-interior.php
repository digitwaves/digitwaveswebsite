<?php
$service_page = get_query_var( 'dw_service_page' );

if ( empty( $service_page ) || ! is_array( $service_page ) ) {
	return;
}

$booking_url = 'https://calendar.app.google/9zMzaHNicay1Za1GA';
$theme_uri   = get_template_directory_uri();

$escape_list = function ( $items ) {
	if ( empty( $items ) || ! is_array( $items ) ) {
		return;
	}
	?>
	<ul>
		<?php foreach ( $items as $item ) : ?>
			<li><?php echo esc_html( $item ); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php
};
?>

<main class="dw-service-interior dw-service-interior-<?php echo esc_attr( $service_page['slug'] ); ?>">
	<section class="dw-service-interior-hero">
		<div class="dw-service-interior-container dw-service-hero-grid">
			<div class="dw-service-hero-copy">
				<p class="dw-service-eyebrow"><?php echo esc_html( $service_page['eyebrow'] ); ?></p>
				<h1><?php echo esc_html( $service_page['hero_title'] ); ?></h1>
				<p class="dw-service-hero-lede"><?php echo esc_html( $service_page['hero_lede'] ); ?></p>
				<div class="dw-service-actions" aria-label="Service page actions">
					<a class="dw-service-button dw-service-button-primary" href="<?php echo esc_url( $booking_url ); ?>" target="_blank" rel="noopener">Book a Strategy Call</a>
					<a class="dw-service-button dw-service-button-secondary" href="/contact/">Ask About This Service</a>
				</div>
			</div>
			<div class="dw-service-hero-panel" aria-label="<?php echo esc_attr( $service_page['panel_label'] ); ?>">
				<p><?php echo esc_html( $service_page['panel_kicker'] ); ?></p>
				<h2><?php echo esc_html( $service_page['panel_title'] ); ?></h2>
				<?php $escape_list( $service_page['panel_points'] ); ?>
			</div>
		</div>
	</section>

	<section class="dw-service-section dw-service-intro">
		<div class="dw-service-interior-container dw-service-narrow">
			<p class="dw-service-section-label"><?php echo esc_html( $service_page['problem_label'] ); ?></p>
			<h2><?php echo esc_html( $service_page['problem_title'] ); ?></h2>
			<p><?php echo esc_html( $service_page['problem_copy'] ); ?></p>
		</div>
	</section>

	<section class="dw-service-section dw-service-deliverables">
		<div class="dw-service-interior-container">
			<div class="dw-service-section-heading">
				<p class="dw-service-section-label">What DigitWaves Handles</p>
				<h2><?php echo esc_html( $service_page['deliverables_title'] ); ?></h2>
				<p><?php echo esc_html( $service_page['deliverables_intro'] ); ?></p>
			</div>
			<div class="dw-service-card-grid">
				<?php foreach ( $service_page['deliverables'] as $deliverable ) : ?>
					<article class="dw-service-detail">
						<span class="dw-service-detail-icon" aria-hidden="true"><i class="<?php echo esc_attr( $deliverable['icon'] ); ?>"></i></span>
						<h3><?php echo esc_html( $deliverable['title'] ); ?></h3>
						<p><?php echo esc_html( $deliverable['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dw-service-section dw-service-split">
		<div class="dw-service-interior-container dw-service-split-grid">
			<div>
				<p class="dw-service-section-label"><?php echo esc_html( $service_page['fit_label'] ); ?></p>
				<h2><?php echo esc_html( $service_page['fit_title'] ); ?></h2>
				<p><?php echo esc_html( $service_page['fit_copy'] ); ?></p>
			</div>
			<div class="dw-service-checklist">
				<?php $escape_list( $service_page['fit_points'] ); ?>
			</div>
		</div>
	</section>

	<section class="dw-service-section dw-service-process">
		<div class="dw-service-interior-container">
			<div class="dw-service-section-heading">
				<p class="dw-service-section-label">How It Works</p>
				<h2><?php echo esc_html( $service_page['process_title'] ); ?></h2>
			</div>
			<div class="dw-service-process-grid">
				<?php foreach ( $service_page['process'] as $index => $step ) : ?>
					<article class="dw-service-process-step">
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dw-service-section dw-service-proof">
		<div class="dw-service-interior-container dw-service-proof-grid">
			<div class="dw-service-proof-copy">
				<p class="dw-service-section-label"><?php echo esc_html( $service_page['proof_label'] ); ?></p>
				<h2><?php echo esc_html( $service_page['proof_title'] ); ?></h2>
				<p><?php echo esc_html( $service_page['proof_copy'] ); ?></p>
			</div>
			<div class="dw-service-proof-visual">
				<img
					src="<?php echo esc_url( $theme_uri . '/images/home/dw-marketing-fit-visual.png' ); ?>"
					alt="<?php echo esc_attr( $service_page['proof_alt'] ); ?>"
					onerror="this.style.display='none';this.closest('.dw-service-proof-visual').classList.add('dw-proof-image-missing');"
				>
				<div class="dw-service-proof-fallback" aria-hidden="true">
					<div class="dw-proof-browser">
						<div class="dw-proof-topbar"><span></span><span></span><span></span></div>
						<div class="dw-proof-hero-line"></div>
						<div class="dw-proof-short-line"></div>
						<div class="dw-proof-flow">
							<span>Website</span>
							<span>Answers</span>
							<span>Lead flow</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $service_page['related_services'] ) && is_array( $service_page['related_services'] ) ) : ?>
		<section class="dw-service-section dw-service-related">
			<div class="dw-service-interior-container">
				<div class="dw-service-section-heading">
					<p class="dw-service-section-label">Next Step Options</p>
					<h2><?php echo esc_html( $service_page['related_title'] ); ?></h2>
					<p><?php echo esc_html( $service_page['related_intro'] ); ?></p>
				</div>
				<div class="dw-service-related-grid">
					<?php foreach ( $service_page['related_services'] as $related_service ) : ?>
						<a class="dw-service-related-card" href="<?php echo esc_url( $related_service['url'] ); ?>">
							<span><?php echo esc_html( $related_service['title'] ); ?></span>
							<p><?php echo esc_html( $related_service['copy'] ); ?></p>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="dw-service-section dw-service-faq">
		<div class="dw-service-interior-container">
			<div class="dw-service-section-heading">
				<p class="dw-service-section-label">Common Questions</p>
				<h2><?php echo esc_html( $service_page['faq_title'] ); ?></h2>
			</div>
			<div class="dw-service-faq-grid">
				<?php foreach ( $service_page['faqs'] as $faq ) : ?>
					<article class="dw-service-faq-item">
						<h3><?php echo esc_html( $faq['question'] ); ?></h3>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dw-service-section dw-service-final-cta">
		<div class="dw-service-interior-container dw-service-narrow">
			<h2><?php echo esc_html( $service_page['cta_title'] ); ?></h2>
			<p><?php echo esc_html( $service_page['cta_copy'] ); ?></p>
			<a class="dw-service-button dw-service-button-primary" href="<?php echo esc_url( $booking_url ); ?>" target="_blank" rel="noopener">Book a Strategy Call</a>
		</div>
	</section>
</main>
