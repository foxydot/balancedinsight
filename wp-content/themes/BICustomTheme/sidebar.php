<div class="side_bar">
   <div class="inside">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(__('Sidebar','theme707')) ) : else : ?>
      <div class="widget_style" id="categories">
      </div>
      <?php endif; ?>
   </div>     
 </div>