<?php /* Template Name: Home*/ ?>
<?php get_header(); ?>
<div class="column_center">
       <div class="inner">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <!-- article begin -->
          <div class="text_box">
             <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                          <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          </div>
          <?php endwhile; endif; ?>
          <table id="widget-table">
            <tr>
              <td class="widget-left">
			  <div class="dialog">
				 <div class="content">
					<div class="t"></div><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(__('Home Widgets Left','theme707')) ) : endif; ?></div>
 				 <div class="b"><div></div></div>
			  </div>
              </td>
              <td class="spacer">&nbsp;</td>
              <td class="widget-middle">
			  <div class="dialog">
				 <div class="content">
					<div class="t"></div><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(__('Home Widgets Middle','theme707')) ) : endif; ?></div>
 				
			  </div>
              </td>
              <td class="spacer">&nbsp;</td>
              <td class="widget-right">
			  <div class="dialog">
				 <div class="content">
					<div class="t"></div><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(__('Home Widgets Right','theme707')) ) : endif; ?></div>
 				 <div class="b"><div></div></div>
              </td>
            </tr>
          </table>
       </div>
</div>
<?php get_footer(); ?>