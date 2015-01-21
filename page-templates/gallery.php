<?php
/* Template Name: Gallery */ 
?>
<?php get_header(); ?>
	<!--Start gallery-page-->
	<div class="gallery-page">
		<!--Start #primary-->
		<div id="primary" class="content-area">
			<!--Start  #content -->
			<div id="content" class="site-content" role="main">
				<?php breadcrumbs(); ?>
				<h1 class="entry-title-main page-title"><?php the_title(); ?></h1>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
	
			</div><!-- End #content -->
		</div><!-- End #primary -->	
	</div><!--Start gallery-page-->

<?php get_footer(); ?>