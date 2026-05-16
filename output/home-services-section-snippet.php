<?php
add_action( 'wp_head', function () {
	if ( ! is_front_page() ) {
		return;
	}
	?>
<style id="dw-home-services-live-css">
	.dw-home-services-strip {
		position: relative;
		isolation: isolate;
		overflow: hidden;
		margin-top: clamp(-170px, -12vw, -92px);
		padding: clamp(68px, 7vw, 96px) 0 !important;
		background: linear-gradient(180deg, #ffffff 0%, #f4f9fb 100%);
		border-top: 1px solid rgba(0, 151, 167, 0.08);
		border-bottom: 1px solid rgba(0, 151, 167, 0.08);
	}

	.dw-home-services-strip::before {
		content: "";
		position: absolute;
		inset: 0;
		z-index: -1;
		background: linear-gradient(120deg, rgba(0, 151, 167, 0.055) 0 1px, transparent 1px 48px), radial-gradient(circle at 82% 18%, rgba(43, 192, 203, 0.16), transparent 28%);
		pointer-events: none;
	}

	.dw-home-services-inner {
		display: grid;
		grid-template-columns: minmax(280px, 0.78fr) minmax(0, 1.22fr);
		gap: clamp(36px, 6vw, 88px);
		width: min(92%, 1220px);
		max-width: 1220px;
		margin: 0 auto;
		align-items: start;
	}

	.dw-home-services-heading {
		position: relative;
	}

	.dw-home-services-eyebrow {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		margin: 0 0 18px !important;
		color: #007d8b !important;
		font-size: 0.8rem !important;
		font-weight: 800;
		letter-spacing: 0.16em;
		line-height: 1.2 !important;
		text-transform: uppercase;
	}

	.dw-home-services-eyebrow::before {
		content: "";
		width: 38px;
		height: 2px;
		border-radius: 999px;
		background: linear-gradient(90deg, #18c9c3, #2cbfef);
	}

	.dw-home-services-heading h2 {
		max-width: 430px;
		margin: 0 0 18px;
		color: #0b1d2f;
		font-family: "Roboto Condensed", "Roboto", sans-serif;
		font-size: clamp(2.5rem, 4.7vw, 4.8rem);
		font-weight: 800;
		letter-spacing: 0;
		line-height: 0.92;
		text-wrap: balance;
	}

	.dw-home-services-heading > p:last-child {
		max-width: 430px;
		margin: 0 !important;
		color: #42586a !important;
		font-size: clamp(1.05rem, 1.24vw, 1.18rem) !important;
		font-weight: 500;
		line-height: 1.72 !important;
	}

	.dw-home-services-visual {
		width: min(100%, 430px);
		margin-top: clamp(26px, 3.5vw, 42px);
	}

	.dw-home-services-visual img {
		display: block;
		width: 100%;
		height: auto;
		filter: saturate(1.04) drop-shadow(0 22px 36px rgba(8, 24, 36, 0.12));
	}

	.dw-home-services-list {
		display: grid;
		gap: 0;
		border-top: 1px solid rgba(8, 27, 43, 0.12);
	}

	.dw-home-service-row {
		display: grid;
		grid-template-columns: 64px minmax(0, 1fr) auto;
		gap: clamp(18px, 2.4vw, 32px);
		align-items: center;
		min-height: 146px;
		padding: clamp(24px, 3vw, 34px) 0;
		border-bottom: 1px solid rgba(8, 27, 43, 0.12);
		color: #0b1d2f !important;
		text-decoration: none !important;
		transition: color 0.22s ease, transform 0.22s ease, border-color 0.22s ease;
	}

	.dw-home-service-row:hover,
	.dw-home-service-row:focus-visible {
		color: #007d8b !important;
		border-color: rgba(0, 151, 167, 0.32);
		transform: translateX(6px);
	}

	.dw-home-service-row:focus-visible {
		outline: 3px solid rgba(0, 151, 167, 0.26);
		outline-offset: 6px;
	}

	.dw-home-service-number {
		color: rgba(0, 151, 167, 0.72);
		font-family: "Roboto Condensed", "Roboto", sans-serif;
		font-size: 1rem;
		font-weight: 800;
		letter-spacing: 0.1em;
	}

	.dw-home-service-copy {
		display: grid;
		gap: 10px;
	}

	.dw-home-service-copy strong {
		color: inherit;
		font-family: "Roboto Condensed", "Roboto", sans-serif;
		font-size: clamp(1.65rem, 2.2vw, 2.35rem);
		font-weight: 800;
		line-height: 0.98;
		letter-spacing: 0;
	}

	.dw-home-service-copy span {
		max-width: 620px;
		color: #526271;
		font-size: clamp(1rem, 1.1vw, 1.1rem);
		font-weight: 500;
		line-height: 1.62;
	}

	.dw-home-service-action {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-width: 82px;
		min-height: 38px;
		padding: 0 16px;
		border: 1px solid rgba(0, 151, 167, 0.24);
		border-radius: 999px;
		color: #007d8b;
		font-size: 0.88rem;
		font-weight: 800;
		line-height: 1;
		transition: background 0.22s ease, color 0.22s ease, border-color 0.22s ease;
	}

	.dw-home-service-row:hover .dw-home-service-action,
	.dw-home-service-row:focus-visible .dw-home-service-action {
		border-color: transparent;
		background: linear-gradient(135deg, #18c9c3, #2cbfef 58%, #6ee7b7);
		color: #ffffff;
	}

	@media (max-width: 980px) {
		.dw-home-services-inner {
			grid-template-columns: 1fr;
			gap: 30px;
		}

		.dw-home-services-heading {
			position: static;
		}

		.dw-home-services-heading h2,
		.dw-home-services-heading > p:last-child,
		.dw-home-services-visual {
			max-width: 760px;
		}

		.dw-home-services-visual {
			width: min(100%, 560px);
		}
	}

	@media (max-width: 640px) {
		.dw-home-services-strip {
			margin-top: 0;
			padding: 112px 0 58px !important;
		}

		.dw-home-service-row {
			grid-template-columns: 1fr;
			gap: 12px;
			min-height: 0;
			padding: 24px 0;
			transform: none !important;
		}

		.dw-home-service-action {
			justify-self: start;
		}

		.dw-home-services-visual {
			margin-top: 24px;
		}
	}
</style>
	<?php
}, 20 );

add_action( 'wp_footer', function () {
	if ( ! is_front_page() ) {
		return;
	}
	?>
<script id="dw-home-services-live-js">
	(function () {
		var services = [
			['01', 'Web Design', 'Fast, polished pages that make your offer clear and make it easier for visitors to trust you.', '/web-design/'],
			['02', 'AI-Enabled Websites', 'Smart website answers, guided intake, and helpful next steps built around how customers actually ask questions.', '/ai-enabled-websites/'],
			['03', 'UGC Ads & Short Videos', 'Short-form creative direction for Reels, TikToks, Shorts, and ad concepts that help people notice the business.', '/ugc-ads-short-videos/'],
			['04', 'Lead Flow', 'Simple forms, calls to action, and follow-up paths that turn interested visitors into cleaner conversations.', '/contact/']
		];
		var serviceImage = '<?php echo esc_js( get_template_directory_uri() . '/images/home/website%20services.png' ); ?>';

		function addReveal(node, delay, variant) {
			if (!node) {
				return;
			}

			node.classList.remove('dw-reveal-up', 'dw-reveal-left', 'dw-reveal-right');
			node.classList.add('dw-reveal', variant || 'dw-reveal-up');
			node.style.setProperty('--dw-reveal-delay', delay + 'ms');
		}

		function observeNodes(nodes) {
			if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
				Array.prototype.forEach.call(nodes, function (node) {
					node.classList.add('is-visible');
				});
				return;
			}

			if (!('IntersectionObserver' in window)) {
				Array.prototype.forEach.call(nodes, function (node) {
					node.classList.add('is-visible');
				});
				return;
			}

			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting) {
						return;
					}

					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				});
			}, { threshold: 0.16, rootMargin: '0px 0px -8% 0px' });

			Array.prototype.forEach.call(nodes, function (node) {
				observer.observe(node);
			});
		}

		function setupFrontPageFlyins() {
			if (!document.body || !document.body.classList.contains('home') || document.body.classList.contains('dw-live-front-flyins-ready')) {
				return;
			}

			document.body.classList.add('dw-live-front-flyins-ready');

			var sections = document.querySelectorAll(
				'.home .elementor-top-section:not(:first-of-type), ' +
				'.home .dw-premium-section, ' +
				'.home .dw-home-services-strip'
			);

			Array.prototype.forEach.call(sections, function (section, index) {
				addReveal(section, 0, index % 2 === 0 ? 'dw-reveal-left' : 'dw-reveal-right');

				Array.prototype.forEach.call(section.querySelectorAll(
					'.dw-home-services-heading, .dw-home-services-visual, .dw-home-service-row, ' +
					'.dw-showcase-copy, .dw-showcase-ui, .dw-featured-proof-media, .dw-featured-proof-copy, ' +
					'.dw-stat, .dw-process-step, .elementor-top-column, .elementor-column'
				), function (item, itemIndex) {
					addReveal(item, 70 + (itemIndex * 70), itemIndex % 2 === 0 ? 'dw-reveal-left' : 'dw-reveal-right');
				});
			});

			observeNodes(document.querySelectorAll('.home .dw-reveal'));
		}

		function init() {
			if (!document.body || !document.body.classList.contains('home') || document.querySelector('.dw-home-services-strip')) {
				return;
			}

			var hero = document.querySelector('.home .dw-premium-hero') ||
				document.querySelector('.home .elementor-top-section:first-of-type') ||
				document.querySelector('.home rs-module-wrap') ||
				document.querySelector('.home .rev_slider_wrapper');

			if (!hero || !hero.parentNode) {
				return;
			}

			var section = document.createElement('section');
			section.className = 'dw-home-services-strip dw-premium-section';
			section.setAttribute('aria-labelledby', 'dw-home-services-title');
			section.innerHTML =
				'<div class="dw-home-services-inner">' +
					'<div class="dw-home-services-heading">' +
						'<p class="dw-home-services-eyebrow">Services</p>' +
						'<h2 id="dw-home-services-title">What DigitWaves Can Build Next</h2>' +
						'<p>Pick the piece your business needs most right now, then connect it into one clear path from attention to inquiry.</p>' +
						'<div class="dw-home-services-visual" aria-hidden="true"><img src="' + serviceImage + '" alt=""></div>' +
					'</div>' +
					'<div class="dw-home-services-list">' +
						services.map(function (service) {
							return '<a class="dw-home-service-row" href="' + service[3] + '">' +
								'<span class="dw-home-service-number">' + service[0] + '</span>' +
								'<span class="dw-home-service-copy"><strong>' + service[1] + '</strong><span>' + service[2] + '</span></span>' +
								'<span class="dw-home-service-action" aria-hidden="true">View</span>' +
							'</a>';
						}).join('') +
					'</div>' +
				'</div>';

			hero.insertAdjacentElement('afterend', section);
			addReveal(section.querySelector('.dw-home-services-heading'), 40, 'dw-reveal-left');
			addReveal(section.querySelector('.dw-home-services-visual'), 90, 'dw-reveal-left');
			Array.prototype.forEach.call(section.querySelectorAll('.dw-home-service-row'), function (row, index) {
				addReveal(row, 90 + (index * 75), index % 2 === 0 ? 'dw-reveal-right' : 'dw-reveal-left');
			});
			setupFrontPageFlyins();
		}

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', init);
		} else {
			init();
		}

		window.addEventListener('load', init);
		window.addEventListener('load', function () {
			window.setTimeout(setupFrontPageFlyins, 400);
		});
	})();
</script>
	<?php
}, 20 );
