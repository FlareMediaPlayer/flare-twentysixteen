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
                    <?php the_date(null, "<strong>", "</strong>", true); ?>
                    <?php the_excerpt(); ?> 


                </article>
                <?php
// End the loop.
            endwhile;
            ?>

            <div class="post-pagination">
                <?php
                echo paginate_links(array(
                    //'base' => '%_%',
                    'format' => '?paged=%#%',
                    //'total' => 4,
                    'current' => max(1, get_query_var('paged')),
                    'show_all' => true,
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_next' => true,
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                    'type' => 'plain',
                    'add_args' => false,
                    'add_fragment' => '',
                    'before_page_number' => '',
                    'after_page_number' => ''
                ));
                ?>
            </div>

        </section>
    </div>
</div>


<?php get_footer(); ?> 