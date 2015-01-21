<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php // Reference:  http://codex.wordpress.org/Widgets_API
class SubscribeRssWidget extends WP_Widget
{	// SPECIAL FOR http://feedburner.google.com
    function SubscribeRssWidget(){
		$widget_settings = array('description' => 'SubscribeRss Widget', 'classname' => 'widgets-subsribefeed');
		parent::WP_Widget(false,$name='TM - SubscribeRss Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Subscribe To Rss' : $instance['title']);
		$subsribeText = empty($instance['subsribeText']) ? '' : $instance['subsribeText'];
		$subsribeUri = empty($instance['subsribeUri']) ? '' : $instance['subsribeUri'];
		echo $before_widget; 
		echo $before_title;
		if($title)
			echo $title;
		echo $after_title; ?>		
		<p><?php echo $subsribeText;?></p>
		<form class="sub-form" style="padding:3px;text-align:left;" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $subsribeUri;?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<input type="text" style="width:160px" name="email" class="input-text" value="Enter your email address" onclick="if(this.value=='Enter your email address')this.value='';" onblur="if(this.value=='')this.value='Enter your email address';"/>
<input type="hidden" value="<?php echo $subsribeUri;?>" name="uri"/><input type="hidden" name="loc" value="en_US"/>
<input type="image" class="Subscribe_button" title="Subscribe" value="Submit" src="<?php echo get_template_directory_uri(); ?>/images/submit.gif" id="Subscribe" name="Subscribe" />
<?php /*?><button id="Subscribe" type="submit" value="submit" name="Subscribe" title="Subscribe" class="button btn-subscribe"><span><span>Go</span></span></button><?php */?>
<br />		</form>
		<?php echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subsribeText'] = strip_tags($new_instance['subsribeText']);
		$instance['subsribeUri'] = strip_tags($new_instance['subsribeUri']);
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'SubscribeRss', 'subsribeText'=>'', 'subsribeUri'=>'templatemela') );
		$title = esc_attr($instance['title']);
		$subsribeText = esc_attr($instance['subsribeText']);
		$subsribeUri = esc_attr($instance['subsribeUri']);

		?>
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('subsribeUri');?>">Feedburner UserId:</label><input class="widefat" id="<?php echo $this->get_field_id('subsribeUri');?>" name="<?php echo $this->get_field_name('subsribeUri');?>" type="text" value="<?php echo $subsribeUri;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('subsribeText');?>">SubscribeRss Text:</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('subsribeText');?>" name="<?php echo $this->get_field_name('subsribeText');?>" ><?php echo $subsribeText;?></textarea></p>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("SubscribeRssWidget");'));
// end SubscribeRssWidget
?>