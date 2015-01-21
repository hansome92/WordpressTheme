<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
 ?>
<?php 
class ShoppingFooterWidget extends WP_Widget
{
    function ShoppingFooterWidget(){
		$widget_settings = array('description' => 'Shopping Footer Widget', 'classname' => 'widgets-ShoppingFooter');
		parent::WP_Widget(false,$name='TM - Shopping Footer Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'services' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$imageSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$Services = empty($instance['Services']) ? '' : $instance['Services'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$icon = empty($instance['icon']) ? '' : $instance['icon'];
		echo $before_widget; 
		echo $before_title;		
		if($title)
			echo $title;
		echo $after_title; ?> 
			<div class="icon">
				<div class="<?php echo $icon; ?>"></div>
			</div>
			<div class="service-description"><?php echo $Services; ?></div>
			<div class="service-read-more"><a href="<?php echo $linkURL; ?>" title="Read More">Read More</a></div>
		<?php
		echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;	
		$instance['is_template_path'] = false;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['image1'] = strip_tags($new_instance['image1']);
		$instance['delivery_text1'] = strip_tags($new_instance['delivery_text1']);
		$instance['delivery_text2'] = strip_tags($new_instance['delivery_text2']);
		$instance['delivery_description'] =($new_instance['delivery_description']);
		$instance['image2'] = strip_tags($new_instance['image2']);
		$instance['order_text1'] = strip_tags($new_instance['order_text1']);
		$instance['order_text2'] = strip_tags($new_instance['order_text2']);
		$instance['order_description'] = strip_tags($new_instance['order_description']);
		$instance['image3'] = strip_tags($new_instance['image3']);
		$instance['gift_text'] = strip_tags($new_instance['gift_text']);
		$instance['gift_description'] = strip_tags($new_instance['gift_description']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
		'image1'=>'delivery.png', 
		'delivery_text1' => 'Free Shipping',
		'delivery_text2' =>'on orders over $99',
		'delivery_description' => 'This offer is valid on all our store items',
		'image2' =>'phone.png',
		'order_text1' => 'Order online',
		'order_text2' => '1(800) 234-5678',
		'order_description' => 'Hours: 8am-11pm PST M-Th; 8am-9pm PST Fri',
		'image3'=>'gift.png', 
		'gift_text'=>'SEND A GIFT',
		'gift_description'=>'Choose from any of our extensive range'
		) );		
		$image1 = esc_attr($instance['image1']);
		$delivery_text1 = esc_attr($instance['delivery_text1']);	
		$delivery_text2 = esc_attr($instance['delivery_text2']);	
		$delivery_description = esc_attr($instance['delivery_description']);
		$image2 = esc_attr($instance['image2']);
		$order_text1 = esc_attr($instance['order_text1']);
		$order_text2 = esc_attr($instance['order_text2']);
		$order_description = esc_attr($instance['order_description']);
		$image3 = esc_attr($instance['image3']);	
		$gift_text = esc_attr($instance['gift_text']);		
		$gift_description = esc_attr($instance['gift_description']);
		?>
		<p><div>Delivery</div></p>
		
		<p><label for="<?php echo $this->get_field_id('image1');?>">Delivery Image:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('image1');?>" name="<?php echo $this->get_field_name('image1');?>" type="text" value="<?php echo $image1;?>" />
		<br /><input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label></p>
		
		<p><label for="<?php echo $this->get_field_id('delivery_text1');?>">Text1:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('delivery_text1');?>" name="<?php echo $this->get_field_name('delivery_text1');?>" type="text" value="<?php echo $delivery_text1;?>" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('delivery_text2');?>">Text2:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('delivery_text2');?>" name="<?php echo $this->get_field_name('delivery_text2');?>" type="text" value="<?php echo $delivery_text2;?>" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('delivery_description');?>">Description:</label>
		<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('delivery_description');?>" name="<?php echo $this->get_field_name('delivery_description');?>" ><?php echo $delivery_description;?></textarea>
		</p>
		
		<p><div>Order</div></p>
		
		<p><label for="<?php echo $this->get_field_id('image2');?>">Order Image:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('image2');?>" name="<?php echo $this->get_field_name('image2');?>" type="text" value="<?php echo $image2;?>" />
		<br /><input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label></p>
		
		<p><label for="<?php echo $this->get_field_id('order_text1');?>">Text1:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('order_text1');?>" name="<?php echo $this->get_field_name('order_text1');?>" type="text" value="<?php echo $order_text1;?>" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('order_text2');?>">Text2:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('order_text2');?>" name="<?php echo $this->get_field_name('order_text2');?>" type="text" value="<?php echo $order_text2;?>" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('order_description');?>">Description:</label>
		<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('order_description');?>" name="<?php echo $this->get_field_name('order_description');?>" ><?php echo $order_description;?></textarea>
		</p>
		
		<p><div>Gift</div></p>
		
		<p><label for="<?php echo $this->get_field_id('image3');?>">Order Image:<br /></label>
		<input class="widefat" id="<?php echo $this->get_field_id('image3');?>" name="<?php echo $this->get_field_name('image3');?>" type="text" value="<?php echo $image3;?>" />
		<br /><input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo $this->get_field_id('is_template_path'); ?>" name="<?php echo $this->get_field_name('is_template_path'); ?>" /><label for="<?php echo $this->get_field_id('is_template_path'); ?>">Use Template Path for Image</label></p>
		
		<p><label for="<?php echo $this->get_field_id('gift_text');?>">Text:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('gift_text');?>" name="<?php echo $this->get_field_name('gift_text');?>" type="text" value="<?php echo $gift_text;?>" />
		</p>		
		<p><label for="<?php echo $this->get_field_id('gift_description');?>">Description:</label>
		<textarea cols="18" rows="3" class="widefat" id="<?php echo $this->get_field_id('gift_description');?>" name="<?php echo $this->get_field_name('gift_description');?>" ><?php echo $gift_description;?></textarea>
		</p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("ShoppingFooterWidget");'));
// end ServicesWidget
?>
