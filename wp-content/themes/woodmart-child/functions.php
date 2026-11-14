<?php
/**
 * Westmarc child theme functions.
 */

define( 'WM_CHILD_VERSION', '1.2.0' );

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
	}
}
add_action( 'wp_enqueue_scripts', 'wm_enqueue_assets', 10020 );

/**
 * Keep the original child stylesheet loading after the parent theme.
 */
function woodmart_child_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [ 'woodmart-style' ], woodmart_get_theme_info( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );

/**
 * Preload the self-hosted fonts and the hero image.
 */
function wm_resource_hints() {
	$theme_uri = get_stylesheet_directory_uri();

	echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/fonts/inter-var.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
	echo '<link rel="preload" href="' . esc_url( $theme_uri . '/assets/fonts/playfair-display-var.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";

	if ( wm_is_front_page() ) {
		$hero_srcset = wm_asset_srcset( 'greenland' );
		echo '<link rel="preload" as="image" href="' . esc_url( wm_asset_url( 'greenland', 1080 ) ) . '" imagesrcset="' . esc_attr( $hero_srcset ) . '" imagesizes="(max-width: 900px) 100vw, 46vw" fetchpriority="high">' . "\n";
	}
}
add_action( 'wp_head', 'wm_resource_hints', 1 );

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
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
