<?php get_header(); ?>

<main id="main-content">

    <div class="content-wrapper">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>

            <!-- BREADCRUMBS ABOVE IMAGE -->
            <div class="breadcrumbs">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span class="crumb-sep">›</span>
                <?php
                    $category = get_the_category();
                    if (!empty($category)) {
                        echo '<a href="' . get_category_link($category[0]->term_id) . '">' . esc_html($category[0]->name) . '</a>';
                    }
                ?>
                <span class="crumb-sep">›</span>
                <span class="current"><?php the_title(); ?></span>
            </div>

            <!-- FEATURED IMAGE -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- META ROW BELOW IMAGE -->
            <div class="post-meta-row">
                <span class="post-author">
                    <span class="dashicons dashicons-admin-users meta-icon"></span>
                    <span class="meta-text"><?php the_author(); ?></span>
                </span>

                <span class="post-date">
                    <span class="dashicons dashicons-calendar-alt meta-icon"></span>
                    <span class="meta-text"><?php echo get_the_date(); ?></span>
                </span>
            </div>

            <!-- TITLE BELOW META -->
            <h1 class="post-title"><?php the_title(); ?></h1>

            <!-- CONTENT -->
            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <!-- NEXT / PREV -->
            <div class="post-nav">
                <div class="post-prev">
                    <?php previous_post_link('%link', '← Previous Post'); ?>
                </div>
                <div class="post-next">
                    <?php next_post_link('%link', 'Next Post →'); ?>
                </div>
            </div>

        </article>

    <?php endwhile; endif; ?>

    </div>

</main>

<?php get_footer(); ?>
