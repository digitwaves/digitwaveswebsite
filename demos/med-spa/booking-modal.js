/* ==========================================================================
   Aurelle Aesthetic Studio — Multi-step Mock Booking Modal
   Replaces the inner content of #concept-modal with a 6-step booking flow.
   Form fields are visual only — nothing is collected, stored, or sent.
   ========================================================================== */

(function () {
    'use strict';

    function init() {
        var modal = document.getElementById('concept-modal');
        if (!modal || modal.dataset.bkReady === '1') return;
        modal.dataset.bkReady = '1';

        // ---------- Data ----------
        var services = [
            { id: 'skin',       name: 'Skin Therapies',         desc: 'Facials, peels, and resurfacing rituals',          price: 'from $180' },
            { id: 'injectable', name: 'Injectable Refinement',  desc: 'Neuromodulators and dermal volume restoration',    price: 'from $350' },
            { id: 'laser',      name: 'Energy & Laser',         desc: 'Morpheus8, BBL, and laser refinement',             price: 'from $420' },
            { id: 'body',       name: 'Body Contouring',        desc: 'Non-invasive sculpting and skin tightening',       price: 'from $300' },
            { id: 'regen',      name: 'Regenerative Aesthetics',desc: 'PRP, exosome therapy, and wellness infusions',     price: 'from $250' }
        ];

        var times = [
            { label: '9:00 AM',  booked: false },
            { label: '10:30 AM', booked: true  },
            { label: '12:00 PM', booked: false },
            { label: '1:30 PM',  booked: false },
            { label: '3:00 PM',  booked: true  },
            { label: '4:30 PM',  booked: false }
        ];

        var practitioners = [
            { id: 'lena',  label: 'Dr. Lena Hart',       role: 'Injectables Lead' },
            { id: 'maya',  label: 'Maya Okonkwo, RN',    role: 'Laser & Skin' },
            { id: 'priya', label: 'Dr. Priya Anand',     role: 'Regenerative Aesthetics' },
            { id: 'any',   label: 'No preference',       role: 'First available' }
        ];

        // Hardcoded "fully booked" days per "year-monthIndex" so the calendar feels real
        var fullyBooked = {
            '2026-4': [20, 22, 27, 29],   // May 2026
            '2026-5': [3, 9, 11, 18, 24], // June 2026
            '2026-6': [1, 7, 14, 22]      // July 2026
        };

        var monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        var TOTAL_STEPS = 6;
        var MAX_MONTHS_AHEAD = 3;

        // Calendar view origin = first day of the user's current month
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var minYear = today.getFullYear();
        var minMonth = today.getMonth();

        var state = {
            step: 1,
            service: null,
            date: null,        // 'year-month-day'
            time: null,
            practitioner: null,
            viewYear: minYear,
            viewMonth: minMonth
        };

        // ---------- Replace modal content ----------
        modal.innerHTML =
            '<div class="bk-modal">' +
                '<header class="bk-header">' +
                    '<span class="bk-leaf" aria-hidden="true">' +
                        '<svg viewBox="0 0 44 60" xmlns="http://www.w3.org/2000/svg">' +
                            '<line x1="22" y1="2" x2="22" y2="10" stroke="#2A2E28" stroke-width="2" stroke-linecap="round"/>' +
                            '<path d="M 22 10 C 34 16, 37 27, 35 40 C 33 53, 25 58, 22 58 C 19 58, 11 53, 9 40 C 7 27, 10 16, 22 10 Z" fill="#2A2E28"/>' +
                        '</svg>' +
                    '</span>' +
                    '<h2 class="bk-title" id="modal-title">Book a Consultation</h2>' +
                    '<span class="bk-demo-pill" aria-label="Concept demo">CONCEPT DEMO</span>' +
                    '<button type="button" class="bk-close" aria-label="Close booking dialog">✕</button>' +
                '</header>' +
                '<div class="bk-progress" id="bk-progress" role="group" aria-label="Booking progress"></div>' +
                '<div class="bk-body" id="bk-body"></div>' +
            '</div>';

        var bodyEl = modal.querySelector('#bk-body');
        var progressEl = modal.querySelector('#bk-progress');
        var closeBtn = modal.querySelector('.bk-close');

        // Build progress segments
        for (var i = 1; i <= TOTAL_STEPS; i++) {
            var seg = document.createElement('span');
            seg.className = 'bk-progress-seg';
            seg.setAttribute('data-seg', String(i));
            progressEl.appendChild(seg);
        }

        // ---------- Helpers ----------
        function updateProgress() {
            var segs = progressEl.querySelectorAll('.bk-progress-seg');
            for (var i = 0; i < segs.length; i++) {
                if (i < state.step) segs[i].classList.add('filled');
                else segs[i].classList.remove('filled');
            }
            progressEl.setAttribute('aria-label', 'Step ' + state.step + ' of ' + TOTAL_STEPS);
        }

        function focusFirst() {
            if (!modal.open) return;
            var f = bodyEl.querySelector('button:not([disabled]), input, a[href], [tabindex]:not([tabindex="-1"])');
            if (f) f.focus();
        }

        function makeActionsRow(opts) {
            var wrap = document.createElement('div');
            wrap.className = 'bk-actions' + (opts.end ? ' end' : '');

            if (opts.backFn) {
                var back = document.createElement('button');
                back.type = 'button';
                back.className = 'bk-btn bk-btn-ghost';
                back.textContent = '← Back';
                back.addEventListener('click', opts.backFn);
                wrap.appendChild(back);
            } else if (opts.continueFn) {
                // Spacer so Continue is right-aligned when no Back
                var spacer = document.createElement('span');
                wrap.appendChild(spacer);
            }

            if (opts.continueFn) {
                var cont = document.createElement('button');
                cont.type = 'button';
                cont.className = 'bk-btn bk-btn-primary';
                cont.textContent = opts.continueLabel || 'Continue';
                cont.disabled = !opts.continueEnabled;
                cont.addEventListener('click', opts.continueFn);
                wrap.appendChild(cont);
            }
            return wrap;
        }

        function go(step) {
            state.step = step;
            render();
        }

        function render() {
            updateProgress();
            bodyEl.innerHTML = '';
            switch (state.step) {
                case 1: renderService(); break;
                case 2: renderDate(); break;
                case 3: renderTime(); break;
                case 4: renderPractitioner(); break;
                case 5: renderDetails(); break;
                case 6: renderReveal(); break;
            }
            focusFirst();
        }

        // ---------- Step 1: Service ----------
        function renderService() {
            var step = document.createElement('div');
            step.className = 'bk-step';
            step.innerHTML = '<h3 class="bk-step-heading">Which treatment interests you?</h3>';

            var list = document.createElement('div');
            list.className = 'bk-card-list';

            var actions = makeActionsRow({
                continueFn: function () { go(2); },
                continueEnabled: !!state.service
            });
            var contBtn = actions.querySelector('.bk-btn-primary');

            services.forEach(function (svc) {
                var card = document.createElement('button');
                card.type = 'button';
                card.className = 'bk-card' + (state.service === svc.id ? ' selected' : '');
                card.setAttribute('aria-pressed', state.service === svc.id ? 'true' : 'false');
                card.innerHTML =
                    '<span class="bk-card-name"></span>' +
                    '<span class="bk-card-desc"></span>' +
                    '<span class="bk-card-price"></span>';
                card.querySelector('.bk-card-name').textContent = svc.name;
                card.querySelector('.bk-card-desc').textContent = svc.desc;
                card.querySelector('.bk-card-price').textContent = svc.price;

                card.addEventListener('click', function () {
                    state.service = svc.id;
                    var cards = list.querySelectorAll('.bk-card');
                    for (var i = 0; i < cards.length; i++) {
                        cards[i].classList.remove('selected');
                        cards[i].setAttribute('aria-pressed', 'false');
                    }
                    card.classList.add('selected');
                    card.setAttribute('aria-pressed', 'true');
                    contBtn.disabled = false;
                });
                list.appendChild(card);
            });

            step.appendChild(list);
            step.appendChild(actions);
            bodyEl.appendChild(step);
        }

        // ---------- Step 2: Date ----------
        function renderDate() {
            var step = document.createElement('div');
            step.className = 'bk-step';
            step.innerHTML = '<h3 class="bk-step-heading">Select a date</h3>';

            var head = document.createElement('div');
            head.className = 'bk-cal-head';

            var prev = document.createElement('button');
            prev.type = 'button';
            prev.className = 'bk-cal-nav';
            prev.innerHTML = '←';
            prev.setAttribute('aria-label', 'Previous month');

            var label = document.createElement('span');
            label.className = 'bk-cal-month';
            label.setAttribute('aria-live', 'polite');

            var next = document.createElement('button');
            next.type = 'button';
            next.className = 'bk-cal-nav';
            next.innerHTML = '→';
            next.setAttribute('aria-label', 'Next month');

            head.appendChild(prev);
            head.appendChild(label);
            head.appendChild(next);
            step.appendChild(head);

            var gridWrap = document.createElement('div');
            step.appendChild(gridWrap);

            var actions = makeActionsRow({
                backFn: function () { go(1); },
                continueFn: function () { go(3); },
                continueEnabled: !!state.date
            });
            var contBtn = actions.querySelector('.bk-btn-primary');
            step.appendChild(actions);

            bodyEl.appendChild(step);

            function paint() {
                label.textContent = monthNames[state.viewMonth] + ' ' + state.viewYear;
                prev.disabled = (state.viewYear === minYear && state.viewMonth === minMonth);

                var monthsAhead = (state.viewYear - minYear) * 12 + (state.viewMonth - minMonth);
                next.disabled = monthsAhead >= MAX_MONTHS_AHEAD;

                gridWrap.innerHTML = '';
                var grid = document.createElement('div');
                grid.className = 'bk-cal-grid';

                ['Su','Mo','Tu','We','Th','Fr','Sa'].forEach(function (d) {
                    var dw = document.createElement('div');
                    dw.className = 'bk-cal-dow';
                    dw.textContent = d;
                    grid.appendChild(dw);
                });

                var firstDay = new Date(state.viewYear, state.viewMonth, 1).getDay();
                var daysInMonth = new Date(state.viewYear, state.viewMonth + 1, 0).getDate();

                for (var b = 0; b < firstDay; b++) {
                    var empty = document.createElement('div');
                    empty.className = 'bk-cal-day empty';
                    empty.setAttribute('aria-hidden', 'true');
                    grid.appendChild(empty);
                }

                var bookedKey = state.viewYear + '-' + state.viewMonth;
                var bookedList = fullyBooked[bookedKey] || [];

                for (var d = 1; d <= daysInMonth; d++) {
                    (function (dayNum) {
                        var cell = document.createElement('button');
                        cell.type = 'button';
                        cell.className = 'bk-cal-day';
                        cell.textContent = String(dayNum);

                        var cellDate = new Date(state.viewYear, state.viewMonth, dayNum);
                        var dow = cellDate.getDay();
                        var isPastOrToday = cellDate <= today;
                        var isClosed = (dow === 0 || dow === 1); // Sun & Mon
                        var isBooked = bookedList.indexOf(dayNum) !== -1;
                        var key = state.viewYear + '-' + state.viewMonth + '-' + dayNum;
                        var nicelabel = monthNames[state.viewMonth] + ' ' + dayNum + ', ' + state.viewYear;

                        if (isPastOrToday || isClosed) {
                            cell.disabled = true;
                            cell.setAttribute('aria-label', nicelabel + ' — unavailable');
                        } else if (isBooked) {
                            cell.disabled = true;
                            cell.classList.add('booked');
                            cell.setAttribute('aria-label', nicelabel + ' — fully booked');
                        } else {
                            cell.setAttribute('aria-label', nicelabel + ' — available');
                            if (state.date === key) cell.classList.add('selected');
                            cell.addEventListener('click', function () {
                                state.date = key;
                                var cells = grid.querySelectorAll('.bk-cal-day');
                                for (var i = 0; i < cells.length; i++) cells[i].classList.remove('selected');
                                cell.classList.add('selected');
                                contBtn.disabled = false;
                            });
                        }
                        grid.appendChild(cell);
                    })(d);
                }
                gridWrap.appendChild(grid);
            }

            prev.addEventListener('click', function () {
                state.viewMonth--;
                if (state.viewMonth < 0) { state.viewMonth = 11; state.viewYear--; }
                paint();
            });
            next.addEventListener('click', function () {
                state.viewMonth++;
                if (state.viewMonth > 11) { state.viewMonth = 0; state.viewYear++; }
                paint();
            });

            paint();
        }

        // ---------- Step 3: Time ----------
        function renderTime() {
            var step = document.createElement('div');
            step.className = 'bk-step';
            step.innerHTML = '<h3 class="bk-step-heading">Choose a time</h3>';

            var grid = document.createElement('div');
            grid.className = 'bk-slot-grid';

            var actions = makeActionsRow({
                backFn: function () { go(2); },
                continueFn: function () { go(4); },
                continueEnabled: !!state.time
            });
            var contBtn = actions.querySelector('.bk-btn-primary');

            times.forEach(function (t) {
                var slot = document.createElement('button');
                slot.type = 'button';
                slot.className = 'bk-slot' + (state.time === t.label ? ' selected' : '');
                if (t.booked) {
                    slot.disabled = true;
                    slot.innerHTML = '';
                    slot.appendChild(document.createTextNode(t.label));
                    var small = document.createElement('small');
                    small.textContent = 'Booked';
                    slot.appendChild(small);
                    slot.setAttribute('aria-label', t.label + ' — booked');
                } else {
                    slot.textContent = t.label;
                    slot.addEventListener('click', function () {
                        state.time = t.label;
                        var slots = grid.querySelectorAll('.bk-slot');
                        for (var i = 0; i < slots.length; i++) slots[i].classList.remove('selected');
                        slot.classList.add('selected');
                        contBtn.disabled = false;
                    });
                }
                grid.appendChild(slot);
            });

            step.appendChild(grid);
            step.appendChild(actions);
            bodyEl.appendChild(step);
        }

        // ---------- Step 4: Practitioner ----------
        function renderPractitioner() {
            var step = document.createElement('div');
            step.className = 'bk-step';
            step.innerHTML = '<h3 class="bk-step-heading">Any practitioner preference?</h3>';

            var list = document.createElement('div');
            list.className = 'bk-prac-list';

            var actions = makeActionsRow({
                backFn: function () { go(3); },
                continueFn: function () { go(5); },
                continueEnabled: !!state.practitioner
            });
            var contBtn = actions.querySelector('.bk-btn-primary');

            practitioners.forEach(function (p) {
                var row = document.createElement('button');
                row.type = 'button';
                row.className = 'bk-prac' + (state.practitioner === p.id ? ' selected' : '');
                row.setAttribute('aria-pressed', state.practitioner === p.id ? 'true' : 'false');

                var strong = document.createElement('strong');
                strong.textContent = p.label;
                row.appendChild(strong);
                row.appendChild(document.createTextNode(' — ' + p.role));

                row.addEventListener('click', function () {
                    state.practitioner = p.id;
                    var rows = list.querySelectorAll('.bk-prac');
                    for (var i = 0; i < rows.length; i++) {
                        rows[i].classList.remove('selected');
                        rows[i].setAttribute('aria-pressed', 'false');
                    }
                    row.classList.add('selected');
                    row.setAttribute('aria-pressed', 'true');
                    contBtn.disabled = false;
                });
                list.appendChild(row);
            });

            step.appendChild(list);
            step.appendChild(actions);
            bodyEl.appendChild(step);
        }

        // ---------- Step 5: Details (visual only — never submits) ----------
        function renderDetails() {
            var step = document.createElement('div');
            step.className = 'bk-step';
            step.innerHTML = '<h3 class="bk-step-heading">Almost there</h3>';

            // Intentionally a <div>, not a <form>, so no submission can ever happen.
            var form = document.createElement('div');
            form.className = 'bk-form';
            form.setAttribute('role', 'group');
            form.setAttribute('aria-label', 'Contact details (concept demo — not collected)');

            form.innerHTML =
                '<div class="bk-field">' +
                    '<label for="bk-name">Full name</label>' +
                    '<input type="text" id="bk-name" placeholder="Your name" autocomplete="off" aria-describedby="bk-form-note">' +
                '</div>' +
                '<div class="bk-field">' +
                    '<label for="bk-email">Email</label>' +
                    '<input type="email" id="bk-email" placeholder="you@example.com" autocomplete="off" aria-describedby="bk-form-note">' +
                '</div>' +
                '<div class="bk-field">' +
                    '<label for="bk-phone">Phone</label>' +
                    '<input type="tel" id="bk-phone" placeholder="(555) 010-0000" autocomplete="off" aria-describedby="bk-form-note">' +
                '</div>' +
                '<p class="bk-form-note" id="bk-form-note">Concept demo — no information is collected or stored.</p>';

            step.appendChild(form);

            step.appendChild(makeActionsRow({
                backFn: function () { go(4); },
                continueFn: function () { go(6); },
                continueLabel: 'Confirm Booking',
                continueEnabled: true
            }));

            bodyEl.appendChild(step);
        }

        // ---------- Step 6: Reveal ----------
        function renderReveal() {
            var step = document.createElement('div');
            step.className = 'bk-step bk-reveal';
            step.innerHTML =
                '<div class="bk-reveal-mark" aria-hidden="true">' +
                    '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">' +
                        '<path d="M5 13 L10 18 L19 6" fill="none" stroke="#2A2E28" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>' +
                    '</svg>' +
                '</div>' +
                '<h3 class="bk-step-heading">This is a concept booking flow</h3>' +
                '<p>In a live Aurelle Aesthetic Studio site, this step would confirm your appointment, send a confirmation email, and sync to the studio’s calendar. This demo shows how a premium med spa can turn browsing into booked consultations. Want a booking experience like this for your business?</p>';

            var actions = document.createElement('div');
            actions.className = 'bk-actions end';

            var closeAction = document.createElement('button');
            closeAction.type = 'button';
            closeAction.className = 'bk-btn bk-btn-ghost';
            closeAction.textContent = 'Close';
            closeAction.addEventListener('click', closeTheModal);

            var contact = document.createElement('a');
            contact.href = 'https://digitwaves.com';
            contact.target = '_blank';
            contact.rel = 'noopener noreferrer';
            contact.className = 'bk-btn bk-btn-primary';
            contact.textContent = 'Contact Digit Waves →';

            actions.appendChild(closeAction);
            actions.appendChild(contact);
            step.appendChild(actions);

            bodyEl.appendChild(step);
        }

        // ---------- Close handling ----------
        function closeTheModal() {
            if (modal.open && typeof modal.close === 'function') {
                modal.close();
            } else {
                modal.removeAttribute('open');
            }
            if (lastTrigger && typeof lastTrigger.focus === 'function') {
                lastTrigger.focus();
            }
        }

        // The dialog's own 'close' event fires for: modal.close(), ESC (via cancel
        // → preventDefault → close in original script), and click-outside. Reset
        // the flow whenever it closes so a reopen always starts at Step 1.
        modal.addEventListener('close', function () {
            state.step = 1;
            state.service = null;
            state.date = null;
            state.time = null;
            state.practitioner = null;
            state.viewYear = minYear;
            state.viewMonth = minMonth;
            render();
        });

        closeBtn.addEventListener('click', closeTheModal);

        // ---------- Track which CTA opened the modal (for focus return) ----------
        // Capture phase so this runs before the existing inline-script bubble
        // handler that calls modal.showModal(). We only record; we don't prevent.
        var lastTrigger = null;
        var openers = document.querySelectorAll('.open-booking-modal');
        for (var k = 0; k < openers.length; k++) {
            (function (btn) {
                btn.addEventListener('click', function () { lastTrigger = btn; }, true);
            })(openers[k]);
        }

        // ---------- Initial render (modal closed → focusFirst is a no-op) ----------
        render();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
