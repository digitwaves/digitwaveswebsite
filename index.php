<?php get_header();?>	
<?php if(have_posts()):	
	while(have_posts()): the_post();	
		get_template_part( 'template-parts/content', get_post_format() );
		//the_content();
	endwhile;		  
endif;?>

<!--end content-->
<?php get_footer();?>				