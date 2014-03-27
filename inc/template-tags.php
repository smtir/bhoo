<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CookingWp
 */

// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/admin/meta' ) );
define( 'RWMB_DIR', trailingslashit(  get_stylesheet_directory() . '/admin/meta' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';

require_once (get_template_directory().'/admin/metabox.php');

// Mobile Menu
class Walker_Nav_Menu_Responsive extends Walker_Nav_Menu {

    // don't output children opening tag ('<ul>')
    public function start_lvl(&$output, $depth=0, $args=array()){}

    // don't output children closing tag    
    public function end_lvl(&$output, $depth=0, $args=array()){}

    public function start_el(&$output, $item, $depth=0, $args=array(), $id = 0){

      // add spacing to the title based on the current depth
      $item->title = str_repeat("&#45; ", $depth ) . $item->title;
      parent::start_el($output, $item, $depth, $args);

      $output = str_replace( '<a', '<option', $output );
      $output = str_replace( 'href=', 'value=', $output );

  } 

    // replace closing </li> with the closing option tag
    public function end_el(&$output, $item, $depth=0, $args=array()){
      $output = str_replace( '</a>', '</option>', $output );
    }
}

// Fallback responsive menu when custom header menu has not been set.
function responsivenavfallback() {

    $output = wp_list_pages('echo=0&title_li=');
    $output = str_replace( '<a', '<option', $output );
    $output = str_replace( 'href=', 'value=', $output );
    $output = str_replace( '</a>', '</option>', $output );

    $output = strip_tags( $output, '<div>, <select>, <option>' );

    echo '<div class="mobile-menu hidden-md hidden-lg">',
         '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation =>' ) . '</option>' . $output . '</select>',
         '</div>';
}

// Related Post
function get_related_author_posts() {
    global $authordata, $post;

    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 8 ) );

    $output = '<ol class="rectangle-list">';
    foreach ( $authors_posts as $authors_post ) {
        $output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';
    }
    $output .= '</ul>';

    return $output;
}

// Pagination
function pagination($pages = '', $range = 5)
{
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<ul class=\"pagination pagination-lg\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; </a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; </a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"active\"><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"> &rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'> &raquo;</a></li>";
         echo "</ul>\n";
     }
}

// Adding Breadcrumbs
 function breadcrumbs() {

  $delimiter = '<span class="divider">/</span>';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ul class="breadcrumb">';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Category Archive "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( has_post_format( 'aside' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'aside' ) .'" title="'. get_post_format_string(aside) .' Format Post">'. get_post_format_string(aside) .'</a>' . $after;

    } elseif ( has_post_format( 'chat' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'chat' ) .'" title="'. get_post_format_string(chat) .' Format Post">'. get_post_format_string(chat) .'</a>' . $after;

    } elseif ( has_post_format( 'status' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'status' ) .'" title="'. get_post_format_string(status) .' Format Post">'. get_post_format_string(status) .'</a>' . $after;

    } elseif ( has_post_format( 'quote' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'quote' ) .'" title="'. get_post_format_string(quote) .' Format Post">'. get_post_format_string(quote) .'</a>' . $after;

    } elseif ( has_post_format( 'image' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'image' ) .'" title="'. get_post_format_string(image) .' Format Post">'. get_post_format_string(image) .'</a>' . $after;

    } elseif ( has_post_format( 'gallery' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'gallery' ) .'" title="'. get_post_format_string(gallery) .' Format Post">'. get_post_format_string(gallery) .'</a>' . $after;

    } elseif ( has_post_format( 'audio' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'audio' ) .'" title="'. get_post_format_string(audio) .' Format Post">'. get_post_format_string(audio) .'</a>' . $after;

    } elseif ( has_post_format( 'video' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'video' ) .'" title="'. get_post_format_string(video) .' Format Post">'. get_post_format_string(video) .'</a>' . $after;

    } elseif ( has_post_format( 'link' ) ) {
      echo $before .  '<a href="'. get_post_format_link( 'link' ) .'" title="'. get_post_format_string(link) .' Format Post">'. get_post_format_string(link) .'</a>' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Tags Archive "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Post Writer ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Oops! 404 Error' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || has_post_format( 'aside' ) || has_post_format( 'chat' ) || has_post_format( 'status' ) || has_post_format( 'quote' ) || has_post_format( 'image' ) || has_post_format( 'gallery' ) || has_post_format( 'audio' ) || has_post_format( 'video' ) || has_post_format( 'link' ) || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || has_post_format( 'aside' ) || has_post_format( 'chat' ) || has_post_format( 'status' ) || has_post_format( 'quote' ) || has_post_format( 'image' ) || has_post_format( 'gallery' ) || has_post_format( 'audio' ) || has_post_format( 'video' ) || has_post_format( 'link' ) || is_tag() || is_author() ) echo ')';
    }

    echo '</ul>';

  }
} // end breadcrumbs()

// Expert Post
function new_excerpt_length($length) { 
    return 75;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
       global $post;
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');

// Post Navigation
if ( ! function_exists( 'cookingwp_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function cookingwp_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span>', 'Previous post link', 'cookingwp' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '<span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'Next post link',     'cookingwp' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

