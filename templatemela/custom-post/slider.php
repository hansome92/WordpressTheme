<?php
function slider_mainbanner_custom_posts(){
 // "Slides" Custom Post Type
		$labels = array(
			'name' =>

_x( 'Banners', 'post type general name', 'templatemela' ),
			'singular_name' => _x( 'Banners', 'post type singular name', 'templatemela' ),
			'add_new' => _x( 'Add New', 'Banners', 'templatemela' ),
			'add_new_item' => __( 'Add New Banners', 'templatemela' ),
			'edit_item' => __( 'Edit Banners', 'templatemela' ),
			'new_item' => __( 'New Banners', 'templatemela' ),
			'view_item' => __( 'View Banners', 'templatemela' ),
			'search_items' => __( 'Search Banners', 'templatemela' ),
			'not_found' =>  __( 'No banners found', 'templatemela' ),
			'not_found_in_trash' => __( 'No banners found in Trash', 'templatemela' ), 
			'parent_item_colon' => ''
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null, 
			'taxonomies' => array( 'banners' ), 
			'supports' => array( 'title','editor','author','thumbnail','custom-fields')
		);
		
		register_post_type( 'banners', $args );
		// "Slide Pages" Custom Taxonomy
		$labels = array(
			'name' => _x( 'Banners Categories', 'taxonomy general name', 'templatemela' ),
			'singular_name' => _x( 'Banners Categories', 'taxonomy singular name', 'templatemela' ),
			'search_items' =>  __( 'Search Banners Category', 'templatemela' ),
			'all_items' => __( 'All Banners Categories', 'templatemela' ),
			'parent_item' => __( 'Parent Banners Category', 'templatemela' ),
			'parent_item_colon' => __( 'Parent Slide Page:', 'templatemela' ),
			'edit_item' => __( 'Edit Banners Category', 'templatemela' ), 
			'update_item' => __( 'Update Slide Page', 'templatemela' ),
			'add_new_item' => __( 'Add New Banners Category', 'templatemela' ),
			'new_item_name' => __( 'New Banners Category Name', 'templatemela' ),
			'menu_name' => __( 'Banners Categories', 'templatemela' )
		); 	
		
		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'banners-category' )
		);
		
		register_taxonomy( 'banners-category', array( 'banners' ), $args );
}
add_filter('init', 'slider_mainbanner_custom_posts' );
add_action( 'add_meta_boxes', 'slider_add_custom_box' );
add_action( 'save_post', 'slider_save_postdata' );

function slider_add_custom_box() {
    add_meta_box( 
        'slider_options',
        'Banners Options',
        'slider_inner_custom_box',
        'banners' 
    );
function my_admin_scripts() {
	wp_register_script('my-upload', get_template_directory_uri() . '/js/my-script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
}

function slider_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'banners_templatemela' );

  $mydata = get_post_meta($post->ID, 'slider_slider', TRUE);

  // The actual fields for data entry
  echo '
<label for="slider_imageurl">';
  echo 'URL to image for slide:';
  echo '</label>
';
  echo '
<input type="text" id="slider_imageurl" name="slider_imageurl" value="'.$mydata['slider_imageurl'].'" size="25" />
<br/>
<br/>
';
  if ($mydata['slider_upload'] != '') {
  echo '<img src="'.$mydata['slider_upload'].'" alt="" id="slider_imagedisplay" width="500px">&nbsp;&nbsp;<a id="slider_remove_link" href="javascript:removeImage();"><img src=" '.get_bloginfo('template_url'). '/images/remove.png"></a><br/>
';
  }else {
  	echo '<img src="'.$mydata['slider_upload'].'" alt="" id="slider_imagedisplay" width="500px">';
  }
  echo 'Upload image:';
  echo '
</label>
';
    echo   '
<input class="regular-text" name="slider_upload" id="slider_upload" type="text" value="'.$mydata['slider_upload'].'" />
';
    echo   '
<input id="upload_banner" class="button-primary" type="button" value="Upload Image" />
';
	echo   '
<script>
function removeImage()
{
	document.getElementById("slider_upload").value="";
	document.getElementById("slider_imagedisplay").src="";
	document.getElementById("slider_remove_link").innerHTML="";
	
}
</script>
';

  //Add more fields as you need them...

}

function slider_save_postdata( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  //if ( !wp_verify_nonce( $_POST['banners_templatemela'], plugin_basename( __FILE__ ) ) )
  //    return;

  if ( !current_user_can( 'edit_post', $post_id ) )
        return;

  $mydata = array();

  foreach($_POST as $key => $data) {
    if($key == 'banners_templatemela')
      continue;
	  
    if(preg_match('/^slider/i', $key)) {
      $mydata[$key] = $data;
    }
  }
 
  //update_post_meta($post_id, $key , $data);   
  update_post_meta($post_id, 'slider_slider', $mydata);
  
  return $mydata;
  
} 