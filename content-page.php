<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Black Mountain Marketing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <?php 
        if (has_post_thumbnail()) {
            echo '<div class="single-post-thumbnail clear">';
            echo '<div class="image-shifter">';
            echo the_post_thumbnail('large-thumb');
            echo '</div>';
            echo '</div>';
        }
        ?>
    
        <?php if(!is_front_page()): ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
        <?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bmm' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'bmm' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
