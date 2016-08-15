<?php get_header(); ?>

<?php
$meta = get_post_meta(get_the_ID());
$categories = get_terms('components-category');
$tags = get_terms('components-tag');
?>

<?php
// Start the loop.
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
                    flare_single_widget( 'Github' );
                ?>
                
                
                <?php
                if (get_post_meta($post->ID, '_component_details_npm', true))
                    flare_single_widget( 'Npm' );
                ?>
                
                <div class="hidden-xs">
                <?php flare_single_widget('FlareComponents') ?>
                
                <?php flare_single_widget('FlareCompleteBuilds') ?>
                </div>
                
                

          

                
               
            </div>

            <div class="col-sm-8 col-sm-pull-4">
                <div class="main-content">
                    
                <?php the_content(); ?> 
                </div>
            </div>

        </div>

    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 