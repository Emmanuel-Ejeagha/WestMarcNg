/**
 * Homepage interactions.
 * Accessible floor-plan tabs with progressive enhancement.
 */
(function () {
	'use strict';

	var tablist = document.querySelector('.wm-plans__tabs');

	if (tablist) {
		var tabs = Array.prototype.slice.call(tablist.querySelectorAll('[role="tab"]'));
		var panels = tabs.map(function (tab) {
			return document.getElementById(tab.getAttribute('aria-controls'));
		});

		var activate = function (index, focusTab) {
			tabs.forEach(function (tab, i) {
				var selected = i === index;
				tab.setAttribute('aria-selected', selected ? 'true' : 'false');
				tab.setAttribute('tabindex', selected ? '0' : '-1');
				if (panels[i]) {
					panels[i].hidden = !selected;
				}
			});

			if (focusTab) {
				tabs[index].focus();
			}
		};

		// Hide inactive panels only when the tabs are usable.
		activate(0, false);

		tabs.forEach(function (tab, index) {
			tab.addEventListener('click', function () {
				activate(index, false);
			});

			tab.addEventListener('keydown', function (event) {
				var next = null;

				if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
					next = (index + 1) % tabs.length;
				} else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
					next = (index - 1 + tabs.length) % tabs.length;
				} else if (event.key === 'Home') {
					next = 0;
				} else if (event.key === 'End') {
					next = tabs.length - 1;
				}

				if (next !== null) {
					event.preventDefault();
					activate(next, true);
				}
			});
		});
	}
})();

/**
 * Subtle scroll reveals.
 * Progressive enhancement: content stays visible if this never runs.
 */
(function () {
	'use strict';

	var root = document.documentElement;
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
	var home = document.querySelector('.wm-home');

	if (!home || reduce.matches || !('IntersectionObserver' in window)) {
		root.classList.remove('wm-anim');
		window.wmRevealReady = true;
		return;
	}

	var targets = Array.prototype.slice.call(home.querySelectorAll('.wm-section, .wm-proof'));
	var media = Array.prototype.slice.call(home.querySelectorAll('.wm-intro__media, .wm-feature__media, .wm-founder__media, .wm-development__figure'));

	window.wmRevealReady = true;

	media.forEach(function (el) {
		el.classList.add('wm-media-reveal');
	});

	var observer = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (!entry.isIntersecting) {
				return;
			}

			entry.target.classList.add('is-inview');
			observer.unobserve(entry.target);
		});
	}, { threshold: 0, rootMargin: '0px 0px -8% 0px' });

	targets.concat(media).forEach(function (el) {
		observer.observe(el);
	});

	var revealAll = function () {
		root.classList.remove('wm-anim');
		media.forEach(function (el) {
			el.classList.remove('wm-media-reveal');
		});
		targets.forEach(function (el) {
			el.classList.add('is-inview');
		});
		observer.disconnect();
	};

	var onMotionChange = function () {
		if (reduce.matches) {
			revealAll();
		}
	};

	if (typeof reduce.addEventListener === 'function') {
		reduce.addEventListener('change', onMotionChange);
	} else if (typeof reduce.addListener === 'function') {
		reduce.addListener(onMotionChange);
	}
})();
