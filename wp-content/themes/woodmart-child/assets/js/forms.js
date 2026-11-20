/**
 * Small progressive enhancements for legacy markup.
 *
 * 1. Elementor Pro ships an invalid HTML pattern for telephone fields under
 *    modern browsers (unescaped parentheses in a v-mode character class).
 *    Re-apply an equivalent, valid pattern so client-side validation works.
 * 2. Woodmart's SVG menu icons omit alt when the attachment has none. They are
 *    decorative because the link text describes them, so mark them as such.
 */
(function () {
	'use strict';

	var enhance = function () {
		var inputs = document.querySelectorAll('form.elementor-form input[type="tel"]');

		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].getAttribute('pattern') === '[0-9()#&+*-=.]+') {
				inputs[i].setAttribute('pattern', '[0-9+\\s\\-]+');
				inputs[i].setAttribute('title', 'Only numbers, spaces, + and - are accepted.');
			}
		}

		var icons = document.querySelectorAll('img.wd-nav-img:not([alt])');

		for (var j = 0; j < icons.length; j++) {
			icons[j].setAttribute('alt', '');
		}
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', enhance);
	} else {
		enhance();
	}
})();
