<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package CookingWp
 */
?>

	<div id="secondary" class="sidebar">     
		<?php dynamic_sidebar( 'sidebar' ); ?>

		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>

		<aside id="archives" class="widget widget_archive">
			<h2 class="widget-title"><?php _e( 'Archives', 'cookingwp' ); ?></h2>
			<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget widget_meta">
			<h2 class="widget-title"><?php _e( 'Meta', 'cookingwp' ); ?></h2>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
		</aside>

	</div> <!-- End: Sidebar -->

            