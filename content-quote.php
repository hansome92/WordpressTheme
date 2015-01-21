<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Templatemela
 * @since Templatemela 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
		<div class="entry-meta">
			<?php templatemela_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'templatemela' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'templatemela' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'templatemela' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->	
	<?php if ( comments_open() && ! is_single() ) : ?>
		<footer class="entry-meta">
		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'templatemela' ) . '</span>', __( 'One comment so far', 'templatemela' ), __( 'View all % comments', 'templatemela' ) ); ?>
		</span><!-- .comments-link -->
		</footer><!-- .entry-meta -->
	<?php endif; // comments_open() ?>	
</article><!-- #post -->
