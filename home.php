<?php
get_header();
?>

<div class="articles-shell">
    <section class="articles-hero container2x">
        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <div class="articles-hero-copy">
            <span class="articles-eyebrow">Insights, Build Notes, and Practical Systems</span>
            <h1 class="articles-title">Articles</h1>
            <p class="articles-intro">
                Practical writing on AI systems, automation, engineering workflows, implementation strategy,
                and the technical decisions behind smarter digital operations.
            </p>
        </div>
    </section>

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
        set_query_var('dw_is_featured_card', 0 === $query->current_post);
        get_template_part('template-parts/blog-card');
    endwhile;
endif;

wp_reset_postdata();
?>

    </div>

    <div id="load-more-trigger"></div>
</div>

<?php get_footer(); ?>
