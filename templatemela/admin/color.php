<?php 
//=============================================color-settings==================================================================//
$options2 = array(array());

$options2[] = array("id" => "tmoption_texture",
					"label" => "Body Background Image",
					"type" => "texture",
					"std" =>"body-bg.png",
					"options" => array('body-bg.png' => 'body-bg', 'body-bg2.png'=>'body-bg2', 'body-bg3.png'=>'body-bg3', 'body-bg4.png'=>'body-bg4', 'body-bg5.png'=>'body-bg5', 'body-bg6.png'=>'body-bg6', 'body-bg7.png'=>'body-bg7', 'body-bg8.png'=>'body-bg8', 'body-bg9.png'=>'body-bg9', 'body-bg10.png'=>'body-bg10', 'body-bg11.png'=>'body-bg11', 'body-bg12.png'=>'body-bg12', 'body-bg13.png'=>'body-bg13', 'body-bg14.png'=>'body-bg14', 'body-bg15.png'=>'body-bg15', 'body-bg16.png'=>'body-bg16'),
					"description" => "Choose your body background texture image");
					
$options2[] = array("id" => "tmoption_background_upload",
					"label" => "Background Image",
					"type" => "upload",
					"description" => "Upload Your Background");	
					
$options2[] = array("id" => "tmoption_back_repeat",
					"label" => "Background Repeat",
					"title" =>"slider3 Option",
					"type" => "select",
					"description" => "Choose animation effect for slider.",
					"options" => array('no-repeat' => 'no-repeat','repeat' => 'repeat','repeat-x' => 'repeat-x','repeat-y' => 'repeat-y'));	
					
$options2[] = array("id" => "tmoption_back_position",
					"label" => " Background Position",
					"type" => "select",
					"description" => "Choose animation effect for slider.",
					"options" => array('top+left' => 'top left','top+center' => 'top center','top+right' => 'top right','center+right' => 'center right','center+left' => 'center left','center+center' => 'center center','bottom+right' => 'bottom right','bottom+center' => 'bottom center','bottom+left' => 'bottom left'));	
									
$options2[] = array("id" => "tmoption_back_attachment",
					"label" => "Background Attachment",
					"type" => "select",
					"description" => "Choose animation effect for slider.",
					"options" => array('scroll' => 'Scroll','Fixed' => 'fixed'));
													
$options2[] = array("id" => "tmoption_bkg_color",
					"label" => "Body Background Color",
					"type" => "textbox-1",
					"std" => "767676",
					"description" => "Change your body background color.");

$options2[] = array("id" => "tmoption_bodyfont_color",
					"label" => "Body Font Color",
					"std" => "333333",
					"type" => "textbox-1",
					"description" => "Change your body font color.");

$options2[] = array("id" => "tmoption_headerfont_color",
					"label" => "Header Tag Font Color",
					"std" => "AAAAAA",
					"type" => "textbox-1",
					"description" => "Change your header font color.");

$options2[] = array("id" => "tmoption_navfont_color",
					"label" => "Navigation Menu Font Color",
					"std" => "333333",
					"type" => "textbox-1",
					"description" => "Change your Navigtion font color.");
					
$options2[] = array("id" => "tmoption_link_color",
					"label" => "Link Color",
					"std" => "FEB03D",
					"type" => "textbox-1",
					"description" => "Change your Link color.");
					
$options2[] = array("id" => "tmoption_link_color_hover",
					"label" => "Link Color on Hover",
					"std" => "FE8C1C",
					"type" => "textbox-1",
					"description" => "Select your Link hover color.");
					
$options2[] = array("id" => "tmoption_footer_link_color",
					"label" => "Footer Link Color",
					"type" => "textbox-1",
					"description" => "Change your footer link color.",
					"std" => "9a9a9a");		
		
?>
<!-- color Settings----->

