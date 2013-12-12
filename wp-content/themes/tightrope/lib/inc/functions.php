<?php
function regMyWidgets(){
    register_sidebar( array(
        'name' => __( 'Home Widgets Left','theme707' ),
        'before_widget' => '<div id="%1$s" class="widget_style %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 id="homewidgleft">',
    'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => __( 'Home Widgets Middle','theme707' ),
        'before_widget'=> '<div id="%1$s" class="widget_style %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 id="homewidgmiddle">',
    'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => __( 'Home Widgets Right','theme707' ),
        'before_widget' => '<div id="%1$s" class="widget_style %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 id="homewidgright">',
    'after_title' => '</h2>',
    ));

    register_sidebar( array(
    'name' => __( 'Sidebar','theme707' ),
    'before_widget' => '<div id="%1$s" class="widget_style %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));
}

add_action( 'widgets_init', 'regMyWidgets' );

function tm_date($d='', $before='', $after='', $echo = true) {
    global $id, $post, $day, $previousday, $newday;
    $the_date = '';
    $the_date .= $before;
    if ( $d=='' )
        $the_date .= mysql2date(get_option('date_format'), $post->post_date);
    else
        $the_date .= mysql2date($d, $post->post_date);
    $the_date .= $after;
    $previousday = $day;
    $the_date = apply_filters('the_date', $the_date, $d, $before, $after);
    if ( $echo )
        echo $the_date;
    else
        return $the_date;
}

function regMyMenus(){
  register_nav_menus( array(
    'top-nav' => __( 'Top-Level Navigation' ),
    'mini-nav' => __( 'Small Top-Level Navigation' ),
    'footer-nav' => __( 'Footer Navigation' ),

  ));
}

add_action( 'after_setup_theme', 'regMyMenus' );

function topnav_fallback() {
?>
<!-- Fallback menu -->
<ul id="top-nav" role="navigation">
<li><a href="index.php?page_id=44">Explore Consensus</a></li>
<li><a href="index.php?page_id=70">Services</a></li>
<li><a href="index.php?page_id=78">Partners</a></li>
<li><a href="index.php/?page_id=16">Company</a></li>
</ul> <!-- #top-nav -->
<?php
}
?>
<?php
function mininav_fallback() {
?>
<!-- Fallback menu -->
<ul id="mini-nav" role="navigation">
<li><a href="wp-login.php">Customer Login</a></li>
<li><a href="index.php?page_id=66">Support</a></li>
<li><a href="http://www.balancedinsight.com/blog/">Blog</a></li>
<li><a href="index.php?page_id=252">Contact Us</a></li>
</ul> <!-- #mini-nav -->
<?php
}