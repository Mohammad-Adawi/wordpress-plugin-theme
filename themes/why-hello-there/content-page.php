<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php whyhellothere_post_thumbnail(); ?>

    <?php
    if ( is_single() ) : 
      the_title( '<h1 class="entry-title page">', '</h1>' ); 
    else:
      the_title( '<h2 class="entry-title page"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>' );
    endif;
    ?>
    
    <div class="entry-content">
      <?php
      if ( is_search() ):
        the_excerpt();
      else: 
        the_content( __('Continue reading...','why-hello-there') ); 
        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'why-hello-there' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
        ) );
      endif; 
      ?>
    </div>

    <?php edit_post_link( __( 'Edit', 'why-hello-there' ), '<span class="edit-link">', '</span>' ); ?>

</article><!-- #post-## -->

