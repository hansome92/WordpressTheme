<script type="text/javascript">
var $fas = jQuery.noConflict(); 
$fas(function(){

    var $container = $fas('#container');

    $container.isotope({
    });
      var $optionSets = $fas('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $fas(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

  });
</script>

<?php
/* 
* templete portfolio loop
*/


//============================= category wise selection=====================//
if(get_option('tmoption_portfolio_cat') == 'no'){
$per_page = get_option('tmoption_portfolio_perpage');

$p=1;
$k = get_option('tmoption_portfolio_layout');
switch ($k) {
	case '1': $class = "portfolio_one"; break;
	case '2': $class = "portfolio_two"; break;
	case '3': $class = "portfolio_three"; break;
	case '4': $class = "portfolio_four"; break;
	default : $class = "";
}
?>
<?php
global $query_string;
parse_str( $query_string, $my_query_array );
$paged = ( isset( $my_query_array['paged'] ) && !empty( $my_query_array['paged'] ) ) ? $my_query_array['paged'] : 1;
query_posts('post_type=portfolio&posts_per_page='.$per_page.'&paged='.$paged);?>
<ul class="da-thumbs <?php echo $class;?> ">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<li class="<?php if($p==$k){ echo " last"; } if($p==1){ echo " first"; } ?>">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="img-shadow">
	    		<?php $postImage = get_first_post_images(get_the_ID()); ?>
				<div class="main">
					<a href="<?php echo $postImage; ?>" title="Click to view Full Image" data-lightbox="example-set">
					<?php if(get_option('tmoption_portfolio_layout') =='1'){
						print_images_thumb($postImage, get_the_title(get_the_ID()) ,320,220,'left');
						} ?>
					<?php if(get_option('tmoption_portfolio_layout') =='2'){
						print_images_thumb($postImage, get_the_title(get_the_ID()) ,483,360,'left');
						} ?>
					<?php if(get_option('tmoption_portfolio_layout') =='3'){
						print_images_thumb($postImage, get_the_title(get_the_ID()) ,318,270,'left');
						} ?>
					<?php if(get_option('tmoption_portfolio_layout') =='4'){
						print_images_thumb($postImage, get_the_title(get_the_ID()) ,234,200,'left');
					} ?>
					</a>
				<article class="da-animate da-slideFromRight" style="display: block;">';
					<h3><?php echo get_the_title(); ?></h3>
					<div class="portfolio-icon-container">
						<span class="link_post"><a href="<?php echo get_permalink(); ?>"></a></span>
						<span class="zoom"><a data-lightbox="example-set" href="<?php echo $postImage; ?>"></a></span>
					</div>
				</article>
				</div>
			</div>
				<h1 class="entry-title-port"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'templatemela' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php  if(get_option('tmoption_portfolio_layout') =='1'){echo excerpt(160);} ?>
			<?php  if(get_option('tmoption_portfolio_layout') =='2'){echo excerpt(40);} ?>
			<?php  if(get_option('tmoption_portfolio_layout') =='3'){echo excerpt(30);} ?>
			<?php  if(get_option('tmoption_portfolio_layout') =='4'){echo excerpt(20);} ?>
		</div>
	</li>
<?php if($p==$k){ $p=1; } else { $p++; } ?>	
<?php endwhile; ?>
<?php endif; ?>
</ul>	 
<div style="clear:both;"></div>
<?php if(get_option('tmoption_navigation_option')=='1')
{ ?>
<div class="custom-pagination">
<span class="nav-previous"><?php previous_posts_link('&laquo; Previous') ?></span>
<span class="nav-next"><?php next_posts_link('Next &raquo;') ?></span>
</div>
<?php }
if(get_option('tmoption_navigation_option')=='2'){?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
		<?php get_pagination(); ?>
	</div><!-- #nav-below -->
	<?php 
	$wp_query = null;
	$wp_query = $temp;
	wp_reset_query(); ?>
<?php endif; 
}?>
<?php }
else

{
//======================================Default Category Selection=====================//
$categories = get_categories('hide_empty=0&orderby=name&taxonomy=portfolio_categories');

$test = '';
$test .= '<section id="options" class="clearfix">';
$test .= '<ul id="filters" class="option-set clearfix" data-option-key="filter">';
$test .= '<li><a href="#show-all" data-option-value="*" class="selected">show all</a></li>';
foreach ($categories as $category_item ) {
	$test .= '<li><a href="#'.$category_item->cat_name.'" data-option-value=".'.$category_item->cat_name.'">'.$category_item->cat_name.'</a></li>';
}
$test .= '</ul></section>';
echo $test; ?>
					 
<div id="container" class="clearfix da-thumbs">
<?php foreach ($categories as $category_item ) { ?>
	<?php  query_posts(array('post_type' => 'portfolio', 'posts_per_page' => 10, 'taxonomy' => 'portfolio_categories', 'term' => $category_item->cat_name, 'paged' => $paged)); ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php $image = get_first_post_images(get_the_ID()); ?>		
		<div class="<?php echo $category_item->cat_name ?> text-box main">
			<a href="<?php echo $image; ?>" title="Click to view Full Image" data-lightbox="example-set">
				<?php print_images_thumb($image, get_the_title(get_the_ID()) ,200,150,'left'); ?>	
			</a>		
			<h5> <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?> </h5></a>
			</article>
		</div>
	<?php endwhile; 
} ?>
</div>
<?php
}?>		