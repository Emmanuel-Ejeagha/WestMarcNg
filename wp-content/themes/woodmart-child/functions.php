<?php
/**
 * Westmarc child theme functions.
 */

define( 'WM_CHILD_VERSION', '1.4.1' );

require_once get_stylesheet_directory() . '/inc/icons.php';
require_once get_stylesheet_directory() . '/inc/media.php';

/**
 * Is the current request the site front page?
 *
 * @return bool
 */
function wm_is_front_page() {
	return is_front_page() && ! is_admin();
}

/**
 * URL of the first hero slide.
 *
 * The file is referenced directly because it is not registered in the media
 * library. No replacement or generated derivative is used.
 *
 * @return string
 */
function wm_hero_poster_url() {
	return content_url( '/uploads/2026/11/ad buy shop and office space.jpeg' );
}

/**
 * Data for the five approved hero slides.
 *
 * Slides 2, 3 and 5 use the existing optimized media map. Slides 1 and 4
 * reference their exact uploaded files directly because they are not part of
 * that map. No new crops or replacements are generated.
 *
 * @return array
 */
function wm_hero_slides() {
	static $slides = null;

	if ( null !== $slides ) {
		return $slides;
	}

	$slides = [
		[
			'id'        => 'wm-hero-slide-1',
			'key'       => 'commercial',
			'label'     => 'Commercial Properties',
			'alt'       => 'Urban Tola Mall advertisement for shops and office space on Mobil Road, Ajah, Lagos',
			'file'      => 'ad buy shop and office space.jpeg',
			'width'     => 642,
			'height'    => 1080,
			'media_key' => '',
			'srcset'    => [],
		],
		[
			'id'        => 'wm-hero-slide-2',
			'key'       => 'greenland',
			'label'     => 'Greenland Estate',
			'alt'       => 'Render of Greenland Estate in Lekki-Ajah, with 2-bedroom apartments and a 4-bedroom duplex',
			'file'      => '',
			'width'     => 1080,
			'height'    => 607,
			'media_key' => 'greenland',
			'srcset'    => [],
		],
		[
			'id'        => 'wm-hero-slide-3',
			'key'       => 'kayfarm',
			'label'     => 'Kayfarm Ikeja',
			'alt'       => 'Render of six 4-bedroom terraced homes at Kayfarm, Ikeja',
			'file'      => '',
			'width'     => 960,
			'height'    => 540,
			'media_key' => 'kayfarm',
			'srcset'    => [],
		],
		[
			'id'        => 'wm-hero-slide-4',
			'key'       => 'shops',
			'label'     => 'Shops and Office Spaces',
			'alt'       => 'Urban Tola Mall exterior with shops and office spaces in Ajah, Lagos',
			'file'      => 'shops and office space 2.jpeg',
			'width'     => 1080,
			'height'    => 810,
			'media_key' => '',
			'srcset'    => [
				'shops and office space 2-400x300.jpeg'  => 400,
				'shops and office space 2-768x576.jpeg'  => 768,
				'shops and office space 2-1067x800.jpeg' => 1067,
				'shops and office space 2.jpeg'          => 1080,
			],
		],
		[
			'id'        => 'wm-hero-slide-5',
			'key'       => 'triangle',
			'label'     => 'The Triangle Mall',
			'alt'       => 'The Triangle Mall on the Lekki-Epe Expressway, Osapa London, Lekki',
			'file'      => '',
			'width'     => 810,
			'height'    => 1080,
			'media_key' => 'triangle-front',
			'srcset'    => [],
		],
	];

	return $slides;
}

/**
 * Output the image markup for one hero slide.
 *
 * @param array $slide Slide data.
 * @param int   $index Zero-based slide index.
 * @return string
 */
