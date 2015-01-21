<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php // Reference:  http://codex.wordpress.org/Widgets_API
class FollowMeWidget extends WP_Widget
{
    function FollowMeWidget(){
		$widget_settings = array('description' => 'Follow Me Widget', 'classname' => 'widgets-follow-me');
		parent::WP_Widget(false,$name='TM - Follow Me Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Follow Us' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
		$window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$label = empty($instance['label']) ? '' : $instance['label'];
		$linkURL2 = empty($instance['linkURL2']) ? '' : $instance['linkURL2'];
		$imageSrc2 = empty($instance['imageSrc2']) ? '' : $instance['imageSrc2'];
		$label2 = empty($instance['label2']) ? '' : $instance['label2'];
		$linkURL3 = empty($instance['linkURL3']) ? '' : $instance['linkURL3'];
		$imageSrc3 = empty($instance['imageSrc3']) ? '' : $instance['imageSrc3'];
		$label3 = empty($instance['label3']) ? '' : $instance['label3'];
		$linkURL4 = empty($instance['linkURL4']) ? '' : $instance['linkURL4'];
		$imageSrc4 = empty($instance['imageSrc4']) ? '' : $instance['imageSrc4'];
		$label4 = empty($instance['label4']) ? '' : $instance['label4'];
		$linkURL5 = empty($instance['linkURL5']) ? '' : $instance['linkURL5'];
		$imageSrc5 = empty($instance['imageSrc5']) ? '' : $instance['imageSrc5'];
		$label5 = empty($instance['label5']) ? '' : $instance['label5'];
		echo $before_widget; 
		echo $before_title;
      if($title)
        echo $title;
      echo $after_title; 
		 ?>
			<div id="branding">	
			  <div class="follow-me"> <span> <a  class="fb" href="<?php if($linkURL == ""): echo home_url( '/' ); else:?><?php echo $linkURL; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>> facebook </a> </span> <span> <a  class="twitter" href="<?php if($linkURL2 == ""): echo home_url( '/' ); else:?><?php echo $linkURL2; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>> twitter </a> </span> <span> <a  class="rss" href="<?php if($linkURL4 == ""): echo home_url( '/' ); else:?> <?php echo $linkURL4; endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>> rss </a> </span>
			  </div>
			</div>
<?php
		echo $after_widget;			
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['label'] = strip_tags($new_instance['label']);	
		$instance['linkURL2'] = strip_tags($new_instance['linkURL2']);
		$instance['imageSrc2'] = strip_tags($new_instance['imageSrc2']);
		$instance['label2'] = strip_tags($new_instance['label2']);	
		$instance['linkURL3'] = strip_tags($new_instance['linkURL3']);
		$instance['imageSrc3'] = strip_tags($new_instance['imageSrc3']);
		$instance['label3'] = strip_tags($new_instance['label3']);	
		$instance['linkURL4'] = strip_tags($new_instance['linkURL4']);
		$instance['imageSrc4'] = strip_tags($new_instance['imageSrc4']);
		$instance['label4'] = strip_tags($new_instance['label4']);	
		$instance['linkURL5'] = strip_tags($new_instance['linkURL5']);
		$instance['imageSrc5'] = strip_tags($new_instance['imageSrc5']);
		$instance['label5'] = strip_tags($new_instance['label5']);		
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Stay Connect', 'window_target' => true, 'is_template_path' => true, 'linkURL' => '', 'label' => '', 'imageSrc' => '', 'linkURL2' => '', 'label2' => '', 'imageSrc2' => '', 'linkURL3' => '', 'imageSrc3' => '', 'label3' => '', 'linkURL4' => '', 'imageSrc4' => '', 'label4' => '', 'linkURL5' => '', 'imageSrc5' => '', 'label5' => '') );
		$title = esc_attr($instance['title']);
		$linkURL = esc_attr($instance['linkURL']);
		$label = esc_attr($instance['label']);
		$imageSrc = esc_attr($instance['imageSrc']);
		$linkURL2 = esc_attr($instance['linkURL2']);
		$label2 = esc_attr($instance['label2']);
		$imageSrc2 = esc_attr($instance['imageSrc2']);
		$linkURL3 = esc_attr($instance['linkURL3']);
		$imageSrc3 = esc_attr($instance['imageSrc3']);
		$label3 = esc_attr($instance['label3']);
		$linkURL4 = esc_attr($instance['linkURL4']);
		$imageSrc4 = esc_attr($instance['imageSrc4']);
		$label4 = esc_attr($instance['label4']);
		$linkURL5 = esc_attr($instance['linkURL5']);
		$imageSrc5 = esc_attr($instance['imageSrc5']);
		$label5 = esc_attr($instance['label5']); ?>
<p>
  <label for="<?php echo $this->get_field_id('title');?>">Title:</label>
  <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
</p>
<p style="text-align:center">
  <label for="<?php echo $this->get_field_id('linkURL');?>"><strong>Facebook</strong></label>
<p>
  <label for="<?php echo $this->get_field_id('linkURL');?>">Link URL:<br />
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('linkURL');?>" name="<?php echo $this->get_field_name('linkURL');?>" type="text" value="<?php echo $linkURL;?>" />
  <label>(e.g. http://www.facebook.com/...)</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" />
  <label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label>
</p>
<div style="border-bottom:2px solid #ddd; margin-bottom:10px;">&nbsp;</div>
<p style="text-align:center">
  <label for="<?php echo $this->get_field_id('linkURL2');?>"><strong>Twitter</strong></label>
<p>
  <label for="<?php echo $this->get_field_id('linkURL2');?>">Link URL:<br />
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('linkURL2');?>" name="<?php echo $this->get_field_name('linkURL2');?>" type="text" value="<?php echo $linkURL2;?>" />
  <label>(e.g. http://www.Twitter.com/...)</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" />
  <label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label>
</p>
<div style="border-bottom:2px solid #ddd; margin-bottom:10px;">&nbsp;</div>
<?php /*?><p style="text-align:center">
  <label for="<?php echo $this->get_field_id('linkURL3');?>"><strong>Linkedin</strong></label>
<p>
  <label for="<?php echo $this->get_field_id('linkURL3');?>">Link URL:<br />
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('linkURL3');?>" name="<?php echo $this->get_field_name('linkURL3');?>" type="text" value="<?php echo $linkURL3;?>" />
  <label>(e.g. http://linkedin.com...)</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" />
  <label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label>
</p>
<div style="border-bottom:2px solid #ddd; margin-bottom:10px;">&nbsp;</div><?php */?>
<p style="text-align:center">
  <label for="<?php echo $this->get_field_id('linkURL4');?>"><strong>RSS</strong></label>
<p>
  <label for="<?php echo $this->get_field_id('linkURL4');?>">Link URL:<br />
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('linkURL4');?>" name="<?php echo $this->get_field_name('linkURL4');?>" type="text" value="<?php echo $linkURL4;?>" />
  <label>(e.g. http://feeds.feedburner.com/...)</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo $this->get_field_id('window_target'); ?>" name="<?php echo $this->get_field_name('window_target'); ?>" />
  <label for="<?php echo $this->get_field_id('window_target'); ?>">Open Link In New Window</label>
</p>
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("FollowMeWidget");'));
// end foolow me widgets
?>
