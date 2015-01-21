<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class HeaderContactUsWidget extends WP_Widget
{
    function HeaderContactUsWidget(){
		$widget_settings = array('description' => 'Header Contact Us Widget', 'classname' => 'widgets-HeaderContactUsservices');
		parent::WP_Widget(false,$name='TM - Header Contact Us Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);		
		$Services = empty($instance['Services']) ? '' : $instance['Services']; 
		echo $before_widget; ?>
		<?php 
		echo $before_title ;			
		if($title)
			echo $title;
		echo $after_title; ?> 
		<div class="header_contactus"><?php echo $Services; ?> </div>
		<?php echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;		
		$instance['window_target'] = false;

		$instance['Services'] =($new_instance['Services']);
	
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('Services'=>'', 'Services1'=>'') );			
	
		$Services = esc_attr($instance['Services']);
	
		?>
<p>
  <label for="<?php echo $this->get_field_id('Service');?>">Description:</label>
  <textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services');?>" name="<?php echo $this->get_field_name('Services');?>" ><?php echo $Services;?></textarea>
</p>
<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("HeaderContactUsWidget");'));
// end BlogWidget
?>
