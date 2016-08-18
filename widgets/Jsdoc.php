<?php

class Jsdoc extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'jsdoc', // Base ID
			__( 'jsdoc', 'flare_twentysixteen' ), // Name
			array( 'description' => __( 'JSdoc API Widget', 'flare_twentysixteen' ), ) // Args
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
            
                $docs = get_post_meta($post->ID, '_component_jsdoc', true); 
                
                
		echo $args['before_widget'];
		echo $args['before_title'] . "API" . $args['after_title'];
                ?>
                <ul>
            <li>

                <ul class="api-widget">
                    <li>
                        <strong>Class</strong> : <a>Icon</a>
                        <ul>


                            <li>
                                <span>Parameters</span>
                                <ul>
                                    <li><a href="#">Param 1</a></li>
                                    <li><a href="#">Param 2</a></li>
                                </ul>
                            </li>

                            <li>
                                <span>Methods</span>
                                <ul>
                                    <li><a href="#">function 1</a></li>
                                    <li><a href="#">function 2</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <strong>Class</strong> :  <a>Play</a>
                        <ul>


                            <li>
                                <span>Parameters</span>
                                <ul>
                                    <li><a href="#">Param 1</a></li>
                                    <li><a href="#">Param 2</a></li>
                                </ul>
                            </li>

                            <li>
                                <span>Methods</span>
                                <ul>
                                    <li><a href="#">function 1</a></li>
                                    <li><a href="#">function 2</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <?php
        echo $args['after_widget'];
                
	}




} 

function register_jsdoc() {
    register_widget( 'Jsdoc' );
}
add_action( 'widgets_init', 'register_jsdoc' );