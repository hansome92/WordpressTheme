<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php // Reference:  http://codex.wordpress.org/Widgets_API
class TwitterWidget extends WP_Widget
{
    function TwitterWidget(){
		$widget_settings = array('description' => 'Twitter Widget', 'classname' => 'widgets-Twitter');
		parent::WP_Widget(false,$name='TM - Twitter Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Twitter' : $instance['title']);
		$username = empty($instance['username']) ? '' : $instance['username'];
		$widget_id = empty($instance['widget_id']) ? '' : $instance['widget_id'];         
        echo $before_widget; 
		echo $before_title;
		if($title)
			echo $title;
		echo $after_title; ?>	
<div class="twitter-area"><a class="twitter-timeline"  href="https://twitter.com/<?php echo $username; ?>" data-chrome="noheader noborders transparent nofooter noscrollbar transparent"  data-widget-id="<?php echo $widget_id; ?>" data-theme="light" data-link-color="#9D261D" data-border-color="#444444" width="300" height="200">Tweets by @templatemela</a></div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<?php
		echo $after_widget;
					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['widget_id'] = strip_tags($new_instance['widget_id']);
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Latest Tweets','username'=>'','widget_id'=>'') );
		$title = esc_attr($instance['title']);
		$username= esc_attr($instance['username']);
		$widget_id = esc_attr($instance['widget_id']);

		?>
		<p><label for="<?php echo $this->get_field_id('title');?>"> Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('username');?>">User Name:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('username');?>" name="<?php echo $this->get_field_name('username');?>" type="text" value="<?php echo $username;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('widget_id');?>">Widget ID:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('widget_id');?>" name="<?php echo $this->get_field_name('widget_id');?>" type="text" value="<?php echo $widget_id;?>" />
		
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("TwitterWidget");'));
// end AdvertiseWidget
?>