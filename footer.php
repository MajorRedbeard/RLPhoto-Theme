<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rlphoto
 */

?>

	</div><!-- #content -->

	<div class="footer-widgets">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?>
	<?php endif; ?>

</div>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
                <?php esc_attr_e('©', 'responsive'); ?> <?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <?php echo get_theme_mod( 'copyright_textbox', 'No copyright information has been saved yet.' ); ?>
                </a>
            <?php } // end if ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
