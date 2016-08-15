<?php
/**
 * Adds DownloadScript widget.
 */
class DownloadScript extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'downloadScript', // Base ID
			__( 'DownloadScript', 'flare_twentysixteen' ), // Name
			array( 'description' => __( 'DownloadScript Stats Widget', 'flare_twentysixteen' ), ) // Args
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
            
                global $post;
                $production = get_post_meta($post->ID, '_component_script_production', true);
                $development = get_post_meta($post->ID, '_component_script_development', true);
                
                if($production){
                   $production_details =  "<a href=\"$development\" download>". basename($production) ."</a>";
                }else{
                    $production_details =  "Not Available.";
                }
                
                if($development){
                   $development_details = "<a href=\"$development\" download>". basename($development) ."</a>";
                }else{
                    $production_details =  "Not Available.";
                }
                
		echo $args['before_widget'];
		echo $args['before_title'] . "Download Latest Build" . $args['after_title'];
                echo "<ul>";
                echo "<li><strong>Production</strong> : $production_details</li>";
                echo "<li><strong>Development</strong> : $production_details</li>";
                echo "</ul>";
                echo $args['after_widget'];
                
	}




} 

function register_downloadScript() {
    register_widget( 'DownloadScript' );
}
add_action( 'widgets_init', 'register_downloadScript' );