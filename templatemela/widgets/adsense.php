<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php // Reference:  http://codex.wordpress.org/Widgets_API
class AdsenseWidget extends WP_Widget
{
    function AdsenseWidget(){
		$widget_settings = array('description' => 'Adsense Widget', 'classname' => 'widgets-adsense');
		parent::WP_Widget(false,$name='TM - Adsense Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Adsense' : $instance['title']);
		$adsenseCode = empty($instance['adsenseCode']) ? '' : $instance['adsenseCode'];
		echo $before_widget; 
		echo $before_title ; 		
		if($title)
			echo $title;
		echo $after_title; ?> 
		<p><?php echo $adsenseCode;?></p>
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['adsenseCode'] = $new_instance['adsenseCode'];
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Adsense', 'adsenseCode'=>'') );
		$title = esc_attr($instance['title']);
		$adsenseCode = $instance['adsenseCode'];

		?>
		<p><label for="<?php echo $this->get_field_id('adsenseCode');?>">Adsense Code(for google,msn etc):</label><textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('adsenseCode');?>" name="<?php echo $this->get_field_name('adsenseCode');?>" ><?php echo $adsenseCode;?></textarea></p>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("AdsenseWidget");'));
// end AdsenseWidget
?>