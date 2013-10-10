               </div>
            </div>
            <!--content end-->
            <!--footer -->
            <div id="footer">
               <p>Balanced Insight, Inc. - 8170 Corporate Park Drive - Suite 200 - Cincinnati, Ohio 45242 - 513.891.6263 
                     - <a href="mailto:info@balancedinsight.com" title="Email us">Email</a> - <a href="http://twitter.com/balancedinsight" title="Follow us on Twitter">Twitter</a><br />
               &copy; Copyright 2003 - <?php echo date('Y'); ?>, Balanced Insight, Inc. All rights reserved.</p>
                     <?php
                      if(function_exists('wp_nav_menu')) {
                      wp_nav_menu(array(
                      'theme_location' => 'footer-nav',
                      'container' => 'div',
                      'container_id' => 'footernav',
                      'container_class' => 'clearfix',
                      'menu_id' => 'footer-nav',
                      'fallback_cb' => 'footer_fallback',
					  'depth' => '2',
                      ));
                      } 
                     ?>
					<div class="clear"></div>
             </div>
            <!--footer end-->
         </div>
</div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
