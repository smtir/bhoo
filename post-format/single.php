<?php if ( has_post_thumbnail() && ! post_password_required() ) {
the_post_thumbnail('full', array('class' => 'thumbnaill img-responsive'));
} ?>    
<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</header><!-- .entry-header -->

<div class="entry">
	<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cookingwp' ),
				'after'  => '</div>',
			) );
		?>
</div> <!-- End: .entry -->	