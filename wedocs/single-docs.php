<?php
$skip_sidebar = ( get_post_meta($post->ID, 'skip_sidebar', true) == 'yes' ) ? true : false;

get_header();
?>
<section class="page page-docs">
    <div class="container">

        <?php while (have_posts()) : the_post(); ?>

           

                <?php if (!$skip_sidebar) { ?>

                    <?php wedocs_get_template_part('docs', 'sidebar'); ?>

                <?php } ?>

                <div class="col-md-9 col-sm-12">
                    <?php wedocs_breadcrumbs(); ?>

                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        

                        <div class="entry-content">
                            <?php
                            the_content(sprintf(
                                            /* translators: %s: Name of current post. */
                                            wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'wedocs'), array('span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false)
                            ));

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Docs:', 'wedocs'),
                                'after' => '</div>',
                            ));

                            $tags_list = wedocs_get_the_doc_tags($post->ID, '', ', ');

                            if ($tags_list) {
                                printf('<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Tags', 'Used before tag names.', 'wedocs'), $tags_list
                                );
                            }
                            ?>
                        </div><!-- .entry-content -->

                        <?php wedocs_doc_nav(); ?>


                    </div><!-- #post-## -->
                </div><!-- .wedocs-single-content -->

        <?php endwhile; ?>


    </div><!-- .content-area -->
</section>
<?php get_footer(); ?>
