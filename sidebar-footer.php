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
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area'  )
		&& ! is_active_sidebar( 'fourth-footer-widget-area' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
	<div id="footer-widget-area">
	
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
			<div id="first" class="first-widget widget">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</div><!-- #first .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
			<div id="second" class="second-widget widget">
					<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</div><!-- #second .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
			<div id="third" class="third-widget widget">					
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
			</div><!-- #third .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'forth-footer-widget-area' ) ) : ?>
			<div id="fourth" class="fourth-widget widget">
				<?php dynamic_sidebar( 'forth-footer-widget-area' ); ?>
			</div><!-- #fourth .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<div  class="footer-widget">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div><!-- #fourth .widget-area -->
		<?php endif; ?>
		</div><!-- #footer-widget-area -->
		<div class="clear"></div>		