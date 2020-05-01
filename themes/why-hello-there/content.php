<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php whyhellothere_post_thumbnail(); ?>

    <?php if ( is_single() ): ?> 
      <div class="author-info">
        <?php 
          echo get_avatar( get_the_author_meta( 'ID' ), 90 ); 
          echo '<a class="name" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . get_the_author() . '</a>';
        ?>
      </div> 
    <?php endif; ?>

    <div class="content-wrapper">

      <div class="entry-meta">
        <span class="entry-category"><?php echo get_the_category_list(', '); ?></span>
        <span class="entry-date"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) )?>"><?php echo esc_html( get_the_date() )?></time></a></span>
        <span class="entry-comments"><?php echo comments_popup_link( 'No comments', ' 1 Comment', ' % Comments', 'meta-element comment-link', ' Comments Disabled' ); ?></span>
      </div>

      <?php
      if ( is_single() ) : 
        the_title( '<h1 class="entry-title">', '</h1>' ); 
      else:
        the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>' );
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

      <?php
      if ( is_single() ) the_tags( '<div class="entry-tags clearfix">', ' ', '</div>' ); 
      edit_post_link( __( 'Edit', 'why-hello-there' ), '<span class="edit-link">', '</span>' ); 
      ?>

    </div>

</article><!-- #post-## -->

