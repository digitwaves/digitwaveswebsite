<?php
if(!function_exists('digitwaves_setup')):
	function digitwaves_setup(){
		register_nav_menus(array(
			'primary' => __('Primary Menu','digitwaves'),
			'bottom' => __('Footer Location','digitwaves')
		));

		    // Enable support for page templates
			add_theme_support('theme-options'); // optional, can help with modern themes

			// Enable menus
			add_theme_support('menus');

			
		// Enable featured images
		add_theme_support('post-thumbnails');

	
		// Enable title tag
		add_theme_support('title-tag');

		// Enable HTML5 support for proper markup
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script'
		));
	}
endif;
add_action('after_setup_theme','digitwaves_setup');
add_filter('excerpt_length', function () {
    return 25;
});
function digitwaves_stylesheets(){
	 wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        [],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

	wp_enqueue_script('jquery');

    wp_enqueue_script(
        'services-ai-refresh',
        get_template_directory_uri() . '/js/services-ai-refresh.js',
        [],
        filemtime(get_stylesheet_directory() . '/js/services-ai-refresh.js'),
        true
    );

    wp_enqueue_script(
        'infinite-scroll',
        get_template_directory_uri() . '/js/infinite-scroll.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script('infinite-scroll', 'blog_ajax', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts','digitwaves_stylesheets');

// AJAX handler
function load_more_posts() {
    $paged = intval($_POST['page']);

    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged
    ]);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            set_query_var('dw_is_featured_card', false);
            get_template_part('template-parts/blog-card');
        endwhile;
    endif;

    wp_die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
