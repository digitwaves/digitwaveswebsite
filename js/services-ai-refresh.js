(function () {
    var aiServices = [
        {
            title: 'AI Experience Design',
            description: 'Craft intelligent web experiences with conversational flows, adaptive content, and UX built for discovery.',
            iconClasses: ['fas', 'fa-brain']
        },
        {
            title: 'Custom AI Integrations',
            description: 'Connect assistants, knowledge bases, and business tools into one seamless system your team can actually use.',
            iconClasses: ['fas', 'fa-robot']
        },
        {
            title: 'Intelligent Automation',
            description: 'Automate repetitive tasks, reporting, and handoffs so your operation moves faster with less manual overhead.',
            iconClasses: ['fas', 'fa-project-diagram']
        }
    ];

    var originalTitles = [
        'web design',
        'custom solutions',
        'project management'
    ];

    function normalizeText(value) {
        return (value || '').replace(/\s+/g, ' ').trim().toLowerCase();
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

        heading.textContent = 'AI Services';
        heading.classList.add('digitwaves-ai-services-heading');

        var container = heading.closest('.elementor-widget-container') || heading.parentElement;
        if (!container || container.querySelector('.digitwaves-ai-services-intro')) {
            return;
        }

        var intro = document.createElement('p');
        intro.className = 'digitwaves-ai-services-intro';
        intro.textContent = 'From AI-powered websites to smart automation, we build digital systems that help teams move faster, personalize better, and scale with clarity.';
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

    function boot(attempt) {
        var isReady = updateServicesSection();

        setupScrollReveal();
        setupMobileMenuRefinement();

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
