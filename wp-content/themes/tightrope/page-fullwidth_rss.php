<?php /* Template Name: Full Width + RSS */ ?>
<?php get_header(); ?>
<div class="column_center">
       <div class="inner">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <!-- article begin -->
          <div class="text_box">
             <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
             <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
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
          </div>
          <?php endwhile; endif; ?>
       </div>
</div>
<?php get_footer(); ?>