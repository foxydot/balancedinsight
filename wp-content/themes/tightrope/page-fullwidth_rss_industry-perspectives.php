<?php /* Template Name: Full+RSS - Industry Perspctv  */ ?>
<?php get_header(); ?>
<div class="column_center">
       <div class="inner">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <!-- article begin -->
          <div class="text_box">
	<h1><img class="alignright size-full wp-image-946" title="header-image-about-bi" src="http://www.balancedinsight.com/wp-content/uploads/2010/09/header-image-about-bi.png" alt="Industry Perspectives" width="168" height="137" /><span id="two-line">OUR BEST THINKING:<br />SOLVING THE CHALLENGES OF<br />BI DELIVERY</span></h1>
	
   
            <h3><img class="alignleft size-full wp-image-234" title="Icon_RSSBlog" src="/wp-content/uploads/2012/08/icon-rss-38.png" alt="rss talk bubble" width="38" height="38" />
                 <span style="display:inline-block; padding-top:5px;">Highlights from our blog</h3>
            <table id="assets"><tbody><tr>
                         <?php
                                require_once (ABSPATH . WPINC . '/rss-functions.php');

                                $url = 'http://www.balancedinsight.com/blog/feed/';
                                $rss = fetch_rss( $url );
                                if ( $rss ) {
                                $i = 1;
                                foreach ($rss->items as $item) {
                                $href = $item['link'];
                                $title = $item['title'];
                                $description = $item['description'];
                                echo "<td><h4><a href=$href>$title</a></h4><p>$description</p></td>";
                                if ($i == 3 ) break;
                                $i = $i + 1;
                                }
                                echo "</td></tr></tbody></table>";
                                }
                                ?>
             <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
             <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          </div>
          <?php endwhile; endif; ?>
       </div>
</div>
<?php get_footer(); ?>
