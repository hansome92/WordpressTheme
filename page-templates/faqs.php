<?php
/* Template Name: Faqs */
?>
<?php get_header(); ?>

	<!--Start faqs-->
	<div class="faqs-page">
		<!--Start #primary-->
		<div id="primary" class="content-area">
			<!--Start #content-->
			<div id="content" class="site-content" role="main">				
				<?php breadcrumbs(); ?>
				<header class="entry-header page-title">
					<h1 class="entry-title page-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<div class="faqs-content">
					<?php query_posts(array('post_type' => 'faq', 'posts_per_page' => 10, 'paged' => $paged)); ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="togg">
							<a class="tog" href="#">
								<span class="cp_plus">
									<span class="vert_line"></span>
									<span class="horiz_line"></span>
								</span>
								<span class="faq_title"><?php echo get_the_title(); ?></span>
							</a>
							<div class="tab_content">
							<?php echo get_the_content(); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>					
			</div><!-- End #content -->
		</div><!-- End #primary -->		
	</div><!-- End our team -->

<?php get_footer(); ?>