jQuery(function ($) {
    let page = 2;
    let loading = false;

    function loadMorePosts() {
        if (loading) return;
        loading = true;

        $.post(blog_ajax.ajax_url, {
            action: 'load_more_posts',
            page: page,
            category_id: blog_ajax.category_id || 0
        }, function (response) {
            if (response) {
                $('#blog-container').append(response);
                page++;
                loading = false;
            }
        });
    }

    $(window).on('scroll', function () {
        if ($(window).scrollTop() + $(window).height() >
            $('#load-more-trigger').offset().top - 300) {
            loadMorePosts();
        }
    });
});
