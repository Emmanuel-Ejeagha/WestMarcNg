/**
 * Homepage hero slideshow.
 *
 * Five-slide crossfade with a four-second autoplay, pause on hover/focus,
 * pause when the tab or carousel is out of view, keyboard support and swipe.
 * Vanilla JS, no dependencies. The first slide is already visible in the
 * markup, so the hero remains complete when JavaScript is unavailable.
 */
(function () {
	'use strict';

	var carousels = document.querySelectorAll('[data-wm-hero-slideshow]');

	if (!carousels.length) {
		return;
	}

	var reduceQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
	var AUTOPLAY_MS = 4000;

	Array.prototype.forEach.call(carousels, function (carousel) {
		var viewport = carousel.querySelector('[data-wm-hero-viewport]');
		var slides = Array.prototype.slice.call(carousel.querySelectorAll('[data-wm-hero-slide]'));
		var prevBtn = carousel.querySelector('[data-wm-hero-prev]');
		var nextBtn = carousel.querySelector('[data-wm-hero-next]');
		var dotsWrap = carousel.querySelector('[data-wm-hero-dots]');
		var currentEl = carousel.querySelector('[data-wm-hero-current]');
		var statusEl = carousel.querySelector('[data-wm-hero-status]');

		if (!viewport || slides.length < 2) {
			return;
		}

		var index = 0;
		var dots = [];
		var timer = null;
		var hovering = false;
		var focused = false;
		var touchActive = false;
		var inView = true;
		var reduced = reduceQuery.matches;

		function pad(number) {
			return (number < 10 ? '0' : '') + number;
		}

		function isKeyboardFocus(element) {
			if (!element || typeof element.matches !== 'function') {
				return false;
			}

			try {
				return element.matches(':focus-visible');
			} catch (error) {
				return false;
			}
		}

		function labelFor(slideIndex) {
			var label = slides[slideIndex].querySelector('.wm-hero-slide__label');
			return label ? label.textContent.trim() : 'Property ' + (slideIndex + 1);
		}

		function preload(slideIndex) {
			var slide = slides[(slideIndex + slides.length) % slides.length];

			if (!slide) {
				return;
			}

			var img = slide.querySelector('img');

			if (img && img.getAttribute('loading') === 'lazy') {
				img.setAttribute('loading', 'eager');
			}
		}

		function update(nextIndex) {
			index = (nextIndex + slides.length) % slides.length;

			slides.forEach(function (slide, n) {
				var active = n === index;
				slide.classList.toggle('is-active', active);
				slide.setAttribute('aria-hidden', active ? 'false' : 'true');
			});

			dots.forEach(function (dot, n) {
				var active = n === index;
				dot.classList.toggle('is-active', active);
				dot.setAttribute('aria-current', active ? 'true' : 'false');
			});

			if (currentEl) {
				currentEl.textContent = pad(index + 1);
			}

			if (statusEl) {
				statusEl.textContent = 'Property ' + (index + 1) + ' of ' + slides.length + ': ' + labelFor(index);
			}

			preload(index);
			preload(index + 1);
			preload(index - 1);
		}

		function canAutoplay() {
			return !reduced && !hovering && !focused && inView && !document.hidden;
		}

		function stop() {
			if (timer) {
				window.clearInterval(timer);
				timer = null;
			}
		}

		function start() {
			stop();

			if (!canAutoplay()) {
				return;
			}

			timer = window.setInterval(function () {
				update(index + 1);
			}, AUTOPLAY_MS);
		}

		function restart() {
			stop();
			start();
		}

		function go(delta) {
			update(index + delta);
			restart();
		}

		function goTo(nextIndex) {
			update(nextIndex);
			restart();
		}

		if (dotsWrap) {
			slides.forEach(function (_, n) {
				var dot = document.createElement('button');
				dot.type = 'button';
				dot.className = 'wm-hero-slideshow__dot';
				dot.setAttribute('aria-label', 'Go to property ' + (n + 1) + ' of ' + slides.length + ': ' + labelFor(n));
				dot.setAttribute('aria-controls', slides[n].id);
				dot.addEventListener('click', function () {
					goTo(n);
				});
				dotsWrap.appendChild(dot);
				dots.push(dot);
			});
		}

		if (prevBtn) {
			prevBtn.addEventListener('click', function () {
				go(-1);
			});
		}

		if (nextBtn) {
			nextBtn.addEventListener('click', function () {
				go(1);
			});
		}

		carousel.addEventListener('keydown', function (event) {
			if (event.key === 'ArrowLeft') {
				event.preventDefault();
				go(-1);
			} else if (event.key === 'ArrowRight') {
				event.preventDefault();
				go(1);
			} else if (event.key === 'Home') {
				event.preventDefault();
				goTo(0);
			} else if (event.key === 'End') {
				event.preventDefault();
				goTo(slides.length - 1);
			}
		});

		carousel.addEventListener('pointerenter', function (event) {
			// Hover pause is a mouse enhancement. Touch pointers must not pin it on.
			if (event.pointerType && event.pointerType !== 'mouse') {
				return;
			}

			hovering = true;
			stop();
		});

		carousel.addEventListener('pointerleave', function (event) {
			if (event.pointerType && event.pointerType !== 'mouse') {
				return;
			}

			hovering = false;
			start();
		});

		carousel.addEventListener('focusin', function (event) {
			// Touch taps focus buttons but are not keyboard focus. Only a visible
			// keyboard focus should keep autoplay paused indefinitely.
			focused = isKeyboardFocus(event.target);

			if (focused || touchActive) {
				stop();
			} else {
				start();
			}
		});

		carousel.addEventListener('focusout', function (event) {
			if (!carousel.contains(event.relatedTarget)) {
				focused = false;
				start();
			}
		});

		document.addEventListener('visibilitychange', function () {
			if (document.hidden) {
				stop();
			} else {
				start();
			}
		});

		function beginTouch(event) {
			if (event.pointerType !== 'touch' && event.pointerType !== 'pen') {
				return;
			}

			touchActive = true;
			stop();
		}

		function endTouch() {
			if (!touchActive) {
				return;
			}

			touchActive = false;
			start();
		}

		carousel.addEventListener('pointerdown', beginTouch, { passive: true });
		window.addEventListener('pointerup', endTouch, { capture: true, passive: true });
		window.addEventListener('pointercancel', endTouch, { capture: true, passive: true });

		var startX = 0;
		var startY = 0;
		var tracking = false;

		viewport.addEventListener('pointerdown', function (event) {
			if (event.pointerType === 'mouse' && event.button !== 0) {
				return;
			}

			// Never treat a control press as a swipe.
			if (event.target.closest('button')) {
				return;
			}

			tracking = true;
			startX = event.clientX;
			startY = event.clientY;
		});

		viewport.addEventListener('pointerup', function (event) {
			if (!tracking) {
				return;
			}

			tracking = false;

			var dx = event.clientX - startX;
			var dy = event.clientY - startY;

			if (Math.abs(dx) < 40 || Math.abs(dx) < Math.abs(dy) * 1.2) {
				return;
			}

			go(dx < 0 ? 1 : -1);
		});

		viewport.addEventListener('pointercancel', function () {
			tracking = false;
		});

		viewport.addEventListener('dragstart', function (event) {
			event.preventDefault();
		});

		carousel.classList.add('is-ready');
		carousel.setAttribute('tabindex', '0');

		update(0);

		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					inView = entry.isIntersecting;

					if (inView) {
						start();
					} else {
						stop();
					}
				});
			}, { threshold: 0.01 });

			observer.observe(carousel);
		} else {
			inView = true;
			start();
		}

		var onMotionChange = function () {
			reduced = reduceQuery.matches;

			if (reduced) {
				stop();
			} else {
				start();
			}
		};

		if (typeof reduceQuery.addEventListener === 'function') {
			reduceQuery.addEventListener('change', onMotionChange);
		} else if (typeof reduceQuery.addListener === 'function') {
			reduceQuery.addListener(onMotionChange);
		}
	});
})();
