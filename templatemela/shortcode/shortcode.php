<?php
//Google Maps Shortcode
//====================== Contact Form Shortcode Start  =====================================
function tm_shortcode_contact_form(){
$name_error = '';
$email_error = '';
$subject_error = '';
$message_error = '';
if($_REQUEST['c_submitted']){
	if(trim($_REQUEST['c_name'] == "")){
		$name_error = __('You forgot to fill in your name','templatemela');
		$error = true;

	}else{
		$c_name = trim($_REQUEST['c_name']);
	}
	if(trim($_REQUEST['c_email'] === "")){
		$email_error = __('Your forgot to fill in your email address','templatemela');
		$error = true;
	}else if(!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_REQUEST['c_email']))){
		$email_error = __('Wrong email format','templatemela');
		$error = true;
	}else{
		$c_email = trim($_REQUEST['c_email']);
	}
	if(trim($_REQUEST['c_subject'] === "")){
		$subject_error = __('You forgot to fill in the subject','templatemela');
		$error = true;
	}else{
		$c_subject = trim($_REQUEST['c_subject']);
	}
	if(trim($_REQUEST['c_message'] === "")){
		$message_error = __('You forgot to fill in your name','templatemela');
		$error = true;
	}else{
		$c_message = trim($_REQUEST['c_message']);
	}

	if($error != true) {
		
		if(trim(get_option('tmoption_navigation_sort_order'))=='asc')	
			$email_to = get_option('tmoption_contact_email');
		
		$message_body = "Name: $c_name \n\nEmail: $c_email \n\nComments: $c_message";
		$headers = "From ".get_bloginfo('title');

		mail($email_to, $c_subject, $message_body, $headers);
		$email_sent = true;
	}
}

if(isset($email_sent) && $email_sent == true){ ?>

<p class="email-sent"><?php echo('Thank you for contacting. I will answer your email as soon as possible.') ?></p>

<?php }else{ ?>
 
	<div id="contact-form">
	<form action="<?php the_permalink(); ?>" id="contact-form" method="post">						
			<?php 
						 
			
			?>
			
			<p><label for="c_name"><?php echo('Name :') ?></label><br />
			<input type="text" name="c_name" id="c_name" class="required-field" /></p>
			<?php if($name_error != '') { ?>
				<p class="error"><?php echo $name_error;?></p>
			<?php } ?>
			
			<p><label for="c_email"><?php echo('Email :') ?></label><br />
			 <input type="text" name="c_email" id="c_email" class="required-field" /></p>
			<?php if($email_error != '') { ?>
				<p class="error"><?php echo $email_error;?></p>
			<?php } ?>
			
			<p><label for="c_subject"><?php echo('Subject :') ?></label><br />
			<input type="text" name="c_subject" id="c_subject" class="required-field" /></p>
			<?php if($subject_error != '') { ?>
				<p class="error"><?php echo $subject_error;?></p>
			<?php } ?>
			
			<p><label for="c_message"><?php echo('Message :') ?></label><br />
			<textarea name="c_message" id="c_message" class="required-field"></textarea></p>
			<?php if($message_error != '') { ?>
				<p class="error"><?php echo $message_error;?></p>
			<?php } ?>			
			
			<p><label for="c_submit">&nbsp;</label><button type="submit" class="button" name="c_submit" id="c_submit"><span><span>Submit</span></span></button></p>			

			<input type="hidden" name="c_submitted" id="c_submitted" value="true" />

		</form>
		</div>
		
<?php } ?>
	
<script type="text/javascript">
  var valid = new Validation('contact-form'); 
</script>

<?php } 
add_shortcode('tm_contact_form', 'tm_shortcode_contact_form');
add_filter('widget_text', 'do_shortcode');
//====================== Contact Form End  ==================================
function fn_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe>';
}
add_shortcode("googlemap", "fn_googleMaps");
//=====================================video========================================================================================================================
  function wptuts_youtube($atts, $content=null){  
      
        extract(shortcode_atts( array('id' => '',"width" => '640', "height" => '480'), $atts));  
      
        $return = $content;  
        if($content)  
            $return .= "<br /><br />";  
      
        $return .= '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/' . $id . '" frameborder="0" allowfullscreen></iframe>';  
      
        return $return;   
      
    }  
    add_shortcode('youtube', 'wptuts_youtube');  
//=============================================dropcase=====================================
function theme_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
remove_filter('the_content',	'wpautop');
remove_filter('the_content',	'wptexturize');

add_filter('the_content', 'theme_formatter', 99);

function theme_shortcode_dropcaps($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
	), $atts));

	if($color){
		$color = ' '.$color;
	}
	return '<span class="' . $code.$color . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap1', 'theme_shortcode_dropcaps');
add_shortcode('dropcap2', 'theme_shortcode_dropcaps');
add_shortcode('dropcap3', 'theme_shortcode_dropcaps');
add_shortcode('dropcap4', 'theme_shortcode_dropcaps');

