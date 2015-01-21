<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php // Reference:  http://codex.wordpress.org/Widgets_API
class LatestNewsWidget extends WP_Widget
{
    function LatestNewsWidget(){
		$widget_settings = array('description' => 'Latest News Widget', 'classname' => 'widgets-breaking');
		parent::WP_Widget(false,$name='TM - Latest News Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$featuredPostId = empty($instance['featuredPostId']) ? '' : $instance['featuredPostId'];
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$postCount = empty($instance['postCount']) ? 5 : $instance['postCount'];
		$featuredCat1 = empty($instance['featuredCat1']) ? '' : $instance['featuredCat1'];
		echo $before_widget;
		echo $before_title;
		if($title)
			echo $title;
		echo $after_title; 
		global $post;
		$cat_post = get_posts('numberposts='.$postCount.'&orderby=rand&category='.$featuredCat1.'&post_status=publish');
		foreach($cat_post as $post) : setup_postdata($post);
		?>
		<div class="post-img-dec">
			<div class="post-img">
			  <?php $postImage = get_first_post_images(get_the_ID());?>
			  <a href="<?php the_permalink(); ?>"><?php print_images_thumb($postImage, get_the_title(get_the_ID()) ,90,90); ?></a> </div>
			<div class="title-dec">
			  <?php $shorttitle = substr(the_title('','',FALSE),0,40); ?>
			  <h3 class="home-featured"><?php echo $shorttitle; if (strlen($shorttitle) >30){ echo '&hellip;'; } ?></h3>
			  <span class="expy-home"><?php echo excerpt(10); ?></span> </div>
		</div>
		<?php endforeach; ?>
	<?php
	echo $after_widget;	}
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
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'featuredPostId'=>'' , 'if_latest_post' => true ,'postCount' => '1','featuredCat1' => '1','imageSrc' => '1') );
		$title = esc_attr($instance['title']);
		$featuredPostId = esc_attr($instance['featuredPostId']);
		$featuredCat1 = esc_attr($instance['featuredCat1']);
		$imageSrc = esc_attr($instance['imageSrc']);	
		$postCount = esc_attr($instance['postCount']);

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
<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("LatestNewsWidget");'));
// end FeaturedWidget
?>
