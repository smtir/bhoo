<div class="imgeffect aligncenter"> 
	<div class="bhoo">

<a href="http://rtthemes.com" target="_blank" class="icon-forward" title="Go to: http://rtthemes.com"></a>

<a href="http://rttheme18.demo-rt.com/link-post-type/" class="icon-link" title="Read more: Link Post Type" rel="bookmark"></a>

<a href="http://rtthemes.com" target="_blank" class="icon-forward" title="Go to: http://rtthemes.com"></a>

<a href="http://rttheme18.demo-rt.com/link-post-type/" class="icon-link" title="Read more: Link Post Type" rel="bookmark"></a>

<a href="http://rtthemes.com" target="_blank" class="icon-forward" title="Go to: http://rtthemes.com"></a>

<a href="http://rttheme18.demo-rt.com/link-post-type/" class="icon-link" title="Read more: Link Post Type" rel="bookmark"></a>

</div>

<?php if ( has_post_thumbnail() && ! post_password_required() ) {
the_post_thumbnail('full', array('class' => 'thumbnaill img-responsive'));
} else { ?>
<img src="<?php bloginfo('template_url'); ?>/img/thumb.jpg" alt="<?php the_title(); ?>" class="thumbnaill img-responsive" />
<?php } ?>
</div>

<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</header><!-- .entry-header -->

<div class="entry">
	<?php the_excerpt(''); ?>
</div> <!-- End: .entry -->	