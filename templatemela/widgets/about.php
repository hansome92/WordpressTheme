<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class AboutWidget extends WP_Widget
{
    function AboutWidget(){
		$widget_settings = array('description' => 'About Me Widget', 'classname' => 'widgets-about');
		parent::WP_Widget(false,$name='TM - About Me Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'About Me' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$description = empty($instance['description']) ? '' : $instance['description']; 
		$link_text = empty($instance['link_text']) ? '' : $instance['link_text']; 
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		if($is_template_path == 1):
			$imageSrc= get_template_directory_uri() . '/' . $imageSrc; 
		endif;		
		echo $before_widget;
		 ?>
		 <div class="home-about-me"> 		 
				 <?php 
					echo $before_title ;			
						if($title)
						echo $title;
					echo $after_title;
				 ?>

				<div class="tm-about-text">
					<div class="tm-about-description">					
					<?php if(strlen($description) > 170) { echo substr($description, 0, 170) . '..';}else {echo $description; } ?>
					
					</div>
				</div>
				<div class="aboutme-read-more"><a href="<?php echo $linkURL; ?>" title="<?php echo $link_text; ?>"><?php echo $link_text; ?></a></div>	
							
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
		$instance['description'] = strip_tags($new_instance['description']);
		$instance['link_text'] = strip_tags($new_instance['link_text']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'description' => '', 'imageSrc'=>'', 'link_text'=>'', 'linkURL'=>'') );
		$title = esc_attr($instance['title']);
		$imageSrc = esc_attr($instance['imageSrc']);
		$description = esc_attr($instance['description']);
		$link_text = esc_attr($instance['link_text']);
		$linkURL = esc_attr($instance['linkURL']);
		?>
		
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</p>
		
<?php /*?>		<p><label for="<?php echo $this->get_field_id('imageSrc');?>">Image URL:<br /></label>
			<input class="widefat" id="<?php echo $this->get_field_id('imageSrc');?>" name="<?php echo $this->get_field_name('imageSrc');?>" type="text" value="<?php echo $imageSrc;?>" /><br />
			<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label>
		</p><?php */?>
		
		<p><label for="<?php echo $this->get_field_id('description');?>">Description:</label>
			<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('description');?>" name="<?php echo $this->get_field_name('description');?>" ><?php echo $description;?></textarea>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('link_text');?>">Link Text:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('link_text');?>" name="<?php echo $this->get_field_name('link_text');?>" type="text" value="<?php echo $link_text;?>" />
		</p>
		<p><label for="<?php echo $this->get_field_id('linkURL');?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL');?>" name="<?php echo $this->get_field_name('linkURL');?>" type="text" value="<?php echo $linkURL;?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("AboutWidget");'));
// end AboutWidget
?>