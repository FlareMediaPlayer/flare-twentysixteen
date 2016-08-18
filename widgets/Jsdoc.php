<?php

class Jsdoc extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'jsdoc', // Base ID
                __('jsdoc', 'flare_twentysixteen'), // Name
                array('description' => __('JSdoc API Widget', 'flare_twentysixteen'),) // Args
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

        $docs = get_post_meta($post->ID, '_component_jsdoc', true);


        echo $args['before_widget'];

        echo $args['before_title'] . "API" . $args['after_title'];

        if ($docs) {
            $decoded_docs = json_decode($docs);
            
            foreach ($decoded_docs as $top_level => $top_level_data) {
                
                //echo "<strong>" . ucfirst($top_level) . "</strong>";

                foreach ($top_level_data as $top_level_data_single) {
                    echo '<ul class="api-widget">';

                    echo "<strong>Class : </strong>" . '<a href="#'.$top_level_data_single->name. '">' . $top_level_data_single->name . '</a>';
                   //echo '<li>'; // Start top level

                    if(property_exists ($top_level_data_single , 'properties' )){
                        foreach ($top_level_data_single->properties as $property) {
                            echo '<ul>';
                            echo "<strong>Properties</strong>";
                             echo '<li><a>' . $property->name . '</a></li>';
                            //echo '<div class="api-description">' . $function->description . '</div>';
                            echo '</ul>';
                        }
                    }
                    
                    if(property_exists ($top_level_data_single , 'functions' ) && count($top_level_data_single->functions) > 1){
                        echo '<ul>';
                        echo "<strong>Functions</strong>";
                        foreach ($top_level_data_single->functions as $functions) {
                            
                            if ($functions->name != 'constructor'){
                             echo '<li><a>' . $functions->name . '</a></li>';   
                            }
                             
                            //echo '<div class="api-description">' . $function->description . '</div>';
                            
                        }
                        echo '</ul>';
                    }
                    

                    //echo '</li>'; //End Top Level
                    echo '</ul>';
                }
                
            }
            
        }

        echo $args['after_widget'];
        /*
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

         */
    }

}

function register_jsdoc() {
    register_widget('Jsdoc');
}

add_action('widgets_init', 'register_jsdoc');
