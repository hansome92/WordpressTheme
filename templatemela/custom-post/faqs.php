<?php 
function faq_theme_custom_posts(){
	//faq
	$labels = array(
	  'name' => _x('Faqs', 'Faqs','templatemela'),
	  'singular_name' => _x('Faq', 'faq','templatemela'),
	  'add_new' => _x('Add New', 'Faq','templatemela'),
	  'add_new_item' => __('Add New Faq','templatemela'),
	  'edit_item' => __('Edit Faq','templatemela'),
	  'new_item' => __('New Faq','templatemela'),
	  'view_item' => __('View Faq','templatemela'),
	  'search_items' => __('Search Faq','templatemela'),
	  'not_found' =>  __('No Faq found','templatemela'),
	  'not_found_in_trash' => __('No Faq found in Trash','templatemela'), 
	  'parent_item_colon' => ''
	);
	$args = array(
	  'labels' => $labels,
	  'public' => true,
	  'publicly_queryable' => true,
	  'show_ui' => true, 
	  'query_var' => true, 
	  'capability_type' => 'post', 
	  'menu_position' => null,
	  'rewrite' => array('slug'=>'faq','with_front'=>''),
	  'supports' => array('title','editor','author','thumbnail','comments')
	); 
	register_post_type('faq',$args);	
}
add_filter('init', 'faq_theme_custom_posts' );

function tm_flush_rewrite_rules_faq() 
{
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}
add_action('admin_init', 'tm_flush_rewrite_rules_faq');