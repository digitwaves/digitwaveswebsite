<?php
get_header();
?>
<div class="masthead-section">
        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <header class="articles-header">
            <h1 class="articles-title"><?php single_cat_title(); ?></h1>
        </header>
        <?php
        $categories = get_categories(['orderby' => 'name', 'order' => 'ASC']);
        if ($categories) : ?>
            <div class="blog-categories">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">All Articles</a>
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

</div>
<div class="container2">
  
    <div id="blog-container" class="blog-category-grid">

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
            get_template_part('template-parts/blog-card');
        endwhile;
    else :
        echo '<p>No posts found in this category.</p>';
    endif;

    wp_reset_postdata();
    ?>

    </div>

    <div id="load-more-trigger"></div>
</div>
<?php get_footer(); ?>
