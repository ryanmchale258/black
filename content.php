<?php
/**
 * @package Black Mountain Marketing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">
        <?php 
        if (has_post_thumbnail()) {
            echo '<div class="single-post-thumbnail small-index-thumbnail clear">';
            echo '<a href="' . get_permalink() . '" title="' . __('Click to read ', 'bmm') . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail('archive-thumb');
            echo '</a>';
            echo '</div>';
        }
        ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php bmm_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'bmm') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
	</footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->