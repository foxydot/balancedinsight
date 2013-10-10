<?php get_header(); ?>
<div class="column_center">
   <div class="inner">
	  <?php if (have_posts()) : ?>
                <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
     <?php /* If this is a category archive */ if (is_category()) { ?>				
 <h1><img class="alignright size-full wp-image-946" title="header-image-about-bi" src="http://www.balancedinsight.com/wp-content/uploads/2010/09/header-image-about-bi.png" alt="About Balanced Insight" width="168" height="137" /><span id="one-line"><?php echo single_cat_title(); ?></span></h1>     

      
      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <h1>Daily Archive for <?php the_time('F jS, Y'); ?></h1>
      
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <h1>Monthly Archive for <?php the_time('F, Y'); ?></h1>
  
      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <h1>Yearly Archive for <?php the_time('Y'); ?></h1>
      
      <?php /* If this is a search */ } elseif (is_search()) { ?>
      <h1>Search Results</h1>
      
      <?php /* If this is an author archive */ } elseif (is_author()) { ?>
      <h1>Author Archive</h1>
  
      <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h1>Blog Archives</h1>
  
      <?php } ?>
      <div class="navigation">
          <div class="left"><?php next_posts_link('&laquo; Previous Entries') ?></div>
          <div class="right"><?php previous_posts_link('Next Entries &raquo;') ?></div>
          <div class="clear"></div>
      </div>
     <?php while (have_posts()) : the_post(); ?>
      <!-- article begin -->
      <div class="text-box">
         <!--<p class="date"><?php tm_date('');?></p>-->
         <h5 id="news"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h5>
      </div>
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
<?php get_footer(); ?>
