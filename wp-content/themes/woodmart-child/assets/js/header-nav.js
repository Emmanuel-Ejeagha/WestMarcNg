/**
 * Header navigation enhancements.
 *
 * Adds a click/keyboard toggle to the desktop Projects submenu, and makes the
 * mobile drawer's generated submenu opener usable with a keyboard and
 * screen readers. The parent links keep their normal destination.
 */
(function () {
	'use strict';

	var desktopQuery = window.matchMedia('(min-width: 1025px)');

	function submenuFor(item) {
		var children = item.children;

		for (var i = 0; i < children.length; i += 1) {
			if (children[i].classList && children[i].classList.contains('wd-dropdown-menu')) {
				return children[i];
			}
		}

		return null;
	}

	function labelFor(item) {
		var link = item.querySelector(':scope > a .nav-link-text') || item.querySelector(':scope > a');
		return link ? link.textContent.trim() : 'submenu';
	}

	function ensureId(element, prefix) {
		if (!element.id) {
			element.id = prefix + '-' + Math.random().toString(36).slice(2, 9);
		}

		return element.id;
	}

	function createDesktopToggle(item) {
		if (item.querySelector(':scope > .wm-submenu-toggle')) {
			return;
		}

		var dropdown = submenuFor(item);

		if (!dropdown) {
			return;
		}

		var label = labelFor(item);
		var button = document.createElement('button');
		var dropdownId = ensureId(dropdown, 'wm-submenu');

		button.type = 'button';
		button.className = 'wm-submenu-toggle';
		button.setAttribute('aria-expanded', 'false');
		button.setAttribute('aria-controls', dropdownId);
		button.setAttribute('aria-label', 'Open ' + label + ' submenu');
		button.innerHTML = '<span class="wm-submenu-toggle__icon" aria-hidden="true"></span>';

		function setOpen(open) {
			item.classList.toggle('wm-submenu-open', open);

			if (open) {
				item.classList.remove('wm-submenu-suppressed');
			} else {
				// Native Woodmart hover keeps the panel visible while the pointer
				// rests on the item, so suppress it until the pointer leaves.
				item.classList.add('wm-submenu-suppressed');
			}

			dropdown.classList.toggle('wd-opened', open);
			button.setAttribute('aria-expanded', open ? 'true' : 'false');
			button.setAttribute('aria-label', (open ? 'Close ' : 'Open ') + label + ' submenu');
		}

		function close() {
			setOpen(false);
		}

		button.addEventListener('click', function (event) {
			event.preventDefault();
			event.stopPropagation();
			var open = !item.classList.contains('wm-submenu-open');

			document.querySelectorAll('.wd-nav-main .wm-submenu-open').forEach(function (other) {
				if (other !== item) {
					var otherButton = other.querySelector(':scope > .wm-submenu-toggle');
					var otherDropdown = submenuFor(other);

					other.classList.remove('wm-submenu-open');

					if (otherDropdown) {
						otherDropdown.classList.remove('wd-opened');
					}

					if (otherButton) {
						otherButton.setAttribute('aria-expanded', 'false');
						otherButton.setAttribute('aria-label', 'Open ' + labelFor(other) + ' submenu');
					}
				}
			});

			setOpen(open);
		});

		item.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && item.classList.contains('wm-submenu-open')) {
				event.preventDefault();
				close();
				button.focus();
			}
		});

		item.addEventListener('focusout', function (event) {
			if (event.relatedTarget && !item.contains(event.relatedTarget)) {
				close();
			}
		});

		item.addEventListener('pointerenter', function () {
			if (!item.classList.contains('wm-submenu-open')) {
				item.classList.remove('wm-submenu-suppressed');
			}
		});

		item.addEventListener('pointerleave', function () {
			item.classList.remove('wm-submenu-suppressed');
		});

		document.addEventListener('click', function (event) {
			if (!item.contains(event.target)) {
				close();
			}
		});

		item.insertBefore(button, dropdown);
	}

	function initDesktop() {
		document.querySelectorAll('.wd-nav-main > .menu-item-has-children').forEach(function (item) {
			if (desktopQuery.matches) {
				createDesktopToggle(item);
			}
		});

		document.querySelectorAll('.wd-nav-main .wm-submenu-toggle').forEach(function (button) {
			button.hidden = !desktopQuery.matches;

			if (!desktopQuery.matches) {
				var item = button.closest('.menu-item');
				var dropdown = item ? submenuFor(item) : null;

				item && item.classList.remove('wm-submenu-open');
				dropdown && dropdown.classList.remove('wd-opened');
				button.setAttribute('aria-expanded', 'false');
			}
		});
	}

	function syncMobileOpener(opener) {
		var item = opener.closest('.menu-item-has-children');
		var submenu = item ? item.querySelector(':scope > .wd-sub-menu, :scope > .sub-sub-menu') : null;
		var label = item ? labelFor(item) : 'submenu';

		opener.setAttribute('role', 'button');
		opener.setAttribute('tabindex', '0');
		opener.setAttribute('aria-haspopup', 'true');
		opener.setAttribute('aria-label', 'Toggle ' + label + ' submenu');

		if (submenu) {
			opener.setAttribute('aria-controls', ensureId(submenu, 'wm-mobile-submenu'));
		}

		if (!opener.hasAttribute('aria-expanded')) {
			opener.setAttribute('aria-expanded', 'false');
		}

		// Woodmart appends the opener after the submenu. Place it directly after
		// the link so keyboard Tab order is: link, toggle, submenu links.
		var anchor = item ? item.querySelector(':scope > a') : null;

		if (anchor && anchor.nextElementSibling !== opener) {
			item.insertBefore(opener, anchor.nextSibling);
		}

		if (opener.dataset.wmEnhanced === '1') {
			return;
		}

		opener.dataset.wmEnhanced = '1';

		opener.addEventListener('keydown', function (event) {
			if (event.key === 'Enter' || event.key === ' ' || event.key === 'Spacebar') {
				event.preventDefault();
				opener.click();
			}
		});

		opener.addEventListener('click', function () {
			window.setTimeout(function () {
				var expanded = (item && item.classList.contains('opener-page')) || opener.classList.contains('wd-active');
				opener.setAttribute('aria-expanded', expanded ? 'true' : 'false');
			}, 0);
		});
	}

	function initMobile() {
		document.querySelectorAll('.mobile-nav .wd-nav-mobile .menu-item-has-children > .wd-nav-opener').forEach(syncMobileOpener);
	}

	function init() {
		initDesktop();
		initMobile();
	}

	init();

	window.addEventListener('load', init);

	if ('MutationObserver' in window) {
		var observer = new MutationObserver(function (mutations) {
			mutations.forEach(function (mutation) {
				mutation.addedNodes.forEach(function (node) {
					if (node.nodeType === 1 && node.classList && node.classList.contains('wd-nav-opener')) {
						syncMobileOpener(node);
					}
				});
			});
		});

		document.querySelectorAll('.mobile-nav').forEach(function (nav) {
			observer.observe(nav, { childList: true, subtree: true });
		});
	}

	if (typeof desktopQuery.addEventListener === 'function') {
		desktopQuery.addEventListener('change', initDesktop);
	} else if (typeof desktopQuery.addListener === 'function') {
		desktopQuery.addListener(initDesktop);
	}
})();
