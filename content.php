<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Templatemela
 * @since Templatemela 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">		
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
		<?php 
		if( $post->post_title == '' ) : 
			$entry_meta_class = "empty-entry-header";
		else :
			$entry_meta_class = "";
		endif; ?>
		<div class="entry-meta <?php echo $entry_meta_class; ?>">
			<?php templatemela_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'templatemela' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() || !is_single()) : // Only display Excerpts for Search and not single pages ?>		
		<div class="entry-summary">	
			<div class="entry-thumbnail">
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>		
					<?php the_post_thumbnail(); ?>
				<?php else : ?>
					<?php if ($postImage = get_first_post_images(get_the_ID())):?>
						<?php if( $postImage!="0" ) : ?>
							<div class="entry-image-loop-con main">
								<?php print_images_thumb($postImage, get_the_title(get_the_ID()) ,700,300,'left'); ?>	
								<article class="da-animate da-slideFromRight" style="display: block;">
									<div class="blog-icon-container">						
										<span class="zoom"><a data-lightbox="example-set" id="blog-zoom" href="<?php echo $postImage; ?>" title="Standard Post"></a></span>
										<span class="single_link"><a href="<?php echo get_permalink(); ?>" title="View Full Image" class="standard"></a></span>
									</div>
								</article>				
							</div>
						<?php endif; ?>	
					<?php endif; ?>			
				<?php endif; ?>
			</div>
			<div class="excerpt"><?php echo excerpt(75); ?></div>
		</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'templatemela' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'templatemela' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'templatemela' ) . '</span>', __( 'One comment so far', 'templatemela' ), __( 'View all % comments', 'templatemela' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
