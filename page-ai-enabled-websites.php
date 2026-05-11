<?php
get_header();

set_query_var(
	'dw_service_page',
	array(
		'slug'                => 'ai-enabled-websites',
		'eyebrow'             => 'AI-Enabled Websites',
		'hero_title'          => 'AI-Enabled Websites That Answer Customer Questions Faster',
		'hero_lede'           => 'AI-enabled websites should help visitors find useful answers, understand your services, and take the next step while they are still interested.',
		'panel_label'         => 'AI website support',
		'panel_kicker'        => 'Useful for',
		'panel_title'         => 'Answering common questions while interest is high',
		'panel_points'        => array(
			'Service and FAQ guidance',
			'Booking or contact direction',
			'Offer and pricing explanations',
			'Lead handoff recommendations',
		),
		'problem_label'       => 'The Problem',
		'problem_title'       => 'Interested visitors often leave when website answers are hard to find.',
		'problem_copy'        => 'A good website gives people confidence. An AI-enabled website can go further by helping visitors look up common questions, service details, booking steps, and next actions without waiting for someone to reply.',
		'deliverables_title'  => 'Practical AI support layered into a clear website experience.',
		'deliverables_intro'  => 'The focus is not flashy automation. It is making the site more helpful for real prospects who already have questions.',
		'deliverables'        => array(
			array(
				'icon'  => 'fas fa-comments',
				'title' => 'Smart FAQ Chat',
				'copy'  => 'A chatbot-style answer layer can help visitors understand services, hours, booking steps, policies, and common next questions.',
			),
			array(
				'icon'  => 'fas fa-database',
				'title' => 'Knowledge Setup',
				'copy'  => 'Business details, service explanations, FAQs, and approved language are organized so answers stay grounded in what the business actually offers.',
			),
			array(
				'icon'  => 'fas fa-route',
				'title' => 'Next-Step Routing',
				'copy'  => 'The experience guides people toward a call, contact form, booking link, quote request, or the right page.',
			),
			array(
				'icon'  => 'fas fa-copy',
				'title' => 'Answer Copywriting',
				'copy'  => 'Responses are written in plain language so customers get helpful answers instead of robotic filler.',
			),
			array(
				'icon'  => 'fas fa-user-check',
				'title' => 'Lead Readiness',
				'copy'  => 'Questions, forms, and handoff suggestions are planned so the business can follow up with clearer context.',
			),
			array(
				'icon'  => 'fas fa-sliders-h',
				'title' => 'Scope and Guardrails',
				'copy'  => 'The AI layer is shaped around approved topics and sensible limits so it supports the business without overpromising.',
			),
		),
		'fit_label'           => 'Best Fit',
		'fit_title'           => 'Good for service businesses that answer the same questions again and again.',
		'fit_copy'            => 'This works well when customers need help choosing a service, checking whether you are the right fit, understanding pricing ranges, or knowing what to do before they reach out.',
		'fit_points'          => array(
			'Visitors have common questions before they call.',
			'Your team repeats the same answers through email, phone, or social messages.',
			'Your services need a little explanation before someone books.',
			'You want the website to feel more helpful after hours.',
		),
		'process_title'       => 'A careful way to add AI.',
		'process'             => array(
			array(
				'title' => 'Collect',
				'copy'  => 'We gather service details, FAQs, business rules, contact paths, and preferred language.',
			),
			array(
				'title' => 'Shape',
				'copy'  => 'We define what the assistant should answer, where it should route people, and what it should avoid.',
			),
			array(
				'title' => 'Build',
				'copy'  => 'We connect the answer experience to the website and tune the customer-facing copy.',
			),
			array(
				'title' => 'Review',
				'copy'  => 'We test common questions, adjust unclear answers, and make sure the handoff points are easy to follow.',
			),
		),
		'proof_label'         => 'Why It Matters',
		'proof_title'         => 'AI-enabled websites can protect customer momentum.',
		'proof_copy'          => 'When a visitor is already interested, every confusing step creates a chance to lose them. A focused AI layer can help the website answer faster while still pointing people toward a real conversation.',
		'proof_alt'           => 'AI website answers, service content, and lead follow-up organized into a clearer customer path',
		'faq_title'           => 'AI-enabled website questions',
		'faqs'                => array(
			array(
				'question' => 'Will AI replace talking to customers?',
				'answer'   => 'No. The goal is to answer common questions and guide people to the right next step. Real conversations still matter for quotes, details, and decisions.',
			),
			array(
				'question' => 'Can this work with my current site?',
				'answer'   => 'Often, yes. If the current website is healthy enough, DigitWaves can plan an AI answer layer around it. If the site is unclear, the page structure may need cleanup first.',
			),
			array(
				'question' => 'Do you guarantee the AI will answer everything perfectly?',
				'answer'   => 'No. AI needs clear source material, testing, and sensible limits. DigitWaves sets up the experience to be useful and grounded, then reviews common paths for quality.',
			),
		),
		'related_title'       => 'Related marketing support',
		'related_intro'       => 'AI works best when the surrounding website and content are clear enough for customers to trust.',
		'related_services'    => array(
			array(
				'title' => 'Web Design',
				'copy'  => 'Build clearer service pages, stronger trust signals, and cleaner contact paths.',
				'url'   => '/web-design/',
			),
			array(
				'title' => 'UGC Ads & Short Videos',
				'copy'  => 'Turn common customer questions and service proof into short-form content ideas.',
				'url'   => '/ugc-ads-short-videos/',
			),
		),
		'cta_title'           => 'Want your website to answer more of the first questions?',
		'cta_copy'            => 'Book a strategy call and we will look at what customers ask, what your website already explains, and where an AI-enabled layer would actually help.',
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
