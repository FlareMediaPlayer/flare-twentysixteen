<?php get_header(); ?>



<?php
// Start the loop.
while (have_posts()) : the_post();
    ?>
    <section>
        <?php the_content(); ?>
    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 