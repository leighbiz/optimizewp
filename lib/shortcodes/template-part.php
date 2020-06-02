<?php

namespace SeoThemes\GenesisStarterTheme\Shortcodes;

use function SeoThemes\GenesisStarterTheme\Functions\get_theme_dir;

\add_shortcode( 'template_part', __NAMESPACE__ . '\template_part_shortcode' );
/**
 * Displays an icon.
 *
 * @since 3.5.0
 *
 * @param array $atts
 *
 * @return string
 */
function template_part_shortcode( $atts ) {
	$atts = \shortcode_atts(
		[
			'id' => '',
		],
		$atts,
		'template_part'
	);

	return require_once get_theme_dir() . 'template-parts/' . $atts['id'] . '.php';
}
