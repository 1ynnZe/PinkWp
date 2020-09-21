<div class="comments">
<!-- https://developer.wordpress.org/reference/functions/wp_list_comments/ -->
    <h3>評論</h3>
    <?php $args = array(
    'walker'            => null,
    'max_depth'         => '',
    'style'             => 'ul',
    'callback'          => null,
    'end-callback'      => null,
    'type'              => 'all',
    'page'              => '',
    'per_page'          => '',
    'avatar_size'       => 80,
    'reverse_top_level' => null,
    'reverse_children'  => '',
    'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
    'short_ping'        => false,   // @since 3.6
    'echo'              => true     // boolean, default is true
); ?>
 <?php

   $comments_args = array(
    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
    '<input class="form-control"id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
           'label_submit'=>'確認送出',
             'title_reply'=>'<h5>來分享一下您的看法吧！</h5>',
            // 'comment_notes_after' => '<button type="submit" id="submit-new"><span>'.__('Post Comment').'</span></button>',
             'comment_field'=>'<p class="comment-form-comment"> <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>'
          
  );
  

    comment_form($comments_args);

  
   
    ?>
</div>