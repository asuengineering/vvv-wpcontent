<?php
/**
 * Declaring CPT: Hero Images
 * @package understrap
 */

// Register Custom Post Type
function asufse_hero_cpt() {

	$labels = array(
		'name'                  => _x( 'Hero Images', 'Post Type General Name', 'understrap' ),
		'singular_name'         => _x( 'Hero Image', 'Post Type Singular Name', 'understrap' ),
		'menu_name'             => __( 'Hero Images', 'understrap' ),
		'name_admin_bar'        => __( 'Hero Images', 'understrap' ),
		'archives'              => __( 'Hero Archives', 'understrap' ),
		'attributes'            => __( 'Hero Attributes', 'understrap' ),
		'parent_item_colon'     => __( 'Parent Item:', 'understrap' ),
		'all_items'             => __( 'All Heros', 'understrap' ),
		'add_new_item'          => __( 'Add New Hero', 'understrap' ),
		'add_new'               => __( 'Add New', 'understrap' ),
		'new_item'              => __( 'New Hero', 'understrap' ),
		'edit_item'             => __( 'Edit Hero', 'understrap' ),
		'update_item'           => __( 'Update Hero', 'understrap' ),
		'view_item'             => __( 'View Hero', 'understrap' ),
		'view_items'            => __( 'View Heros', 'understrap' ),
		'search_items'          => __( 'Search Heros', 'understrap' ),
		'not_found'             => __( 'Not found', 'understrap' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'understrap' ),
		'featured_image'        => __( 'Featured Image', 'understrap' ),
		'set_featured_image'    => __( 'Set featured image', 'understrap' ),
		'remove_featured_image' => __( 'Remove featured image', 'understrap' ),
		'use_featured_image'    => __( 'Use as featured image', 'understrap' ),
		'insert_into_item'      => __( 'Insert into item', 'understrap' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'understrap' ),
		'items_list'            => __( 'Items list', 'understrap' ),
		'items_list_navigation' => __( 'Items list navigation', 'understrap' ),
		'filter_items_list'     => __( 'Filter items list', 'understrap' ),
	);
	$args = array(
		'label'                 => __( 'Hero Image', 'understrap' ),
		'description'           => __( 'Hero images and associated text', 'understrap' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'custom_taxonomy' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-format-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'pitchfork_hero', $args );

}
add_action( 'init', 'asufse_hero_cpt', 0 );