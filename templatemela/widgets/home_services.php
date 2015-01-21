<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
 ?>
<?php 
class HomePageservicesWidget extends WP_Widget
{
    function HomePageservicesWidget(){
		$widget_settings = array('description' => 'Homepage Services Widget', 'classname' => 'widgets-HomePageBlog');
		parent::WP_Widget(false,$name='TM - Homepage Services Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'services' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$Services = empty($instance['Services']) ? '' : $instance['Services'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$icon = empty($instance['icon']) ? '' : $instance['icon'];
		echo $before_widget; 
		echo $before_title;			
		if($title)
			echo $title;
		echo $after_title; ?> 
		<div class="icon">
			<div class="<?php echo $icon; ?>"></div>
		</div>
		<div class="text">
			<div class="service-text">
				<?php 
				echo $before_title ;			
				if($title)
				echo $title;
				echo $after_title; ?> 
			</div>
			<div class="service-description"><?php echo $Services; ?></div>
			<div class="service-read-more"><a href="<?php echo $linkURL; ?>" title="Read More">Read More</a></div>
		</div>				
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;		
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['Services'] =($new_instance['Services']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['icon'] = strip_tags($new_instance['icon']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'imageSrc'=>'', 'Services'=>'','linkURL'=>'','icon'=>'','window_target'=>'') );			
		$title = esc_attr($instance['title']);	
		$imageSrc = esc_attr($instance['imageSrc']);	
		$Services = esc_attr($instance['Services']);		
		$linkURL = esc_attr($instance['linkURL']);
		$icon = esc_attr($instance['icon']);
		$window_target =  esc_attr($instance['window_target']); 
		?>
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('Service');?>">Description:</label>
		<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services');?>" name="<?php echo $this->get_field_name('Services');?>" ><?php echo $Services;?></textarea>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('linkURL');?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL');?>" name="<?php echo $this->get_field_name('linkURL');?>" type="text" value="<?php echo $linkURL;?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" /><label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label></p>	
				
		<p><label for="<?php echo $this->get_field_id('icon');?>">Image Class:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('icon');?>" name="<?php echo $this->get_field_name('icon');?>" type="text" value="<?php echo $icon;?>" />	</p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("HomePageservicesWidget");'));
// end ServicesWidget
?>
