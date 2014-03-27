<article class="post">
<div class="entry-content col-md-12">
	<header class="entry-header">
	<h1 class="entry-title"><?php _e( 'Nothing Found', 'cookingwp' ); ?></h1>
</header><!-- .entry-header -->

	<div class="entry">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cookingwp' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cookingwp' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cookingwp' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->


</div> <!-- End: entry(col-md-8) -->

</article>

