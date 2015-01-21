<?php
/* Template Name: Home Page */ 
?>
<?php get_header(); ?>
	<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="home_primary" >
	<?php endif; ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php templatemela_get_widget('homepage-blog');?>
		
			<div id="featured" class="home-products block products_block">
				<div class="customNavigation">
					<a class="btn prev">&nbsp;</a>
					<a class="btn next">&nbsp;</a>
				</div>										
				<?php templatemela_get_widget('home-products-widget');?>
				
				<span class="featured_default_width" style="display:none; visibility:hidden"></span>		
			</div>
			
			<div id="brand" class="home-logo-slider block products_block">	
			<div class="customNavigation">
				<a class="btn prev"> </a>
				<a class="btn next"> </a>
			</div>	
				<div class="brand-logo products">
				<ul class="products">					
					<?php templatemela_get_widget('logo-partner-widget');?>
				</ul>	
				</div>
				<span class="brand_default_width" style="display:none; visibility:hidden"></span>		
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) : ?>
	</div>
	<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) : ?>
<div id="tertiary" class="sidebar-container" role="complementary">
<?php get_sidebar('front'); ?>
</div><!-- End #secondary -->
<?php endif; ?>
<?php get_footer(); ?>