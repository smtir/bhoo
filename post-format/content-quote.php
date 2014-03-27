        <div class="entry-qoute">
            <p><i class="fa fa-quote-left pull-left fa-2x"></i><?php echo rwmb_meta( 'cookingwp_qoute' ); ?></p>
            <p><small><?php echo rwmb_meta( 'cookingwp_qoute_author' ); ?></small></p>
        </div>
<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</header><!-- .entry-header -->

<div class="entry">
	<?php the_excerpt(''); ?>
</div> <!-- End: .entry -->	