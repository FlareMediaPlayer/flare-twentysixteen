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
                $this->organization = "flaremediaplayer";
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
            
                $meta = get_post_meta(get_the_ID());
                $repo = $meta['github'][0];
                $link = "https://github.com/" . $this->organization . "/" . $repo;
                $display_link = "github.com/" . $this->organization . "/" . $repo;
		echo $args['before_widget'];
		echo $args['before_title'] . "Github" . $args['after_title'];
                echo "<ul>";
                echo "<li><div class=\"hide-extra-container\"><div class=\"hide-extra-inner\"><div class=\"hide-extra-content\"><a style=\"white-space: nowrap;\" href=\"$link\">$display_link</a></div></div></div></li>";
                echo "</ul>";
                //class=\"hide-extra\"
                //var_dump($args['after_widget']);
                echo $args['after_widget'];
                
	}




} 

function register_github() {
    register_widget( 'Github' );
}
add_action( 'widgets_init', 'register_github' );