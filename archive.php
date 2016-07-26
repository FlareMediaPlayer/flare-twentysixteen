<?php get_header(); ?>



<?php
// Start the loop.
while (have_posts()) : the_post();
    ?>




    <section class="page">

        <div class="container">
            <div class="col-xs-12">
                <h4><?php the_title(); ?></h4>
                <?php the_content(); ?> 
            </div>

        </div>

    </section>
    <?php
// End the loop.
endwhile;
?>



<?php get_footer(); ?> 