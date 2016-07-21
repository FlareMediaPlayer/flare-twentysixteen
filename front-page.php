<?php get_header(); ?>

<section class="front-page-splash jumbotron">
    <div class="container">
        <!--<h1>Flare Media Player</h1>-->
        <img class="splash-logo" src="<?php echo get_template_directory_uri(); ?>/img/flare-colored.png"/>
        <p>Multi Media Streaming Framework</p>

        <a href="http://www.github.com/flaremediaplayer" class="btn btn-flare-light" role="button">On Github</a>

    </div>
</section>

<div class="container">
    <div class="row featurette">
        <h2>Multi-Media Streaming for all purposes</h2>
        <div class="col-xs-12 col-sm-6">
            <p class="lead">
                Flare Media Player consists of front end and back end components, built to accomodate your streaming needs.
            </p>
            
            <p class="lead">
                The goal is to provide a unifying media streaming process that allows for content providers to efficiently upload, encode, and stream content depending on their system architechture.
            </p>
            
        </div>

        <div class="col-xs-12 col-sm-6">
            <i class="fa fa-rocket lg-icon" aria-hidden="true"></i>
            <div class="btn-outline">
                <a href="#" class="btn btn-flare">Getting Started</a>
            </div>
            
            
            
        </div>
    </div>
    <hr class="featurette-divider">

    <div class="row featurette">
        <h2>Solving the codec problems</h2>

        <div class="col-xs-12 col-sm-6">
            <p class="lead">
                Traditionally, media is decoded using browser implemented codecs. Installing support for new codecs or formats required installation of third party plugins like Adobe Flash, or Microsoft Sliverlight.
            </p>
            
            <p class="lead">
                By implementing the codecs on the client side in pure Javascript, end viewers do not need to download extra software to play a codec that is not supported by their browser.
            </p>
            
            <p class="lead">
                Further simplification can be done by converting any input file, to a single codec. For example, you application can convert audio files and prepare to stream them in AAC. 
            </p>
            
        </div>
        <div class="col-xs-12 col-sm-6">
            <img src="<?php echo get_template_directory_uri(); ?>/img/flare-digram1.png"/>
        </div>
        
    </div>
    <hr class="featurette-divider">

    <div class="row featurette">
        <h2>Components</h2>
        <div class="col-xs-12 col-sm-6">
            <img src="<?php echo get_template_directory_uri(); ?>/img/flare-example-player.png"/>
        </div>

        <div class="col-xs-12 col-sm-6">
            <p class="lead">
                Depending on your application's configuration, you may need different components to deliver content.
            </p>
            
            <p class="lead">
                Front and back-end components are separated into packages which can be joined with your custom logic. 
            </p>

            <div class="btn-outline">
                <a href="#" class="btn btn-flare">View Components</a>
            </div>
        </div>

    </div>
    <hr class="featurette-divider">

    <div class="row featurette">
        <h2>Full Builds</h2>
        <div class="col-xs-12 col-sm-6">
            <p class="lead">
                Don't need to develop an application from scratch? No problem, check out fully implemented Flare Media Players, and extend existing builds to meet your needs.
            </p>
            
            <p class="lead">
                Front end installation can be as simple as including a script, or require the module into your application.
            </p>
        </div>

        <div class="col-xs-12 col-sm-6">
 
            <pre class="code"><code >                     
&#x3C;!-- custom flare media player tag--&#x3E;
&lt;flaremediaplayer type=&quot;basic-player&quot;&gt;

    &#x3C;!-- Support common tags, or add custom support --&#x3E;
    &lt;source src=&quot;intro.ogg&quot;/&gt;

&lt;/flaremediaplayer&gt;

&#x3C;script src=&#x22;media-player.js&#x22;&#x3E;&#x3C;/script&#x3E;

            </code>
            </pre>
        </div>

    </div>


</div>


<?php get_footer(); ?> 