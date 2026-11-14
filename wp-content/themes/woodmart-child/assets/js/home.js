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
