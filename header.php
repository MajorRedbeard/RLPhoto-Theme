<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rlphoto
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rlphoto' ); ?></a>

	<?php
	/*INLINE THEME CSS */
	echo '<style type="text/css">';
        $example_position = get_theme_mod( 'logo_placement' );
        if( $example_position != '' ) {
                switch ( $example_position ) {
                        case 'left':
                                // Do nothing. The theme already aligns the logo to the left
                                break;
                        case 'right':
                                echo '.site-branding { float: right; }';
								echo '.site-navigation { width: calc( 98% - '.$logo_width.') }';
                                break;
                        case 'center':
                                echo '.site-branding { width: 100%; float: none; margin-left: auto; margin-right: auto; }';
								echo '#logo { float: right; }';
								echo '.site-navigation { width: 100%; }';
                                break;
                }
        }
//		if (get_theme_mod('header_colour')) { $header_background = 'style=\'background: url("'.$get_theme_mod('header_colour').'\'; '; }
//		if (get_theme_mod('header_colour')) { $header_background = 'style=\'background: '.$get_theme_mod('header_colour').'\'; '; }
		$site_width = get_theme_mod( 'page_width' );
		if( $site_width != '' ) {
				echo '#primary { max-width: '.$site_width.'px; margin: 0 auto; }';
                }
	echo '</style>';
		/* END OF INLINE THEME CSS */
?>
	
	<header id="masthead" class="site-header" <?php echo $header_background; ?> role="banner">
		<?php if ( get_theme_mod('logo') ) { ?><div class="site-branding">
			<div id=logo><?php $background = get_theme_mod('logo'); echo '<a href="'.home_url('/').'"><img class="header-logo" style="margin: 1%; height: auto; max-width: '.get_theme_mod('logo_width').'; " src="'.$background.'" /></a>'; ?></div>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding --> <?php } ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'rlphoto' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
<div class="widget-callout">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Callout') ) : ?>
	<?php endif; ?>

</div>
	<div id="content" class="site-content">
