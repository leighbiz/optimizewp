<?php

namespace SeoThemes\GenesisStarterTheme\Shortcodes;

use function SeoThemes\GenesisStarterTheme\Functions\get_theme_dir;

\add_shortcode( 'icon', __NAMESPACE__ . '\icon_shortcode' );
/**
 * Displays an icon.
 *
 * @since 3.5.0
 *
 * @param array $atts
 *
 * @return string
 */
function icon_shortcode( $atts ) {
	$atts = \shortcode_atts(
		[
			'icon' => 'star',
		],
		$atts,
		'icon'
	);

	$file = get_theme_dir() . 'assets/svg/' . $atts['icon'] . '.svg';

	return \str_replace( 'viewBox', 'class="icon" viewbox', \file_get_contents( $file ) );
}
