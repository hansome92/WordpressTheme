<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class HomeProductWidget extends WP_Widget
{
    function HomeProductWidget(){
		$widget_settings = array('description' => 'Home Products Widget', 'classname' => 'widgets-homeproduct');
		parent::WP_Widget(false,$name='TM - Home Products Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$description = empty($instance['description']) ? '' : $instance['description']; 
		 ?>	 
				 <?php 
					echo $before_title ;			
						if($title)
						echo $title;
					echo $after_title;
				 ?>
				 
				 <?php echo do_shortcode($description);?>	
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['description'] = strip_tags($new_instance['description']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'description' => '') );
		$title = esc_attr($instance['title']);
		$description = esc_attr($instance['description']);
		?>
		
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</p>
		<p><label for="<?php echo $this->get_field_id('description');?>">Shortcode:</label>
			<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('description');?>" name="<?php echo $this->get_field_name('description');?>" ><?php echo $description;?></textarea>
		</p>
		
		
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("HomeProductWidget");'));
// end AboutWidget
?>