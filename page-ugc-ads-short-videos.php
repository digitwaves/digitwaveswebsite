<?php
get_header();

set_query_var(
	'dw_service_page',
	array(
		'slug'                => 'ugc-ads-short-videos',
		'eyebrow'             => 'UGC Ads and Short Videos',
		'hero_title'          => 'UGC Ads and Short Videos That Make Local Offers Easier to Notice',
		'hero_lede'           => 'UGC ads and short videos should turn your services, proof, promotions, and customer questions into simple content people can understand quickly.',
		'panel_label'         => 'Short video support',
		'panel_kicker'        => 'Made for',
		'panel_title'         => 'Content that gives people a reason to pay attention',
		'panel_points'        => array(
			'Simple hooks and ad angles',
			'Short scripts and shot lists',
			'Offer-focused video concepts',
			'Platform-ready content direction',
		),
		'problem_label'       => 'The Problem',
		'problem_title'       => 'Local businesses need visibility, but short-video planning takes time.',
		'problem_copy'        => 'Posting more is not the same as saying something useful. Strong short-form content starts with a clear offer, a relatable customer problem, and a simple next step.',
		'deliverables_title'  => 'Short-video direction built around the business, not random trends.',
		'deliverables_intro'  => 'The work turns real services, customer objections, promotions, and proof points into content a local audience can understand quickly.',
		'deliverables'        => array(
			array(
				'icon'  => 'fas fa-bullseye',
				'title' => 'Offer Angles',
				'copy'  => 'We shape content ideas around what you sell, who needs it, and why someone should care now.',
			),
			array(
				'icon'  => 'fas fa-scroll',
				'title' => 'Short Scripts',
				'copy'  => 'Hook, body, and CTA copy are written for quick videos, UGC-style ads, Reels, TikToks, or Shorts.',
			),
			array(
				'icon'  => 'fas fa-video',
				'title' => 'Shot Direction',
				'copy'  => 'Simple visual prompts help capture what to show: service moments, before-and-after proof, product details, or customer pain points.',
			),
			array(
				'icon'  => 'fas fa-layer-group',
				'title' => 'Content Batches',
				'copy'  => 'Related ideas are grouped so one service, promo, or FAQ can become multiple useful posts or ad variations.',
			),
			array(
				'icon'  => 'fas fa-ad',
				'title' => 'Ad Creative Basics',
				'copy'  => 'Concepts can be shaped for paid social with clearer hooks, proof, and next-step language.',
			),
			array(
				'icon'  => 'fas fa-calendar-alt',
				'title' => 'Posting Direction',
				'copy'  => 'A simple content rhythm helps the business know what to publish without turning marketing into a full-time job.',
			),
		),
		'fit_label'           => 'Best Fit',
		'fit_title'           => 'Good for businesses that need more people to understand what they offer.',
		'fit_copy'            => 'This is useful when you have services worth showing, questions worth answering, or promotions worth explaining, but need a clearer plan for turning them into content.',
		'fit_points'          => array(
			'You want short videos but do not know what to say.',
			'Your services are easier to understand when people can see them.',
			'You need ad angles for Facebook, Instagram, TikTok, or YouTube Shorts.',
			'You want content ideas that point back to calls, bookings, or messages.',
		),
		'process_title'       => 'From offer to usable content.',
		'process'             => array(
			array(
				'title' => 'Find Angles',
				'copy'  => 'We look at services, customer questions, seasonal offers, proof points, and common objections.',
			),
			array(
				'title' => 'Write',
				'copy'  => 'We turn the best angles into short scripts, captions, hooks, and CTAs.',
			),
			array(
				'title' => 'Plan Visuals',
				'copy'  => 'We outline simple shots, scenes, or UGC-style moments that make each idea easier to produce.',
			),
			array(
				'title' => 'Package',
				'copy'  => 'We organize the content so it can be posted, tested, or used as ad creative without confusion.',
			),
		),
		'proof_label'         => 'Why It Matters',
		'proof_title'         => 'UGC ads and short videos work best when the message is specific.',
		'proof_copy'          => 'A local audience does not need vague brand noise. They need a fast reason to notice the offer, believe it, and know what to do next.',
		'proof_alt'           => 'Short video content, customer answers, website traffic, and lead follow-up connected for local marketing',
		'faq_title'           => 'UGC and short video questions',
		'faqs'                => array(
			array(
				'question' => 'Do you film the videos?',
				'answer'   => 'This page focuses on strategy, scripts, shot direction, and content planning. Production can be discussed based on the project, location, assets, and format.',
			),
			array(
				'question' => 'Can this be used for ads?',
				'answer'   => 'Yes. Concepts can be written with paid social in mind, including stronger hooks, offer framing, proof points, and calls to action.',
			),
			array(
				'question' => 'Do you guarantee views or viral results?',
				'answer'   => 'No. DigitWaves focuses on clearer messaging, better content structure, and stronger creative direction. Platform results depend on audience, budget, timing, and many factors outside any one project.',
			),
		),
		'related_title'       => 'Related marketing support',
		'related_intro'       => 'Short-form content works better when the website and customer-answer path are ready for the attention.',
		'related_services'    => array(
			array(
				'title' => 'Web Design',
				'copy'  => 'Give viewers a clearer website to visit after they notice the offer.',
				'url'   => '/web-design/',
			),
			array(
				'title' => 'AI-Enabled Websites',
				'copy'  => 'Help interested visitors get quick answers after they click through from content or ads.',
				'url'   => '/ai-enabled-websites/',
			),
		),
		'cta_title'           => 'Need short videos that actually connect to the offer?',
		'cta_copy'            => 'Book a strategy call and we will talk through your services, audience, and the first content angles that could help more people notice what you do.',
	)
);

$dw_service_template = locate_template( 'template-parts/content-service-interior.php' );

if ( $dw_service_template ) {
	load_template( $dw_service_template, false );
} else {
	$dw_service_page = get_query_var( 'dw_service_page' );
	?>
	<main style="padding:140px 24px 80px;max-width:980px;margin:0 auto;">
		<p style="color:#0097a7;font-weight:700;text-transform:uppercase;letter-spacing:.12em;"><?php echo esc_html( $dw_service_page['eyebrow'] ); ?></p>
		<h1 style="font-size:clamp(2.3rem,6vw,4.5rem);line-height:1.05;margin:0 0 20px;color:#081b2b;"><?php echo esc_html( $dw_service_page['hero_title'] ); ?></h1>
		<p style="font-size:1.16rem;line-height:1.75;color:#526271;max-width:760px;"><?php echo esc_html( $dw_service_page['hero_lede'] ); ?></p>
		<p style="margin-top:28px;padding:18px 20px;border-left:5px solid #0097a7;background:#eef7f9;color:#20394d;">
			The shared service-page renderer is missing. Upload <strong>template-parts/content-service-interior.php</strong> to the live theme to enable the full layout.
		</p>
	</main>
	<?php
}

get_footer();
