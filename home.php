<?php get_header(); ?>

<header class="entry-header">
    <div class="container">
        <div class="col-xs-6 ">
            <h1>Latest News</h1>

        </div>
    </div>
</header>

<div class="container">
    <div class="col-xs-12">
        <section class ="page">
            <?php
// Start the loop.

            while (have_posts()) : the_post();
                ?>




                <article>



                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php the_date( null , "<strong>", "</strong>", true ); ?>
                    <?php the_excerpt(); ?> 


                </article>
                <?php
// End the loop.
            endwhile;
            ?>
        </section>
    </div>
</div>


<?php get_footer(); ?> 