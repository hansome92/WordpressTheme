<?php
$post_link =get_permalink($post->id);
$post_title = get_the_title($post->id);
$images_dir = get_template_directory_uri() .'/images/social/';
$img_var ='22px';
$content='';

$content .= '<div class="Social-Bookmarking"> ' . "\n"  
. ' <h5> Share this post if you like it</h5>' 
				. '<a href="http://facebook.com/sharer.php?u=' . $post_link . '&amp;t=' . $post_title . '" target="_blank" rel="nofollow" title="Facebook"><img src="'. $images_dir .'facebook.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Facebook" title="Facebook" /></a>' . "\n"
				 . '<a href="http://twitter.com/home?status=' . $post_link . '  ' . $post_title . '" target="_blank" rel="nofollow" title="Twitter"><img src="'. $images_dir .'twitter.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Twitter" title="Twitter" /></a>' . "\n"
		         . '<a href="http://www.myspace.com/Modules/PostTo/Pages/?c=' . $post_link . '&amp;t=' . $post_title . '" target="_blank" rel="nofollow" title="Myspace"><img src="'. $images_dir .'myspace.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Myspace" title="Myspace" /></a>' . "\n"				 
			
				   . '<a href="http://del.icio.us/post?url=' . $post_link . '&amp;title=' . $post_title . '" target="_blank" rel="nofollow" title="del.icio.us"><img src="'. $images_dir .'delicious.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="del.icio.us" title="del.icio.us" /></a>' . "\n"
                  . '<a href="http://digg.com/submit?phase=2&amp;url=' . $post_link . '&amp;title=' . $post_title . '" target="_blank" rel="nofollow" title="Digg"><img src="'. $images_dir .'digg.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Digg" title="Digg" /></a>' . "\n"         
                 
   				 . '<a title="Google buzz" target="_blank" class="aw-sociable_services_link" href="http://www.google.com/buzz/post?url=' . $post_link . '" ><img title="Google buzz" alt="Google buzz" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" src="'. $images_dir .'google_buzz.png" /></a>' . "\n" 
				 
				 
				  . '<a href="http://google.com/bookmarks/mark?op=add&amp;bkmk=' . $post_link . '&amp;title=' . $post_title . '" target="_blank" rel="nofollow" title="Google"><img src="'. $images_dir .'google.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Google" title="Google" /></a>' . "\n"
                  . '<a href="http://buzz.yahoo.com/submit?submitUrl=' . $post_title . '&amp;u=' . $post_link . '" target="_blank" rel="nofollow" title="Yahoo Buzz"><img src="'. $images_dir .'yahoobuzz.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Yahoo Buzz" title="Yahoo Buzz" /></a>' . "\n"
                
				
				. '<a title="Yahoo! Bookmarks" rel="nofollow" target="_blank" href="http://bookmarks.yahoo.com/toolbar/savebm?opener=tb&amp;u=' . $post_link . '&amp;t=' . $post_title . '" ><img title="Yahoo! Bookmarks" alt="Yahoo! Bookmarks" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" src="'. $images_dir .'yahoo.png" /></a>' . "\n"
	
				. '<a title="LinkedIn" rel="nofollow" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $post_link . '&amp;title=' . $post_title . '"  ><img title="LinkedIn" alt="LinkedIn" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" src="'. $images_dir .'linkedin.png" /></a>' . "\n"
				 
				 
				. '<a title="Mixx" rel="nofollow" target="_blank" href="http://www.mixx.com/submit?page_url=' . $post_link . '" ><img title="Mixx" alt="Mixx" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" src="'. $images_dir .'mixx.png" /></a>' . "\n" 
				 
				. '<a title="Reddit" rel="nofollow" target="_blank" href="http://reddit.com/submit?url=' . $post_link . '&amp;title=' . $post_title . '" ><img title="Reddit" alt="Reddit" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" src="'. $images_dir .'reddit.png" /></a>' . "\n" 
				 
				. '<a href="http://stumbleupon.com/submit?url=' . $post_link . '&amp;title=' . $post_title . '&amp;newcomment=' . $post_title . '" target="_blank" rel="nofollow" title="StumbleUpon"><img src="'. $images_dir .'stumbleupon.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="StumbleUpon" title="StumbleUpon" /></a>' . "\n"
			
				. '<a href="http://friendfeed.com/share?url=' . $post_link . '&amp;title=' . $post_title . '" target="_blank" rel="nofollow" title="Friendfeed"><img src="'. $images_dir .'friendfeed.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Friendfeed" title="Friendfeed" /></a>' . "\n"
	 		
				. '<a href="http://www.technorati.com/faves?add=' . $post_link . '" target="_blank" rel="nofollow" title="Technorati"><img src="'. $images_dir .'technorati.png" width="'.$img_var.'" height="' . $img_var . '" style="border:0px;" alt="Technorati" title="Technorati" /></a>' . "\n"
	            
			    . '<a href="http://www.tumblr.com/share?v=3&amp;u=' . $post_link . '&amp;t=' . $post_title . '" target="_blank" rel="nofollow" title="tumblr"><img src="'. $images_dir .'tumblr.png" style="width:' . $img_var . ';height:' . $img_var . ';border:0px;" alt="Technorati" title="Technorati" /></a>' . "\n"
				
                  . '</div>' . "\n\n";				  

    echo $content;	


?>
<div class="clearer"></div>