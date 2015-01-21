<?php
/* Template Name: Contact Form */
?>
<?php get_header(); ?>
		<div class="contact-page">
		<!--Start #primary-->
		<div id="primary" class="content-area">
			<!--Start  #content -->
			<div id="content" class="site-content" role="main">	
				<?php breadcrumbs(); ?>
				<h1 class="entry-title-main page-title"><?php the_title(); ?></h1>
			<?php
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-contact" id="post-<?php the_ID(); ?>">		
					
					<div class="entry-cont">		
						<?php the_content(); ?>		
					</div>		
				</div>		
			<?php endwhile; endif; ?>
			<?php
			$name_error = '';
			$email_error = '';
			$subject_error = '';
			$message_error = '';
			if(isset($_REQUEST['c_submitted'])){
				if(trim($_REQUEST['c_name'] == "")){
					
				}else{
					$c_name = trim($_REQUEST['c_name']);
				}
				if(trim($_REQUEST['c_email'] === "")){
					
				}else if(!preg_match('/'."^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$".'/i', trim($_REQUEST['c_email']))){
					
				}else{
					$c_email = trim($_REQUEST['c_email']);
				}
			
				if(trim($_REQUEST['c_subject'] === "")){
		
				}else{
					$c_subject = trim($_REQUEST['c_subject']);
				}
				if(trim($_REQUEST['c_message'] === "")){
					
				}else{
					$c_message = trim($_REQUEST['c_message']);
				}
			
				if($error != true) {
				   if( get_option('tmoption_contact_email'))
				   {
					$email_to = get_option('tmoption_contact_email'); 
				   }
				else{ 
				   $email_to =  get_option('admin_email') ;
				  }
					$headers='';
					// Additional headers
					$headers .= 'To: '. $email_to . "\r\n";
					$headers .= 'From: '.$c_email . "\r\n";
					$headers .= 'Reply-To: '.$c_email . "\r\n";
					
					$message_body = "Contact Form\n\n Name: $c_name \n\nEmail: $c_email \n\nComments: $c_message";
					
					
					mail($email_to, $c_subject, $message_body, $headers);
					$email_sent = true;
				}
			}
	if(isset($email_sent) && $email_sent == true){ ?>
	
		<p class="email-sent"><?php echo __('Thank you for contacting. I will answer your email as soon as possible.','templatemela'); ?></p>
	
	<?php }else{ ?>
	 <div class="contact-main">
		<div id="contact-form">
			<form action="<?php the_permalink(); ?>" id="contactform" method="post">			
				<fieldset>
					<p>
						<label for="c_name">Name</label>
						<em>*</em><br /><input id="c_name" name="c_name" size="25" class="required" minlength="2" />
					</p>
					<p>
						<label for="c_email">E-Mail</label>
						<em>*</em><br /><input id="c_email" name="c_email" size="25"  class="required email" />
					</p>
					<p>
						<label for="c_subject">Subject</label>
						<em>  </em><br /><input id="c_subject" name="c_subject" size="25"  class="c_subject" value="" />
					</p>
					<p>
						<label for="c_message">Your comment</label>
						<em>*</em><br /><textarea id="c_message" name="c_message" cols="22"  class="required"></textarea>
					</p>		
					<p>
						<label for="c_submit">&nbsp;</label><button type="submit" class="button" name="c_submit" id="c_submit"><span><span>Submit</span></span></button>
					</p>			
				<input type="hidden" name="c_submitted" id="c_submitted" value="true" />				
				</fieldset>
			</form>		
		</div>
		<?php $custom_fields = get_post_custom(); ?>	
		<div class="contact-info">
			<div class="discription">
				<h3 class="title">
				<?php if( (isset($custom_fields['title'][0])) && ($custom_fields['title'][0] != '')): 
						echo $custom_fields['title'][0]; 
				endif; ?>
				</h3>
				<p><?php if( (isset($custom_fields['description'][0])) && ($custom_fields['description'][0] != '')): 
					echo $custom_fields['description'][0]; 
				endif; ?></p>
			</div>
			<div class="footer_contactus">
				<ul id="address">	
					<li>
						<i class="icon-home"></i>						
						<span>
							<?php if( (isset($custom_fields['address'][0])) && ($custom_fields['address'][0] != '')): 
								echo $custom_fields['address'][0]; 
							endif; ?>
						</span>
					</li>
					<li>
						<i class="icon-envelope"></i>
						<span>
							<a target="_blank" href="<?php if( (isset($custom_fields['email_link'][0])) && ($custom_fields['email_link'][0] != '')): 
								echo $custom_fields['email_link'][0]; 
							endif; ?>"><?php if( (isset($custom_fields['email'][0])) && ($custom_fields['email'][0] != '')): 
								echo $custom_fields['email'][0]; 
							endif; ?></a>
						</span>
					</li>
					<li>
						 <i class="icon-phone"></i>
						 <span>
							<?php if( (isset($custom_fields['contact_number'][0])) && ($custom_fields['contact_number'][0] != '')): 
								echo $custom_fields['contact_number'][0]; 
							endif; ?>
						</span>
					</li>
					
				</ul>		
			</div>	
		</div>	
	</div>
	<?php } ?>
	</div>	
</div>
</div>
<?php get_footer(); ?>

<script>
var $b1 = jQuery.noConflict(); 
  $b1(document).ready(function(){
    $b1("#contactform").validate();
  });
</script>