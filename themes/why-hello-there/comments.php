<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">
  <h3 class="comments-title"><?php comments_number();?> on <?php printf('"' . get_the_title() . '"');?></h3>
  <ul class="comment-list">
    <?php wp_list_comments('avatar_size=60&callback=whyhellothere_comment'); ?>
  </ul>
  <?php paginate_comments_links() ?>
</div>
<?php endif; ?>

<div class="comment-form-wrapper">
  <?php comment_form(); ?>
</div>

