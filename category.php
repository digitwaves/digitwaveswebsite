<?php
get_header();

$current_category = get_queried_object();
?>
<div class="articles-shell category-shell">
    <section class="category-hero container2x">
        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <div class="category-hero-copy">
            <span class="articles-eyebrow">Topic Archive</span>
            <h1 class="category-title"><?php single_cat_title(); ?></h1>
            <?php if (!empty($current_category->description)) : ?>
                <p class="category-intro"><?php echo esc_html(wp_strip_all_tags($current_category->description)); ?></p>
            <?php else : ?>
                <p class="category-intro">Browse practical articles, walkthroughs, and implementation notes related to this topic.</p>
            <?php endif; ?>
        </div>

        <?php
        $categories = get_categories(['orderby' => 'name', 'order' => 'ASC']);
        if ($categories) : ?>
            <div class="blog-categories">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">All Articles</a>
                <?php foreach ($categories as $category) : ?>
                    <a class="<?php echo $category->term_id === get_queried_object_id() ? 'is-current' : ''; ?>" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
</section>
  
    <div id="blog-container" class="blog-grid blog-category-grid">

    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged,
        'cat' => get_queried_object_id(),
    ]);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            set_query_var('dw_is_featured_card', 0 === $query->current_post);
            get_template_part('template-parts/blog-card');
        endwhile;
    else :
        echo '<p class="category-empty">No posts found in this category.</p>';
    endif;

    wp_reset_postdata();
    ?>

    </div>

    <div id="load-more-trigger"></div>
</div>
<?php get_footer(); ?>
