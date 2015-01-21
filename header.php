<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Templatemela
 * @since Templatemela 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php templatemela_header(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( get_option('tmoption_control_panel') == 'yes' ) do_action('tm_show_panel'); ?>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<!-- Start header-main -->
			<div class="header-main">
				<!-- Start header-top -->
				<div class="header-top">
				
					<div class="home-link logo">											
						<?php if (get_option('tmoption_logo_image') != '') : ?>
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">	
								<?php tm_get_logo(); ?>
							</a>
						<?php else: ?>
						<h1 class="site-title">
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">	
								<strong><?php bloginfo( 'name' ); ?></strong>
							</a>
						</h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>
					</div>
				
									
							
										
					<?php templatemela_header_inside(); ?>
						
				</div><!-- End header-top -->
				
				<!-- Start header-middle -->
				<div class="header-middle">
					
				<?php
						$tm_contact_header_menu =array(
						'menu' => 'TM Header Top Links',
						'depth'=> 1,
						'echo' => false,
						'menu_class'      => 'contact-header-menu', 
						'container'       => '', 
						'container_class' => '', 
						'theme_location' => 'contact-header-menu'
						);
						echo wp_nav_menu($tm_contact_header_menu);				    
				?>
					
					
				<div class="header-middle-top"><!--Start header-middle-right -->				
					<div class="header-top-contactus">
						<?php templatemela_get_widget('header-contact'); ?>	
					</div>	
					
					
					
				</div><!--End header-middle-right -->	
			
				<div class="header-middle-bottom"><!--Start header-middle-bottom -->		
					<div class="header_cart"><!-- Start header cart -->
							<div class="togg">
								<?php global $woocommerce;
								ob_start();?>						
								<a id="shopping_cart" class="shopping_cart tog cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"> <?php _e( 'Cart', 'templatemela' ); ?>
									<span class="item-total">
										<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
									</span> 
								</a>
								<?php templatemela_get_widget('header-widget'); ?>	
							</div>						
					</div>  <!--End  header cart  -->
					<?php get_search_form(); ?>						
					<?php templatemela_get_widget('header-login');?>								
				</div>
				</div><!-- End header-middle -->	
			</div><!-- End header-main -->
			
			
			<?php templatemela_header_after(); ?>
		</header><!-- #masthead -->
		
		<div class=top_main>
		<!-- Start header-bottom -->		
			<div id="navbar" class="header-bottom navbar default">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<h3 class="menu-toggle"><span class="menu-toggle-image"></span><?php _e( 'Menu', 'templatemela' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'templatemela' ); ?>"><?php _e( 'Skip to content', 'templatemela' ); ?></a>
					<?php wp_nav_menu( array( 
					'theme_location' => '', 
					 'depth' => 3,
					'menu_class' => 'nav-menu',
				//	'echo'  => true,
				//	'items_wrap' => '<ul class="%2$s">%3$s</ul>', 
					'before' => '<span></span>',
					'walker' => new lionbridge_Walker,
					  ) ); ?>
		
				</nav><!-- #site-navigation -->
			</div><!-- End header-bottom #navbar -->
			<div id="top-menu">
				<div class="top-menu-inner">
					<ul class="top-menu-sidebar">
						<?php dynamic_sidebar('sidebar-40'); ?>
						<div class="clear">
						</div>
					</ul>	
				</div>
			</div>
		<?php if (is_page_template('page-templates/home.php') ) : ?>
			<div id="top-area">
				<div class="top-area-inner">
					<div class="banner_bg">
						<?php include_once(TEMPLATEPATH . '/slider.php'); ?>
						<div class="home-subbanner">
							<?php templatemela_get_widget('home-subbanner');?>
						</div>
					</div>
				</div>
			</div>			
		<?php endif; ?>
		</div>
		
		<?php templatemela_main_before(); ?>

	<?php if ( 'page' == get_option('show_on_front') && is_front_page() ) :?>
	<div class="homepage">
	<?php endif; ?>
	<div id="main" class="site-main">		
		
		<?php templatemela_content_before(); ?>