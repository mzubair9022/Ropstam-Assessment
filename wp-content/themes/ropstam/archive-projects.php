<?php
get_header();

// Task 4:- Archive Template for Post type Projects
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'projects', // Replace with your custom post type slug
    'posts_per_page' => 6,
    'paged'          => $paged,
);
$projects_query = new WP_Query($args);

if ($projects_query->have_posts()) : ?>
    <div id="projects-archive" class="projects-archive">
        <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
            <div class="project">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="project-content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p>No projects found</p>
<?php endif; ?>


<div class="pagination">
    <?php
    echo paginate_links(array(
        'total'     => $projects_query->max_num_pages,
        'current'   => max(1, get_query_var('paged')),
        'prev_text' => '&laquo; Previous',
        'next_text' => 'Next &raquo;',
    ));
    ?>
</div>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>