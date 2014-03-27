<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * Contains the closing of the #container div and all content after
 * @package CookingWp
 */

get_header(); ?> 
    <section class="row">  
        <div class="col-md-8">
            
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                        if ( is_category() ) :
                            single_cat_title();

                        elseif ( is_tag() ) :
                            single_tag_title();

                        elseif ( is_author() ) :
                            printf( __( 'Author: %s', 'cookingwp' ), '<span class="vcard">' . get_the_author() . '</span>' );

                        elseif ( is_day() ) :
                            printf( __( 'Day: %s', 'cookingwp' ), '<span>' . get_the_date() . '</span>' );

                        elseif ( is_month() ) :
                            printf( __( 'Month: %s', 'cookingwp' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cookingwp' ) ) . '</span>' );

                        elseif ( is_year() ) :
                            printf( __( 'Year: %s', 'cookingwp' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'cookingwp' ) ) . '</span>' );

                        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                            _e( 'Asides', 'cookingwp' );

                        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                            _e( 'Galleries', 'cookingwp');

                        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                            _e( 'Images', 'cookingwp');

                        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                            _e( 'Videos', 'cookingwp' );

                        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                            _e( 'Quotes', 'cookingwp' );

                        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                            _e( 'Links', 'cookingwp' );

                        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                            _e( 'Statuses', 'cookingwp' );

                        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                            _e( 'Audios', 'cookingwp' );

                        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                            _e( 'Chats', 'cookingwp' );

                        else :
                            _e( 'Archives', 'cookingwp' );

                        endif;
                    ?></h1>
                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                ?>
            </header><!-- .page-header -->

            <div class="breadcrumbs">
                <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
            </div> <!-- End: breadcrumb -->

            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                    <div class="meta col-md-4">
                    <span class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?></span>
                    <?php $standard = ( has_post_format( 'standard' )); ?>
                    <?php if($standard != ''): ?>
                    <span class="post-format standard"><a href="<?php echo esc_url( get_post_format_link( 'standard' ) ); ?>" title="<?php echo get_post_format_string(standard); ?> Format Post"><?php echo get_post_format_string(standard); ?></a></span>
                    <?php endif; ?>
                    <?php $aside = ( has_post_format( 'aside' )); ?>
                    <?php if($aside != ''): ?>
                    <span class="post-format aside"><a href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>" title="<?php echo get_post_format_string(aside); ?> Format Post"><?php echo get_post_format_string(aside); ?></a></span>
                    <?php endif; ?>
                    <?php $chat = ( has_post_format( 'chat' )); ?>
                    <?php if($chat != ''): ?>
                    <span class="post-format chat"><a href="<?php echo esc_url( get_post_format_link( 'chat' ) ); ?>" title="<?php echo get_post_format_string(chat); ?> Format Post"><?php echo get_post_format_string(chat); ?></a></span>
                    <?php endif; ?>
                    <?php $status = ( has_post_format( 'status' )); ?>
                    <?php if($status != ''): ?>
                    <span class="post-format status"><a href="<?php echo esc_url( get_post_format_link( 'status' ) ); ?>" title="<?php echo get_post_format_string(status); ?> Format Post"><?php echo get_post_format_string(status); ?></a></span>
                    <?php endif; ?>
                    <?php $quote = ( has_post_format( 'quote' )); ?>
                    <?php if($quote != ''): ?>
                    <span class="post-format quote"><a href="<?php echo esc_url( get_post_format_link( 'quote' ) ); ?>" title="<?php echo get_post_format_string(quote); ?> Format Post"><?php echo get_post_format_string(quote); ?></a></span>
                    <?php endif; ?>
                    <?php $image = ( has_post_format( 'image' )); ?>
                    <?php if($image != ''): ?>
                    <span class="post-format image"><a href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>" title="<?php echo get_post_format_string(image); ?> Format Post"><?php echo get_post_format_string(image); ?></a></span>
                    <?php endif; ?>
                    <?php $gallery = ( has_post_format( 'gallery' )); ?>
                    <?php if($gallery != ''): ?>
                    <span class="post-format gallery"><a href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>" title="<?php echo get_post_format_string(gallery); ?> Format Post"><?php echo get_post_format_string(gallery); ?></a></span>
                    <?php endif; ?>
                    <?php $audio = ( has_post_format( 'audio' )); ?>
                    <?php if($audio != ''): ?>
                    <span class="post-format audio"><a href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>" title="<?php echo get_post_format_string(audio); ?> Format Post"><?php echo get_post_format_string(audio); ?></a></span>
                    <?php endif; ?>
                    <?php $video = ( has_post_format( 'video' )); ?>
                    <?php if($video != ''): ?>
                    <span class="post-format video"><a href="<?php echo esc_url( get_post_format_link( 'video' ) ); ?>" title="<?php echo get_post_format_string(video); ?> Format Post"><?php echo get_post_format_string(video); ?></a></span>
                    <?php endif; ?>
                    <?php $link = ( has_post_format( 'link' )); ?>
                    <?php if($link != ''): ?>
                    <span class="post-format link"><a href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>" title="<?php echo get_post_format_string(link); ?> Format Post"><?php echo get_post_format_string(link); ?></a></span>
                    <?php endif; ?>
                    
                    <span class="author"><i class="fa fa-pencil"></i> Tawhidul Islam</span>
                    <span class="times"><i class="fa fa-calendar"></i> <?php the_time('d F Y'); ?></span>
                    <span class="cat"><i class="fa fa-tags"></i> <?php the_category(', ') ?></span>
                    <?php the_tags('<span class="tag"><i class="fa fa-folder-open"></i> ', ', ', '</span>'); ?>
                    <span class="comment"><i class="fa fa-comments"></i> 9 Comments</span>
                    <span class="more"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">Read More <i class="fa fa-long-arrow-right"></i></a></span>
                    </div> <!-- End: meta(col-md-4) -->
                    
                    <div class="entry-content col-md-8">

                    <?php 
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'post-format/content', get_post_format() ); ?>

                    </div> <!-- End: entry(col-md-8) -->
                   
                    </article>
                    <?php endwhile; ?>

                    <?php else: ?>
                    <?php get_template_part( 'post-format/content', 'none' ); ?>
                    <?php endif; ?>
                </main> <!-- End: #main -->
                    
                <div class="col-md-12 pg-nav">
                    <?php if (function_exists("pagination")) {
                        pagination($additional_loop->max_num_pages);
                    } ?>
                </div> <!-- End: Pagination -->
            </div> <!-- End: Content -->   
        </div>
       
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div> <!-- End: sidebar(col-md-4) -->
    </section>
</div>    
<?php get_footer(); ?>