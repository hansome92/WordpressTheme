<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class LogoPartnerWidget extends WP_Widget
{
    function LogoPartnerWidget(){
		$widget_settings = array('description' => 'Logo Partner Images Widget', 'classname' => 'widgets-Logo');
		parent::WP_Widget(false,$name='TM - Logo Partner Image Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];	
		if($is_template_path == 1):
			$imageSrc= get_template_directory_uri() . '/images/logo/' . $imageSrc; 
		endif; ?> 
			<li>
			<a href="<?php if($linkURL == ""): echo home_url( '/' ); else:?><?php echo $linkURL; endif;?>" <?php if($window_target == true) ?>>
				<img src="<?php echo $imageSrc; ?>" alt=""  /></a>	
			</li>		
		<?php				
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;		
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);			
   		$instance['linkURL'] = strip_tags($new_instance['linkURL']);	
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array( 'imageSrc'=>'','linkURL'=>'','window_target'=>'','is_template_path'=>'') );				
		$imageSrc = esc_attr($instance['imageSrc']);		
 		$linkURL = esc_attr($instance['linkURL']);	
		$window_target =  esc_attr($instance['window_target']); 
		$is_template_path =  esc_attr($instance['is_template_path']);
		       
		?>		
		<p><label for="<?php echo $this->get_field_id('imageSrc');?>">Image URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('imageSrc');?>" name="<?php echo $this->get_field_name('imageSrc');?>" type="text" value="<?php echo $imageSrc;?>" />
		<br /><input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label></p>
		<p><label for="<?php echo $this->get_field_id('linkURL');?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL');?>" name="<?php echo $this->get_field_name('linkURL');?>" type="text" value="<?php echo $linkURL;?>" />
		<label>(e.g. http://www.yoursite.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" /><label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label></p>	
		</p>
			
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("LogoPartnerWidget");'));
// end SliderWidget
?>