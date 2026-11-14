<?php
/**
 * Optimized media helpers.
 *
 * The original uploads are left untouched. These helpers point at the
 * WebP derivatives generated in uploads/2026/11/wm-opt/ and output
 * responsive srcset/sizes markup with intrinsic dimensions.
 */

/**
 * Return the optimized asset map.
 *
 * @return array
 */
function wm_media_map() {
	static $map = null;

	if ( null !== $map ) {
		return $map;
	}

	$map = [
		'greenland' => [
			'file'      => 'greenland',
			'width'     => 1080,
			'height'    => 607,
			'sizes'     => [ 480 => [ 480, 270 ], 800 => [ 800, 450 ], 1080 => [ 1080, 607 ] ],
			'alt'       => 'Render of Greenland Estate in Lekki-Ajah, with 2-bedroom apartments and a 4-bedroom duplex',
			'attachment'=> 26207,
		],
		'kayfarm' => [
			'file'      => 'kayfarm',
			'width'     => 960,
			'height'    => 540,
			'sizes'     => [ 480 => [ 480, 270 ], 800 => [ 800, 450 ], 960 => [ 960, 540 ] ],
			'alt'       => 'Render of six 4-bedroom terraced homes at Kayfarm, Ikeja',
			'attachment'=> 26208,
		],
		'urban-exterior' => [
			'file'      => 'urban-exterior',
			'width'     => 1080,
			'height'    => 810,
			'sizes'     => [ 480 => [ 480, 360 ], 800 => [ 800, 600 ], 1080 => [ 1080, 810 ] ],
			'alt'       => 'Urban Tola Mall, Ajah, Lagos - exterior view',
			'attachment'=> 26209,
		],
		'urban-render' => [
			'file'      => 'urban-render',
			'width'     => 1024,
			'height'    => 805,
			'sizes'     => [ 480 => [ 480, 377 ], 800 => [ 800, 629 ], 1024 => [ 1024, 805 ] ],
			'alt'       => 'Architectural render of Urban Tola Mall in Ajah, Lagos',
			'attachment'=> 26209,
		],
		'triangle-front' => [
			'file'      => 'triangle-front',
			'width'     => 810,
			'height'    => 1080,
			'sizes'     => [ 480 => [ 480, 640 ], 810 => [ 810, 1080 ] ],
			'alt'       => 'The Triangle Mall on the Lekki-Epe Expressway, Osapa London, Lekki',
			'attachment'=> 26210,
		],
		'triangle-inside' => [
			'file'      => 'triangle-inside',
			'width'     => 1080,
			'height'    => 810,
			'sizes'     => [ 480 => [ 480, 360 ], 800 => [ 800, 600 ], 1080 => [ 1080, 810 ] ],
			'alt'       => 'Inside The Triangle Mall, Osapa London, Lekki',
			'attachment'=> 26211,
		],
		'site-team' => [
			'file'      => 'site-team',
			'width'     => 656,
			'height'    => 1080,
			'sizes'     => [ 480 => [ 480, 790 ], 656 => [ 656, 1080 ] ],
			'alt'       => 'The Westmarc project team on site',
			'attachment'=> 26212,
		],
		'founder' => [
			'file'      => 'founder',
			'width'     => 720,
			'height'    => 1080,
			'sizes'     => [ 480 => [ 480, 720 ], 720 => [ 720, 1080 ] ],
			'alt'       => 'Marcel Nweze, founder and CEO of Westmarc Nigeria Limited',
			'attachment'=> 25987,
		],
		'plan-ground' => [
			'file'      => 'plan-ground',
			'width'     => 1400,
			'height'    => 845,
			'sizes'     => [ 600 => [ 600, 362 ], 1000 => [ 1000, 604 ], 1400 => [ 1400, 845 ] ],
			'alt'       => 'Ground floor plan - 20 office spaces and shops',
			'attachment'=> 25341,
		],
		'plan-first' => [
			'file'      => 'plan-first',
			'width'     => 1400,
			'height'    => 817,
			'sizes'     => [ 600 => [ 600, 350 ], 1000 => [ 1000, 584 ], 1400 => [ 1400, 817 ] ],
			'alt'       => 'First floor plan - 20 office spaces and shops',
			'attachment'=> 25342,
		],
		'plan-second' => [
			'file'      => 'plan-second',
			'width'     => 1400,
			'height'    => 908,
			'sizes'     => [ 600 => [ 600, 389 ], 1000 => [ 1000, 649 ], 1400 => [ 1400, 908 ] ],
			'alt'       => 'Second floor plan - 20 office spaces and shops',
			'attachment'=> 25343,
		],
		'logo-horizontal' => [
			'file'      => 'logo-horizontal',
			'full_file' => 'logo-horizontal.webp',
			'width'     => 1263,
			'height'    => 299,
			'sizes'     => [ 1263 => [ 1263, 299 ] ],
			'alt'       => 'Westmarc Nigeria Limited',
			'attachment'=> 26202,
		],
		'logo-vertical' => [
			'file'      => 'logo-vertical',
			'full_file' => 'logo-vertical.webp',
			'width'     => 560,
			'height'    => 458,
			'sizes'     => [ 560 => [ 560, 458 ] ],
			'alt'       => 'Westmarc Nigeria Limited',
			'attachment'=> 26203,
		],
		'video-poster' => [
			'file'      => 'video-poster',
			'full_file' => 'video-poster.webp',
			'width'     => 352,
			'height'    => 640,
			'sizes'     => [ 352 => [ 352, 640 ] ],
			'alt'       => 'Urban Tola Mall site progress walkthrough video poster',
			'attachment'=> 26205,
		],
	];

	return $map;
}

