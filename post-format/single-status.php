        <?php $status = rwmb_meta( 'cookingwp_status' ); ?>

        <?php if($status != ''): ?>
            <div class="entry-status single">
                <?php echo $status; ?>
            </div>
        <?php endif; ?>

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