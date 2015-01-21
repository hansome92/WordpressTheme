<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class OurTeamWidget extends WP_Widget
{
    function OurTeamWidget(){
		$widget_settings = array('description' => 'Our Team Widget', 'classname' => 'widgets-our-team');
		parent::WP_Widget(false,$name='TM - Our Team Widget',$widget_settings);
    }
    function widget($args, $instance){
		
		extract($args);
		$window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$name = empty($instance['name']) ? '' : $instance['name'];
		$designation = empty($instance['designation']) ? '' : $instance['designation'];
		$image = empty($instance['image']) ? '' : $instance['image'];		
		$description = empty($instance['description']) ? '' : $instance['description'];
		$google = empty($instance['google']) ? '' : $instance['google'];		
		$facebook = empty($instance['facebook']) ? '' : $instance['facebook'];
		$twitter = empty($instance['twitter']) ? '' : $instance['twitter'];		
		$linked_in = empty($instance['linked_in']) ? '' : $instance['linked_in'];		
		
		if($is_template_path == 1):
			$image = get_template_directory_uri() . '/images/' . $image;
		endif;	
		echo $before_widget;
		 ?>
		<span class="name">
			<h4><?php echo $name; ?></h4>
			<small><?php echo $designation; ?></small>
		</span>
			<img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
				<div class="team-social">
					<ul>
						<li><a href="<?php echo $google; ?>" target="_blank" ><i class="icon-google-plus"></i></a></li>
						<li><a href="<?php echo $facebook; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
						<li><a href="<?php echo $twitter; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
						<li><a href="<?php echo $linked_in; ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
					</ul>
				</div>
		<p><?php echo $description; ?></p>
		<?php echo $after_widget;				
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;		
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['name'] = strip_tags($new_instance['name']);	
		$instance['designation'] = strip_tags($new_instance['designation']);		
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['description'] = strip_tags($new_instance['description']);		
		$instance['google'] = strip_tags($new_instance['google']);	
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['linked_in'] = strip_tags($new_instance['linked_in']);
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'','linkURL'=>'','name'=>'','designation'=>'','image'=>'','description'=>'','google'=>'','facebook'=>'','twitter'=>'','linked_in'=>'', 'is_template_path'=>'') );
		$linkURL = esc_attr($instance['linkURL']);	
		$name = esc_attr($instance['name']);			
		$designation = esc_attr($instance['designation']);		
		$image = esc_attr($instance['image']);
		$description = esc_attr($instance['description']);
		$google = esc_attr($instance['google']);
		$facebook = esc_attr($instance['facebook']);
		$twitter = esc_attr($instance['twitter']);		
		$linked_in = esc_attr($instance['linked_in']);	
		$is_template_path =  esc_attr($instance['is_template_path']);	
		?>
		
		<p><label for="<?php echo $this->get_field_id('name');?>">Name:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('name');?>" name="<?php echo $this->get_field_name('name');?>" type="text" value="<?php echo $name;?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('designation');?>">Designation:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('designation');?>" name="<?php echo $this->get_field_name('designation');?>" type="text" value="<?php echo $designation;?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('image');?>">Image:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('image');?>" name="<?php echo $this->get_field_name('image');?>" type="text" value="<?php echo $image;?>" />
		<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label></p>
		
		<p><label for="<?php echo $this->get_field_id('description');?>">Description:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('description');?>" name="<?php echo $this->get_field_name('description');?>" ><?php echo $description;?></textarea></p>
		
		<p><label for="<?php echo $this->get_field_id('google');?>">Google:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('google');?>" name="<?php echo $this->get_field_name('google');?>" type="text" value="<?php echo $google;?>" />
		</p>		
		<p><label for="<?php echo $this->get_field_id('facebook');?>">Facebook:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook');?>" name="<?php echo $this->get_field_name('facebook');?>" type="text" value="<?php echo $facebook;?>" /></p>		
		<p><label for="<?php echo $this->get_field_id('twitter');?>">Twitter:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter');?>" name="<?php echo $this->get_field_name('twitter');?>" type="text" value="<?php echo $twitter;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('linked_in');?>">Linked In:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linked_in');?>" name="<?php echo $this->get_field_name('linked_in');?>" type="text" value="<?php echo $linked_in;?>" /></p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("OurTeamWidget");'));
// end ServicesWidget
?>