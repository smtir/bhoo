
        <?php $slides = rwmb_meta('cookingwp_gallery_images','type=image_advanced'); ?>
        <?php $count = count($slides); ?>
        <?php if($count > 0): ?>
            <div id="gallery-format-slider" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <?php $slide_no = 1; ?>

                    <?php foreach( $slides as $slide ): ?>
                        <div class="item <?php if($slide_no == 1){ echo 'active'; }; ?>">
                            <img src="<?php echo $slide['full_url']; ?>" alt="">
                        </div>
                        <?php $slide_no++ ?>
                    <?php endforeach; ?>

                </div>

                <!-- Controls -->
                <a class="prev" href="#gallery-format-slider" data-slide="prev"></a>
                <a class="next" href="#gallery-format-slider" data-slide="next"></a>
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