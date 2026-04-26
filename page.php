<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">
			<div class="container2x">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div><!--.container2-->
		</div><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();?>
