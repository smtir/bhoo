        <div class="entry-video single">
            
            <?php $video_source = rwmb_meta( 'cookingwp_video_source' ); ?>
            <?php $video = rwmb_meta( 'cookingwp_video' ); ?>

            <?php if($video_source == 1): ?>
                <?php echo rwmb_meta( 'cookingwp_video' ); ?>
            <?php elseif ($video_source == 2): ?>
                <?php echo '<iframe width="100%" height="200" src="http://www.youtube.com/embed/'.$video.'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>'; ?>
            <?php elseif ($video_source == 3): ?>
                <?php echo '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; ?>
            <?php endif; ?>

        </div>

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