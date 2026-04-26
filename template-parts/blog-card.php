<article <?php post_class('blog-card'); ?>>

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="blog-thumb">
            <?php the_post_thumbnail('medium'); ?>
        </a>
    <?php endif; ?>

    <div class="post-meta">
        <span class="author">
            Author: <?php the_author(); ?>
        </span>

        <span class="date">
            Date: <?php echo get_the_date(); ?>
        </span>
    </div>

    <h2 class="post-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

    <div class="post-excerpt">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
    </div>


</article>
