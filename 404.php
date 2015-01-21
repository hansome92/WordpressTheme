<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Templatemela
 * @since Templatemela 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<!--Start 404 page-->
			<div class="page-not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Not Found', 'templatemela' ); ?></h1>
				</header>
	
				<div class="page-wrapper">
					<div class="page-content">
						<div class="not-found">
							<h1>Error 404 - Not Found</h1>
							<p>Sorry, but you are looking for something that isn't here.</p>
						</div>
					</div><!-- .page-content -->
				</div><!-- .page-wrapper -->
				
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>