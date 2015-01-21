<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class CategoriesWidget extends WP_Widget
{
    function CategoriesWidget(){
		$widget_settings = array('description' => 'Categories Widget', 'classname' => 'widgets-categories');
		parent::WP_Widget(false,$name='TM - Categories Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Categories' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$number = empty($instance['number']) ? '' : $instance['number'];	
		echo $before_widget;
		echo $before_title ;			
		if($title) echo $title;
		echo $after_title; ?> 
		<div class="about-description"><?php echo $offer; ?></div>			
		<div>
		<?php
			if($number != '' ):
				$number = 'number='.$number;
			else:
				$number = '';
			endif;	
			$options = get_categories($number);
			foreach ($options as $option) { ?>
				<span><a href="<?php echo get_category_link( $option->cat_ID); ?>"><?php echo $option->cat_name; ?><?php if($option->category_count > 0 ): echo " (".$option->category_count.")"; endif; ?></a></span>				
			<?php }
			?>
		</div>
		<?php echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Categories', 'number'=>'') );
		$title = esc_attr($instance['title']);
		$number = esc_attr($instance['number']);
		?>
		
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number');?>">Number of Categories to be displayed:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('number');?>" name="<?php echo $this->get_field_name('number');?>" type="text" value="<?php echo $number;?>" /><br/>(By default all)
		</p>
		
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("CategoriesWidget");'));
// end offerWidget
?>