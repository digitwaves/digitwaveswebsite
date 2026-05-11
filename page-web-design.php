<?php
get_header();

set_query_var(
	'dw_service_page',
	array(
		'slug'                => 'web-design',
		'eyebrow'             => 'Local Business Web Design',
		'hero_title'          => 'Web Design for Local Businesses That Need More Trust and Better Leads',
		'hero_lede'           => 'Web design for local businesses should make it easy for visitors to understand what you offer, trust the company behind it, and take the next step without confusion.',
		'panel_label'         => 'Website outcomes',
		'panel_kicker'        => 'Built for',
		'panel_title'         => 'First impressions that move people forward',
		'panel_points'        => array(
			'A clearer service story',
			'Mobile-friendly page flow',
			'Trust signals and local credibility',
			'Contact paths that are easy to find',
		),
		'problem_label'       => 'The Problem',
		'problem_title'       => 'A local business website should make choosing you easier.',
		'problem_copy'        => 'Many local business websites are either outdated, too vague, or hard to act on. People should not have to hunt for what you do, who you serve, or how to contact you. The page structure, copy, and design all need to work together.',
		'deliverables_title'  => 'A practical website foundation, not just a prettier homepage.',
		'deliverables_intro'  => 'The goal is a site that looks professional, explains the business clearly, and supports calls, bookings, quote requests, or walk-ins.',
		'deliverables'        => array(
			array(
				'icon'  => 'fas fa-sitemap',
				'title' => 'Clear Service Pages',
				'copy'  => 'Core service pages, calls to action, and navigation are organized around what customers need to decide.',
			),
			array(
				'icon'  => 'fas fa-pen-nib',
				'title' => 'Trust-Focused Copy',
				'copy'  => 'Headlines, sections, and proof points explain the value without stuffing the page with jargon.',
			),
			array(
				'icon'  => 'fas fa-mobile-alt',
				'title' => 'Responsive Design',
				'copy'  => 'Layouts are shaped for desktop and mobile so key details stay readable and easy to tap.',
			),
			array(
				'icon'  => 'fas fa-location-arrow',
				'title' => 'Local SEO Basics',
				'copy'  => 'Page titles, headings, service language, and local relevance are tightened so the website has a cleaner search foundation.',
			),
			array(
				'icon'  => 'fas fa-envelope-open-text',
				'title' => 'Contact Flow',
				'copy'  => 'Forms, buttons, booking links, and next-step copy are arranged so interested visitors know what to do.',
			),
			array(
				'icon'  => 'fas fa-shield-alt',
				'title' => 'Credibility Signals',
				'copy'  => 'Reviews, examples, service details, photos, and reassuring microcopy help the business feel real and dependable.',
			),
		),
		'fit_label'           => 'Best Fit',
		'fit_title'           => 'Good for local teams that need a sharper digital front door.',
		'fit_copy'            => 'This is a strong starting point when the website is confusing customers, underselling the business, or sending people to competitors before they reach out.',
		'fit_points'          => array(
			'Your current site feels old or unclear.',
			'People ask questions the website should already answer.',
			'You need service pages that match what customers search for.',
			'You want a cleaner path from visitor to call, booking, or form.',
		),
		'process_title'       => 'A simple build path.',
		'process'             => array(
			array(
				'title' => 'Clarify',
				'copy'  => 'We map the services, audience, locations, and main conversion goal.',
			),
			array(
				'title' => 'Structure',
				'copy'  => 'We shape the page flow so the website answers the right questions in the right order.',
			),
			array(
				'title' => 'Design',
				'copy'  => 'We create a polished visual system that feels consistent, credible, and easy to scan.',
			),
			array(
				'title' => 'Launch',
				'copy'  => 'We review mobile behavior, contact paths, metadata basics, and final content before publishing.',
			),
		),
		'proof_label'         => 'Why It Matters',
		'proof_title'         => 'Better web design reduces hesitation.',
		'proof_copy'          => 'When visitors can quickly see what you do, why it matters, and how to reach you, the website starts acting like a useful sales assistant instead of a digital brochure.',
		'proof_alt'           => 'Website content, customer answers, and lead follow-up arranged into a clearer local marketing flow',
		'faq_title'           => 'Web design questions',
		'faqs'                => array(
			array(
				'question' => 'Can you refresh an existing local business website?',
				'answer'   => 'Yes. If the current site has a workable foundation, DigitWaves can clean up the layout, copy, service pages, and contact flow without starting from scratch.',
			),
			array(
				'question' => 'Do I need all of my photos ready?',
				'answer'   => 'Helpful photos are useful, but the project can start with what you have. We can also recommend a simple photo list so the site feels specific to your business.',
			),
			array(
				'question' => 'Is SEO included?',
				'answer'   => 'Basic on-page SEO structure is included. That means clearer titles, headings, service language, and local relevance. Ongoing ranking work is separate.',
			),
		),
		'related_title'       => 'Related marketing support',
		'related_intro'       => 'After the website is clearer, these services can help the same traffic get better answers and stronger reasons to act.',
		'related_services'    => array(
			array(
				'title' => 'AI-Enabled Websites',
				'copy'  => 'Add smart customer answers for FAQs, booking details, service fit, and next steps.',
				'url'   => '/ai-enabled-websites/',
			),
			array(
				'title' => 'UGC Ads & Short Videos',
				'copy'  => 'Turn your services, proof, and common questions into short-form content ideas.',
				'url'   => '/ugc-ads-short-videos/',
			),
		),
		'cta_title'           => 'Ready for a website people can trust faster?',
		'cta_copy'            => 'Book a strategy call and we will talk through what the site needs to explain, what should be simplified, and what would make the biggest difference first.',
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
