<?php
/**
 * Adds Github widget.
 */
class Github extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'github', // Base ID
			__( 'Github', 'flare_twentysixteen' ), // Name
			array( 'description' => __( 'Github Stats Widget', 'flare_twentysixteen' ), ) // Args
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
		echo $args['before_widget'];
		echo "stuff";
		echo __( esc_attr( 'Hello, World!' ), 'text_domain' );
		echo $args['after_widget'];
	}




} 

function register_github() {
    register_widget( 'Github' );
}
add_action( 'widgets_init', 'register_github' );