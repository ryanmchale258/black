<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Black Mountain Marketing
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <?php get_sidebar('footer'); ?>
	</footer><!-- #colophon -->
        <div class="site-info">
            <div class="copyright">
                Copyright &copy; 2015 Black Mountain Marketing.<br>
                All rights reserved.
            </div>
            <div class="contact">
                <p>Tel: <a href="tel:+7023297800">702-329-7800</a></p>
                <p>Email: <a href="mailto:hello@blackmountain.marketing">hello@blackmountain.marketing</a></p>
            </div>
        </div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