/**
 * Base URL for the optimized media folder.
 *
 * @return string
 */
function wm_media_base_url() {
	return content_url( '/uploads/2026/11/wm-opt' );
}

/**
 * Get one asset URL.
 *
 * @param string   $key   Asset key.
 * @param int|null $width Preferred derivative width.
 * @return string
 */
function wm_asset_url( $key, $width = null ) {
	$map = wm_media_map();

	if ( ! isset( $map[ $key ] ) ) {
		return '';
	}

	$asset   = $map[ $key ];
	$widths  = array_keys( $asset['sizes'] );
	$target  = null === $width ? max( $widths ) : (int) $width;
	$closest = $widths[0];

	foreach ( $widths as $candidate ) {
		if ( abs( $candidate - $target ) < abs( $closest - $target ) ) {
			$closest = $candidate;
		}
	}

	if ( $closest === max( $widths ) && ! empty( $asset['full_file'] ) ) {
		return wm_media_base_url() . '/' . $asset['full_file'];
	}

	return wm_media_base_url() . '/' . $asset['file'] . '-' . $closest . '.webp';
}

/**
 * Build a srcset string for an asset.
 *
 * @param string $key Asset key.
 * @return string
 */
function wm_asset_srcset( $key ) {
	$map = wm_media_map();

	if ( ! isset( $map[ $key ] ) ) {
		return '';
	}

	$asset  = $map[ $key ];
	$srcset = [];

	$max_width = max( array_keys( $asset['sizes'] ) );

	foreach ( $asset['sizes'] as $width => $dimensions ) {
		$file = ( $width === $max_width && ! empty( $asset['full_file'] ) ) ? $asset['full_file'] : $asset['file'] . '-' . $width . '.webp';
		$srcset[] = wm_media_base_url() . '/' . $file . ' ' . $width . 'w';
	}

	return implode( ', ', $srcset );
}

/**
 * Get the alt text for an asset, preferring the media library value.
 *
 * @param string $key Asset key.
 * @return string
 */
function wm_asset_alt( $key ) {
	$map = wm_media_map();

	if ( ! isset( $map[ $key ] ) ) {
		return '';
	}

	$asset = $map[ $key ];
	$alt   = '';

	if ( ! empty( $asset['attachment'] ) ) {
		$alt = (string) get_post_meta( (int) $asset['attachment'], '_wp_attachment_image_alt', true );
	}

	return $alt ? $alt : $asset['alt'];
}

/**
 * Output an optimized responsive image.
 *
 * @param string $key  Asset key.
 * @param array  $args Optional attributes.
 * @return string
 */
function wm_image( $key, $args = [] ) {
	$map = wm_media_map();

	if ( ! isset( $map[ $key ] ) ) {
		return '';
	}

	$asset = $map[ $key ];

	$defaults = [
		'alt'           => wm_asset_alt( $key ),
		'class'         => '',
		'sizes'         => '(max-width: 900px) 100vw, 50vw',
		'loading'       => 'lazy',
		'fetchpriority' => '',
		'decoding'      => 'async',
		'width'         => $asset['width'],
		'height'        => $asset['height'],
		'src_width'     => null,
	];

	$args = wp_parse_args( $args, $defaults );

	$attrs = [
		'src'      => wm_asset_url( $key, $args['src_width'] ),
		'srcset'   => wm_asset_srcset( $key ),
		'sizes'    => $args['sizes'],
		'width'    => (int) $args['width'],
		'height'   => (int) $args['height'],
		'alt'      => $args['alt'],
		'loading'  => $args['loading'],
		'decoding' => $args['decoding'],
	];

	if ( $args['class'] ) {
		$attrs['class'] = $args['class'];
	}

	if ( $args['fetchpriority'] ) {
		$attrs['fetchpriority'] = $args['fetchpriority'];
	}

	$output = '<img';

	foreach ( $attrs as $name => $value ) {
		if ( '' === $value || null === $value ) {
			continue;
		}
		$output .= ' ' . $name . '="' . esc_attr( $value ) . '"';
	}

	return $output . ' />';
}

/**
 * Output a picture element with a WebP source and an original JPEG fallback.
 *
 * @param string $key  Asset key.
 * @param array  $args Optional attributes.
 * @return string
 */
function wm_picture( $key, $args = [] ) {
	$args = wp_parse_args(
		$args,
		[
			'class' => '',
			'sizes' => '(max-width: 900px) 100vw, 50vw',
		]
	);

	return '<picture>'
		. '<source type="image/webp" srcset="' . esc_attr( wm_asset_srcset( $key ) ) . '" sizes="' . esc_attr( $args['sizes'] ) . '">'
		. wm_image( $key, $args )
		. '</picture>';
}