<div id="Color">
  <form enctype="multipart/form-data" method="post" id="settingForm2" name="settingForm2"  >
    <input type="hidden" name="action" value="save_options2" />
    <?php
	if ( 'save_options2' == $_REQUEST['action'] ){
		foreach ($options2 as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] ); } 
		} 
	else if( 'reset2' == $_REQUEST['reset2'] )
	{
		foreach ($options2 as $value) {
			delete_option( $value['id'] ); 
		}
	}
    ?>
    <div class="form-table">
    <div class="main_tital">
      <h1>Color Settings</h1>
    </div>
    <?php
    foreach ($options2 as $value) { 	
	switch ( $value['type'] ) {	
		case 'select':	?>
    <?php if( $i % 2 != 0) { ?>
    <div class="odd setting_main">
    <?php } else { ?>
    <div class="even setting_main">
      <?php }?>
      <div class="title">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label>
      </div>
      <div class="content">
        <select class="select_input" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          <?php foreach ($value['options'] as $op_id => $suboption) { ?>
          <option value="<?php echo $op_id; ?>" <?php if (get_option($value['id']) == $op_id) { echo ' selected="selected"'; } ?>><?php echo $suboption; ?></option>
          <?php } ?>
        </select>
        <span class="description"><?php echo $value['description']; ?></span> </div>
    </div>
    <!--even-Odd-->
    <?php	break; //end Switch
		
		case 'textbox-1':?>
    <?php if( $i % 2 != 0) { ?>
    <div class="odd setting_main">
    <?php } else { ?>
    <div class="even setting_main">
      <?php }?>
      <div class="title">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label>
      </div>
      <div class="content">
        <input class="regular-text1" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
        <span class="description"><?php echo $value['description']; echo get_option( $value['id']);?></span> </div>
    </div>
    <!--odd-even-->
    <?php
			
		break;
			
		case 'textbox-2':?>
    <?php if( $i % 2 != 0) { ?>
    <div class="odd setting_main">
    <?php } else { ?>
    <div class="even setting_main">
      <?php }?>
      <div class="title">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label>
      </div>
      <div class="content">
        <input class="regular-text1" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
        <span class="description"><?php echo $value['description'];  echo get_option( $value['id']); ?></span> </div>
    </div>
    <!--odd-even-->
    <?php
			
		break;
		
		case 'textbox-3':?>
    <?php if( $i % 2 != 0) { ?>
    <div class="odd setting_main">
    <?php } else { ?>
    <div class="even setting_main">
      <?php }?>
      <div class="title">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label>
      </div>
      <div class="content">
        <input class="regular-text1" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
        <span class="description"><?php echo $value['description'];  echo get_option( $value['id']); ?></span> </div>
    </div>
    <!--odd-even-->
    <?php
			
		break;
case 'texture': 
		
		?>
    <?php if( $i % 2 != 0) { ?>
    <div class="odd setting_main">
    <?php } else { ?>
    <div class="even setting_main">
      <?php }
	  $img_dir = get_template_directory_uri() .'/templatemela/images/'; ?>
      <div class="title">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label>
      </div>
      <div class="content">
        <div class="tm_content">
          <div class="thumb-sel"> <img class="thumb" src="<?php if ( get_option( $value['id'] ) != ""){echo $img_dir.get_option($value['id']);}else{echo $img_dir.$value['std'];} ?>" /> <span id="switch" class="close"></span> </div>
          <div class="thumb-list">
            <ul>
              <?php foreach ($value['options'] as $opt_key => $opt_val) { 
					    if ( get_option( $value['id'] ) != "")   {
                        if($opt_key == get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";}
                        } else {
                        if($opt_key == ($value['std'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }
                         } ?>
              <li>
                <input type="radio" name="<?php echo $value['id'] ?>" value="<?php echo $opt_key ?>" <?php echo $checked; ?>/>
                <img class="thumb" src="<?php echo $img_dir.$opt_key ?>" title="<?php echo $opt_val ?>" /> </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <span class="description"><?php echo $value['description']; ?></span> </div>
    </div>
    <?php
				break;
				case 'upload': ?>
    <?php if( $i % 2 != 0) { ?>
    <div class="odd setting_main">
      <?php } else { ?>
      <div class="even setting_main">
        <?php }?>
        <div class="title">
          <label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label>
        </div>
        <div class="content">
          <input style=" <?php if($value['id'] != 'tmoption_background_upload') { echo 'display:none' ; } ?> " class="regular-text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_option($value['id']); ?>" />
          <input id="upload_image_button1" class="button-primary" type="button" value="Upload Image" />
          <span class="description"><?php echo $value['description']; ?></span> </div>
      </div>
      <!--even odd setting-->
      <?php	break;
		
		   }
		$i++;
      }
?>
    </div>
    <!--form table-->
    <div class="submit">
      <input type="submit" value="Save Changes" class="button-primary" name="Submit" >
    </div>
  </form>
  <!-- reset Button -->
  <div class="reset-option">
    <form enctype="multipart/form-data" method="post" id="settingForm2" name="settingFormx"   >
      <p class="submit">
        <input type="hidden" name="reset2" value="reset2" />
        <input type="submit" value="Set Default" class="button-primary" name="reset"/>
      </p>
    </form>
  </div>
  <!-- End Reset Button -->
</div>
<!---#color-->
<script type="text/javascript">
function Ajax(){

var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("No AJAX!?");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById('tab_main').innerHTML=xmlHttp.responseText;
		return false;	
	}
}

xmlHttp.open("GET","<?php get_template_directory() . '/templatemela/color.php'?>",false);
xmlHttp.send(null);
}

window.onload=function(){
}
</script>
