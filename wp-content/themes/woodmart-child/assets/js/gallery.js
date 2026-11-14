/**
 * Projects side gallery.
 *
 * Accessible slideshow with autoplay, hover/focus/visibility pausing,
 * keyboard navigation and touch swipe. Vanilla JS, no dependencies.
 */
(function () {
	'use strict';

	var galleries = document.querySelectorAll('[data-wm-gallery]');

	if (!galleries.length) {
		return;
	}

	var reduceQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
	var AUTOPLAY_MS = 7000;

	Array.prototype.forEach.call(galleries, function (gallery) {
		var track = gallery.querySelector('[data-wm-gallery-track]');
		var slides = Array.prototype.slice.call(gallery.querySelectorAll('[data-wm-gallery-slide]'));
		var prevBtn = gallery.querySelector('[data-wm-gallery-prev]');
		var nextBtn = gallery.querySelector('[data-wm-gallery-next]');
		var dotsWrap = gallery.querySelector('[data-wm-gallery-dots]');
		var currentEl = gallery.querySelector('[data-wm-gallery-current]');
		var statusEl = gallery.querySelector('[data-wm-gallery-status]');
		var viewport = gallery.querySelector('[data-wm-gallery-viewport]') || gallery;

		if (!track || slides.length < 2) {
			return;
		}

		var index = 0;
		var dots = [];
		var timer = null;
		var hovering = false;
		var focused = false;
		var inView = false;
		var reduced = reduceQuery.matches;

		function pad(number) {
			return (number < 10 ? '0' : '') + number;
		}

		function captionFor(slideIndex) {
			var label = slides[slideIndex].querySelector('.wm-gallery__caption strong');
			return label ? label.textContent.trim() : 'Image ' + (slideIndex + 1);
		}

		function preload(slideIndex) {
			var slide = slides[slideIndex];

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
			track.style.transform = 'translate3d(' + (-index * 100) + '%, 0, 0)';

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
				statusEl.textContent = 'Image ' + (index + 1) + ' of ' + slides.length + ': ' + captionFor(index);
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
				dot.className = 'wm-gallery__dot';
				dot.setAttribute('aria-label', 'Go to image ' + (n + 1) + ' of ' + slides.length);
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

		gallery.addEventListener('keydown', function (event) {
			if (event.key === 'ArrowLeft') {
				event.preventDefault();
				go(-1);
			} else if (event.key === 'ArrowRight') {
				event.preventDefault();
				go(1);
			}
		});

		gallery.addEventListener('pointerenter', function () {
			hovering = true;
			stop();
		});

		gallery.addEventListener('pointerleave', function () {
			hovering = false;
			start();
		});

		gallery.addEventListener('focusin', function () {
			focused = true;
			stop();
		});

		gallery.addEventListener('focusout', function (event) {
			if (!gallery.contains(event.relatedTarget)) {
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

		var startX = 0;
		var startY = 0;
		var tracking = false;

		viewport.addEventListener('pointerdown', function (event) {
			if (event.pointerType === 'mouse' && event.button !== 0) {
				return;
			}

			// Never treat a control press as a swipe.
			if (event.target.closest('.wm-gallery__btn')) {
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
			}, { threshold: 0.35 });

			observer.observe(gallery);
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
