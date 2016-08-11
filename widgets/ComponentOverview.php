<?php

/**
 * Adds Github widget.
 */
class FlareComponentOverview extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'flare_component_overview', // Base ID
                __('Flare Component Overview', 'flare_twentysixteen'), // Name
                array('description' => __('Lists Component stats', 'flare_twentysixteen'),) // Args
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
        
        global $post;
        $meta = get_post_meta(get_the_ID());
        $categories = wp_get_post_terms($post->ID, 'components-category');
        $tags = get_terms('components-tag');

        echo $args['before_widget'];
        echo $args['before_title'] . "Component Overview" . $args['after_title'];
        echo "<ul>";

        $itemCount = count($categories);
        $commaRange = $itemCount - 1;

        echo "<li>";
        echo "<strong>Component Type</strong> : ";
        for ($i = 0; $i < $itemCount; $i++) {
            $name = $categories[$i]->name;
            $link = get_term_link($categories[$i]);
            echo "<a href=\"$link\">$name</a>";
            if ($i < $commaRange) {
                echo ", ";
            }
        }
        echo "</li>";


        if ($tags):
            echo "<li> <strong>Keywords</strong> : ";
            $tagCount = count($tags);
            $commaRange = $tagCount - 1;
            for ($i = 0; $i < $tagCount; $i++) {
                $name = $tags[$i]->name;
                $link = get_term_link($tags[$i]);

                echo "<a href=\"$link\">$name</a>";
                if ($i < $commaRange)
                    echo " , ";
            }

            echo "</li>";

        endif;

        echo "</ul>";
        //var_dump($args['after_widget']);
        echo $args['after_widget'];
    }

}

function register_flare_component_overview() {
    register_widget('FlareComponentOverview');
}

add_action('widgets_init', 'register_flare_component_overview');
