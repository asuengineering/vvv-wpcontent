<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<a href="#skippy" class="sr-only">Skip to Content</a>

<!-- ******************* Google Tag Manager ASU Universal ******************* -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KDWN8Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KDWN8Z');</script>
<!-- End Google Tag Manager ASU Universal -->

<div class="hfeed site" id="page">

	<!-- ******************* ASU Header 4.5 ******************* -->
	<div id="asu-header" class="clearfix">
		<?php get_template_part( 'assets/asu-header/header-asu' ); ?>
		<div id="site-name-desktop" class="section site-name-desktop">
		    <div class="container">
		      	<div class="site-title" id="asu_school_name" >
					<?php
					// Print the parent organization and its link
					$prefix   = '<span class="first-word">%1$s</span>&nbsp;|&nbsp;';
					$parentName = get_option( 'asustandards_parent_unit_name' );
					$parentURI  = get_option( 'asustandards_parent_unit_URI' );

					// Do we have a parent org and a parent org linK?
					if ( ($parentName !== '' ) && ( $parentURI !== '') ) {
						$wrapper = '<a href="%1$s" id="org-link-site-title">%2$s</a>';
						$wrapper = sprintf( $wrapper, esc_html( $parentURI ), '%1$s' );
						$prefix  = sprintf( $prefix, $wrapper );
						echo wp_kses( sprintf( $prefix, esc_html( $parentName ) ), wp_kses_allowed_html( 'post' ) );
						}

					?>
					<a href="<?php echo esc_url( home_url() ); ?>" id="blog-name-site-title"><?php bloginfo( 'name' ); ?></a>
				</div>
			</div>
		</div>
	</div>

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end --> 

