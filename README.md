Bhoo Responsive Wordpress Themes, 
Testing Edit Readme file

Underline border
----------
***
#Font Big
##Font mediam
###Font small
**Font bold**
_Font Italic_
Font normal

> Blockquote

Inline coding `<?php wp_nav_menu( ); ?>`

Default coding
```
<div class="responsive-nav">
    <?php wp_nav_menu( 
      array( 
        'container' => false,
        'theme_location' => 'main-menu',
        'fallback_cb'     => 'responsivenavfallback',
        'items_wrap'     => '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation' ) .       '</option>%3$s</select>',
        'walker'         => new Walker_Nav_Menu_Responsive(),  
        'depth'           => 0,
           )
         ); 
    ?>
</div>
```

PHP coding
```php
<div class="responsive-nav">
    <?php wp_nav_menu( 
      array( 
        'container' => false,
        'theme_location' => 'main-menu',
        'fallback_cb'     => 'responsivenavfallback',
        'items_wrap'     => '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation' ) .       '</option>%3$s</select>',
        'walker'         => new Walker_Nav_Menu_Responsive(),  
        'depth'           => 0,
           )
         ); 
    ?>
</div>
```

CSS Coding
```css
.selector {
background: red;
padding: 0;
margin: 0;
}
```

Bullete
+ Test 1
+ Test 2
+ Test 3

[Link](http://www.rm2334.com "Test Desc")

[![Alt](https://www.google.com.bd/images/srpr/logo11w.png "With link + Desc")](https://www.rm2334.com)
