<?php if ( has_post_thumbnail() && ! post_password_required() ) {
the_post_thumbnail('full', array('class' => 'thumbnaill img-responsive'));
} else { ?>
<img src="<?php bloginfo('template_url'); ?>/img/thumb.jpg" alt="<?php the_title(); ?>" class="thumbnaill img-responsive" />
<?php } ?>    
<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</header><!-- .entry-header -->

<div class="entry">
	<?php the_excerpt(''); ?>
</div> <!-- End: .entry -->	