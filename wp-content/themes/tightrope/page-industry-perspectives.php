<?php /* Template Name: Industry Perspectives*/ ?>

<?php get_header(); ?>
<div class="column_center">
   <div class="indent_center">
       <div class="inner">
    <h1><img class="alignright size-full wp-image-946" title="header-image-about-bi" src="http://www.balancedinsight.com/wp-content/uploads/2010/09/header-image-about-bi.png" alt="Industry Perspectives" width="168" height="137" /><span id="two-line">OUR BEST THINKING:<br />SOLVING THE CHALLENGES OF<br />BI DELIVERY</span></h1>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <!-- article begin -->
          <div class="text_box">
             <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                          <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          </div>
          <?php endwhile; endif; ?>
       </div>
   </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>