<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'understrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'understrap' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'understrap' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'    => '20',
				)
			) );

	}

} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

// Register a custom Customizer control that allows for arbitrary text. Used for labeling.
// See: https://wptheming.com/2015/07/customizer-control-arbitrary-html/

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Prefix_Custom_Content' ) ) :
class Prefix_Custom_Content extends WP_Customize_Control {

	// Whitelist content parameter
	public $content = '';

	/**
	 * Render the control's content
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<span class="customize-control-title">' . $this->label . '</span>';
		}
		if ( isset( $this->content ) ) {
			echo $this->content;
		}
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
	}
}
endif;

// ASU Brand Standards Customizer Pages
if ( ! function_exists( 'asustandards_theme_customize_register' ) ) {

	function asustandards_theme_customize_register( $wp_customize ) {

		// Remove a bunch of things we don't need.
		$wp_customize->remove_control( 'header_textcolor' );
		$wp_customize->remove_control( 'background_color' );
		$wp_customize->remove_control( 'display_header_text' );
		$wp_customize->remove_control( 'header_image' );
		$wp_customize->remove_control( 'site_icon' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_control( 'blogdescription');


		// Add Parent Unit / Parent URI fields to Site Identity tab (default)
		// If these options are set, this will be the text before the "|" in the brand standards

		$wp_customize->add_setting( 'parent_unit_helper_text', array() );
	    $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'parent_unit_helper_text', array(
			'section' => 'title_tagline',
			'label' => __( 'Parent Unit Info', 'govpress' ),
			'content' => __( 'Add a parent unit &amp; parent unit URL to create the site branding text before the | separator. Leave blank to only use the site title in the ASU Header.', 'textdomain' ) . '</p>',
		) ) );

		// Parent Unit Name. Defaults to "Engineering"
		$wp_customize->add_setting( 'asustandards_parent_unit_name', array(
	        'default' => 'Engineering',
	        'type' => 'option',
	        'capability' => 'edit_theme_options',
	        'transport' => 'postMessage',
	    ) );

		$wp_customize->add_control( 'asustandards_parent_unit_name', array(
	        'label' => __('Parent Unit Name', 'understrap'),
	        'section' => 'title_tagline',
	        'type' => 'text',
	    ));

		// Parent Unit URI. Defaults to https://engineering.asu.edu
	    $wp_customize->add_setting( 'asustandards_parent_unit_URI', array(
	        'default' => 'https://engineering.asu.edu',
	        'type' => 'option',
	        'capability' => 'edit_theme_options',
	        'transport' => 'postMessage',
	    ) );

		$wp_customize->add_control( 'asustandards_parent_unit_URI', array(
	        'label' => __('Parent Unit URI', 'understrap'),
	        'section' => 'title_tagline',
	        'type' => 'text',
	    ));

		// Font Size for Header, Select Box
	    $wp_customize->add_setting( 'asustandards_header_text_size', array(
			'default'           => '21',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'asustandards_header_text_size', array(
					'label'       => __( 'Header Text Size', 'understrap' ),
					'description' => __( "Set header size in pixels. Default is 21px.",
					'understrap' ),
					'section'     => 'title_tagline',
					'settings'    => 'asustandards_header_text_size',
					'type'        => 'select',
					'choices'     => array(
						'21'  => __( '21px', 'understrap' ),
						'22'  => __( '22px', 'understrap' ),
						'23'  => __( '23px', 'understrap' ),
						'24'  => __( '24px', 'understrap' ),
					),
					'priority'    => '20',
				)
			) );

	}

} // endif function_exists( 'asustandards_theme_customize_register' ).
add_action( 'customize_register', 'asustandards_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}

add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
