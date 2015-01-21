<?php
function shortcode_portfolio($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'column' => '',
		'cat' => '',
		'max' => '',
		'nopaging' => 'false',
		'sortable' => 'false',
		'layout' => '',
		'width' =>'',
		'character' => '',
	), $atts));

$paged = ( isset( $my_query_array['paged'] ) && !empty( $my_query_array['paged'] ) ) ? $my_query_array['paged'] : 1;
query_posts('post_type=portfolio&paged='.$paged);
 $output = '';
	$terms = array();
		if ($cat != '') 
		  {		
			foreach(explode(',', $cat) as $term_slug) {
				$terms[] = get_term_by('slug', $term_slug, 'portfolio_categories');
			}
			}
		 else 
		{
			$terms = get_terms('portfolio_categories', 'hide_empty=1');
		}
		foreach($terms as $term) {
			$output .= '<a data-value="' . $term->slug . '" href="#">' . $term->name . '</a>';
		}
		if($layout == 1)
			$width = 1024;
		else if($layout == 2)
			$width = 483;
		else if($layout == 3)
			$width = 318;
		else if($layout == 4)
			$width = 234;
			
		$output = '<div class="portfolios">';
	$output .= '<ul class="portfolio_'.$layout.' da-thumbs">';
	$num_layout =  substr($layout, 0, 1);
		
	if ($nopaging == '') {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts(array('post_type' => 'portfolio', 'posts_per_page' => $max, 'taxonomy' => 'portfolio_categories', 'term' => $cat, 'paged' => $paged));
	} else {
		query_posts(array('post_type' => 'portfolio', 'taxonomy' => 'portfolio_categories', 'showposts' => - 1, 'term' => $cat));
	}
	$i = 1;
	while(have_posts()) {
		the_post();
		$terms = get_the_terms(get_the_id(), 'portfolio_categories');
		$terms_slug = array();
		if (is_array($terms)) {
			foreach($terms as $term) {
				$terms_slug[] = $term->slug;
			}
		}
		if($i % $num_layout == 0)
			$li_class = "last";
		else if($i % $num_layout == 1)
			$li_class = "first";
		else
			$li_class = "inner";
		$output .= '<li class="'.$li_class.'">';
		$more = get_post_meta(get_the_ID(), '_more', true);
		$output .= '<div class="main">';
		if(get_option('portfolio','display_image') || $column == 1)	:
			$output .= '<a href= "'.get_first_post_images(get_the_ID(), 'thumbnail-url',true).'" data-lightbox="example-set">';
			$output .= '<img class="image1" src="'.get_first_post_images(get_the_ID(), 'thumbnail-url',true).'" width="'.$width.'" / >';
			$output .= '</a>';
		endif;	
		$output .= '</div>';
		$output .= '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
		$output .= '</li>';
		$i++;
	}
	$output .= '</ul>';
	$output .= '</div>'; ?>

<?php
	wp_reset_query();
	return $output;
}
add_shortcode('portfolio', 'shortcode_portfolio');

function slider_theme_custom_posts(){

	//Portfolio
	$labels = array(
	  'name' =>

__('Portfolio', 'Portfolio','templatemela'),
	  'singular_name' => __('Portfolio', 'Portfolio','templatemela'),
	  'add_new' => __('Add New', 'Portfolio item','templatemela'),
	  'add_new_item' => __('Add New Portfolio item','templatemela'),
	  'edit_item' => __('Edit Portfolio Item','templatemela'),
	  'new_item' => __('New Portfolio Item','templatemela'),
	  'view_item' => __('View Portfolio Item','templatemela'),
	  'search_items' => __('Search Portfolio Item','templatemela'),
	  'not_found' =>  __('No Portfolio item found','templatemela'),
	  'not_found_in_trash' => __('No Portfolio item found in Trash','templatemela'), 
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
	  'rewrite' => array('slug'=>'portfolio','with_front'=>''),
	  'supports' => array('title','editor','author','thumbnail','comments')
	); 
	register_post_type('portfolio',$args);
	
	// Portfolio Categories
	$labels = array(
	  'name' => __( 'Portfolio Categories', 'taxonomy general name' ,'templatemela'),
	  'singular_name' => __( 'Portfolio Category', 'taxonomy singular name','templatemela' ),
	  'search_items' =>  __( 'Search Portfolio Category' ,'templatemela'),
	  'all_items' => __( 'All Portfolio Categories' ,'templatemela'),
	  'parent_item' => __( 'Parent Portfolio Category' ,'templatemela'),
	  'parent_item_colon' => __( 'Parent Portfolio Category:' ,'templatemela'),
	  'edit_item' => __( 'Edit Portfolio Category','templatemela' ), 
	  'update_item' => __( 'Update Portfolio Category' ,'templatemela'),
	  'add_new_item' => __( 'Add New Portfolio Category','templatemela' ),
	  'new_item_name' => __( 'New Genre Portfolio Category','templatemela' ),
	); 	
	
	register_taxonomy('portfolio_categories',array('portfolio'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'query_var' => true,
	  '_builtin' => false,
	  'paged'=>true,
	  'rewrite' => false,
	));
}
add_filter('init', 'slider_theme_custom_posts' );

function tm_flush_rewrite_rules() 
{
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}
add_action('admin_init', 'tm_flush_rewrite_rules');

function filter_post_type_link($link, $post)
{
	if ($cats = get_the_terms($post->ID, 'portfolio_categories'))
	$link = str_replace('%portfolio%', 'array_pop($cats)->slug', $link);
	return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2); 