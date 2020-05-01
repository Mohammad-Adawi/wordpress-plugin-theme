<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div class="main-content-inner">

		<h1 class="not-found-title"><?php _e( 'Whoops.  Looks like there\'s nothing here!', 'why-hello-there' ); ?></h1>

		<p><?php _e( 'Sorry, nothing was found at this location. I wonder what happened? Anyway, how about a search?', 'why-hello-there' ); ?></p>

		<?php get_search_form(); ?>

	</div>
</div><!-- #main-content" -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
