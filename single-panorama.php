
					
					
					
<?php
/**
 * The template for displaying all single posts.
 *
 * @package rlphoto
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- title, meta, and date info -->
						<div class="entry-header clearfix">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							
							<?php 
							$panoName = get_post_meta(get_the_ID(),'panorama_name',true);
							if (get_the_title()) { echo '<a href="http://ryanlindseyphoto.com/wp-content/panoramas/'.$panoName.'.html" class="colorbox-link sphere thumb"><img src="http://ryanlindseyphoto.com/wp-content/panoramas/'.$panoName.'-preview.png" /><span></span></a>'; } ?>
						</div>
						
						<!-- "Read More" link -->
						<div class="entry-content">
							<?php the_content( __( 'Read More&rarr;', 'it-l10n-BuilderChild-Foundation-Blank' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<p class="entry-utility"><strong>' . __( 'Pages:', 'it-l10n-BuilderChild-Foundation-Blank' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
						</div>

					</div>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
