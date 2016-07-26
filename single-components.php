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
                <div class="widget">
                    <h3>Component Detail</h3> 
                    <ul>

                        <li>
                            <strong>Component Type</strong> : 
                            <?php
                            $itemCount = count($categories);
                            $commaRange = $itemCount - 1;

                            for ($i = 0; $i < $itemCount; $i++) {
                                $name = $categories[$i]->name;
                                $link = get_term_link($categories[$i]);
                                //var_dump($link);
                                //echo "<a href=\"$link\">$name</a>";
                                echo "<a href=\"$link\">$name</a>";
                                if ($i < $commaRange) {
                                    echo " , ";
                                }
                            }
                            ?>
                        </li>

                        <li>
                            <strong>Latest Version</strong> : 0
                        </li>


                        <?php if ($tags): ?>
                            <li>
                                <strong>Keywords</strong> : 
                                <?php
                                $tagCount = count($tags);
                                $commaRange = $tagCount - 1;
                                for ($i = 0; $i < $tagCount; $i++) {
                                    $name = $tags[$i]->name;
                                    $link = get_term_link($tags[$i]);
                                    //echo "<a href=\"$link\">$name</a>";
                                    echo "<a href=\"$link\">$name</a>";
                                    if ($i < $commaRange) {
                                        echo " , ";
                                    }
                                }
                                ?>
                            </li>

                        <?php endif; ?>

                    </ul>
                </div>


                <?php
                if ($meta['github'])
                    flare_single_widget( 'Github' );
                ?>
                
                <?php flare_single_widget('FlareComponents') ?>

          

                
               
            </div>

            <div class="col-sm-8 col-sm-pull-4">
                <?php the_content(); ?> 
            </div>

        </div>

    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 