<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php // Reference:  http://codex.wordpress.org/Widgets_API
class FromTheBlogWidget extends WP_Widget
{
    function FromTheBlogWidget(){
		$widget_settings = array('description' => 'From The Blog Posts Widget', 'classname' => 'widgets-breaking');
		parent::WP_Widget(false,$name='TM - From The Blog Posts Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$featuredPostId = empty($instance['featuredPostId']) ? '' : $instance['featuredPostId'];
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$postCount = empty($instance['postCount']) ? 5 : $instance['postCount'];
		$featuredCat1 = empty($instance['featuredCat1']) ? '' : $instance['featuredCat1'];
		echo $before_widget; ?>
		<?php echo $before_title ;
			if($title)
				echo $title;
			echo $after_title; ?>		
		<div class="from-the-blog-posts">
			<?php global $post;
			$args = array(
						'tax_query' => array(
							array(                
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 
									'post-format-aside',
									'post-format-audio',
									'post-format-chat',
									'post-format-gallery',
									'post-format-image',
									'post-format-link',
									'post-format-quote',
									'post-format-status',
									'post-format-video'
								),
								'operator' => 'NOT IN'
							)
						),
						'numberposts' => $postCount,
						'category' => $featuredCat1,
						'post_status' => 'publish'
					);
			$cat_post = get_posts($args);
			$cnt = 1;
			foreach($cat_post as $post) : setup_postdata($post);	
			if($cnt % 2 == 0)
				$class = 'even';
				else
				$class = 'odd';
			?>
			<div class="<?php echo $class;?> ">
				<div class="single-from-the-blog">
					<?php 
					$postImage = get_first_post_images(get_the_ID());
					if($postImage) :
					?>
						<div class="from-the-blog-image">						
							<a href="<?php echo $postImage; ?>" data-lightbox="example-set">
								<?php print_images_thumb($postImage, get_the_title(get_the_ID()) ,220,119,'left'); ?>
							</a>
						</div>
						<?php endif; ?>
					<div class="from-the-blog-title">
						<?php $shorttitle = substr(the_title('','',FALSE),0,40); ?>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo $shorttitle; if (strlen($shorttitle) >30){ echo '&hellip;'; } ?></a></h3>
					</div>
					<div class="from-the-blog-author-date">
						<?php 
						$author = sprintf( '<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'templatemela' ), get_the_author() ) ),
						get_the_author() );
						
						$date = sprintf( '%4$s',
						esc_url( get_permalink()),
						esc_attr( get_the_time()),
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() ) );
						
						echo 'By <span class="link">'.$author.'</span> on <span class="link">'.$date.'</span>'; ?>
					</div>					
					<div class="from-the-blog-excerpt">
						<?php echo from_the_blog_excerpt(18); ?>
					</div>
				</div>
			</div>
			<?php $cnt++; endforeach; ?>
		</div>
	<?php 
	echo $after_widget;
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['featuredPostId'] = strip_tags($new_instance['featuredPostId']);
		$instance['featuredCat1'] = strip_tags($new_instance['featuredCat1']);
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['postCount'] = strip_tags($new_instance['postCount']);		
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'featuredPostId'=>'' , 'if_latest_post' => true ,'postCount' => '','featuredCat1' => '','imageSrc' => '') );
		$title = esc_attr($instance['title']);
		$featuredPostId = esc_attr($instance['featuredPostId']);
		$featuredCat1 = esc_attr($instance['featuredCat1']);
		$imageSrc = esc_attr($instance['imageSrc']);	
		$postCount = esc_attr($instance['postCount']);
		?>	
			<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
			<p><label for="<?php echo $this->get_field_id('featuredCat1');?>">Category ID</label><input class="widefat" id="<?php echo $this->get_field_id('featuredCat1');?>" name="<?php echo $this->get_field_name('featuredCat1');?>" type="text" value="<?php echo $featuredCat1;?>" /></p>
	<label for="<?php echo $this->get_field_id('postCount');?>">Number of Posts</label><input class="widefat" id="<?php echo $this->get_field_id('postCount');?>" name="<?php echo $this->get_field_name('postCount');?>" type="text" value="<?php echo $postCount;?>" />
	
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("FromTheBlogWidget");'));
// end FeaturedWidget
?>