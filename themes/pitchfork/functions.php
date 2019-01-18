<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget areas. (Sidebars, not individual widgets.)
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Load ASU Brand Standard, ASU Header and ASU Footer assets
 */
require get_template_directory() . '/inc/asu-brand-standards.php';

/**
 * Load ASU Brand Widgets - Endorsed Logo + Social Media Footer
 */
require get_template_directory() . '/inc/widgets/asufse-endorsed-footer-widget.php';
require get_template_directory() . '/inc/widgets/asufse-socialicons-footer-widget.php';

/**
 * TODO: CPT with templates for Hero, Ratio Hero, Slim Hero, Alt Hero. 
 * Don't need the CPT, if I can use the widget areas in place by the theme.
*/

// require get_template_directory() . '/inc/cpts/asu-hero-cpt.php';

/**
 * Carbon Fields work: Load Hero Widgets
*/

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
    require_once( get_template_directory() . '/inc/widgets/asuhero-normal-widget.php');
}




/** Filter Primary Nav to add Home Icon and hidden home menu item */
function add_home_items($items, $args) {
	if( $args->theme_location == 'primary' ){

		$home_icon_class = 'menu-item nav-item';
		if ( is_home() ) {
			$home_icon_class .= ' current-menu-item active';
		}

		$home_icon = '<li id="menu-item-home-icon" class="'.$home_icon_class.'">'
			. '<a href="' . get_home_url() . '" title="Home" class="nav-link">'
			. '<span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span>'
			// . '<span class="hidden-md hidden-lg">Home</span>'
			. '</a></li>'; 

		$items = $home_icon . $items; 

	}

	return $items;
}
add_filter('wp_nav_menu_items', 'add_home_items', 10, 2);

/** Register Widget areas for items in main nav with the class .has-mega-menu */
/** https://slicejack.com/create-fully-custom-wordpress-mega-menu-no-plugins-attached/ **/

function pitchfork_widget_mega_menu_init() {
    $location = 'primary';
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();
    if ( isset( $locations[ $location ] ) ) {
        $menu = get_term( $locations[ $location ], 'nav_menu' );
        if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
            foreach ( $items as $item ) {
                if ( in_array( $css_class, $item->classes ) ) {
                    register_sidebar( array(
                        'id'   => 'megamenu-widget-area-' . $item->ID,
                        'name' => 'Mega Menu: ' . $item->title,
                    ) );
                }
            }
        }
    }
}
add_action( 'widgets_init', 'pitchfork_widget_mega_menu_init' );
// TODO: Format Nav Walker to incorporates YAMM + correct styles for dropdown.
// Output of mega menu should be a separate page template that includes the widget area.


