<?php

/**
 * Custom page navigation template tag for archives, categories etc. 
 * Appears in index.php, archive.php, category.php, author.php
 */

function whyhellothere_page_nav() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	echo '<div class="pages-navigation clearfix">';
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );
	echo '</div>';
}

/**
 * Custom post navigation template tag for single posts & pages
 * Appears in content.php
 */

function whyhellothere_post_nav() {
  ?>
  <nav class="post-navigation clearfix"> 
  	<span class="post-nav-link previous-post">
			<?php previous_post_link('%link', '<span class="previous-post-label">' . __( 'Previous Post', 'why-hello-there' ) . '</span><br />%title' ); ?>
		</span>
		<span class="post-nav-link next-post">
			<?php next_post_link('%link', '<span class="next-post-label">' . __( 'Next Post', 'why-hello-there' ) . '</span><br />%title' ); ?>
		</span>
	</nav>
	<?php
}

/**
 * Custom post thumbnail template tag
 * Appears in content.php
 */

function whyhellothere_post_thumbnail() {

	global $post;
	$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

	if ( post_password_required() || ! has_post_thumbnail() ) {
		if ( ! is_single() && ! is_page() ) {
			echo '<div class="place-holder"><i class="fa fa-camera"></i></div>';
		} else
		return;
	}

  if ( ! is_singular() && has_post_thumbnail() ) {
  	echo '<div class="entry-image-thumb">';
		echo '<a href="' . get_permalink() . '">';
		echo get_the_post_thumbnail($post->ID, 'post-image-thumb',  array('class' => 'responsive'));
		echo '</a>';
		echo '</div>';
	} else   if ( is_singular() && has_post_thumbnail() ) {
		echo '<div class="entry-image">';
		echo '';
		echo get_the_post_thumbnail($post->ID, 'post-image',  array('class' => 'responsive'));
		echo '';
		echo '</div>';
	}
}

/**
 * Social Icons
 * Used in header.php, probably
 */

function whyhellothere_social_icon( $site ) {

  $url = get_theme_mod( $site . '_url' );

  if ( $url != NULL) {
    echo '<a class="social-icon" title="' . $site . '" href="' . esc_url( $url ) . '"><i class="fa fa-' . $site . '"></i></a>';
  } else {
  	return NULL;
  }
}

/** 
 * Flexslider template tag
 */

function whyhellothere_flexslider() {

	$enabled = get_theme_mod( 'enable_slider' );
	$stickies = get_option( 'sticky_posts' );
	$count = count( $stickies );

	$args = array(
	    'post__in' => $stickies,
	    'posts_per_page' => 10,
	    'post_type' => 'post',
	    'nopaging' => true
	    );

	$query = new WP_Query( $args );

	if ( $enabled ) {
		if ( $count > 0 ) : 
			echo '<div id="slider"><div class="slider-inner">';
			  echo '<div class="flexslider"><ul class="slides">';

		    	while ( $query->have_posts() ) : $query->the_post();
			      
			      echo '<li>';
			      
			      if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :
			        echo get_the_post_thumbnail( '', 'slider-image' );
			      endif;

		        echo '<div class="slider-caption">';
		            if ( get_the_title() != '' ) echo '<a href="'. get_permalink() .'"><h2 class="slider-title">'. get_the_title().'</h2></a>';
		            if ( get_the_excerpt() != '' ) echo '<div class="slider-excerpt">' . get_the_excerpt() .'</div>';
		            echo '<a class="slider-read-more href="'. get_permalink() .'">' . __( 'Read More...', 'why-hello-there' ) . '</a>';
		        echo '</div>';
		        echo '</li>';
	        endwhile;
			  echo '</ul></div>';
			echo '</div></div>';
		endif;
	}
}