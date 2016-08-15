<?php

class Npm extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'npm', // Base ID
			__( 'npm', 'flare_twentysixteen' ), // Name
			array( 'description' => __( 'Npm Stats Widget', 'flare_twentysixteen' ), ) // Args
		);
               
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
                global $post;
            

                $package = get_post_meta($post->ID, '_component_details_npm', true);
		echo $args['before_widget'];
		echo $args['before_title'] . "Npm" . $args['after_title'];
                echo "<ul>";
                echo "<li><i class=\"fa fa-download\" aria-hidden=\"true\"></i>  npm i $package</li>";
                echo "<li><a href=\"https://www.npmjs.com/package/$package\">$package</a></li>";
                echo "</ul>";
                echo $args['after_widget'];
                
	}




} 

function register_npm() {
    register_widget( 'Npm' );
}
add_action( 'widgets_init', 'register_npm' );