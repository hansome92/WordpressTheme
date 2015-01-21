<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class SubBannersWidget extends WP_Widget
{
    function SubBannersWidget(){
		$widget_settings = array('description' => 'Banners Widget', 'classname' => 'widgets-banners');
		parent::WP_Widget(false,$name='TM - Banners Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'About Me' : $instance['title']);
		$is_template_path1 = isset($instance['is_template_path1']) ? $instance['is_template_path1'] : false;
		$is_template_path2 = isset($instance['is_template_path2']) ? $instance['is_template_path2'] : false;
		$is_template_path3 = isset($instance['is_template_path3']) ? $instance['is_template_path3'] : false;
        $window_target1 = isset($instance['window_target1']) ? $instance['window_target1'] : false;
		$window_target2 = isset($instance['window_target2']) ? $instance['window_target2'] : false;
		$window_target3 = isset($instance['window_target3']) ? $instance['window_target3'] : false;
		$imageSrc1 = empty($instance['imageSrc1']) ? '' : $instance['imageSrc1'];
		$imageSrc2 = empty($instance['imageSrc2']) ? '' : $instance['imageSrc2'];
		$imageSrc3 = empty($instance['imageSrc3']) ? '' : $instance['imageSrc3'];
		$linkURL1 = empty($instance['linkURL1']) ? '' : $instance['linkURL1'];
		$linkURL2 = empty($instance['linkURL2']) ? '' : $instance['linkURL2'];
		$linkURL3 = empty($instance['linkURL3']) ? '' : $instance['linkURL3'];
		if($is_template_path1 == 1):
			$imageSrc1 = get_template_directory_uri() . '/images/' . $imageSrc1; 
		endif;	
		if($is_template_path2 == 1):
			$imageSrc2 = get_template_directory_uri() . '/images/' . $imageSrc2; 
		endif;
		if($is_template_path3 == 1):
			$imageSrc3 = get_template_directory_uri() . '/images/' . $imageSrc3; 
		endif;	
		echo $before_widget;
		 ?> 
			<div class="home_subbanner"  id="subbanner1">				
				<span> <a href="<?php if($linkURL1 == ""): echo home_url( '/' ); else:?><?php echo $linkURL1; endif;?>" <?php if($window_target1 == true) echo 'target="_blank"'; ?>> <img src="<?php echo $imageSrc1; ?>" alt="" class="vv" /> </a> </span>
			
			</div>			   
			
			<div class="home_subbanner"  id="subbanner2">
				<span> <a href="<?php if($linkURL2 == ""): echo home_url( '/' ); else:?><?php echo $linkURL2; endif;?>" <?php if($window_target2 == true) echo 'target="_blank"'; ?>> <img src="<?php echo $imageSrc2; ?>" alt="" class="vv" /> </a> </span>
			
			</div>
			
			<div class="home_subbanner"  id="subbanner3">				
				<span> <a href="<?php if($linkURL3 == ""): echo home_url( '/' ); else:?><?php echo $linkURL3; endif;?>" <?php if($window_target3 == true) echo 'target="_blank"'; ?>> <img src="<?php echo $imageSrc3; ?>" alt="" class="vv" /> </a> </span>
			
			</div>
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['window_target1'] = false;
		$instance['is_template_path1'] = false;
		$instance['window_target2'] = false;
		$instance['is_template_path2'] = false;
		$instance['window_target3'] = false;
		$instance['is_template_path3'] = false;
		if (isset($new_instance['window_target1'])) $instance['window_target1'] = true;
		if (isset($new_instance['window_target2'])) $instance['window_target2'] = true;
		if (isset($new_instance['window_target3'])) $instance['window_target3'] = true;
		if (isset($new_instance['is_template_path1'])) $instance['is_template_path1'] = true;
		if (isset($new_instance['is_template_path2'])) $instance['is_template_path2'] = true;
		if (isset($new_instance['is_template_path3'])) $instance['is_template_path3'] = true;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['imageSrc1'] = strip_tags($new_instance['imageSrc1']);
		$instance['imageSrc2'] = strip_tags($new_instance['imageSrc2']);
		$instance['imageSrc3'] = strip_tags($new_instance['imageSrc3']);
		
		$instance['linkURL1'] = strip_tags($new_instance['linkURL1']);
		$instance['linkURL2'] = strip_tags($new_instance['linkURL2']);		
		$instance['linkURL3'] = strip_tags($new_instance['linkURL3']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'window_target1' =>'', 'window_target2' =>'', 'window_target3' =>'', 'imageSrc'=>'', 'imageSrc1'=>'', 'imageSrc2'=>'', 'imageSrc3'=>'', 'is_template_path1'=>'', 'is_template_path2'=>'', 'is_template_path3'=>'', 'linkURL1'=>'', 'linkURL2'=>'', 'linkURL3'=>'') );
		$title = esc_attr($instance['title']);
		$imageSrc1 = esc_attr($instance['imageSrc1']);
		$imageSrc2 = esc_attr($instance['imageSrc2']);
		$imageSrc3 = esc_attr($instance['imageSrc3']);

		$window_target1 =  esc_attr($instance['window_target1']); 
		$window_target2 = esc_attr($instance['window_target2']); 
		$window_target3 = esc_attr($instance['window_target3']);  	 			
		
		$is_template_path1 =  esc_attr($instance['is_template_path1']); 
		$is_template_path2 = esc_attr($instance['is_template_path2']); 
		$is_template_path3 = esc_attr($instance['is_template_path3']);  	 	
		$linkURL1 = esc_attr($instance['linkURL1']);
		$linkURL2 = esc_attr($instance['linkURL2']);
		$linkURL3 = esc_attr($instance['linkURL3']);
		?>
		
<?php /*?>		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</p><?php */?>
		
		<p><label for="<?php echo $this->get_field_id('imageSrc1');?>">Banner1 URL:<br /></label>
			<input class="widefat" id="<?php echo $this->get_field_id('imageSrc1');?>" name="<?php echo $this->get_field_name('imageSrc1');?>" type="text" value="<?php echo $imageSrc1;?>" /><br />
			
			<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path1'], true) ?> id="<?php echo $this->get_field_id('is_template_path1'); ?>" name="<?php echo $this->get_field_name('is_template_path1'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path1'); ?>">Use Template Path for Image</label>
		</p>			
			
		<p>
		  <label for="<?php echo $this->get_field_id('linkURL1');?>">Link URL1:<br />
		  </label>
		  <input class="widefat" id="<?php echo $this->get_field_id('linkURL1');?>" name="<?php echo $this->get_field_name('linkURL1');?>" type="text" value="<?php echo $linkURL1;?>" />
		  <br />
		  <input class="checkbox" type="checkbox" <?php checked($instance['window_target1'], true) ?> id="<?php echo $this->get_field_id('window_target1'); ?>" name="<?php echo $this->get_field_name('window_target1'); ?>" />
		  <label for="<?php echo $this->get_field_id('window_target1'); ?>">Open Link In New Window</label>
		</p>
			
			
		
		
		
		<p><label for="<?php echo $this->get_field_id('imageSrc2');?>">Banner2 URL:<br /></label>
			<input class="widefat" id="<?php echo $this->get_field_id('imageSrc2');?>" name="<?php echo $this->get_field_name('imageSrc2');?>" type="text" value="<?php echo $imageSrc2;?>" /><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path2'], true) ?> id="<?php echo $this->get_field_id('is_template_path2'); ?>" name="<?php echo $this->get_field_name('is_template_path2'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path2'); ?>">Use Template Path for Image</label>
		</p>	
			
			<p>
		  <label for="<?php echo $this->get_field_id('linkURL2');?>">Link URL2:<br />
		  </label>
		  <input class="widefat" id="<?php echo $this->get_field_id('linkURL2');?>" name="<?php echo $this->get_field_name('linkURL2');?>" type="text" value="<?php echo $linkURL2;?>" />
		  <br />
		  
		   <input class="checkbox" type="checkbox" <?php checked($instance['window_target2'], true) ?> id="<?php echo $this->get_field_id('window_target2'); ?>" name="<?php echo $this->get_field_name('window_target2'); ?>" />
		  <label for="<?php echo $this->get_field_id('window_target2'); ?>">Open Link In New Window</label>
		</p>
		  
			
		
		
		<p><label for="<?php echo $this->get_field_id('imageSrc3');?>">Banner3 URL:<br /></label>
			<input class="widefat" id="<?php echo $this->get_field_id('imageSrc3');?>" name="<?php echo $this->get_field_name('imageSrc3');?>" type="text" value="<?php echo $imageSrc3;?>" /><br />
			<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path3'], true) ?> id="<?php echo $this->get_field_id('is_template_path3'); ?>" name="<?php echo $this->get_field_name('is_template_path3'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path3'); ?>">Use Template Path for Image</label>
		</p>
			
			<p>
		  <label for="<?php echo $this->get_field_id('linkURL3');?>">Link URL3:<br />
		  </label>
		  <input class="widefat" id="<?php echo $this->get_field_id('linkURL3');?>" name="<?php echo $this->get_field_name('linkURL3');?>" type="text" value="<?php echo $linkURL3;?>" />
		  <br />
		   <input class="checkbox" type="checkbox" <?php checked($instance['window_target3'], true) ?> id="<?php echo $this->get_field_id('window_target3'); ?>" name="<?php echo $this->get_field_name('window_target3'); ?>" />
		  <label for="<?php echo $this->get_field_id('window_target3'); ?>">Open Link In New Window</label>
		  
		  
		</p>
		
		
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("SubBannersWidget");'));
// end AboutWidget
?>