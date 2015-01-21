<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
?>
<div class="secondary-sidebar">
	<?php templatemela_left_before(); ?>
	<?php templatemela_right_before(); ?>
	
	<?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'templatemela' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'templatemela' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>
	<?php endif; // end sidebar widget area ?>
	
	<?php templatemela_left_after(); ?>
	<?php templatemela_right_after(); ?>	
</div><!-- .secondary .widget-area -->
		
	