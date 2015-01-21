<?php
/* Template Name: Our Team */
?>
<?php get_header(); ?>
	<div class="top-border"></div>
	<div class="heading2"><?php breadcrumbs(); ?></div>
	<div class="heading1"><?php page_heading(); ?></div>
	
	<!--Start our-team-->
	<div class="our-team">
		<!--Start #primary-->
		<div id="primary" class="site-content">
			<!--Start  #content -->
			<div id="content" role="main">
				<div class="our-team-content">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
					<div class="team">
						<?php templatemela_get_widget('our-team-widget'); ?>
					</div>
				</div>					
			</div><!-- End #content -->
		</div><!-- End #primary -->		
	</div><!-- End our team -->

<?php get_footer(); ?>