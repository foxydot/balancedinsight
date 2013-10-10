<?php get_header(); ?>
<div class="column_center">
   <div class="indent_center">
       <div class="inner">
		<h1><img class="alignright size-full wp-image-946" title="Balanced Insight Blog" src="http://www.balancedinsight.com/wp-content/uploads/2010/09/header-image-about-bi.png" alt="About Balanced Insight" width="168" height="137" /><span id="one-line">Balanced Insight Blog</span><br><span class="h1sub">Solving Common BI Delivery Challenges</span></h1>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          	<div class="title top20">
             	<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
             	<!--<p class="date"><?php tm_date('');?></p>-->
          	</div>
          	<div class="text_box">
             <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
             <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          	</div>
          <?php endwhile; else: ?>
          <p>Sorry, no posts matched your criteria.</p>
          <?php endif; ?>
       </div>
   </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
