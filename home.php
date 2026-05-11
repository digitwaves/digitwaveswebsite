<?php
get_header();
?>

<div class="articles-shell">
    <section class="articles-hero container2x">
        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <div class="articles-hero-copy">
            <span class="articles-eyebrow">Website Strategy, AI Answers, and Lead Flow</span>
            <h1 class="articles-title">Articles</h1>
            <p class="articles-intro">
                Articles from DigitWaves help local businesses make smarter website, AI customer answer,
                short-form content, and lead flow decisions without turning marketing into a bigger mess.
            </p>

        </div>
    </section>

    <div id="blog-container" class="blog-grid">

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if (1 === (int) $paged) :
?>
    <article class="blog-card blog-card-featured dw-articles-coming-soon">
        <div class="post-card-body">
            <span class="post-category">Articles</span>

            <div class="post-meta">
                <span class="author">DigitWaves</span>
                <span class="date">Coming Soon</span>
            </div>

            <h2 class="post-title">Articles Coming Soon</h2>

            <div class="post-excerpt">
                <p>
                    Practical posts on AI websites, web design, short-form content, lead flow,
                    and useful marketing systems for local businesses are on the way.
                </p>
            </div>
        </div>
    </article>
<?php
endif;

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
