<?php
$is_featured = (bool) get_query_var('dw_is_featured_card', false);
$categories = get_the_category();
$primary_category = !empty($categories) ? $categories[0]->name : '';
?>

<article <?php post_class($is_featured ? 'blog-card blog-card-featured' : 'blog-card'); ?>>

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="blog-thumb">
            <?php the_post_thumbnail('large'); ?>
        </a>
    <?php endif; ?>

    <div class="post-card-body">
        <?php if ($primary_category) : ?>
            <div class="post-category"><?php echo esc_html($primary_category); ?></div>
        <?php endif; ?>

        <div class="post-meta">
            <span class="author">
                <?php the_author(); ?>
            </span>

            <time class="date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date()); ?>
            </time>
        </div>

        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="read-more">Read More &rarr;</a>
        </div>
    </div>

</article>
