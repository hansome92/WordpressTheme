<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class RecentPostWidget extends WP_Widget
{
    function RecentPostWidget(){
		$widget_settings = array('description' => 'Recent Post Widget', 'classname' => 'widgets-recentpost');
		parent::WP_Widget(false,$name='TM - Recent Post Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Post' : $instance['title']);
		$postCount = empty($instance['postCount']) ? '' : $instance['postCount'];
		echo $before_widget;
		echo $before_title;
		if($title)
			echo $title;
		echo $after_title;
		global $post;	
		$args = array( 'numberposts' => $postCount ,'post_status' => 'publish');
		$recent_posts = wp_get_recent_posts( $args );	
		echo '<div class="posts">';	
		foreach( $recent_posts as $post ){
		 echo '<span><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .$post["post_title"].'</a></span>';
		}
		echo '</div>'; ?>
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['postCount'] = strip_tags($new_instance['postCount']);

		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Recent Post', 'postCount' => '5'));
		$title = esc_attr($instance['title']);
		$postCount = esc_attr($instance['postCount']);

		?>
		
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>		
		<p><label for="<?php echo $this->get_field_id('postCount');?>">Number of Post To Display</label><input class="widefat" id="<?php echo $this->get_field_id('postCount');?>" name="<?php echo $this->get_field_name('postCount');?>" type="text" value="<?php echo $postCount;?>" /></p>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("RecentPostWidget");'));
// end AboutMeWidget
?>