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
    <div class="row featurette">
        <h2>Multi-Media Streaming for all purposes</h2>
        <p>
            Flare Media Player consists of front end and back end components, built to accomodate your streaming needs.
        </p>
    </div>
    <hr class="featurette-divider">
    
    <div class="row featurette">
        <h2>Solving the codec problems</h2>
        <p>
                Use client side pure javascript to decode media. Don't rely on native browser codecs.
            </p>
    </div>
    <hr class="featurette-divider">
    
    <div class="row featurette">
        <h2>Components</h2>
        <div class="col-xs-12 col-sm-6">
            <p>
                Check out the library of front-end and back-end components.
            </p>
        </div>
        
        <div class="col-xs-12 col-sm-6">
            <p>
                Try out some fully compiled Flare Media Players.
            </p>
        </div>
        
    </div>
    <hr class="featurette-divider">
    
    <div class="row featurette">
        <h2>Full Builds</h2>
        <div class="col-xs-12 col-sm-6">
            <p>
                Pre compiled - ready to use.
            </p>
        </div>
        
        <div class="col-xs-12 col-sm-6">
            <p>
                Try out some fully compiled Flare Media Players.
            </p>
        </div>
        
    </div>

    
</div>


<?php get_footer(); ?> 