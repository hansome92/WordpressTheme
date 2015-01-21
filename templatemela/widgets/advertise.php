<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php // Reference:  http://codex.wordpress.org/Widgets_API
class AdvertiseWidget extends WP_Widget
{
    function AdvertiseWidget(){
		$widget_settings = array('description' => 'Advertise Widget', 'classname' => 'widgets-advertise');
		parent::WP_Widget(false,$name='TM - Advertise Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Advertise' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
		$window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$imageAlt = empty($instance['imageAlt']) ? '' : $instance['imageAlt'];
		$imageTitle = empty($instance['imageTitle']) ? '' : $instance['imageTitle'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$imageAlt = empty($imageAlt) ? $title : $imageAlt;
		$imageTitle = empty($imageTitle) ? $title : $imageTitle;	
		echo $before_widget; 
		echo $before_title;			
		if($title)
			echo $title;
		echo $after_title; ?>
		<a href="<?php echo $linkURL;?>" title="<?php echo $imageTitle;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
		<?php if($is_template_path == 1): $imageSrc= get_template_directory_uri() . '/' . $imageSrc; endif; ?>
		<img src="<?php echo $imageSrc; ?>" id="<?php echo $imageTitle;?>" alt="<?php echo $imageAlt;?>" title="<?php echo $imageTitle;?>" />
		</a>
		<?php echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['imageAlt'] = strip_tags($new_instance['imageAlt']);
		$instance['imageTitle'] = strip_tags($new_instance['imageTitle']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Advertise', 'window_target' => true, 'is_template_path' => false, 'imageAlt'=>'',  'imageSrc'=>'', 'linkURL'=>'',  'imageTitle'=>'') );
		$title = esc_attr($instance['title']);
		$imageSrc = esc_attr($instance['imageSrc']);
		$imageAlt = esc_attr($instance['imageAlt']);
		$imageTitle = esc_attr($instance['imageTitle']);
		$linkURL = esc_attr($instance['linkURL']);

		?>
		<p><label for="<?php echo $this->get_field_id('imageTitle');?>">Image Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('imageTitle');?>" name="<?php echo $this->get_field_name('imageTitle');?>" type="text" value="<?php echo $imageTitle;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('imageAlt');?>">Image Alt:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('imageAlt');?>" name="<?php echo $this->get_field_name('imageAlt');?>" type="text" value="<?php echo $imageAlt;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('imageSrc');?>">Image URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('imageSrc');?>" name="<?php echo $this->get_field_name('imageSrc');?>" type="text" value="<?php echo $imageSrc;?>" />
		<br /><input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label></p>
		<p><label for="<?php echo $this->get_field_id('linkURL');?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL');?>" name="<?php echo $this->get_field_name('linkURL');?>" type="text" value="<?php echo $linkURL;?>" />
		<br /><input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" /><label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label></p>

		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("AdvertiseWidget");'));
// end AdvertiseWidget
?>