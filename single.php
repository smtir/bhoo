<?php get_header(); ?> 
            <section class="row">  
                <div class="col-md-8">
                    <div class="breadcrumbs">
                        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
                    </div> <!-- End: breadcrumb -->
                    
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php if ( have_posts() ) : ?>

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
                            <div class="entry-content col-md-12">

                            <?php 
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'post-format/single', get_post_format() ); ?>            
 
                            </div> <!-- End: entry(col-md-8) -->
                           
                            </article>
                            <?php endwhile; ?>

                            <?php else: ?>
                            <?php get_template_part( 'post-format/content', 'none' ); ?>
                            <?php endif; ?>
                        </main> <!-- End: #main -->

                        <?php cookingwp_post_nav(); ?>
                        
                    </div> <!-- End: Content -->   
                </div>
               
                <div class="col-md-4">
                    <aside class="sidebar">         
                        <?php get_sidebar(); ?>
                    </aside>
                </div> <!-- End: sidebar(col-md-4) -->
            </section>
        </div>    
<?php get_footer(); ?>