<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class HeaderLoginWidget extends WP_Widget
{
    function HeaderLoginWidget(){
		$widget_settings = array('description' => 'Header Login Widget', 'classname' => 'widgets-headerlogin');
		parent::WP_Widget(false,$name='TM - Header Login Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);		
		$title = empty($instance['title']) ? '' : $instance['title']; 
		echo $before_widget; ?>
		<?php 
		echo $before_title;			
		if($title)
			echo $title;
		echo $after_title;
		 ?> 
		
		<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
				global $logout_url; 					
				?>
				<div class="header-login-logout">					
					<?php 					
					$account_text = get_option("tmoption_myaccount_text");
					$login_text = get_option("tmoption_register_text");
					$logout_text = get_option("tmoption_logout_text");
					
					if ( is_user_logged_in() ) {
					$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); 
					if ( $myaccount_page_id ) { 
					$logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) ); 
					if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
					$logout_url = str_replace( 'http:', 'https:', $logout_url );
					
					
					} ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php echo $account_text; ?>">
					<?php echo $account_text; ?></a> /
					<a href="<?php echo $logout_url; ?>" title="<?php echo $logout_text; ?>"><?php echo $logout_text; ?></a>
					<?php }
					else { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php echo $login_text; ?>"><?php echo $login_text; ?></a>
					<?php } ?>  
 				</div>
				
 				<?php endif; ?>  
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
add_action('widgets_init', create_function('', 'return register_widget("HeaderLoginWidget");'));
// end BlogWidget
?>
