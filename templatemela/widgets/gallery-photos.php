<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class GalleryPhotosWidget extends WP_Widget
{
    function GalleryPhotosWidget(){
		$widget_settings = array('description' => 'Gallery Photos Widget', 'classname' => 'widgets-GalleryPhotos');
		parent::WP_Widget(false,$name='TM - Gallery Photos Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'services' : $instance['title']);
		$title = empty($instance['title']) ? '' : $instance['title'];
		$gallery_ids = empty($instance['gallery_ids']) ? '' : $instance['gallery_ids'];		
		echo $before_widget; 
		echo $before_title ;			
		if($title)
			echo $title;
		echo $after_title; ?> 
		<?php echo do_shortcode($gallery_ids); ?>
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;	
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['gallery_ids'] = strip_tags($new_instance['gallery_ids']);		
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'gallery_ids'=>'') );			
		$title = esc_attr($instance['title']);	
		$gallery_ids = esc_attr($instance['gallery_ids']);
		?>
		<p><label for="<?php echo $this->get_field_id('title');?>">Gallery Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('gallery_ids');?>">Gallery IDs:</label>
		<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('gallery_ids');?>" name="<?php echo $this->get_field_name('gallery_ids');?>" ><?php echo $gallery_ids;?></textarea></p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("GalleryPhotosWidget");'));
// end ServicesWidget
?>
