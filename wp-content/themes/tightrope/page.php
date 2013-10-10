<?php get_header(); ?>
<div class="column_center">
   <div class="indent_center">
       <div class="inner">
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