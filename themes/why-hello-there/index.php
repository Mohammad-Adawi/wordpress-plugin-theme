<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div class="main-content-inner">

    <?php   
		  if ( is_front_page() && !is_paged() ): 
	      whyhellothere_flexslider();
	    endif;
    ?>	

		<?php if ( have_posts() ) : 

			while ( have_posts() ) : the_post(); 
	  
	  		get_template_part('content', get_post_format()); 

	  		if ( comments_open() ) comments_template(); 

	  	endwhile; else: 
		  	_e('No posts were found. Sorry!', 'why-hello-there'); 
		 	endif; 

		 	whyhellothere_page_nav(); ?>
	</div>
</div><!-- #main-content" -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>