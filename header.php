<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package CookingWp
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en-US"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>><!--<![endif]-->
    <head>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <!-- Meta -->    
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="cache-control" content="public">
        <meta name="description" content="Wordpress Advance tutorial , tips , freebie , themes and much more">        				
        <meta name="keywords" content="Wordpress Advance tutorial , tips , freebie , themes, plugins">
        <meta name="distribution" content="global">
        <meta name="robots" content="follow, all">    
        <meta name="author" content="Tawhidul Islam">
        <meta name="copyright" content="Tawhidul Islam">
        <meta name="designer" content="Tawhidul Islam">
        <meta name="language" content="en_US">
        <meta name="city" content="Dhaka">
        <meta name="country" content="Bangladesh">
    <!-- Facebook Meta -->
    	<meta property="og:title" content="<?php bloginfo('name'); ?> -<?php bloginfo('description'); ?>">
        <?php 
            if ( has_post_thumbnail()) {
            $catch_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
            echo '<meta property="og:image" content="' . $catch_image[0] . '">';
            } 
            else {
            $else_image = get_template_directory_uri() .'/color/css/logo.png';    
            echo'<meta property="og:image" content="' . $else_image . '">';
            }
        ?>

        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        <meta property="og:description" content="Wordpress Advance tutorial , tips , freebie , themes and much more">
    <!-- Stylesheet -->    	
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        
    <!-- Favicon -->    
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <!--[if lt IE 9]>
        <script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
    <![endif]-->

    <!-- Default  -->
    	<link rel="author" href="https://plus.google.com/106740996425883955870/posts" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
    	<link rel="canonical" href="<?php bloginfo('url'); ?>" />
    	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    	<?php wp_get_archives('type=monthly&format=link'); ?> 
    	<?php wp_head(); ?>
        <?php wp_enqueue_script( 'jquery' ); ?>
    <!-- End:Default  -->

    <!-- Colors-->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/blue.css" title="blue">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/green.css" title="green">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/orange.css" title="orange">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/purple.css" title="purple">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/slate.css" title="slate">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/yellow.css" title="yellow">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/red.css" title="red">
        <link rel="alternate stylesheet" href="<?php bloginfo('template_url'); ?>/color/css/blue-munsell.css" title="blue-munsell">

    <!-- Style Switcher -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/color/demo/toggle.css">
    </head>
    <body <?php body_class(); ?>>
    <div class="container">
         <!--[if lt IE 7]>
            <div class="alert alert-danger fadein">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4 class="alert-heading">Oh snap! You got an error!</h4>
            <p>You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          </div>
        <![endif]-->
        
         <header>
            <div class="header-pre">
                <div class="row">
                    <div class="col-md-6">
                        <div class="time">
                            <p>Today <?php date_default_timezone_set("Asia/Dhaka");  echo date('jS F, Y, l,') ?> <?php echo date('g:i A'); ?></p>
                        </div> <!-- End: time -->
                    </div> <!-- End: time(col-md-6) -->
                    
                    <div class="col-md-6">
                        <div class="social">
                            <ul>
                                <li><a href="" target="_blank" class="twitter" title="Follow on Twitter"></a></li>
                                <li><a href="" target="_blank" class="facebook" title="Subscribe on Facebook"></a></li>
                                <li><a href="" target="_blank" class="google-plus" title="I'm here google-plus"></a></li>
                                <li><a href="" target="_blank" class="rss" title="Subscribe my RSS feed"></a></li>
                            </ul>
                        </div> <!-- End: social -->
                    </div> <!-- End: social(col-md-6) -->
                </div> <!-- End: header-pre row -->
            </div> <!-- End: header-pre -->
        
            <div class="header">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                        </div> <!-- End: logo -->
                    </div> <!-- End: header(col-md-3) -->
                        
                    <div class="col-md-9">
                        <div class="menus visible-md visible-lg">
                            <nav id="main-nav">
                                                                  
                                  <?php wp_nav_menu( 
                                      array( 
                                       'container' => false,
                                       'theme_location' => 'main-menu',
                                       'menu_class'      => 'menu',
                                       'menu_id'         => '',
                                       'fallback_cb'     => 'wp_page_menu',
                                       'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
                                           )
                                         ); 
                                    ?>
                                </nav>
                            </div> <!-- End: menu -->
                            
                            <div class="mobile-menu hidden-md hidden-lg">
                                <?php wp_nav_menu( 
                                  array( 
                                    'container' => false,
                                    'theme_location' => 'main-menu',
                                    'fallback_cb'     => 'responsivenavfallback',
                                    'items_wrap'     => '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation =>' ) .       '</option>%3$s</select>',
                                    'walker'         => new Walker_Nav_Menu_Responsive(),  
                                    'depth'           => 0,
                                       )
                                     ); 
                                ?>
                            </div> <!-- End: mobile menu -->
                        </div> <!-- End: header(col-md-9) -->
                    </div> <!-- End: header row -->
                </div> <!-- End: header -->
            </header>