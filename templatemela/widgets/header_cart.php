<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class HeaderCartCountWidget extends WP_Widget
{
    function HeaderCartCountWidget(){
		$widget_settings = array('description' => 'Header Cart Widget', 'classname' => 'widgets-headercartcount');
		parent::WP_Widget(false,$name='TM - Header Cart Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);		
		$title = empty($instance['title']) ? '' : $instance['title']; 
		echo $before_widget; ?>
		<?php 
		/*echo $before_title;			
		if($title)
			echo $title;
		echo $after_title; */ ?> 		
		<?php 
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
		global $woocommerce;
		
		ob_start();?>						
		<a id="shopping_cart" class="shopping_cart tog" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php if($title) echo $title; ?>"> 
		<?php if($title) echo $title; ?>
		<span class="item-total"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span> </a>
		<?php endif;?>
		<?php echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;	
		$instance['title'] =($new_instance['title']);
	
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'') );			
		$title = esc_attr($instance['title']);
	
		?>
<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
		</p>
<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("HeaderCartCountWidget");'));
// end BlogWidget
?>
