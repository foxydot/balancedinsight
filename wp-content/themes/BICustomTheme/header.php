<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; News and Events <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/maxheight.js" type="text/javascript"></script>

<?php wp_head(); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type='text/javascript' src='http://www.balancedinsight.com/js/slides.min.jquery.js'></script>

<script>
jQuery(document).ready(function() {
	// Home page slider
	jQuery("#homeFeature").slides({
		generatePagination: true,
		pagination: true,
		effect: 'slide',
		start: 1,
		generateNextPrev: false,
		play: 7000
	});
	// Toggle Articles
	jQuery("#expandRow").click(function(){
		//	jQuery("table#assets tr.hideRow").show();
			
		//	alert("test");
		      //$("table#assets tr.hideRow").show();
		      //return false;
				if (jQuery("table#assets tr.hideRow").is(":hidden")) {
					jQuery("table#assets tr.hideRow").show();
					jQuery(this).text('- View Fewer');
				} else {
					jQuery("table#assets tr.hideRow").hide();
					jQuery(this).text('+ View All');
				}
				return false;
		      
			});
	
});
</script>
</head>

<body onload="new ElementMaxHeight();">
<div class="min_width">
         <div class="main">
            <!--header -->
            <div id="header">
               <div class="row-1">
                  <div class="logo">
                  	 <a href="<?php echo get_settings('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/Blank.gif" height="95" width="299" /></a>
                     <h1><?php bloginfo('name'); ?></h1>
                     <span><?php bloginfo('description'); ?></span>
                  </div>
                  <div class="mininavbar">
                     <?php
					  if(function_exists('wp_nav_menu')) {
					  wp_nav_menu(array(
					  'theme_location' => 'mini-nav',
					  'container' => '',
					  'container_id' => 'logo-inner',
					  'menu_id' => 'mini-nav',
					  'fallback_cb' => 'mininav_fallback',
					  'depth' => '1',
					  ));
					  } else {
					  ?>
					  <!-- Hard-coded menu -->
					  <ul id="mini-nav" role="navigation">
					  <li><a href="wp-login.php">Customer Login</a></li>
					  <li><a href="index.php?page_id=66">Support</a></li>
					  <li><a href="http://www.balancedinsight.com/blog/">Blog</a></li>
					  <li><a href="index.php?page_id=252">Contact Us</a></li>
					  </ul> <!-- #top-nav -->
					  <?php
					  }
					  ?>
                 </div>
                 <div class="block_search">
                     <?php include (TEMPLATEPATH . "/searchform.php"); ?>
                 </div>
              </div>
              <div class="row-2">
                     <?php
                      if(function_exists('wp_nav_menu')) {
                      wp_nav_menu(array(
                      'theme_location' => 'top-nav',
                      'container' => 'div',
                      'container_id' => 'mainsitenav',
                      'menu_id' => 'top-nav',
                      'fallback_cb' => 'topnav_fallback',
					  'depth' => '2',
                      ));
                      } else {
                      wp_list_pages('title_li=');
                      }
                      ?>
               </div>
            </div>
            <!--header end-->
            <!--content -->
            <div class="content">
                  <div class="wrapper">