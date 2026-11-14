<?php
/**
 * Inline SVG icon set for the Westmarc redesign.
 */

function wm_icon( $name, $size = 24 ) {
	$paths = [
		'arrow-right' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'arrow-up-right' => '<path d="M7 17L17 7M8 7h9v9"/>',
		'phone' => '<path d="M6.6 3.5h3l1.5 4-2 1.5a14 14 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A18.5 18.5 0 0 1 3.5 5.7a2 2 0 0 1 2-2.2Z"/>',
		'mail' => '<rect x="3" y="5" width="18" height="14" rx="1.5"/><path d="m3.5 6.5 8.5 6 8.5-6"/>',
		'pin' => '<path d="M12 21s7-6.1 7-11a7 7 0 1 0-14 0c0 4.9 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5"/>',
		'building' => '<path d="M4 21V6l8-3v18M12 21h8V10l-8-4"/><path d="M7 8h1M7 11h1M7 14h1M7 17h1M15 12h2M15 15h2M15 18h2"/>',
		'management' => '<path d="M4 7h16M4 12h16M4 17h16"/><circle cx="8" cy="7" r="2"/><circle cx="15" cy="12" r="2"/><circle cx="10" cy="17" r="2"/>',
		'shield' => '<path d="M12 3 5 6v5c0 4.5 3 7.7 7 10 4-2.3 7-5.5 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>',
		'leaf' => '<path d="M20 4C12 4 5 8 5 15c0 3 2 5 5 5 7 0 10-8 10-16Z"/><path d="M5 20c3-5 7-8 12-10"/>',
		'income' => '<path d="M4 19V5M4 19h16"/><path d="m7 15 4-4 3 2 5-6"/><path d="M15 7h4v4"/>',
		'premises' => '<path d="M4 20V8l8-4 8 4v12"/><path d="M9 20v-6h6v6M4 20h16"/>',
		'consult' => '<path d="M21 12a8 8 0 0 1-8 8H5l2-3a8 8 0 1 1 14-5Z"/><path d="M8 11h8M8 14h5"/>',
		'reserve' => '<rect x="3" y="5" width="18" height="16" rx="1.5"/><path d="M8 3v4M16 3v4M3 10h18M9 15l2 2 4-4"/>',
		'payment' => '<rect x="2.5" y="5" width="19" height="14" rx="1.5"/><path d="M2.5 10h19M6 15h4"/>',
		'handover' => '<path d="M3 21h18M5 21V8l7-4 7 4v13"/><path d="M9 21v-6h6v6"/><path d="m12 9 1.5 1.5L16 8"/>',
		'play' => '<path d="M8 5v14l11-7Z"/>',
		'external' => '<path d="M14 4h6v6M20 4l-9 9"/><path d="M18 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h5"/>',
		'calendar' => '<rect x="3" y="5" width="18" height="16" rx="1.5"/><path d="M8 3v4M16 3v4M3 10h18"/>',
		'check' => '<path d="m5 12 4 4L19 6"/>',
	];

	$path = $paths[ $name ] ?? '';
	if ( ! $path ) {
		return '';
	}

	return '<svg width="' . (int) $size . '" height="' . (int) $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $path . '</svg>';
}
