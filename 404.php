<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package CookingWp
 */

get_header(); ?> 
            <section class="row">  
                <div class="col-md-8">

                <header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'cookingwp' ); ?></h1>
				</header><!-- .page-header -->
				
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
                            /* Include the Page template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'post-format/content', 'page' ); ?>            
 
                            </div> <!-- End: entry(col-md-8) -->
                           
                            </article>
                            <?php endwhile; ?>

                            <?php else: ?>
                            <?php get_template_part( 'post-format/content', 'none' ); ?>
                            <?php endif; ?>
                        </main> <!-- End: #main -->
                        
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