function wm_hero_slide_image( $slide, $index ) {
	$sizes   = '(max-width: 600px) 100vw, (max-width: 768px) 78vw, (max-width: 1024px) 74vw, (max-width: 1440px) 52vw, 720px';
	$loading = 0 === $index ? 'eager' : '';
	$fetch   = 0 === $index ? 'high' : '';

	if ( ! empty( $slide['media_key'] ) ) {
		return wm_image(
			$slide['media_key'],
			[
				'alt'           => $slide['alt'],
				'class'         => 'wm-hero-slide__img',
				'sizes'         => $sizes,
				'loading'       => $loading,
				'fetchpriority' => $fetch,
			]
		);
	}

	$src    = content_url( '/uploads/2026/11/' . $slide['file'] );
	$srcset = [];

	foreach ( $slide['srcset'] as $file => $width ) {
		$srcset[] = esc_url( content_url( '/uploads/2026/11/' . $file ) ) . ' ' . (int) $width . 'w';
	}

	$attributes = [
		'src'           => esc_url( $src ),
		'srcset'        => implode( ', ', $srcset ),
		'sizes'         => $sizes,
		'width'         => (int) $slide['width'],
		'height'        => (int) $slide['height'],
		'alt'           => esc_attr( $slide['alt'] ),
		'class'         => 'wm-hero-slide__img',
		'loading'       => $loading,
		'decoding'      => 'async',
	];

	$output = '<img';

	foreach ( $attributes as $name => $value ) {
		if ( '' === $value ) {
			continue;
		}
		$output .= ' ' . $name . '="' . $value . '"';
	}

	return $output . ' />';
}

/**
 * Enqueue theme styles and scripts.
 */
function wm_enqueue_assets() {
	$theme_uri = get_stylesheet_directory_uri();
	$version   = WM_CHILD_VERSION;

	wp_enqueue_style( 'wm-global', $theme_uri . '/assets/css/global.css', [ 'woodmart-style' ], $version );
	wp_enqueue_script( 'wm-forms', $theme_uri . '/assets/js/forms.js', [], $version, true );

	if ( wm_is_front_page() ) {
		wp_enqueue_style( 'wm-home', $theme_uri . '/assets/css/home.css', [ 'wm-global' ], $version );
		wp_enqueue_script( 'wm-home', $theme_uri . '/assets/js/home.js', [], $version, true );
		wp_enqueue_script( 'wm-hero-slideshow', $theme_uri . '/assets/js/hero-slideshow.js', [], $version, true );
		wp_enqueue_script( 'wm-gallery', $theme_uri . '/assets/js/gallery.js', [], $version, true );
	}
}
add_action( 'wp_enqueue_scripts', 'wm_enqueue_assets', 10020 );

/**
 * Set the scroll-reveal gate before first paint on the homepage.
 *
 * The class is removed again if the reveal script never initialises, so
 * content can never remain hidden when JavaScript fails.
 */
function wm_reveal_gate() {
	if ( ! wm_is_front_page() ) {
		return;
	}
	?>
	<script>
		(function () {
			if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
				return;
			}
			var root = document.documentElement;
			root.classList.add('wm-anim');
			window.setTimeout(function () {
				if (!window.wmRevealReady) {
					root.classList.remove('wm-anim');
				}
			}, 3000);
		})();
	</script>
	<?php
}
add_action( 'wp_head', 'wm_reveal_gate', 1 );

/**
 * Keep the original child stylesheet loading after the parent theme.
 */
function woodmart_child_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [ 'woodmart-style' ], woodmart_get_theme_info( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );

/**
 * Preload the self-hosted fonts and the first hero slide.
 */
function wm_resource_hints() {
	$theme_uri = get_stylesheet_directory_uri();

	echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/fonts/inter-var.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
	echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/fonts/playfair-display-var.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";

	if ( wm_is_front_page() ) {
		echo '<link rel="preload" as="image" href="' . esc_url( wm_hero_poster_url() ) . '" fetchpriority="high">' . "\n";
	}
}
add_action( 'wp_head', 'wm_resource_hints', 1 );

/**
 * Select the appropriate header logo derivative and load it eagerly.
 *
 * @param array   $attr       Image attributes.
 * @param WP_Post $attachment Attachment object.
 * @param string  $size       Requested image size.
 * @return array
 */
function wm_header_logo_attributes( $attr, $attachment, $size ) {
	if ( ! ( $attachment instanceof WP_Post ) || 26226 !== (int) $attachment->ID ) {
		return $attr;
	}

	$attr['sizes']   = '(max-width: 1024px) 155px, 200px';
	$attr['loading'] = 'eager';

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'wm_header_logo_attributes', 10, 3 );

