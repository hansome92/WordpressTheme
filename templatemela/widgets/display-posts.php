<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php // Reference:  http://codex.wordpress.org/Widgets_API
class DisplayPostsWidget extends WP_Widget
{
    function DisplayPostsWidget(){
		$widget_settings = array('description' => 'Display Posts Widget', 'classname' => 'widgets-display-posts');
		parent::WP_Widget(false,$name='TM - Display Posts Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$postCount = empty($instance['postCount']) ? 5 : $instance['postCount'];
		$postCategory = empty($instance['postCategory']) ? '' : $instance['postCategory']; ?>
		<?php echo $before_widget; 
		 echo $before_title;
				if($title)
					echo $title;
				echo $after_title; 	?>	
				<div class="post">
				<?php 	
					global $post;
					$cat_post = get_posts('numberposts='.$postCount.'&orderby=rand&category='.$postCategory.'&post_status=publish');
					foreach($cat_post as $post) : setup_postdata($post);
					?>
						<div class="post-img-dec">	
							<div class="title">
								<?php $shorttitle = substr(the_title('','',FALSE),0,40); ?>
								<h3 class="home-featured"><?php echo $shorttitle; if (strlen($shorttitle) >30){ echo '&hellip;'; } ?></h3>
							</div>		
							<div class="date-com">
								<div class="date-reply">
									<?php the_time(get_option('date_format')); ?> 
								</div>
								<?php if ( comments_open() && ! post_password_required() ) : ?>
									<div class="comments-link-post">
										<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'templatemela' ) . '</span>', _x( '1', 'comments number', 'templatemela' ), _x( '%', 'comments number', 'templatemela' ) ); ?>					
									</div>
								<?php endif; ?>
							</div>
							<?php $postImage = get_first_post_images(get_the_ID());
							if($postImage): ?>
								<div class="post-img">
									<a href="<?php echo $postImage; ?>" data-lightbox="example-set">
										<?php print_images_thumb($postImage, get_the_title(get_the_ID()) ,308,124,'left'); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="description">
								<span class="expy-home"><?php echo excerpt(25); ?></span>
							</div>
						</div>
				<?php endforeach; ?>
				</div>
	<?php
	echo $after_widget;
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['postCount'] = strip_tags($new_instance['postCount']);
		$instance['postCategory'] = strip_tags($new_instance['postCategory']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title' =>'', 'postCategory'=>'','postCount' => '') );
		$title = esc_attr($instance['title']);
		$postCount = esc_attr($instance['postCount']);
		$postCategory = esc_attr($instance['postCategory']);
		?>
			<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
			<p><label for="<?php echo $this->get_field_id('postCategory');?>">Post Category</label><input class="widefat" id="<?php echo $this->get_field_id('postCategory');?>" name="<?php echo $this->get_field_name('postCategory');?>" type="text" value="<?php echo $postCategory;?>" /></p>
	<label for="<?php echo $this->get_field_id('postCount');?>">Number of Posts</label><input class="widefat" id="<?php echo $this->get_field_id('postCount');?>" name="<?php echo $this->get_field_name('postCount');?>" type="text" value="<?php echo $postCount;?>" />
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("DisplayPostsWidget");'));
// end FeaturedWidget
?>