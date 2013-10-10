<?php get_header(); ?>
<div class="column_center">
   <div class="indent_center">
                                 <div class="inner">
                                 	<?php if (have_posts()) : ?>
												<?php while (have_posts()) : the_post(); ?>
                                    <!-- article begin -->
                                    <div class="title">
                                       <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                       <!--<span>posted by <?php the_author(); ?> @ <em><?php tm_date('G:i A');?></em></span><div class="date"><?php tm_date('');?>--></div>
                                    </div>
                                    <div class="text_box">
                                       <?php the_content('Read the rest of this entry &raquo;'); ?>
                                    </div>
                                    <div class="comments"><a href="<?php comments_link(); ?>"><em><b>comments (<?php comments_number('0', '1', '%', 'number'); ?>)</b></em></a></div>
                                    <!-- article end -->
                                    <?php endwhile; ?>
                                    <!--end content-->
                                     <!--start vavigation-->
                                       <div class="navigation">
                                           <div class="left"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                                           <div class="right"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                                           <div class="clear"></div>
                                       </div>						
                                     <!--end navigation-->
                                      <?php else : ?>
                                      <div class="title"><h3 id="respond">Not Found</h3></div>
                                      <div class="text_box">
                                       <p>Sorry, but you are looking for something that isn't here.</p><br />
                                       <div id="search">
                                          <?php include (TEMPLATEPATH . "/searchform.php"); ?>
                                        </div>
                                      </div>
                                     <?php endif; ?>
                                 </div>
   </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>