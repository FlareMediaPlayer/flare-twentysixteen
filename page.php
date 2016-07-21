<?php get_header(); ?>



<?php
// Start the loop.
while (have_posts()) : the_post();
    ?>




    <header class="entry-header">
        <div class="container">
            <div class="col-xs-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </header>

    <section class="page">

        <div class="container">
            <div class="col-xs-12">
                <?php the_content(); ?> 
            </div>

        </div>

    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 