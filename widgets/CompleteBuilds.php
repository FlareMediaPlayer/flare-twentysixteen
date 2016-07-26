<?php

/**
 * Adds All Components widget
 */
class FlareCompleteBuilds extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'flare_complete_builds', // Base ID
                __('Flare Builds', 'flare_twentysixteen'), // Name
                array('description' => __('Flare Complete Build Listing', 'flare_twentysixteen'),) // Args
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
    public function widget($args, $instance) {
        
        echo $args['before_widget'];
        echo $args['before_title'] . "All Complete Builds" . $args['after_title'];
        echo "<ul>";
        
        $query = array('post_type' => 'complete-builds');
        $loop = new WP_Query($query);
        while ($loop->have_posts()) : $loop->the_post();
        
            echo '<li>';
            echo "<a href=\"". get_permalink() ."\">" . get_the_title() . "</a>";
            
            
            
            echo '</li>';
        endwhile;
        
        
        
        echo "</ul>";
        //var_dump($args['after_widget']);
        echo $args['after_widget'];
        wp_reset_postdata();
    }

}

function register_flare_complete_builds() {
    register_widget('FlareCompleteBuilds');
}

add_action('widgets_init', 'register_flare_complete_builds');
