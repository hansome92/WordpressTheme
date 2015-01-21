<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
?>
<?php
//taxonomy
$taxonomy = 'portfolio_categories';
$link_page= '';

//category link
$terms = get_the_terms($post->ID, $taxonomy);
$i=0;
foreach ($terms as $taxindex => $taxitem) {
	if($i==0):
		$link_cat=get_term_link($taxitem->slug,$taxonomy);
		$term_slug = $taxitem->slug;
		$term_id = $taxitem->term_id;    
	endif;
$i++;
}

?>
<?php get_header(); ?>
	
	<!--- Start Templatemela Laypout Settings --->
	<?php if (get_option('tmoption_layout')=='3' || get_option('tmoption_layout')=='4' || get_option('tmoption_layout')=='5' ) { ?>
		<?php get_sidebar('secondary'); ?>
	<?php } ?> 
	<!--- End Templatemela Laypout Settings --->
	
	<!--Start #primary-->
	<div id="primary" class="site-content">
		<!--Start #content-->
		<div id="content" role="main">
			<?php // page_heading(); ?>
			<?php breadcrumbs(); ?>					

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			//get_template_part( 'portfolio_loop', 'single-portfolio' );
			?>
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'templatemela' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					
					<div class="entry-utility-port">
						<?php edit_post_link( __( 'Edit', 'templatemela' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->		
					<?php if ( comments_open() ) : ?>
						<?php comments_template( '', true ); ?>
					<?php endif; ?>
				</div><!-- #post-## -->
			<?php endwhile; // end of the loop. ?> 		
		</div><!-- End #content -->
	</div><!-- End #primary-->	
	<?php get_sidebar(); ?>	
	
<?php get_footer(); ?>

        
       