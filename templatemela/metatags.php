<?php
// Meta Tag Functions
/* This function controls the meta title */
function tm_favicon(){
	if (trim(get_option('tmoption_favicon_icon')) != '')
	{
	
		echo '<link rel="shortcut icon" type="image/png" href="'.get_option('tmoption_favicon_icon') .'" />';
		}
		else
		{
		echo '<link rel="shortcut icon" type="image/png" href="'.get_template_directory_uri() .'/templatemela/favicon.ico" />';
		}
}
?>