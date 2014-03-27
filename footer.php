<?php
/**
 * The template for displaying the footer.
 * @package CookingWp
 */
?>
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'Footer Sidebar 1' ); ?>    
                    </div> <!-- End: footer widget(col-md-4) -->
                
                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'Footer Sidebar 2' ); ?>
                    </div> <!-- End: footer widget(col-md-4) -->
                    
                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'Footer Sidebar 3' ); ?>
                    </div> <!-- End: footer widget(col-md-4) -->
                    
                </div> <!-- End: footer row -->
            </div> <!-- End: footer container -->
            
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <nav class="footer-nav">
                        <?php wp_nav_menu( 
                              array( 
                               'container' => false,
                               'theme_location' => 'footer-menu',
                               'fallback_cb'     => 'wp_page_menu',
                               'items_wrap'      => '<ul>%3$s</ul>'
                                   )
                                 ); 
                            ?>    
                        </nav>
                        </div> <!-- End: footer nav(col-md-6) -->
                        
                        <div class="col-md-6">
                            <p class="copy-text">&copy; Copyright 2013. All Rights Reserved.</p>
                        </div> <!-- End: copyright(col-md-6) -->
                    </div> <!-- End: footer copyright row -->
                </div> <!-- End: footer copyright container -->
            </div> <!-- End: footer copyright -->   
    </footer>
        
    <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

    <?php wp_footer(); ?>

    <script type="text/javascript">
        $(document).ready(function() {
        var nicesx = $("body").niceScroll({cursorcolor:"#5A1177",background:"#fff",cursorwidth:5,cursorborder:0,cursorborderradius:0,cursoropacitymax:1,scrollspeed:50,touchbehavior:false,autohidemode:false,smoothscroll: true,hwacceleration: true});
        });  
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
    $(".overlay-main").mouseenter(function() {
               $(".overlay-hover").show();
    });
    $(".overlay-main").mouseleave(function() {
               $(".overlay-hover").hide();
    });
});  
    </script>

    
    <?php include(TEMPLATEPATH.'/color/switch.php'); ?>
        
    </body>
</html>