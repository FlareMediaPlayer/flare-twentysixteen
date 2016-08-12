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
            <div class="post-date"><?php the_date(null, "<strong>", "</strong>", true); ?></div>
            <?php the_content(); ?>
            
            <div class="post-nav"><span style="display:inline-block;"><?php previous_post_link('&larr; %link'); ?></span>  <span style="float:right; display:inline-block;"> <?php next_post_link('%link &rarr;'); ?></span></div>
        </div>
    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 