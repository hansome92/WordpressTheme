<?php  // Reference:  http://codex.wordpress.org/Widgets_API
class ContactUsWidget extends WP_Widget
{
    function ContactUsWidget(){
		$widget_settings = array('description' => 'Contact Us Widget', 'classname' => 'widgets-contactus');
		parent::WP_Widget(false,$name='TM - Contact Us Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'contact us' : $instance['title']);
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
        $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;		
		$emailid = empty($instance['emailid']) ? '' : $instance['emailid'];
		$contactMe = empty($instance['contactMe']) ? '' : $instance['contactMe']; ?>
		<?php echo $before_widget; 
		echo $before_title ;
		if($title)
			echo $title;
		echo $after_title; ?>
    <?php
				$name_error = '';
				$email_error = '';
				$subject_error = '';
				$message_error = '';
				if($_REQUEST['submitted']){
					if(trim($_REQUEST['name'] == "")){
						$name_error = __('This is required field.','templatemela');
						$error = true;
					}else{
						$name = trim($_REQUEST['This is required field.']);
					}
					if(trim($_REQUEST['email'] === "")){
						$email_error = __('This is required field.','templatemela');
						$error = true;
					}else if(!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_REQUEST['c_email']))){
						$email_error = __('plesae fill correcrt email','templatemela');
						$error = true;
					}else{
						$email = trim($_REQUEST['email']);
					}
					if(trim($_REQUEST['comment'] === "")){
						$message_error = __('This is required field.','templatemela');
						$error = true;
					}else{
						$comment = trim($_REQUEST['comment']);
					}
				
					if($error != true) {
						$email_to = "your_email_here@gmail.com"; 
						$message_body = "Name: $name \n\nEmail: $email \n\nComments: $comment";
						$headers = "From".get_bloginfo('title').' <'.$emailTo.'>' . "\r\n" .'Reply-To' . $email;
				
						mail($email_to, $comment, $message_body, $headers);
						$email_sent = true;
					}
				}
				
				if(isset($email_sent) && $email_sent == true){ ?>
    <p class="email-sent"><?php echo('Thank you for contacting.') ?></p>
    <?php }else{ ?>
    <form action="<?php the_permalink(); ?>" id="contactus-form" method="post">
      <div id="contactus">
        <table>
          <tr>
            <td class="name"><label for="name"><?php echo('Name ') ?></label></td>
            <td class="input-bg"><input type="text" name="name" id="name" class="required-field" class="input-bg" />
              <?php if($name_error != '') { ?>
              <p class="error"><?php echo $name_error;?></p>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="name"><label for="email"><?php echo('Email ') ?></label></td>
            <td class="input-bg"><input type="text" name="email" id="email" class="required-field" class="input-bg"/>
              <?php if($email_error != '') { ?>
              <p class="error"><?php echo $email_error;?></p>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="name"><label for="comment"><?php echo('comment ') ?></label></td>
            <td class="textarea-bg "><textarea name="comment" id="comment" class="required-field" class="textarea-bg">
              </textarea>
              <?php if($message_error != '') { ?>
              <p class="error"><?php echo $message_error;?></p>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td></td>
            <td colspan="2"><label for="c_submit">&nbsp;</label>
              <button type="submit" class="button" name="c_submit" id="c_submit"><span><span>Submit</span></span></button></td>
          </tr>
          <tr>
            <td><input type="hidden" name="submitted" id="submitted" value="true" /></td>
          </tr>
        </table>
      </div>
    </form>
    <?php } ?>
    <script type="text/javascript">				 
				  var valid = new Validation('contactus-form'); 
				</script>
<?php
			echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['emailid'] = strip_tags($new_instance['emailid']);
		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'contact Me', 'emailid'=>'', 'contactMe'=>'') );
		$title = esc_attr($instance['title']);
		$emailid = esc_attr($instance['emailid']);

		?>
<p>
  <label for="<?php echo $this->get_field_id('title');?>">Title:</label>
  <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('emailid');?>">email adress<br />
  (e.g admin@gmail.com):</label>
  <textarea cols="18" rows="2" class="widefat" id="<?php echo $this->get_field_id('emailid');?>" name="<?php echo $this->get_field_name('emailid');?>" ><?php echo $emailid;?></textarea>
</p>
<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("ContactUsWidget");'));
// End ContactUsWidget
?>
