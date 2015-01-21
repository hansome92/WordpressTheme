<?php
/* Template Name: Right Sidebar */
?>
<?php get_header(); ?>
	<!--Start blog-->
	<div class="right-sidebar">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
			<?php breadcrumbs(); ?>		
			<h1 class="entry-title-main page-title"><?php the_title(); ?></h1>
				
			<?php if ( have_posts() ) : ?>
				<?php //templatemela_content_nav( 'nav-above' ); ?>
				<?php /* Start the Loop */ ?>
				<?php
				$per_blog_page  = get_option('tmoption_blog_post_option');
				$temp 			= $wp_query;
				$wp_query		= null;
				$wp_query 		= new WP_Query();
				$wp_query->query('showposts='.$per_blog_page.'&paged='.$paged); ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>		
				<?php templatemela_paging_nav(); ?>				
			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title-blog"><?php _e( 'Nothing Found', 'templatemela' ); ?></h1>
					</header>
					<div class="entry-content">
						<p>
							<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'templatemela' ); ?>
						</p>
						<?php get_search_form(); ?>
					</div>
				</article>
			<?php endif; ?>

		</div><!-- End #content -->
	</div><!-- End #primary -->		
	<?php get_sidebar(); ?>
	</div><!-- End right-sidebar -->
<?php get_footer(); ?>