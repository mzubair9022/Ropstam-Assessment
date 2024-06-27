<?php get_header(); ?>

    <?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
        <header class="page-header alignwide">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header><!-- .page-header -->
    <?php endif; ?>

    <?php
    if ( have_posts() ) {

        while ( have_posts() ) {
            the_post();
        }


    } else {

        // If no content, include the "No posts found" template.
        get_template_part( 'template-parts/content/content-none' );

    }
    ?>


    <div class="hs-coffee-container">
        <h3>Task 6:- This is Random Coffee shortcode which is defined in main plugin file.</h3>
        <?php echo do_shortcode("[coffee_image]"); ?>
    </div>

<?php get_footer(); ?>