<nav class="breadcrumbs" aria-label="Breadcrumbs">
    <a href="<?php echo home_url(); ?>">Home</a>

    <?php if (is_home() || is_archive()) : ?>
        <span class="separator">&rsaquo;</span>
        <span>Articles</span>

    <?php elseif (is_single()) : ?>
        <span class="separator">&rsaquo;</span>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Articles</a>
        <span class="separator">&rsaquo;</span>
        <span><?php the_title(); ?></span>
    <?php endif; ?>
</nav>
