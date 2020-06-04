<?php

require_once get_template_directory() . '/lib/init.php';

add_filter( 'genesis_disable_microdata', '__return_true' );

add_filter( 'nav_menu_item_id', '__return_null' );

remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav' );

remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

add_theme_support( 'align-wide' );

add_theme_support(
	'genesis-custom-logo',
	[
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	]
);

add_theme_support(
	'genesis-structural-wraps',
	[
		'header',
		'entry-header',
		'footer',
	]
);

add_theme_support( 'soil-clean-up' );
add_theme_support( 'soil-disable-asset-versioning' );
add_theme_support( 'soil-disable-trackbacks' );
add_theme_support( 'soil-google-analytics', 'UA-168261960-1' );
add_theme_support( 'soil-js-to-footer' );
add_theme_support( 'soil-nav-walker' );
add_theme_support( 'soil-nice-search' );
add_theme_support( 'soil-relative-urls' );

if ( ! is_admin() ) {
	add_theme_support( 'soil-disable-rest-api' );
}

add_action( 'wp_enqueue_scripts', function () {
	$slug = 'optimizewp-';
	$dir  = trailingslashit( get_stylesheet_directory_uri() . '/css/' );

	wp_enqueue_style( $slug . 'normalize', $dir . 'normalize.css' );
	wp_enqueue_style( $slug . 'variables', $dir . 'variables.css' );
	wp_enqueue_style( $slug . 'fonts', $dir . 'fonts.css' );
	wp_enqueue_style( $slug . 'main', $dir . 'main.css' );
	wp_enqueue_style( $slug . 'header', $dir . 'header.css' );
	wp_enqueue_style( $slug . 'nav', $dir . 'nav.css' );
	wp_enqueue_style( $slug . 'footer', $dir . 'footer.css' );
	wp_enqueue_style( $slug . 'blocks', $dir . 'blocks.css' );
	wp_enqueue_style( $slug . 'desktop', $dir . 'desktop.css' );
	wp_enqueue_style( $slug . 'utilities', $dir . 'utilities.css' );
} );

add_filter( 'walker_nav_menu_start_el', function ( $menu_item ) {
	if ( strpos( $menu_item, 'href="#"' ) !== false ) {
		$menu_item = str_replace( 'href="#"', 'href="javascript:void(0);"', $menu_item );
	}

	return $menu_item;
}, 11 );

add_filter( 'nav_menu_link_attributes', function ( $atts ) {
	$atts['class'] = 'menu-item-link';
	$atts['class'] .= $atts['aria-current'] ? ' menu-item-link-current' : '';

	if ( isset( $atts['title'] ) && $atts['title'] ) {
		$atts['class'] = $atts['title'];

		unset( $atts['title'] );
	}

	return $atts;
} );

add_filter( 'wp_nav_menu_objects', function ( $items ) {
	$items[1]->classes[]                 = 'menu-item-first';
	$items[ count( $items ) ]->classes[] = 'menu-item-last';

	return $items;
} );

add_filter( 'nav_menu_css_class', function ( $classes ) {
	$whitelist = [
		'menu-item',
		'menu-item-first',
		'menu-item-last',
		'has-button',
	];

	foreach ( $classes as $index => $class ) {
		if ( ! in_array( $class, $whitelist, true ) ) {
			unset( $classes[ $index ] );
		}

		if ( 'has-button' === $class ) {
			unset( $classes[ $index ] );
			$classes[] = 'has-button';
		}
	}

	return $classes;
} );

add_filter( 'genesis_attr_entry-header', function ( $atts ) {
	if ( is_singular( 'page' ) ) {
		$atts['class'] .= ' alignfull has-gradient';
	}

	return $atts;
} );
