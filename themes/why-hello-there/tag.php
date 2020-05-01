<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div class="main-content-inner">

		<?php if ( have_posts() ) : ?> 

				<h1 class="archive-title">
					<?php printf( __( 'Tagged in: %s', 'why-hello-there' ), single_tag_title( '', false ) ); ?>
				</h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>

			<?php while ( have_posts() ) : the_post(); 
	  
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
