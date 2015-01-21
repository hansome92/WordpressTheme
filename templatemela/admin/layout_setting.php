<?php 
$options = array(array());
$options[] = array("id" => "tmoption_default_page_layout",
				"label" => "Default Page Layout",
				"type" => "select",
				"description" => "Select Default Layout for Any Pages",
				"options" => array('1column' => '1 Column','2column-left' => '2 Column Left','2column-right' => '2 Column Right','3column' => '3 Column','3column-left' => '3 Column Left','3column-right' => '3 Column Right'));

$options[] = array("id" => "tmoption_home_page_layout",
				"label" => "Home Page Layout",
				"type" => "select",
				"description" => "Select HomePage Layout ",
				"options" => array('1column' => '1 Column','2column-left' => '2 Column Left','2column-right' => '2 Column Right','3column' => '3 Column','3column-left' => '3 Column Left','3column-right' => '3 Column Right'));

	if ($_REQUEST['action'] == 'save_options') {
		foreach ($options as $value) {
			update_option($value['id'], $_REQUEST[$value['id']]);
		}
		$result = 'success';
	} 
?>

<div id="wpbody-content">
  <div class="wrap">
    <div class="icon-templatemela"><img src="<?php echo get_option( 'siteurl' ).'/wp-content/themes/'.get_option( 'template' ).'/templatemela/logo.gif'; ?>" /></div>
    <h2>TemplateMela - Page Layout Settings</h2>
    <div class="tm_contents">
		<?php     
		if ($result=='success') 
		echo '<div class="updated settings-error" id="setting-error-settings_updated"><p><strong>Settings saved.</strong></p></div>';		
		?>
      <form enctype="multipart/form-data" method="post" id="settingForm" name="settingForm" >
        <input type="hidden" name="action" value="save_options" />
        <table class="form-table">
          <tbody>
            <?php
			foreach ($options as $value) { 	
				switch ( $value['type'] ) {
					case 'textbox':		
					?>
						<tr valign="top">
						  <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label></th>
						  <td><input class="regular-text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_option($value['id']); ?>" />
							<span class="description"><?php echo $value['description']; ?></span></td>
						</tr>
						<?php
					
					break;
					
					case 'select':
					
					?>
						<tr valign="top">
						  <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['label']; ?></label></th>
						  <td><select class="select_input" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
							  <?php foreach ($value['options'] as $op_id => $suboption) { ?>
							  <option value="<?php echo $op_id; ?>" <?php if (get_option($value['id']) == $op_id) { echo ' selected="selected"'; } ?>><?php echo $suboption; ?></option>
							  <?php } ?>
							</select>
							<span class="description"><?php echo $value['description']; ?></span></td>
						</tr>
						<?php
					
					break;
				}
			}
			?>
          </tbody>
        </table>
        <p class="submit">
          <input type="submit" value="Save Changes" class="button-primary" name="Submit">
        </p>
      </form>
    </div>
    <div id="ajax-response"></div>
    <br class="clear">
  </div>
  <div class="clear"></div>
</div>
