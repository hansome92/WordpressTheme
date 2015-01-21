<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class FooterContactUsWidget extends WP_Widget
{
    function FooterContactUsWidget(){
		$widget_settings = array('description' => 'Footer Contact Us Widget', 'classname' => 'widgets-FooterContactUsservices');
		parent::WP_Widget(false,$name='TM - Footer Contact Us Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Contact Us' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
		$is_template_path1 = isset($instance['is_template_path1']) ? $instance['is_template_path1'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$address = empty($instance['address']) ? '' : $instance['address'];
		$text = empty($instance['text']) ? '' : $instance['text'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$email_title = empty($instance['email_title']) ? '' : $instance['email_title'];
		$ph_no = empty($instance['ph_no']) ? '' : $instance['ph_no'];
		echo $before_widget; 
		echo $before_title;
		if($title)
			echo $title;
		echo $after_title; ?>
				<?php if(!empty($text)) : ?>			
				<div class="about-contact">
					<?php echo $text; ?>
				</div>
				<?php endif; ?>	
				<div class="address">
					<!--<div class="text-address">Address:</div>-->
					<div class="value-address"><?php echo $address; ?></div>
				</div>
				<div class="phone">
					<div class="text-phone"></div>
					<div class="value-phone"><?php echo $ph_no; ?></div>				
				</div>	
				<div class="email">
					<div class="text-email"></div>
					<div class="value-email"><a href="<?php if($linkURL == ""): echo home_url( '/' ) ; else:?><?php echo $linkURL; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>><?php echo $email_title;  ?></a></div>				
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
		$instance['title'] =($new_instance['title']);
		$instance['text'] =($new_instance['text']);
		$instance['address'] =($new_instance['address']);
		$instance['email_title'] =($new_instance['email_title']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['ph_no'] =($new_instance['ph_no']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'text'=>'', 'window_target'=>false, 'address'=>'', 'text'=>'', 'address'=>'', 'email_title'=>'', 'ph_no' => '', 'linkURL'=>'') );			
		$title = esc_attr($instance['title']);
		$text = esc_attr($instance['text']);
		$address = esc_attr($instance['address']);
		$email_title = esc_attr($instance['email_title']);
		$ph_no = esc_attr($instance['ph_no']);
		$linkURL = esc_attr($instance['linkURL']);
		?>
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('text');?>">Text:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('text');?>" name="<?php echo $this->get_field_name('text');?>" ><?php echo $text;?></textarea></p>
		<p><label for="<?php echo $this->get_field_id('address');?>">Adress:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('address');?>" name="<?php echo $this->get_field_name('address');?>" ><?php echo $address;?></textarea></p>	
		<p><label for="<?php echo $this->get_field_id('email_title');?>">E-mail:</label><input class="widefat" id="<?php echo $this->get_field_id('email_title');?>" name="<?php echo $this->get_field_name('email_title');?>" type="text" value="<?php echo $email_title;?>" /></p>	
		<p><label for="<?php echo $this->get_field_id('linkURL');?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL');?>" name="<?php echo $this->get_field_name('linkURL');?>" type="text" value="<?php echo $linkURL;?>" />
		<label>(e.g. mailto:support@templatemela.com)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" /><label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label></p>		
		<div style="border-bottom:2px solid #ddd; margin-bottom:10px;">&nbsp;</div>
		
		<p><label for="<?php echo $this->get_field_id('ph_no');?>">Phone No:</label><input class="widefat" id="<?php echo $this->get_field_id('ph_no');?>" name="<?php echo $this->get_field_name('ph_no');?>" type="text" value="<?php echo $ph_no;?>" /></p>	
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("FooterContactUsWidget");'));
// end BlogWidget
?>