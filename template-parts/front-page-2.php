<?php

$sections = [
	[
		'icon'    => 'tags',
		'title'   => '100% White Label',
		'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
	],
	[
		'icon'    => 'tachometer-alt-fast',
		'title'   => 'Speed and Performance',
		'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
	],
	[
		'icon'    => 'edit',
		'title'   => 'WordPress Experts',
		'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
	],
	[
		'icon'    => 'calendar-check',
		'title'   => 'Monthly SEO Services',
		'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
	],
	[
		'icon'    => 'sync-alt',
		'title'   => 'WordPress Maintenance',
		'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
	],
	[
		'icon'    => 'chart-line',
		'title'   => 'Keyword Tracking',
		'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore',
	],
];

$count = 0;

echo '<h2 class="full-width first">Why Choose OptimizeWP</h2>';

foreach ( $sections as $section ) : ?>
	<div class="one-third<?php echo $count % 3 === 0 ? ' first' : ''; ?>">
		<?php echo do_shortcode( '[icon icon="' . $section['icon'] . '"]' ); ?>
		<h3><?php echo $section['title']; ?></h3>
		<p><?php echo $section['content']; ?></p>
	</div>
	<?php $count++; ?>
<?php endforeach; ?>
