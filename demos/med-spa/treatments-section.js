(function () {
    'use strict';

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    /* ── Stagger delay map ──────────────────────────────────
       intro=0ms, card01=80ms, cards02-05 +160ms each
    ──────────────────────────────────────────────────────── */
    function staggerDelay(n) {
        if (n === 0) return 0;
        return 80 + (n - 1) * 160;
    }

    /* ── Scroll reveal via IntersectionObserver ──────────── */
    function initReveal() {
        var els = document.querySelectorAll('.treatments-section .reveal-on-scroll');
        if (!els.length) return;

        if (reducedMotion.matches || !('IntersectionObserver' in window)) {
            els.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var n = parseInt(el.dataset.stagger, 10) || 0;
                el.style.transitionDelay = staggerDelay(n) + 'ms';
                el.classList.add('is-visible');
                observer.unobserve(el);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

        els.forEach(function (el) { observer.observe(el); });
    }

    /* ── 3D tilt + numeral parallax ─────────────────────── */
    function initTilt() {
        if (reducedMotion.matches) return;

        var cards = document.querySelectorAll('.treatments-section .treatment-card');

        cards.forEach(function (card, idx) {
            var numeral = card.querySelector('.treatment-num-display');
            /* Card 05 numeral is centered via translate(-50%,-50%);
               parallax offsets must be added on top of that base. */
            var isCentered = numeral && numeral.dataset.centered === 'true';

            function applyTilt(e) {
                /* Only tilt once the card has revealed */
                if (!card.classList.contains('is-visible')) return;

                var rect = card.getBoundingClientRect();
                var cx = rect.left + rect.width / 2;
                var cy = rect.top + rect.height / 2;
                var dx = e.clientX - cx;
                var dy = e.clientY - cy;

                /* Clamp rotation to ±4 degrees */
                var maxAngle = 4;
                var rotX = -((dy / (rect.height / 2)) * maxAngle);
                var rotY = (dx / (rect.width / 2)) * maxAngle;

                /* Cards 02–05 also lift 3px; card 01 stays flat */
                var lift = (idx === 0) ? 0 : -3;

                card.style.transition = 'transform 60ms linear, box-shadow 60ms linear';
                card.style.transform =
                    'perspective(800px) rotateX(' + rotX + 'deg) rotateY(' + rotY + 'deg) translateY(' + lift + 'px)';

                /* Sage glow on card 01; subtle shadow on others */
                if (idx === 0) {
                    card.style.boxShadow = '0 20px 60px rgba(143,168,138,0.18)';
                }

                /* Numeral parallax — moves opposite to tilt */
                if (numeral) {
                    var nx = -(rotY * 1.8);
                    var ny = -(rotX * 1.8);
                    numeral.style.transition = 'transform 60ms linear';
                    if (isCentered) {
                        numeral.style.transform =
                            'translate(calc(-50% + ' + nx + 'px), calc(-50% + ' + ny + 'px))';
                    } else {
                        numeral.style.transform =
                            'translate(' + nx + 'px, ' + ny + 'px)';
                    }
                }
            }

            function resetTilt() {
                card.style.transition = 'transform 400ms ease, box-shadow 400ms ease';
                card.style.transform =
                    'perspective(800px) rotateX(0deg) rotateY(0deg) translateY(0px)';
                card.style.boxShadow = '';

                if (numeral) {
                    numeral.style.transition = 'transform 400ms ease';
                    numeral.style.transform = isCentered
                        ? 'translate(-50%, -50%)'
                        : 'translate(0px, 0px)';
                }
            }

            card.addEventListener('mousemove', applyTilt);
            card.addEventListener('mouseleave', resetTilt);
        });
    }

    /* ── Init ─────────────────────────────────────────────── */
    function init() {
        initReveal();
        initTilt();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
}());