/**
 * Remove the theme's Google Fonts request. The site uses self-hosted fonts.
 */
function wm_dequeue_google_fonts() {
	wp_dequeue_style( 'xts-google-fonts' );
}
add_action( 'wp_print_styles', 'wm_dequeue_google_fonts', 1 );

/**
 * Catch assets enqueued late by plugins.
 */
function wm_dequeue_early() {
	if ( is_admin() ) {
		return;
	}

	wp_dequeue_style( 'xts-google-fonts' );
	wp_dequeue_style( 'rs-plugin-settings' );
	wp_dequeue_script( 'rbtools' );
	wp_dequeue_script( 'rs6' );

	if ( wm_is_front_page() ) {
		wp_dequeue_style( 'contact-form-7' );
		wp_dequeue_script( 'contact-form-7' );
		wp_dequeue_script( 'swv' );
	}
}
add_action( 'wp_enqueue_scripts', 'wm_dequeue_early', 99999 );

/**
 * Drop Google Fonts DNS prefetch hints.
 *
 * @param array  $urls          Resource hint URLs.
 * @param string $relation_type Relation type.
 * @return array
 */
function wm_filter_resource_hints( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		$urls = array_filter(
			$urls,
			static function ( $url ) {
				return false === strpos( $url, 'fonts.googleapis.com' ) && false === strpos( $url, 'fonts.gstatic.com' );
			}
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'wm_filter_resource_hints', 10, 2 );

/**
 * Remove unused plugin payloads from the front page.
 *
 * @param string $type Either "style" or "script".
 */
function wm_dequeue_front_payloads( $type ) {
	if ( ! wm_is_front_page() ) {
		return;
	}

	global $wp_styles, $wp_scripts;

	$collection = 'style' === $type ? $wp_styles : $wp_scripts;

	if ( ! $collection instanceof WP_Dependencies ) {
		return;
	}

	$needles = [ 'elementor', 'revslider', 'contact-form-7', 'wpforms', 'swiper' ];

	foreach ( (array) $collection->queue as $handle ) {
		$src = isset( $collection->registered[ $handle ] ) ? (string) $collection->registered[ $handle ]->src : '';

		foreach ( $needles as $needle ) {
			if ( false !== stripos( $src, $needle ) || 0 === strpos( $handle, $needle ) ) {
				if ( 'style' === $type ) {
					wp_dequeue_style( $handle );
				} else {
					wp_dequeue_script( $handle );
				}
				break;
			}
		}
	}

	if ( 'style' === $type ) {
		foreach ( [ 'woocommerce-general', 'woocommerce-layout', 'woocommerce-smallscreen', 'wc-blocks-style' ] as $handle ) {
			wp_dequeue_style( $handle );
		}
	}
}
function wm_dequeue_front_styles() {
	wm_dequeue_front_payloads( 'style' );
}
function wm_dequeue_front_scripts() {
	wm_dequeue_front_payloads( 'script' );
}
add_action( 'wp_print_styles', 'wm_dequeue_front_styles', 2 );
add_action( 'wp_print_scripts', 'wm_dequeue_front_scripts', 1 );
add_action( 'wp_print_footer_scripts', 'wm_dequeue_front_scripts', 1 );

/**
 * Make the header logo load eagerly and with high priority.
 *
 * @param array $attr       Image attributes.
 * @param int   $attachment Attachment ID.
 * @return array
 */
function wm_logo_image_attributes( $attr, $attachment ) {
	$attachment_id = $attachment instanceof WP_Post ? (int) $attachment->ID : (int) $attachment;

	if ( in_array( $attachment_id, [ 26202, 26203 ], true ) ) {
		$attr['loading']  = 'eager';
		$attr['decoding'] = 'async';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'wm_logo_image_attributes', 10, 2 );

/**
 * Give the brand logos a small, accurate `sizes` value so the browser does
 * not download the full-width file for a logo capped at 200px.
 *
 * @param string       $sizes         Sizes attribute.
 * @param array|string $size          Image size.
 * @param string|null  $image_src     Image URL.
 * @param array|null   $image_meta    Image metadata.
 * @param int          $attachment_id Attachment ID.
 * @return string
 */
function wm_logo_image_sizes( $sizes, $size, $image_src, $image_meta, $attachment_id ) {
	if ( in_array( (int) $attachment_id, [ 26202, 26203 ], true ) ) {
		return '(max-width: 480px) 140px, (max-width: 1024px) 170px, 200px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'wm_logo_image_sizes', 10, 5 );

/**
 * Add a skip link and a focusable main-content anchor.
 */
function wm_skip_link() {
	echo '<a class="wm-skip-link" href="#wm-main">Skip to content</a>';
}
add_action( 'wp_body_open', 'wm_skip_link', 1 );

function wm_main_anchor() {
	echo '<span id="wm-main" class="wm-anchor" tabindex="-1"></span>';
}
add_action( 'woodmart_after_header', 'wm_main_anchor', 1 );

/**
 * Add a body class for the mobile conversion bar and front page.
 *
 * @param array $classes Body classes.
 * @return array
 */
function wm_body_classes( $classes ) {
	if ( ! is_admin() ) {
		$classes[] = 'wm-has-mobile-bar';
	}

	if ( wm_is_front_page() ) {
		$classes[] = 'wm-front';
	}

	return $classes;
}
add_filter( 'body_class', 'wm_body_classes' );

/**
 * Mobile call / inspection bar.
 */
function wm_mobile_bar() {
	if ( is_admin() ) {
		return;
	}
	?>
	<div class="wm-mobile-bar" role="region" aria-label="Quick contact">
		<a href="tel:+2348027415344"><?php echo wm_icon( 'phone', 17 ); // phpcs:ignore ?> Call us</a>
		<a href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>"><?php echo wm_icon( 'calendar', 17 ); // phpcs:ignore ?> Book inspection</a>
	</div>
	<?php
}
add_action( 'wp_footer', 'wm_mobile_bar', 5 );

/**
 * Dynamic copyright year.
 *
 * @return string
 */
function wm_year_shortcode() {
	return esc_html( gmdate( 'Y' ) );
}
add_shortcode( 'wm_year', 'wm_year_shortcode' );

/**
 * FAQ structured data for the homepage.
 */
function wm_faq_schema() {
	if ( ! wm_is_front_page() ) {
		return;
	}

	$faqs = [
		[
			'q' => 'What does Westmarc Nigeria Limited do?',
			'a' => 'Westmarc is a Lagos-based real estate company focused on commercial property development, property marketing, facility management and real estate consultancy. We also develop residential projects such as Greenland Estate and Kayfarm.',
		],
		[
			'q' => 'Where are your developments located?',
			'a' => 'Our current projects are in Ajah, Lekki and Ikeja, Lagos. Urban Tola Mall is on Mobil Road, Ajah, beside Northwest Filling Station. The Triangle Mall is on the Lekki-Epe Expressway at Osapa London, Lekki.',
		],
		[
			'q' => 'Can I inspect a project before I commit?',
			'a' => 'Yes. Site inspections are available by appointment. Book an inspection through the contact page and our team will confirm a suitable time.',
		],
		[
			'q' => 'What types of units are available?',
			'a' => 'Urban Tola Mall has ground, first and second floor plans with 20 office spaces and shops per floor. Our residential projects include 2-bedroom apartments, a 4-bedroom duplex at Greenland Estate in Lekki-Ajah, and 4-bedroom terraced homes at Kayfarm in Ikeja.',
		],
		[
			'q' => 'Do you manage properties after purchase?',
			'a' => 'Yes. Westmarc provides facility and property management services for commercial developments, including operations and maintenance coordination, so owners can focus on their investment.',
		],
		[
			'q' => 'How do I start an investment or lease enquiry?',
			'a' => 'Start with a consultation. Tell us which project or unit type interests you, and our team will explain availability, pricing, payment plans and next steps.',
		],
	];

	$items = [];
	foreach ( $faqs as $faq ) {
		$items[] = [
			'@type'          => 'Question',
			'name'           => $faq['q'],
			'acceptedAnswer' => [
				'@type' => 'Answer',
				'text'  => $faq['a'],
			],
		];
	}

	$schema = [
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $items,
	];

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_footer', 'wm_faq_schema', 20 );

/**
 * Keep the WordPress head tidy.
 */
remove_action( 'wp_print_styles', 'print_emoji_styles' );
