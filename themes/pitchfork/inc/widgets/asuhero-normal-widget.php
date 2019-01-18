<?php
/**
 * Carbon Fields, Custom Widgets for Hero Widget
 *
 * @package understrap
 */

use Carbon_Fields\Widget;
use Carbon_Fields\Field;


class ThemeWidgetExample extends Widget {

    // Register widget function. Must have the same name as the class
    function __construct() {
        $this->setup( 'hero_widget_normal', 'Hero Widget', 'Normal hero, responsive.', array(
            Field::make( 'text', 'hero_title', 'Title' )->set_default_value( 'Title (Not Displayed)'),
            Field::make( 'select', 'hero_type', 'Hero Type' )
                ->add_options( array(
                    'normal' => 'Normal',
                    'ratio' => 'Ratio',
                    // TBD: From GIOS: Slim, Video. From Brand: Alt #1, Alt #2
                ) ),
            Field::make( 'image', 'hero_background', 'Background Image' )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'hero_headline', 'Headline')->set_default_value('Headline Text'),
            Field::make( 'textarea', 'hero_content', 'Content' )->set_default_value( '' ),
            Field::make( 'complex', 'hero_buttons' )
                ->add_fields( array(
                    Field::make( 'text', 'hero_buttontext', 'Button Text' ),
                    Field::make( 'color', 'hero_buttoncolor', 'Button Color' )
                        ->set_palette( array( '#8C1D40', '#00A3E0') )
                ) ),
        ) );
    }

    // Called when rendering the widget in the front-end
    function front_end( $args, $instance ) {
        echo $args['before_title'] . $instance['title'] . $args['after_title'];
        echo '<p>' . $instance['content'] . '</p>';
        echo '<div class="hero hero-bg-img" style="background-image: url(' . $instance['hero_background'] .'">';
        echo '<div class="container-fluid"><div class="row"><div class="col-md-12">';
        echo '<h2>' . $instance['hero_headline'] . '</h2>';
        echo '<p>' . $instance['hero_content'] . '</p>';   
        echo '</div></div></div></div>';
    }
}

function asufse_load_widgets() {
    register_widget( 'ThemeWidgetExample' );
}

add_action( 'widgets_init', 'asufse_load_widgets' );