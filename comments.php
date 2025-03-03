<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="custom-comments-area">
        <h2 class="comments-title">
            Commentaire (<?php echo get_comments_number() ?>)
        </h2>
    <?php comment_form(array(
        'title_reply'       => __('', 'textdomain'),
        'label_submit'      => __('Post Comment', 'textdomain'),
        'comment_field'     => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun', 'textdomain') . '</label><textarea id="comment" name="comment" cols="45" rows="4" required></textarea></p>',
        'fields'            => apply_filters('comment_form_default_fields', array(
            'author' => '<p class="comment-form-author"><label for="author">' . __('Name', 'textdomain') . '</label><input id="author" name="author" type="text" required></p>',
            'email'  => '<p class="comment-form-email"><label for="email">' . __('Email', 'textdomain') . '</label><input id="email" name="email" type="email" required></p>',
        )),
    ));
    ?>
    <?php if (have_comments()) : ?>


        <ol class="custom-comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'custom_comment_template'
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'textdomain'); ?></p>
    <?php endif; ?>

</div>
