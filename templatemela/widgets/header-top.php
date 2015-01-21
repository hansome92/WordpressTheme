<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class HeaderTopWidget extends WP_Widget
{
    function HeaderTopWidget(){
		$widget_settings = array('description' => 'Contact And Email Widget', 'classname' => 'widgets-head-top');
		parent::WP_Widget(false,$name='TM - Contact And Email Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$caption1 = empty($instance['caption1']) ? '' : $instance['caption1'];
		$caption2 = empty($instance['caption2']) ? '' : $instance['caption2'];
		echo $before_title ; ?>
		<?php echo $before_title ;			
		if($title)
			echo $title;
		echo $after_title; ?>
		<p class="label"><?php echo $caption1;?></p>
		<p class="con"><?php echo $caption2;?></p>
		<?php echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;		
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['caption1'] =($new_instance['caption1']);	
		$instance['caption2'] =($new_instance['caption2']);	
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array( 'imageSrc'=>'', 'caption1'=>'', 'caption2'=>'') );				
		$caption1 = esc_attr($instance['caption1']);
		$caption2 = esc_attr($instance['caption2']);             
		?>		
		<p><label for="<?php echo $this->get_field_id('caption1');?>">Contact No:</label><input class="widefat" id="<?php echo $this->get_field_id('caption1');?>" name="<?php echo $this->get_field_name('caption1');?>" type="text" value="<?php echo $caption1;?>" /></p>
			<p><label for="<?php echo $this->get_field_id('caption2');?>">Site Name:</label><input class="widefat" id="<?php echo $this->get_field_id('caption2');?>" name="<?php echo $this->get_field_name('caption2');?>" type="text" value="<?php echo $caption2;?>" /></p>
	
			
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("HeaderTopWidget");'));
// end SliderWidget
?>