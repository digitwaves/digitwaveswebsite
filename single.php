<?php get_header(); ?>

<main id="main-content">

    <div class="content-wrapper">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $previous_post = get_previous_post();
        $next_post = get_next_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>

            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url()); ?>">Home</a>
                <span class="crumb-sep">&rsaquo;</span>
                <?php
                    $category = get_the_category();
                    if (!empty($category)) {
                        echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . esc_html($category[0]->name) . '</a>';
                    }
                ?>
                <span class="crumb-sep">&rsaquo;</span>
                <span class="current"><?php the_title(); ?></span>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="post-meta-row">
                <span class="post-author">
                    <span class="dashicons dashicons-admin-users meta-icon"></span>
                    <span class="meta-text"><?php the_author(); ?></span>
                </span>

                <span class="post-date">
                    <span class="dashicons dashicons-calendar-alt meta-icon"></span>
                    <span class="meta-text"><?php echo esc_html(get_the_date()); ?></span>
                </span>
            </div>

            <h1 class="post-title"><?php the_title(); ?></h1>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <?php if ($previous_post || $next_post) : ?>
                <div class="post-nav">
                    <?php if ($previous_post) : ?>
                        <a class="post-nav-card post-prev" href="<?php echo esc_url(get_permalink($previous_post)); ?>">
                            <span class="post-nav-label">&larr; Previous Post</span>
                            <span class="post-nav-title"><?php echo esc_html(get_the_title($previous_post)); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <a class="post-nav-card post-next" href="<?php echo esc_url(get_permalink($next_post)); ?>">
                            <span class="post-nav-label">Next Post &rarr;</span>
                            <span class="post-nav-title"><?php echo esc_html(get_the_title($next_post)); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </article>

    <?php endwhile; endif; ?>

    </div>

</main>

<?php get_footer(); ?>
