<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class HomePageTabservicesWidget extends WP_Widget
{
    function HomePageTabservicesWidget(){
		$widget_settings = array('description' => 'Services Widget', 'classname' => 'widgets-HomePageBlog');
		parent::WP_Widget(false,$name='TM - List Of Services Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'services' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$Services = empty($instance['Services']) ? '' : $instance['Services'];
		$Services1 = empty($instance['Services1']) ? '' : $instance['Services1'];
		$Services2 = empty($instance['Services2']) ? '' : $instance['Services2'];
		$Services3 = empty($instance['Services3']) ? '' : $instance['Services3'];
		$Services4 = empty($instance['Services4']) ? '' : $instance['Services4'];
		$Services5 = empty($instance['Services5']) ? '' : $instance['Services5'];
		
		$linkURL1 = empty($instance['linkURL1']) ? '' : $instance['linkURL1'];
		$linkURL2 = empty($instance['linkURL2']) ? '' : $instance['linkURL2'];
		$linkURL3 = empty($instance['linkURL3']) ? '' : $instance['linkURL3'];
		$linkURL4 = empty($instance['linkURL4']) ? '' : $instance['linkURL4'];
		$linkURL5 = empty($instance['linkURL5']) ? '' : $instance['linkURL5'];
		echo $before_widget; 
		echo $before_title ;			
		if($title)
			echo $title;
		echo $after_title; 		
		?> 
		<div class="service-list">
			<span><a href="<?php if($linkURL1 == ""): echo home_url( '/' ); else:?><?php echo $linkURL1; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
				<?php echo $Services1;  ?></a></span>
			<span><a href="<?php if($linkURL2 == ""): echo home_url( '/' ); else:?><?php echo $linkURL2; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
				<?php echo $Services2;  ?></a></span>
			<span><a href="<?php if($linkURL3 == ""): echo home_url( '/' ); else:?><?php echo $linkURL3; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
				<?php echo $Services3;  ?></a></span>
			<span><a href="<?php if($linkURL4 == ""): echo home_url( '/' ); else:?><?php echo $linkURL4; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
				<?php echo $Services4;  ?></a></span>
			<span><a href="<?php if($linkURL5 == ""): echo home_url( '/' ); else:?><?php echo $linkURL5; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
				<?php echo $Services5;  ?></a></span>
			
						
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
		$instance['Services1'] =($new_instance['Services1']);
		$instance['Services2'] =($new_instance['Services2']);
		$instance['Services3'] =($new_instance['Services3']);
		$instance['Services4'] =($new_instance['Services4']);
		$instance['Services5'] =($new_instance['Services5']);
		
		$instance['linkURL1'] = strip_tags($new_instance['linkURL1']);
		$instance['linkURL2'] = strip_tags($new_instance['linkURL2']);
		$instance['linkURL3'] = strip_tags($new_instance['linkURL3']);
		$instance['linkURL4'] = strip_tags($new_instance['linkURL4']);
		$instance['linkURL5'] = strip_tags($new_instance['linkURL5']);
		
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'','Services'=>'','Services1'=>'','Services2'=>'','Services3'=>'','Services4'=>'','Services5'=>'','linkURL'=>'','linkURL1'=>'','linkURL2'=>'','linkURL3'=>'','linkURL4'=>'','linkURL5'=>'') );			
		$title = esc_attr($instance['title']);	
		$Services = esc_attr($instance['Services']);	
		$Services1 = esc_attr($instance['Services1']);	
		$Services2= esc_attr($instance['Services2']);
		$Services3= esc_attr($instance['Services3']);
		$Services4= esc_attr($instance['Services4']);
		$Services5= esc_attr($instance['Services5']);
		
		$linkURL1 = esc_attr($instance['linkURL1']);
		$linkURL2 = esc_attr($instance['linkURL2']);
		$linkURL3 = esc_attr($instance['linkURL3']);
		$linkURL4 = esc_attr($instance['linkURL4']);
		$linkURL5 = esc_attr($instance['linkURL5']);
		
		?>
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('Services1');?>">Services1:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services1');?>" name="<?php echo $this->get_field_name('Services1');?>" ><?php echo $Services1;?></textarea></p>
		<p><label for="<?php echo $this->get_field_id('linkURL1');?>">Link URL1:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL1');?>" name="<?php echo $this->get_field_name('linkURL1');?>" type="text" value="<?php echo $linkURL1;?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<p><label for="<?php echo $this->get_field_id('Services2');?>">Services2:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services2');?>" name="<?php echo $this->get_field_name('Services2');?>" ><?php echo $Services2;?></textarea></p>
		<p><label for="<?php echo $this->get_field_id('linkURL2');?>">Link URL2:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL2');?>" name="<?php echo $this->get_field_name('linkURL2');?>" type="text" value="<?php echo $linkURL2;?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<p><label for="<?php echo $this->get_field_id('Services3');?>">Services3:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services3');?>" name="<?php echo $this->get_field_name('Services3');?>" ><?php echo $Services3;?></textarea></p>
		<p><label for="<?php echo $this->get_field_id('linkURL3');?>">Link URL3:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL3');?>" name="<?php echo $this->get_field_name('linkURL3');?>" type="text" value="<?php echo $linkURL3;?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<p><label for="<?php echo $this->get_field_id('Services4');?>">Services4:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services4');?>" name="<?php echo $this->get_field_name('Services4');?>" ><?php echo $Services4;?></textarea></p>
		<p><label for="<?php echo $this->get_field_id('linkURL4');?>">Link URL4:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL4');?>" name="<?php echo $this->get_field_name('linkURL4');?>" type="text" value="<?php echo $linkURL4;?>" />
		<label>(e.g. http://www.Google.com/...)</label>	
		
		<p><label for="<?php echo $this->get_field_id('Services5');?>">Services5:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('Services5');?>" name="<?php echo $this->get_field_name('Services5');?>" ><?php echo $Services5;?></textarea></p>
		<p><label for="<?php echo $this->get_field_id('linkURL5');?>">Link URL5:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkURL5');?>" name="<?php echo $this->get_field_name('linkURL5');?>" type="text" value="<?php echo $linkURL5;?>" />
		<label>(e.g. http://www.Google.com/...)</label>	
		
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("HomePageTabservicesWidget");'));
// end ServicesWidget
?>