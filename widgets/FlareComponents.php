<?php

/**
 * Adds All Components widget
 */
class FlareComponents extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'flare_components', // Base ID
                __('Flare Components', 'flare_twentysixteen'), // Name
                array('description' => __('Flare Components Listing', 'flare_twentysixteen'),) // Args
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
        echo $args['before_title'] . "All Components" . $args['after_title'];
        echo "<ul>";
        
        $query = array('post_type' => 'components');
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

function register_flare_components() {
    register_widget('FlareComponents');
}

add_action('widgets_init', 'register_flare_components');
