<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
        <div class="custom-content">
                <?php
                    $args = array('post_type' => 'front-page');
                    $items = new WP_Query( $args );
                    if( $items->have_posts() ) {
                      while( $items->have_posts() ) {
                        $items->the_post();
                          echo '<div class="content">';
                            the_content();
                          echo '</div>';
                      }
                    }
                ?>
        </div>
                        <?php $posts = get_posts( "numberposts=2" ); ?>
                        <?php if( $posts ) : ?>
                        <div class="blog-previews">
                            <div class="prevs-inner">
                                <h2>From the blog</h2>
                        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
                        <div class="post">
                        <h3><a href="<?php echo get_permalink($post->ID); ?>" ><?php echo $post->post_title; ?></a></h3>
                        <?php the_excerpt(); ?>
                        
                        <a class="rdmore" href="<?php echo get_permalink($post->ID); ?>" rel="bookmark">read more</a>

                        </div>
                        <?php endforeach; ?>
                        </div>
                        </div>
                        <?php endif; ?>
 
<?php 
    if(is_front_page()){
        wp_enqueue_script( 'bmm-home', get_template_directory_uri() . '/js/home.js', array('jquery'), '20150419', true );
    }
?>
<?php get_footer(); ?>