//==============================columnshortcode===========================================
function theme_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function third_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function twothird_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function onefourth_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function fifth_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function sixth_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function theme_shortcode_column_last($atts, $content = null, $code) {
	return '<div class="'.str_replace('_last','',$code).' last">' . wpautop(do_shortcode(trim($content))) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half', 'theme_shortcode_column');
add_shortcode('one_third', 'third_shortcode_column');
add_shortcode('one_fourth', 'onefourth_shortcode_column');
add_shortcode('one_fifth', 'fifth_shortcode_column');
add_shortcode('one_sixth', 'sixth_shortcode_column');

add_shortcode('two_third', 'twothird_shortcode_column');
add_shortcode('three_fourth', 'theme_shortcode_column');
add_shortcode('two_fifth', 'theme_shortcode_column');
add_shortcode('three_fifth', 'theme_shortcode_column');
add_shortcode('four_fifth', 'theme_shortcode_column');
add_shortcode('five_sixth', 'theme_shortcode_column');

add_shortcode('one_half_last', 'theme_shortcode_column_last');
add_shortcode('one_third_last', 'theme_shortcode_column_last');
add_shortcode('one_fourth_last', 'theme_shortcode_column_last');
add_shortcode('one_fifth_last', 'theme_shortcode_column_last');
add_shortcode('one_sixth_last', 'theme_shortcode_column_last');

add_shortcode('two_third_last', 'theme_shortcode_column_last');
add_shortcode('three_fourth_last', 'theme_shortcode_column_last');
add_shortcode('two_fifth_last', 'theme_shortcode_column_last');
add_shortcode('three_fifth_last', 'theme_shortcode_column_last');
add_shortcode('four_fifth_last', 'theme_shortcode_column_last');
add_shortcode('five_sixth_last', 'theme_shortcode_column_last');

function theme_shortcode_blockquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => false,
		'cite' => false,
	), $atts));
	
	return '<blockquote' . ($align ? ' class="align' . $align . '"' : '') . '>' . do_shortcode($content) . ($cite ? '<p><cite>- ' . $cite . '</cite></p>' : '') . '</blockquote>';
}
add_shortcode('blockquote', 'theme_shortcode_blockquote');

function theme_shortcode_highlight1($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => false,
	), $atts));

	return '<span class="highlight_light'.(($type)?' '.$type:'').'">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_light', 'theme_shortcode_highlight1');

function theme_shortcode_highlight2($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => false,
	), $atts));

	return '<span class="highlight_dark'.(($type)?' '.$type:'').'">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_dark', 'theme_shortcode_highlight2');

function theme_shortcode_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
		'color' => '',
	), $atts));

	if($color){
		$color = ' list_color_'.$color;
	}
	return str_replace('<ul>', '<ul class="'.$style.$color.'">', do_shortcode($content));
}
add_shortcode('list', 'theme_shortcode_list');
function theme_shortcode_icon($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => false,
		'color' => '',
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	return '<span class="icon_text icon_'.$style.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('icon', 'theme_shortcode_icon');

function theme_shortcode_icon_link($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => false,
		'href' => '#',
		'color' => '',
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	return '<a class="icon_text icon_'.$style.$color.'" href="'.$href.'">'.do_shortcode($content).'</a>';
}

//============google chart================================================================================================================
function chart_shortcode( $atts ) {
	extract(shortcode_atts(array(
	    'data' => '',
	    'colors' => '',
	    'size' => '400x200',
	    'bg' => 'ffffff',
	    'title' => '',
	    'labels' => '',
	    'advanced' => '',
	    'type' => 'pie'
	), $atts));
 
	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}
 
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf='.$bg.'';
 
	return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
}
add_shortcode('chart', 'chart_shortcode');

//=====================================================table=====================================================================================
function shortcode_table( $atts, $content = null ) {
	//class
	if (isset($atts[0]) && trim($atts[0])){
		$class=trim($atts[0]);
				
	}
  	//fix shortcode
	
	$return = '<table class="'.$class.'">';
	$return .= $content;
	
	$content = preg_replace('#<tr>#', '', trim($content));
		return $content;
		
	$return .= '</table>';	
}

add_shortcode('table', 'shortcode_table');
//======================================================end table==============================================================
/*============== All Box ==================*/
function successbox($atts, $content=null, $code="") {
 
    $return = '<div class="success-mesage">';
 
    $return .= $content;
 
    $return .= '</div>';
 
    return $return;
 
}
add_shortcode('success' , 'successbox' ); //Uses [success]Lorem ipsum dolor sit amet, consectetur or incididunt ut labore et dolore magna aliqua. [/success]

function errorbox($atts, $content=null, $code="") {
 
    $return = '<div class="error-mesage">';
 
    $return .= $content;
 
    $return .= '</div>';
 
    return $return;
 
}
add_shortcode('error' , 'errorbox' );


function messagebox($atts, $content=null, $code="") {
 
    $return = '<div class="message-mesage">';
 
    $return .= $content;
 
    $return .= '</div>';
 
    return $return;
 
}
add_shortcode('message' , 'messagebox' );

function warningbox($atts, $content=null, $code="") {
 
    $return = '<div class="warning-mesage">';
 
    $return .= $content;
 
    $return .= '</div>';
 
    return $return;
 
}
add_shortcode('warning' , 'warningbox' );
//==============================flickr==============================
function flickr_badge_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
	    'id' => '',
		'count_no' => '',
	), $atts));
	$flickr_data = '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$count_no.'&display=latest&size=t&layout=x&source=user&user='.$id.'"></script> ';
	return $flickr_data;
}
add_shortcode('flickrbadge', 'flickr_badge_shortcode');// use:-[flickrbadge id="67176627@N04" count_no="6"]
//==========================button============================
function templatemela_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target'	=> '',
    'variation'	=> '',
    'size'	=> '',
    'align'	=> '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_gradient' : '';
	$align = ($align) ? ' align'.$align : '';
	$size = ($size == 'large') ? ' large_button' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="button_link' .$style.$size.$align. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'templatemela_button');

