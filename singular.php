<?php get_header(); ?>



<?php
// Start the loop.
while (have_posts()) : the_post();
    ?>


    <header class="entry-header">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </header>

    <section class="page">



        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 