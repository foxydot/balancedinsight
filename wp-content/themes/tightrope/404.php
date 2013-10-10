<?php get_header(); ?>
<div class="column_center">
   <div class="indent_center">
       <div class="inner">
	<h2>Not Found</h2>

<p>You 
<?php

$skip_urls = array( '/crossdomain.xml'
                  , '/Autodiscover/Autodiscover.xml' 
                  , '/schedule-a-demo#usermessage2a'
                  , '/translators.html'
                  , '/apple-touch-icon.png'
                  , '/apple-touch-icon-precomposed.png'
                  , '/BingSiteAuth.xml'
                  , '/LiveSearchSiteAuth.xml'
               );


#some variables for the script to use
#if you have some reason to change these, do.  but wordpress can handle it
$adminemail = get_bloginfo('admin_email'); #the administrator email address, according to wordpress
$website = get_bloginfo('url'); #gets your blog's url from wordpress
$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress

$browser = get_browser(null, true);

$failuremess = "A user tried to go to $website".$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
$failuremess .= "\n\nIP: ". $_SERVER['REMOTE_ADDR'] ."\n\nHost: ". gethostbyaddr($_SERVER['REMOTE_ADDR']) ."\n\nUser Agent: ". $_SERVER['HTTP_USER_AGENT'];
$failuremess .= "\n\nBrowser: ". $browser['parent'] ." (". $browser['browser'] ." )\n\nPlatform: ". $browser['platform'] ."\n\n";

  if (!isset($_SERVER['HTTP_REFERER'])) {
    #politely blames the user for all the problems they caused
        echo "tried going to "; #starts assembling an output paragraph
	$casemessage = "All is not lost!";
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
    #this will help the user find what they want, and email me of a bad link
	echo "clicked a link to"; #now the message says You clicked a link to...
	$failuremess .= "It wasn't their fault, so try fixing it. They came from ".$_SERVER['HTTP_REFERER'];
	$casemessage = "An administrator has been emailed about this problem, too.";#set a friendly message
  }
  echo " ".$website.$_SERVER['REQUEST_URI']; 

  if (substr($browser, 0, 6) != "Google" && !in_array( $_SERVER['REQUEST_URI'], $skip_urls )) {
    #mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'], $failuremess, "From: $websitename <noreply@$website>"); #email you about problem
  }

?> 
and it doesn't exist. <?php echo $casemessage; ?>  You can click back 
and try again or search for what you're looking for:
</p>
	<?php get_search_form(); ?>

       </div>
   </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

