<?php
/**
 * ASU Brand Standard Requirements
 * Loads ASU Bootstrap Theme, ASU Header 4.5, ASU Footer 4.5
 * All files packaged with the theme
 *
 */

if ( ! function_exists( 'asu_webstandards_scripts' ) ) {
	/**
	 * Load additional resources. Function very similar to that within the ASU Web Standards Theme (from GIOS).
	 */

    function asu_webstandards_scripts() {
		// Upversion this number when you include a new version of the web standards
		// This is not necessarily the version of the web standards you are using,
		// but rather a local version number of the web standards assets for WordPress
		$asu_web_standards_version = '1.0.4';

		// dependency versions
		$asu_header_version = '4.5';

		wp_register_script( 'bootstrap-asu-js', get_template_directory_uri() . '/assets/asu-web-standards/js/bootstrap-asu.min.js', array(), $asu_web_standards_version, true );
		wp_enqueue_script( 'asu-wordpress-web-standards-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
		wp_enqueue_script( 'asu-wordpress-web-standards-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
		wp_register_script( 'asu-header', get_template_directory_uri() . '/assets/asu-header/js/asu-header.min.js', array() , $asu_header_version, true );
		wp_register_script( 'asu-header-config', get_template_directory_uri() . '/assets/asu-header/js/asu-header-config.js', array( 'asu-header' ) , $asu_header_version, true );

		wp_register_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,700', array(), '1' );
		wp_register_style( 'roboto-mono-font', 'https://fonts.googleapis.com/css?family=Roboto+Mono:300', array(), '1' );
		wp_register_style( 'bootstrap-asu', get_template_directory_uri() . '/assets/asu-web-standards/css/bootstrap-asu.min.css', array(), $asu_web_standards_version, 'all' );
		wp_register_style( 'asu-header-css', get_template_directory_uri() . '/assets/asu-header/css/asu-nav.css', array(), $asu_header_version, 'all' );

		wp_enqueue_script( 'bootstrap-asu-js' );
		wp_enqueue_script( 'asu-header-config' );
		wp_enqueue_script( 'asu-header' );

		wp_enqueue_style( 'roboto-font' );
		wp_enqueue_style( 'roboto-mono-font' );
		wp_enqueue_style( 'bootstrap-asu' );
		wp_enqueue_style( 'asu-header-css' );

	}

} // endif function_exists( 'asu_webstandards_scripts' ).

add_action( 'wp_enqueue_scripts', 'asu_webstandards_scripts' );

