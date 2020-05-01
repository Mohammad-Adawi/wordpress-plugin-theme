<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div class="main-content-inner">

		<?php if ( have_posts() ) : ?> 

			<h1 class="archive-title">
				<?php printf( __( 'All posts by %s', 'why-hello-there' ), get_the_author() ); ?>
			</h1>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
			<?php endif; ?>

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
