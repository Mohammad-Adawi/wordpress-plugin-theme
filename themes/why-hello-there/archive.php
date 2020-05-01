<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div class="main-content-inner">

		<?php if ( have_posts() ) : ?> 

			<h1 class="page-title">
				<?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'why-hello-there' ), get_the_date() );

					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'why-hello-there' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'why-hello-there' ) ) );

					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'why-hello-there' ), get_the_date( _x( 'Y', 'yearly archives date format', 'why-hello-there' ) ) );

					else :
						_e( 'Archives', 'why-hello-there' );

					endif;
				?>
			</h1>

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