<?php get_header(); ?>

<section class="front-page-splash jumbotron">
    <div class="container">
        <h1>Flare Media Player</h1>
        <p>Multi Media Streaming Framework</p>
        
        <a class="jumbotron-callout" href="https://github.com/FlareMediaPlayer">
            <p>On Github!</p>
        </a>
    </div>
</section>

<div class="container">
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

</div>


<?php get_footer(); ?> 