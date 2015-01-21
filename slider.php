<?php add_action( 'wp_footer', 'slider_selection_footer' );

function slider_selection_footer(){ 
 ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ; ?>/slider/css/tm_flexslider.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ; ?>/slider/js/tm_jquery.flexslider.min.js"></script> 
	<script>
    jQuery(document).ready(function () {
        jQuery('.flexslider').flexslider({
            animation: '<?php echo get_option('tmoption_slider_animation');?>',
			slideshow: '<?php echo get_option('tmoption_slider_slideshow');?>',
			slideshowSpeed: '<?php echo get_option('tmoption_slider_slideshow_speed');?>',
			animationSpeed: '<?php echo get_option('tmoption_slider_animation_speed');?>',
        });
    });
</script>  
<?php }?>
<div class="tm-homeslider" >			
	<div class="flexslider">
		<ul class="slides">
			<?php 	
			
			global $post;
			$cat_post = get_posts('numberposts=10&post_type=banners&post_status=publish');	
			foreach($cat_post as $post) : setup_postdata($post);
			$do_not_duplicate = $post->ID; 
			$data = get_post_meta($post->ID, 'slider_slider', TRUE); 
			  if ($data['slider_upload'] !='') {?>
				 <li><?php if($data['slider_imageurl'] !='0'){?>
					<a href="<?php echo $data['slider_imageurl'];?>"><?php }else{?> <a href="<?php the_permalink(); ?>"> <?php }?>
						<img src="<?php echo $data['slider_upload']; ?>" alt="" />
					</a>
				</li>
			<?php }
			else{
				
				$image = get_first_post_images($post->ID); ?>
			   <li> <?php if($data['slider_imageurl'] !='0'){?>
					<a href="<?php echo $data['slider_imageurl'];?>"><?php }else{?> <a href="<?php the_permalink(); ?>"> <?php }?>
						<img src="<?php echo $image; ?>" alt="" />
					</a>
				</li>
			<?php } ?>
			<?php 
			// Display Title and description
			/*?><div class="caption">
				<h1 class="entry-title-port"><?php the_title(); ?></h1>			 
				<p class="des-cap1"><?php echo excerpt(10); ?></p>
			</div>	<?php */?>		 
			<?php endforeach; ?>
	  </ul>
	</div>
</div><!--tm-homeslider-->

