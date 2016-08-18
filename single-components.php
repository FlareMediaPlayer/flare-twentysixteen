<?php get_header(); ?>

<?php
$meta = get_post_meta(get_the_ID());
$categories = get_terms('components-category');
$tags = get_terms('components-tag');
$docs = get_post_meta($post->ID, '_component_jsdoc', true);
?>

<?php
while (have_posts()) : the_post();
    ?>




    <header class="entry-header">
        <div class="container">
            <div class="col-xs-6 ">
                <h1><?php the_title(); ?></h1>

            </div>
        </div>
    </header>

    <section class="page documentation">

        <div class="container">

            <div class="col-sm-4 col-sm-push-8 component-detail">
                <!--<h2>Overview</h2>-->
                <?php flare_single_widget('FlareComponentOverview') ?>

                <?php flare_single_widget('DownloadScript') ?>

                <?php
                if (get_post_meta($post->ID, '_component_details_github', true))
                    flare_single_widget('Github');
                ?>

                <?php
                if ($docs)
                    flare_single_widget('Jsdoc');
                ?>


                <?php
                if (get_post_meta($post->ID, '_component_details_npm', true))
                    flare_single_widget('Npm');
                ?>

                <div class="hidden-xs">
                    <?php flare_single_widget('FlareComponents') ?>

                    <?php flare_single_widget('FlareCompleteBuilds') ?>
                </div>







            </div>

            <div class="col-sm-8 col-sm-pull-4">
                <div class="main-content">

                    <?php the_content(); ?> 

                    <?php
                    $docs = get_post_meta($post->ID, '_component_jsdoc', true);

                    if ($docs) {
                        echo '<h2>API Documentation</h2>';
                        $decoded_docs = json_decode($docs);
                        //var_dump($decoded_docs);

                        foreach ($decoded_docs as $top_level => $top_level_data) {
                            
                            echo "<h3>" .ucfirst($top_level)  ."</h3>";
                            
                            foreach($top_level_data as $top_level_data_single){
                                echo '<div class="api-top-level">';
                                //var_dump($top_level_data_single);
                                echo '<h4>' . $top_level_data_single->name . '</h4>';
                                echo '<div class="api-description">' . $top_level_data_single->description . '</div>';
                                
                                
                                if($top_level_data_single->functions){
                                    foreach($top_level_data_single->functions as $function){
                                        echo '<h4>' . $function->name . '</h4>';
                                        echo '<div class="api-description">' . $function->description . '</div>';
                                 
                                    }
                                }
                                
                                echo '</div>';
                            }
                       
                        }
                    }
                    ?>


                </div>
            </div>

        </div>

    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 