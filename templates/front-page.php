<?php
/**
 * Template Name: Front Page
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

\add_action( 'genesis_loop', __NAMESPACE__ . '\front_page_content' );
\add_filter( 'body_class', __NAMESPACE__ . '\front_page_body_class' );
\add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );
\add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
\remove_action( 'genesis_loop', 'genesis_do_loop' );
\remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
\remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_posts_nav' );
\remove_theme_support( 'hero-section' );

function front_page_body_class( $classes ) {
	$classes   = \array_diff( $classes, [ 'no-hero-section' ] );
	$classes[] = 'front-page';

	return $classes;
}

function front_page_content() {
	?>
	<div class="front-page-1 hero-section" role="banner">
		<div class="wrap">
			<div class="three-fifths first">
				<h1 itemprop="headline">Search Engine Optimization for WordPress Sites</h1>
				<p>We provide a WordPress SEO service specializing in search engine optimization for small
					businesses
					and white-label SEO services for WordPress agencies
				</p>
				<br>
				<a href="#" class="button white">Get Free Site Analysis →</a>
			</div>
		</div>
	</div>

	<div class="front-page-logos">
		<div class="wrap">
			<small class="full-width first">Trusted by</small>
			<img src="<?php echo home_url( '/wp-content/uploads/2019/06/logo-1.png' ); ?>" class="one-fifth first">
			<img src="<?php echo home_url( '/wp-content/uploads/2019/06/logo-dark-small.png' ); ?>" class="one-fifth">
			<img src="<?php echo home_url( '/wp-content/uploads/2019/06/logo-wide-dark.png' ); ?>" class="one-fifth">
			<img src="<?php echo home_url( '/wp-content/uploads/2019/06/gsc-logo-dark.png' ); ?>" class="one-fifth">
			<img src="<?php echo home_url( '/wp-content/uploads/2019/06/hosting.png' ); ?>" class="one-fifth">
		</div>
	</div>
	<?php

	$sections = [
		[
			'icon'    => 'bolt',
			'title'   => 'Speed Optimization',
			'content' => 'We begin every SEO project by optimizing site performance and speed for the fastest load times possible',
		],
		[
			'icon'    => 'link',
			'title'   => 'Organic Link Building',
			'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
		],
		[
			'icon'    => 'file-search',
			'title'   => 'On Page SEO',
			'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
		],
		[
			'icon'    => 'typewriter',
			'title'   => 'Content Creation',
			'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
		],
		[
			'icon'    => 'sync-alt',
			'title'   => 'Site Maintenance',
			'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
		],
		[
			'icon'    => 'chart-line',
			'title'   => 'Analytics and Reporting',
			'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
		],
	];

	$count = 0;
	?>
	<div class="front-page-2">
		<div class="wrap">
			<div class="full-width first">
				<h2>WordPress SEO Services We Provide</h2>
				<br>
				&nbsp;
				<br>
				&nbsp;
				<br>
			</div>
			<?php foreach ( $sections as $section ) : ?>
				<div class="one-third<?php echo $count % 3 === 0 ? ' first' : ''; ?>">
					<?php echo do_shortcode( '[icon icon="' . $section['icon'] . '"]' ); ?>
					<h3><?php echo $section['title']; ?></h3>
					<p><?php echo $section['content']; ?></p>
					<br>
				</div>
				<?php $count++; ?>
			<?php endforeach; ?>
		</div>
	</div>


	<div class="front-page-3">
		<div class="wrap">
			<div class="one-half first">
				<h2>Benefit</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
					labore
					et dolore</p>
			</div>
			<img src="https://via.placeholder.com/1280x720/f5f5f5/f5f5f5?text=Placeholder" class="one-half">
			<img src="https://via.placeholder.com/1280x720/f5f5f5/f5f5f5?text=Placeholder" class="one-half first">
			<div class="one-half">
				<h2>Benefit</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
					labore
					et dolore</p>
			</div>
		</div>
	</div>


	<?php


}

\genesis();
