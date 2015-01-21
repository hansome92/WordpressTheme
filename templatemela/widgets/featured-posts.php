<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php // Reference:  http://codex.wordpress.org/Widgets_API
class FeaturedPostsWidget extends WP_Widget
{
    function FeaturedPostsWidget(){
		$widget_settings = array('description' => 'Featured Posts Widget', 'classname' => 'widgets-breaking');
		parent::WP_Widget(false,$name='TM - Featured Posts Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$featuredPostId = empty($instance['featuredPostId']) ? '' : $instance['featuredPostId'];
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$postCount = empty($instance['postCount']) ? 5 : $instance['postCount'];
		$featuredCat1 = empty($instance['featuredCat1']) ? '1' : $instance['featuredCat1'];
		$postCount1 = empty($instance['postCount1']) ? 5 : $instance['postCount1'];
		$featuredCat2 = empty($instance['featuredCat2']) ? '1' : $instance['featuredCat2'];
		 ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.innerfade.js"></script>
		<script type="text/javascript">
		var $s = jQuery.noConflict(); 
		$s(document).ready(
			function(){
			$s('#fade').innerfade({
				speed: 1500,
				timeout:6000,
				type: 'sequence',
				containerheight: '300px'
			});	
		});
		var $w = jQuery.noConflict(); 
		$w(document).ready(
			function(){
			$w('#fade1').innerfade({
				speed: 1200,
				timeout:8000,
				type: 'sequence',
				containerheight: '300px'
			});	
		});
		</script>
		<?php echo $before_widget; 
		echo $before_title ;
				if($title)
					echo $title;
				echo $after_title; ?>		
			
			  <div class="latest-post">
				<?php
						echo $before_widget; 
						echo $before_title ;
						if($title)
							echo $title;
						echo $after_title; 	
							
					?>
				<div id="fade" style="list-style:none; height:100px;">
				  <?php 	
									global $post;
									$cat_post = get_posts('numberposts='.$postCount.'&orderby=rand&category='.$featuredCat1.'&post_status=publish');
									// get_posts('numberposts=1&category='.$featuredCat1.'&post_status=publish');
									foreach($cat_post as $post) : setup_postdata($post);
									?>
				  <div style="list-style:none">
					<div class="post-img-dec">
					  <div class="post-img">
						<div class="date-com">
						  <div class="date-reply">
							<?php the_time(get_option('date_format')); ?>
						  </div>
						  <?php
									
									 if ( comments_open() && ! post_password_required() ) : ?>
						  <div class="comments-link-post">
							<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'templatemela' ) . '</span>', _x( '1', 'comments number', 'templatemela' ), _x( '%', 'comments number', 'templatemela' ) ); ?>
						  </div>
						  <?php endif; ?>
						</div>
						<?php  $postImage = get_first_post_images(get_the_ID());?>
						<a href="<?php echo $postImage; ?>" data-lightbox="example-set"><?php print_images_thumb($postImage, get_the_title(get_the_ID()) ,308,124,'left'); ?></a> </div>
					  <div class="title-dec">
						<?php $shorttitle = substr(the_title('','',FALSE),0,40); ?>
						<h3 class="home-featured"><?php echo $shorttitle; if (strlen($shorttitle) >30){ echo '&hellip;'; } ?></h3>
						<span class="expy-home"><?php echo excerpt(25); ?></span> </div>
					</div>
				  </div>
				  <?php endforeach; ?>
				</div>
				<div id="fade1" style="list-style:none; height:100px;">
				  <?php 	
									global $post;
									$cat_post = get_posts('numberposts='.$postCount1.'&orderby=rand&category='.$featuredCat2.'&post_status=publish');
									// get_posts('numberposts=1&category='.$featuredCat1.'&post_status=publish');
									foreach($cat_post as $post) : setup_postdata($post);
									?>
				  <div style="list-style:none">
					<div class="post-img-dec">
					  <div class="post-img">
						<div class="date-com">
						  <div class="date-reply">
							<?php the_time(get_option('date_format')); ?>
						  </div>
						  <?php
							if ( comments_open() && ! post_password_required() ) : ?>
						  <div class="comments-link-post">
							<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'templatemela' ) . '</span>', _x( '1', 'comments number', 'templatemela' ), _x( '%', 'comments number', 'templatemela' ) ); ?>
						  </div>
						  <?php endif; ?>
						</div>
						<?php  $postImage = get_first_post_images(get_the_ID());?>
						<a href="<?php echo $postImage; ?>" data-lightbox="example-set"><?php print_images_thumb($postImage, get_the_title(get_the_ID()) ,308,124,'left'); ?></a> </div>
					  <div class="title-dec">
						<?php $shorttitle = substr(the_title('','',FALSE),0,40); ?>
						<h3 class="home-featured"><?php echo $shorttitle; if (strlen($shorttitle) >30){ echo '&hellip;'; } ?></h3>
						<span class="expy-home"><?php echo excerpt(25); ?></span> </div>
					</div>
				  </div>
				  <?php endforeach; ?>
				</div>
			  </div>
		<?php echo $after_widget;
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['featuredPostId'] = strip_tags($new_instance['featuredPostId']);
		$instance['featuredCat1'] = strip_tags($new_instance['featuredCat1']);
		$instance['featuredCat2'] = strip_tags($new_instance['featuredCat2']);
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['postCount'] = strip_tags($new_instance['postCount']);	
		$instance['postCount1'] = strip_tags($new_instance['postCount1']);			
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'featuredPostId'=>'' ,'postCount' => '','imageSrc'=>'','featuredCat1'=>'','featuredCat2'=>'','postCount1'=>'') );
		$title = esc_attr($instance['title']);
		$featuredPostId = esc_attr($instance['featuredPostId']);
		$featuredCat1 = esc_attr($instance['featuredCat1']);
		$featuredCat2 = esc_attr($instance['featuredCat2']);
		$imageSrc = esc_attr($instance['imageSrc']);	
		$postCount = esc_attr($instance['postCount']);
		$postCount1 = esc_attr($instance['postCount1']);
		?>
<p>
  <label for="<?php echo $this->get_field_id('title');?>">Title:</label>
  <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('featuredCat1');?>">Category ID for First Block</label>
  <input class="widefat" id="<?php echo $this->get_field_id('featuredCat1');?>" name="<?php echo $this->get_field_name('featuredCat1');?>" type="text" value="<?php echo $featuredCat1;?>" />
</p>
<label for="<?php echo $this->get_field_id('postCount');?>">Number of Latest Post</label>
<input class="widefat" id="<?php echo $this->get_field_id('postCount');?>" name="<?php echo $this->get_field_name('postCount');?>" type="text" value="<?php echo $postCount;?>" />
<p>
  <label for="<?php echo $this->get_field_id('featuredCat2');?>">Category ID for Second Block</label>
  <input class="widefat" id="<?php echo $this->get_field_id('featuredCat2');?>" name="<?php echo $this->get_field_name('featuredCat2');?>" type="text" value="<?php echo $featuredCat2;?>" />
</p>
<label for="<?php echo $this->get_field_id('postCount1');?>">Number of Latest Post</label>
<input class="widefat" id="<?php echo $this->get_field_id('postCount1');?>" name="<?php echo $this->get_field_name('postCount1');?>" type="text" value="<?php echo $postCount1;?>" />
<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("FeaturedPostsWidget");'));
// end FeaturedWidget
?>
