<?php get_header(); ?>






<header class="entry-header">
    <div class="container">
        <div class="col-xs-12">
            <h1>Components</h1>
        </div>
    </div>
</header>

<div class="container">
    <div class="col-xs-12">
        <section class ="page">
            <?php


            while (have_posts()) : the_post();
                ?>

                <article>



                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <?php $description = get_post_meta($post->ID, "component_description", true);
                        if ($description){
                            echo $description;
                        }else{
                            echo "Description Unavailable!";
                        }
                    ?>


                </article>
                <?php

            endwhile;
            ?>

        </section>
    </div>
</div>



<?php get_footer(); ?> 