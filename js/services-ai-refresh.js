(function () {
    function getThemeAssetUrl(path) {
        var cleanPath = path.replace(/^\/+/, '');

        if (window.digitwavesTheme && window.digitwavesTheme.assetBaseUrl) {
            return window.digitwavesTheme.assetBaseUrl.replace(/\/?$/, '/') + cleanPath;
        }

        var scripts = document.querySelectorAll('script[src*="/js/services-ai-refresh.js"]');
        var script = scripts.length ? scripts[scripts.length - 1] : null;

        if (script && script.src) {
            return script.src.split('?')[0].replace('/js/services-ai-refresh.js', '/' + cleanPath);
        }

        return '/wp-content/themes/DigitWaves/' + cleanPath;
    }

    var aiServices = [
        {
            title: 'Smart Website Chatbots',
            description: 'Let visitors ask questions on your site and quickly find services, prices, FAQs, booking details, or next steps.',
            iconClasses: ['fas', 'fa-comments']
        },
        {
            title: 'Lead-Getting Ads',
            description: 'Create clear offers, landing pages, and Facebook or Instagram ad campaigns that help more people contact you.',
            iconClasses: ['fas', 'fa-bullhorn']
        },
        {
            title: 'Short-Form Content',
            description: 'Turn your business into simple posts, TikToks, Reels, and YouTube Shorts ideas that keep you visible online.',
            iconClasses: ['fas', 'fa-play-circle']
        }
    ];

    var originalTitles = [
        'web design',
        'custom solutions',
        'project management'
    ];

    var marketingCardLinks = [
        '/web-design/',
        '/ai-enabled-websites/',
        '/ugc-ads-short-videos/'
    ];

    var strategyCallBookingUrl = 'https://calendar.app.google/9zMzaHNicay1Za1GA';

    function normalizeText(value) {
        return (value || '').replace(/\s+/g, ' ').trim().toLowerCase();
    }

    function setButtonUrl(button, url) {
        if (!button || !url) {
            return;
        }

        button.setAttribute('href', url);
        button.setAttribute('target', '_blank');
        button.setAttribute('rel', 'noopener');
    }

    function getCardTitle(card) {
        var title = card.querySelector('.elementor-icon-box-title span') || card.querySelector('.elementor-icon-box-title');
        return title ? normalizeText(title.textContent) : '';
    }

    function setCardContent(card, content) {
        if (!card || !content) {
            return;
        }

        var title = card.querySelector('.elementor-icon-box-title span') || card.querySelector('.elementor-icon-box-title');
        var description = card.querySelector('.elementor-icon-box-description');
        var icon = card.querySelector('.elementor-icon i');

        if (title) {
            title.textContent = content.title;
        }

        if (description) {
            description.textContent = content.description;
        }

        if (icon) {
            icon.className = content.iconClasses.join(' ');
            icon.setAttribute('aria-hidden', 'true');
        }
    }

    function findHeading() {
        var headings = document.querySelectorAll('.elementor-heading-title');

        return Array.prototype.find.call(headings, function (heading) {
            return /design services/i.test(normalizeText(heading.textContent));
        }) || null;
    }

    function findServicesSection() {
        var exactSection = document.querySelector('section[data-id="688e12a"]');
        if (exactSection) {
            return exactSection;
        }

        var cards = document.querySelectorAll('.elementor-icon-box-wrapper');
        var matchingCards = Array.prototype.filter.call(cards, function (card) {
            return originalTitles.indexOf(getCardTitle(card)) !== -1;
        });

        if (matchingCards.length >= 2) {
            return matchingCards[0].closest('section');
        }

        var heading = findHeading();
        if (heading) {
            return heading.closest('section');
        }

        return null;
    }

    function updateHeading(section) {
        var heading = findHeading();
        if (!heading && section) {
            heading = section.querySelector('.elementor-heading-title');
        }

        if (!heading) {
            return;
        }

        heading.textContent = 'Simple Ways AI Can Help You Get More Customers';
        heading.classList.add('digitwaves-ai-services-heading');

        var container = heading.closest('.elementor-widget-container') || heading.parentElement;
        if (!container || container.querySelector('.digitwaves-ai-services-intro')) {
            return;
        }

        var intro = document.createElement('p');
        intro.className = 'digitwaves-ai-services-intro';
        intro.textContent = 'No tech lecture. Just practical help with getting seen, getting leads, answering customer questions, and following up faster.';
        container.appendChild(intro);
    }

    function updateServicesSection() {
        var servicesSection = findServicesSection();
        if (!servicesSection) {
            return false;
        }

        servicesSection.classList.add('digitwaves-ai-services-section');

        var cards = servicesSection.querySelectorAll('.elementor-icon-box-wrapper');
        if (!cards.length) {
            return false;
        }

        Array.prototype.forEach.call(cards, function (card, index) {
            if (index < aiServices.length) {
                setCardContent(card, aiServices[index]);
            }
        });

        updateHeading(servicesSection);
        return true;
    }

    function addRevealClass(node, variant, delay) {
        if (!node || node.classList.contains('dw-reveal')) {
            return;
        }

        node.classList.add('dw-reveal');

        if (variant) {
            node.classList.add(variant);
        }

        if (typeof delay === 'number' && !isNaN(delay)) {
            node.style.setProperty('--dw-reveal-delay', delay + 'ms');
        }
    }

    function revealNow(node) {
        if (!node) {
            return;
        }

        window.setTimeout(function () {
            node.classList.add('is-visible');
        }, 80);
    }

    function setupScrollReveal() {
        if (!document.body || document.body.classList.contains('dw-reveal-ready')) {
            return;
        }

        document.body.classList.add('dw-reveal-ready');

        var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var sections = document.querySelectorAll('.home .dw-premium-section');

        Array.prototype.forEach.call(sections, function (section) {
            addRevealClass(section, 'dw-reveal-up', 0);

            var heading = section.querySelector('.elementor-widget-heading');
            var intro = section.querySelector('.elementor-widget-text-editor');

            addRevealClass(heading, 'dw-reveal-up', 40);
            addRevealClass(intro, 'dw-reveal-up', 110);

            var stats = section.querySelectorAll('.dw-stat');
            Array.prototype.forEach.call(stats, function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 70 + (index * 70));
            });

            var serviceCards = section.querySelectorAll('.dw-service-card');
            Array.prototype.forEach.call(serviceCards, function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 80 + (index * 85));
            });

            var processSteps = section.querySelectorAll('.dw-process-step');
            Array.prototype.forEach.call(processSteps, function (item, index) {
                addRevealClass(item, index % 2 === 0 ? 'dw-reveal-left' : 'dw-reveal-right', 90 + (index * 90));
            });

            var proofItems = section.querySelectorAll('.dw-proof-list .elementor-icon-list-item');
            Array.prototype.forEach.call(proofItems, function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 80 + (index * 75));
            });

            var buttons = section.querySelectorAll('.elementor-button-wrapper, .dw-premium-button, .dw-premium-button-outline');
            Array.prototype.forEach.call(buttons, function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 120 + (index * 60));
            });
        });

        if (document.body.classList.contains('page-id-606')) {
            var aboutHeroMedia = document.querySelector('.dw-about-hero-media');
            var aboutHeroCopy = document.querySelector('.dw-about-hero-copy');
            var aboutStatement = document.querySelector('.dw-about-statement-title');

            addRevealClass(aboutHeroMedia, 'dw-reveal-left', 40);
            addRevealClass(aboutHeroCopy, 'dw-reveal-right', 120);
            addRevealClass(aboutStatement, 'dw-reveal-up', 60);
            revealNow(aboutHeroMedia);
            revealNow(aboutHeroCopy);
            revealNow(aboutStatement);
            addRevealClass(document.querySelector('.dw-about-story-copy-wrap'), 'dw-reveal-left', 60);
            addRevealClass(document.querySelector('.dw-about-story-media'), 'dw-reveal-right', 140);
            addRevealClass(document.querySelector('.dw-about-cta-title'), 'dw-reveal-up', 40);
            addRevealClass(document.querySelector('.dw-about-cta-copy'), 'dw-reveal-up', 100);
            addRevealClass(document.querySelector('.dw-about-cta .elementor-button-wrapper'), 'dw-reveal-up', 160);
            addRevealClass(document.querySelector('.dw-about-closeout-title'), 'dw-reveal-up', 60);
            addRevealClass(document.querySelector('.dw-about-closeout-copy'), 'dw-reveal-up', 120);
        }

        if (document.body.classList.contains('page-id-25')) {
            var serviceSections = document.querySelectorAll(
                '.page-id-25 .dw-services-hero, ' +
                '.page-id-25 .dw-services-intro, ' +
                '.page-id-25 .dw-services-lanes, ' +
                '.page-id-25 .dw-services-fit-check, ' +
                '.page-id-25 .dw-services-start, ' +
                '.page-id-25 .dw-services-ai-layer, ' +
                '.page-id-25 .dw-services-cta'
            );

            Array.prototype.forEach.call(serviceSections, function (section) {
                addRevealClass(section, 'dw-reveal-up', 0);
            });

            Array.prototype.forEach.call(document.querySelectorAll('.page-id-25 .dw-services-start-step'), function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 70 + (index * 80));
            });

            Array.prototype.forEach.call(document.querySelectorAll('.page-id-25 .dw-service-detail-card'), function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 90 + (index * 110));
            });

            addRevealClass(document.querySelector('.page-id-25 .dw-services-lanes-copy'), 'dw-reveal-left', 60);
            addRevealClass(document.querySelector('.page-id-25 .dw-services-lanes-art'), 'dw-reveal-right', 120);
            addRevealClass(document.querySelector('.page-id-25 .dw-services-fit-visual'), 'dw-reveal-left', 60);
            addRevealClass(document.querySelector('.page-id-25 .dw-services-fit-copy'), 'dw-reveal-right', 120);
            addRevealClass(document.querySelector('.page-id-25 .dw-services-ai-copy'), 'dw-reveal-left', 60);
            addRevealClass(document.querySelector('.page-id-25 .dw-services-ai-terms'), 'dw-reveal-right', 120);
        }

        if (document.querySelector('.dw-service-interior')) {
            var interiorSections = document.querySelectorAll(
                '.dw-service-interior-hero, ' +
                '.dw-service-interior .dw-service-section'
            );

            Array.prototype.forEach.call(interiorSections, function (section) {
                addRevealClass(section, 'dw-reveal-up', 0);
            });

            addRevealClass(document.querySelector('.dw-service-hero-copy'), 'dw-reveal-left', 40);
            addRevealClass(document.querySelector('.dw-service-hero-panel'), 'dw-reveal-right', 130);

            Array.prototype.forEach.call(document.querySelectorAll('.dw-service-actions .dw-service-button'), function (button, index) {
                addRevealClass(button, 'dw-reveal-up', 160 + (index * 60));
            });

            Array.prototype.forEach.call(document.querySelectorAll('.dw-service-section-heading'), function (heading, index) {
                addRevealClass(heading, 'dw-reveal-up', 40 + (index % 2 * 40));
            });

            Array.prototype.forEach.call(document.querySelectorAll('.dw-service-detail'), function (card, index) {
                addRevealClass(card, 'dw-reveal-up', 70 + (index % 3 * 75));
            });

            addRevealClass(document.querySelector('.dw-service-split-grid > div:first-child'), 'dw-reveal-left', 60);
            addRevealClass(document.querySelector('.dw-service-checklist'), 'dw-reveal-right', 130);

            Array.prototype.forEach.call(document.querySelectorAll('.dw-service-process-step'), function (step, index) {
                addRevealClass(step, index % 2 === 0 ? 'dw-reveal-left' : 'dw-reveal-right', 70 + (index * 70));
            });

            addRevealClass(document.querySelector('.dw-service-proof-copy'), 'dw-reveal-left', 60);
            addRevealClass(document.querySelector('.dw-service-proof-visual'), 'dw-reveal-right', 130);

            Array.prototype.forEach.call(document.querySelectorAll('.dw-service-related-card'), function (card, index) {
                addRevealClass(card, 'dw-reveal-up', 80 + (index * 80));
            });

            Array.prototype.forEach.call(document.querySelectorAll('.dw-service-faq-item'), function (item, index) {
                addRevealClass(item, 'dw-reveal-up', 70 + (index % 3 * 70));
            });

            addRevealClass(document.querySelector('.dw-service-final-cta .dw-service-narrow'), 'dw-reveal-up', 60);
        }

        var revealNodes = document.querySelectorAll('.dw-reveal');
        if (!revealNodes.length) {
            return;
        }

        if (prefersReducedMotion || !('IntersectionObserver' in window)) {
            Array.prototype.forEach.call(revealNodes, function (node) {
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
        }, {
            root: null,
            threshold: 0.16,
            rootMargin: '0px 0px -8% 0px'
        });

        Array.prototype.forEach.call(revealNodes, function (node) {
            observer.observe(node);
        });
    }

    function setupMobileMenuRefinement() {
        if (!document.body || document.body.classList.contains('dw-mobile-menu-ready')) {
            return;
        }

        var container = document.getElementById('rmp-container-846');
        var menuWrap = document.getElementById('rmp-menu-wrap-846');
        var menu = document.getElementById('rmp-menu-846');
        var trigger = document.getElementById('rmp_menu_trigger-846');

        if (!container || !menuWrap || !menu || !trigger) {
            return;
        }

        document.body.classList.add('dw-mobile-menu-ready');

        var links = menuWrap.querySelectorAll('.rmp-menu-item-link');
        Array.prototype.forEach.call(links, function (link, index) {
            link.style.setProperty('--dw-menu-delay', (70 + (index * 55)) + 'ms');
        });

        function isMenuOpen() {
            var triggerExpanded = trigger.getAttribute('aria-expanded') === 'true';
            var triggerActive = trigger.classList.contains('is-active') ||
                trigger.classList.contains('rmp-menu-trigger-open');
            var containerOpen = container.classList.contains('rmp-menu-open') ||
                menuWrap.classList.contains('rmp-menu-open') ||
                menu.classList.contains('rmp-menu-open');

            return triggerExpanded || triggerActive || containerOpen;
        }

        function syncMenuState() {
            var isOpen = isMenuOpen();
            document.body.classList.toggle('dw-mobile-menu-open', isOpen);
        }

        syncMenuState();

        if ('MutationObserver' in window) {
            var observer = new MutationObserver(syncMenuState);
            observer.observe(container, {
                attributes: true,
                attributeFilter: ['class', 'style', 'aria-hidden']
            });
            observer.observe(trigger, {
                attributes: true,
                attributeFilter: ['class', 'style', 'aria-expanded']
            });
        }

        window.addEventListener('resize', syncMenuState);
        window.addEventListener('orientationchange', syncMenuState);
        window.setTimeout(syncMenuState, 120);
        window.setTimeout(syncMenuState, 420);
    }

    function setupWorkPage() {
        if (!document.body || !document.body.classList.contains('page-id-1024') || document.body.classList.contains('dw-work-page-ready')) {
            return;
        }

        var root = document.querySelector('.page-id-1024 .elementor-1024') || document.querySelector('.elementor-1024');
        if (!root) {
            return;
        }

        document.body.classList.add('dw-work-page-ready');

        var sections = root.querySelectorAll('.elementor-top-section');
        if (!sections.length) {
            return;
        }

        sections[0].classList.add('dw-work-hero');

        Array.prototype.forEach.call(sections, function (section, index) {
            if (index === 0) {
                return;
            }

            var container = section.querySelector(':scope > .elementor-container') ||
                section.querySelector(':scope > .elementor-row') ||
                section.firstElementChild;

            if (!container || !container.children || !container.children.length) {
                return;
            }

            var columns = Array.prototype.filter.call(container.children, function (child) {
                return child.classList.contains('elementor-column') || child.classList.contains('elementor-top-column');
            });

            if (columns.length < 2) {
                return;
            }

            section.classList.add('dw-work-grid');

            columns.forEach(function (column) {
                column.classList.add('dw-work-card');
            });
        });
    }

    function setupServicesPage() {
        if (!document.body || !document.body.classList.contains('page-id-25') || document.body.classList.contains('dw-services-page-ready')) {
            return;
        }

        document.body.classList.add('dw-services-page-ready');

        var pageRoot = document.querySelector('.page-id-25 .elementor-25') || document.querySelector('.elementor-25');
        if (!pageRoot) {
            return;
        }

        var sections = pageRoot.querySelectorAll('.elementor-top-section');
        if (!sections.length) {
            return;
        }

        var aiSection = findServicesSection();
        if (aiSection) {
            aiSection.classList.add('dw-services-primary');
        }

        Array.prototype.forEach.call(sections, function (section, index) {
            var text = normalizeText(section.textContent || '');

            if (index === 0) {
                section.classList.add('dw-services-hero');
            }

            if (/featured portfolio site|gt real estate|gold titan real estate/.test(text)) {
                section.classList.add('dw-services-legacy-hide');
            }

            if (/digit waves services/.test(text) && !section.classList.contains('digitwaves-ai-services-section')) {
                section.classList.add('dw-services-legacy-hide');
            }

            if (/leave a message|contact you immediately/.test(text)) {
                section.classList.add('dw-services-legacy-hide');
            }

            if (/development process|hand crafted by digit waves/.test(text)) {
                section.classList.add('dw-services-secondary');
            }
        });
    }

    function setupContactPage() {
        if (!document.body || !document.body.classList.contains('page-id-22') || document.body.classList.contains('dw-contact-page-ready')) {
            return;
        }

        document.body.classList.add('dw-contact-page-ready');

        var pageRoot = document.querySelector('.page-id-22 .elementor-22') || document.querySelector('.elementor-22');
        if (!pageRoot) {
            return;
        }

        var sections = pageRoot.querySelectorAll('.elementor-top-section');
        if (!sections.length) {
            return;
        }

        sections[0].classList.add('dw-contact-hero');

        Array.prototype.forEach.call(sections, function (section) {
            if (section.querySelector('.elementor-widget-google_maps') || section.querySelector('.wpforms-container')) {
                section.classList.add('dw-contact-action');
            }
        });
    }

    function setupHomepageMarketingTrust() {
        if (!document.body || !document.body.classList.contains('home')) {
            return;
        }

        var firstCard = document.querySelector('.home .dw-premium-trust .dw-stat');
        var section = firstCard ? firstCard.closest('.dw-premium-trust') : document.querySelector('.home .dw-premium-trust');
        if (!section) {
            return;
        }

        document.body.classList.add('dw-home-trust-copy-ready');

        var heading = section.querySelector('.dw-trust-title .elementor-heading-title') ||
            section.querySelector('.elementor-widget-heading .elementor-heading-title');

        if (heading) {
            heading.textContent = 'Practical Marketing Support for Busy Local Teams';

            var headingContainer = heading.closest('.elementor-widget-container') || heading.parentElement;
            if (headingContainer && !headingContainer.querySelector('.dw-trust-intro')) {
                var intro = document.createElement('p');
                intro.className = 'dw-trust-intro';
                intro.textContent = 'AI marketing for small businesses should make it easier to get noticed, answer customer questions, and turn website visitors into real leads.';
                headingContainer.appendChild(intro);
            }
        }

        var cards = [
            {
                title: 'Web Design That Wins Trust',
                description: 'Give people a clear, polished website that explains what you offer and makes it easy to contact you.',
                iconClass: 'fas fa-laptop-code',
                href: marketingCardLinks[0]
            },
            {
                title: 'AI-Enabled Websites',
                description: 'Add a smart chatbot so visitors can quickly look up services, FAQs, pricing, booking details, and next steps.',
                iconClass: 'fas fa-comments',
                href: marketingCardLinks[1]
            },
            {
                title: 'UGC Ads & Short Videos',
                description: 'Create simple ad ideas, TikToks, Reels, and YouTube Shorts that help more people notice your business.',
                iconClass: 'fas fa-video',
                href: marketingCardLinks[2]
            }
        ];

        var stats = document.querySelectorAll('.home .dw-premium-trust .dw-stat');
        Array.prototype.forEach.call(stats, function (stat, index) {
            var copy = cards[index];
            if (!copy) {
                return;
            }

            stat.classList.add('dw-market-card');
            stat.setAttribute('data-market-card', String(index + 1));
            stat.setAttribute('data-market-href', copy.href);
            stat.setAttribute('role', 'link');
            stat.setAttribute('tabindex', '0');
            stat.setAttribute('aria-label', copy.title + ' - learn more');

            var title = stat.querySelector('.elementor-heading-title') || stat.querySelector('h3') || stat.querySelector('h4');
            var text = stat.querySelector('.elementor-text-editor p') || stat.querySelector('.elementor-widget-text-editor p') || stat.querySelector('p');
            var imageBox = stat.querySelector('.elementor-image');
            var imageWidget = stat.querySelector('.elementor-widget-image');

            if (title) {
                title.textContent = copy.title;
            }

            if (text) {
                text.textContent = copy.description;
            }

            if (imageBox && !imageBox.querySelector('.dw-market-icon')) {
                imageBox.innerHTML = '<i class="' + copy.iconClass + ' dw-market-icon" aria-hidden="true"></i>';
            } else if (imageWidget && !imageWidget.querySelector('.dw-market-icon')) {
                var container = imageWidget.querySelector('.elementor-widget-container') || imageWidget;
                container.innerHTML = '<div class="elementor-image"><i class="' + copy.iconClass + ' dw-market-icon" aria-hidden="true"></i></div>';
            }

            var cardLink = stat.querySelector('.dw-market-card-link');
            if (!cardLink) {
                cardLink = document.createElement('a');
                cardLink.className = 'dw-market-card-link';
                stat.appendChild(cardLink);
            }
            cardLink.href = copy.href;
            cardLink.setAttribute('aria-label', copy.title + ' - learn more');

            var clickTargets = [
                stat,
                stat.querySelector(':scope > .elementor-element-populated'),
                stat.querySelector(':scope > .elementor-column-wrap'),
                stat.querySelector(':scope > .elementor-widget-container'),
                stat.querySelector(':scope > .elementor-widget-wrap')
            ];

            function openCardTarget(event) {
                if (event.target.closest('a, button, input, select, textarea') && !event.target.closest('.dw-market-card-link')) {
                    return;
                }
                var href = stat.getAttribute('data-market-href');
                if (href) {
                    window.location.assign(href);
                }
            }

            Array.prototype.forEach.call(clickTargets, function (target) {
                if (!target || target.dataset.marketDirectLinkReady) {
                    return;
                }
                target.dataset.marketDirectLinkReady = 'true';
                target.setAttribute('data-market-href', copy.href);
                target.addEventListener('click', openCardTarget, true);
            });

            if (!stat.dataset.marketLinkReady) {
                stat.dataset.marketLinkReady = 'true';
                stat.addEventListener('click', function (event) {
                    if (event.target.closest('a, button, input, select, textarea')) {
                        return;
                    }
                    window.location.href = stat.getAttribute('data-market-href');
                });
                stat.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        window.location.href = stat.getAttribute('data-market-href');
                    }
                });
            }
        });
    }

    function setupHomepageProofSection() {
        if (!document.body || !document.body.classList.contains('home')) {
            return;
        }

        var section = document.querySelector('.home .dw-premium-proof');
        if (!section) {
            return;
        }

        section.classList.add('dw-market-proof');

        var heading = section.querySelector('.elementor-heading-title');
        if (heading) {
            heading.textContent = 'Marketing That Fits the Way You Work';
        }

        var leftColumn = section.querySelector('.elementor-top-column:first-child') ||
            section.querySelector('.elementor-column:first-child');
        var paragraphs = leftColumn ?
            leftColumn.querySelectorAll('.elementor-widget-text-editor p, .elementor-text-editor p, p') :
            [];

        if (paragraphs[0]) {
            paragraphs[0].textContent = 'DigitWaves helps turn your website, content, and follow-up into a clearer path from first glance to booked conversation.';
        }

        if (paragraphs.length > 1 && paragraphs[paragraphs.length - 1]) {
            paragraphs[paragraphs.length - 1].textContent = 'The result is marketing that feels easier to trust, easier to find, and easier to act on.';
        }

        var rightColumn = section.querySelector('.elementor-top-column:last-child') ||
            section.querySelector('.elementor-column:last-child');
        var rightWrap = rightColumn ? (
            rightColumn.querySelector('.elementor-widget-wrap') ||
            rightColumn.querySelector('.elementor-column-wrap') ||
            rightColumn.querySelector('.elementor-element-populated') ||
            rightColumn
        ) : null;

        if (rightWrap && !rightWrap.querySelector('.dw-market-proof-visual')) {
            rightWrap.innerHTML =
                '<div class="dw-market-proof-visual">' +
                    '<img src="' + getThemeAssetUrl('images/home/dw-marketing-fit-visual.png') + '" alt="AI marketing for small businesses with website content, customer answers, and lead follow-up">' +
                '</div>';
        }
    }

    function setupHomepageMarketingShowcase() {
        if (!document.body || !document.body.classList.contains('home')) {
            return;
        }

        var sections = document.querySelectorAll('.home .dw-premium-services');
        if (!sections.length) {
            return;
        }

        var showcaseSection = null;

        Array.prototype.some.call(sections, function (section) {
            var heading = section.querySelector('.elementor-heading-title');
            var text = normalizeText(heading ? heading.textContent : '');

            if (/see what better marketing|what we build/.test(text)) {
                showcaseSection = section;
                return true;
            }

            return false;
        });

        if (!showcaseSection) {
            showcaseSection = sections[0];
        }

        if (showcaseSection.classList.contains('dw-marketing-showcase')) {
            return;
        }

        var nextSection = showcaseSection.nextElementSibling;
        if (nextSection && nextSection.classList.contains('dw-premium-services')) {
            nextSection.classList.add('dw-marketing-showcase-hidden');
        }

        showcaseSection.classList.add('dw-marketing-showcase');

        var container = showcaseSection.querySelector('.elementor-container') ||
            showcaseSection.querySelector('.elementor-row') ||
            showcaseSection;

        container.innerHTML =
            '<div class="dw-showcase-copy">' +
                '<p class="dw-showcase-eyebrow">Marketing that feels alive</p>' +
                '<h2>Turn Website Visitors Into Real Leads</h2>' +
                '<p class="dw-showcase-lede">Give people a clear offer, useful answers, strong visuals, and an easy next step before their attention disappears.</p>' +
                '<div class="dw-showcase-actions">' +
                    '<a class="dw-showcase-button" href="/contact/">Plan My Lead Flow</a>' +
                    '<span>Website design • Short videos • Smart answers • Follow-up</span>' +
                '</div>' +
            '</div>' +
            '<div class="dw-showcase-ui" aria-label="Animated marketing website preview">' +
                '<div class="dw-ui-browser">' +
                    '<div class="dw-ui-topbar"><span></span><span></span><span></span></div>' +
                    '<div class="dw-ui-hero">' +
                        '<div class="dw-ui-badge">Local offer</div>' +
                        '<div class="dw-ui-title"></div>' +
                        '<div class="dw-ui-line dw-ui-line-short"></div>' +
                        '<div class="dw-ui-cta"></div>' +
                    '</div>' +
                    '<div class="dw-ui-grid">' +
                        '<div class="dw-ui-card dw-ui-card-video"><div class="dw-ui-play"></div><div></div><div></div></div>' +
                        '<div class="dw-ui-card dw-ui-card-chat"><div></div><div></div><div></div></div>' +
                        '<div class="dw-ui-card dw-ui-card-lead"><div></div><div></div><div></div></div>' +
                    '</div>' +
                    '<div class="dw-ui-flow">' +
                        '<span></span><span></span><span></span><span></span>' +
                    '</div>' +
                '</div>' +
                '<div class="dw-ui-float dw-ui-float-chat">Question answered</div>' +
                '<div class="dw-ui-float dw-ui-float-lead">New lead ready</div>' +
                '<div class="dw-ui-float dw-ui-float-growth">More people noticed</div>' +
            '</div>';
    }

    function setupHomepageCtaSection() {
        if (!document.body || !document.body.classList.contains('home')) {
            return;
        }

        var section = document.querySelector('.home .dw-premium-cta');
        if (!section) {
            return;
        }

        var heading = section.querySelector('.elementor-heading-title');
        if (heading) {
            heading.textContent = 'Ready to Make Your Marketing Easier?';
        }

        var paragraph = section.querySelector('.elementor-widget-text-editor p, .elementor-text-editor p, p');
        if (paragraph) {
            paragraph.textContent = 'Let us help you sharpen your website, create content people notice, and turn more interested visitors into real conversations.';
        }

        var buttonText = section.querySelector('.elementor-button-text');
        if (buttonText) {
            buttonText.textContent = 'Book a Strategy Call';
        }

        var button = section.querySelector('a.elementor-button, .elementor-button-wrapper a');
        setButtonUrl(button, strategyCallBookingUrl);
    }

    function setupHomepageStrategyCallButtons() {
        if (!document.body || !document.body.classList.contains('home')) {
            return;
        }

        Array.prototype.forEach.call(document.querySelectorAll('a.elementor-button, a.rev-btn, .n2-ss-button-container a'), function (button) {
            var text = normalizeText(button.textContent);

            if (/book a strategy call|strategy call/.test(text)) {
                setButtonUrl(button, strategyCallBookingUrl);
            }
        });
    }

    function getMarketingCardTarget(card) {
        if (!card || !card.classList || !card.classList.contains('dw-stat')) {
            return '';
        }

        var explicitTarget = card.getAttribute('data-market-href');
        if (explicitTarget) {
            return explicitTarget;
        }

        var cards = Array.prototype.filter.call(
            document.querySelectorAll('.home .dw-premium-trust .dw-stat'),
            function (item) {
                return item.offsetParent !== null;
            }
        );
        var index = cards.indexOf(card);

        return marketingCardLinks[index] || '';
    }

    function setupHomepageMarketingCardNavigation() {
        if (window.dwMarketingCardNavigationReady) {
            return;
        }

        window.dwMarketingCardNavigationReady = true;

        document.addEventListener('click', function (event) {
            if (!document.body || !document.body.classList.contains('home')) {
                return;
            }

            if (event.target.closest('a, button, input, select, textarea') && !event.target.closest('.dw-stat')) {
                return;
            }

            var card = event.target.closest('.home .dw-premium-trust .dw-stat');
            var target = getMarketingCardTarget(card);

            if (target) {
                event.preventDefault();
                window.location.assign(target);
            }
        }, true);

        document.addEventListener('keydown', function (event) {
            if (!document.body || !document.body.classList.contains('home')) {
                return;
            }

            if (event.key !== 'Enter' && event.key !== ' ') {
                return;
            }

            var card = event.target.closest('.home .dw-premium-trust .dw-stat');
            var target = getMarketingCardTarget(card);

            if (target) {
                event.preventDefault();
                window.location.assign(target);
            }
        }, true);
    }

    function boot(attempt) {
        var isReady = updateServicesSection();

        setupScrollReveal();
        setupMobileMenuRefinement();
        setupWorkPage();
        setupServicesPage();
        setupContactPage();
        setupHomepageMarketingCardNavigation();
        setupHomepageMarketingTrust();
        setupHomepageMarketingShowcase();
        setupHomepageProofSection();
        setupHomepageCtaSection();
        setupHomepageStrategyCallButtons();

        if (!isReady && attempt < 24) {
            window.setTimeout(function () {
                boot(attempt + 1);
            }, 300);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            boot(0);
        });
    } else {
        boot(0);
    }

    window.addEventListener('load', function () {
        boot(0);
    });
})();
