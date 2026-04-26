<?php
get_header();
?>

<div class="articles-header container2">
    <?php get_template_part('template-parts/breadcrumbs'); ?>
    <h1 class="articles-title">Articles</h1>
</div>

<div id="blog-container" class="blog-grid">

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 8,
    'paged'          => $paged
]);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('template-parts/blog-card');
    endwhile;
endif;

wp_reset_postdata();
?>

</div>

<div id="load-more-trigger"></div>

<?php get_footer(); ?>
