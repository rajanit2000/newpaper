<?php
 if ( post_password_required() )
	return;
?>

<div class="row">
    <div class="col-md-12">

	<?php if ( have_comments() ) : ?>
		 <h3 class="wip-comments-title">
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'newpaper' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>
	</div>
</div>
<div class="row">
		<ul class="comment-list col-md-12 newpaper-link list-unstyled">
		<?php
        wp_list_comments(); ?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'newpaper' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'newpaper' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'newpaper' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'newpaper' ); ?></p>
		<?php endif; ?>
   
	<?php endif; // have_comments() ?>
	<div class="col-md-12">
	    <div class="wip-link">
	    	<?php
	    	$newpaper_commenter = wp_get_current_commenter();
			$newpaper_req = get_option( 'require_name_email' );
			$newpaper_aria_req = ( $newpaper_req ? " aria-required='true'" : '' );
			
	    	$newpaper_fields =  array(

		  'author' =>
		    '<div class="form-group comment-form-author"><label for="author" class="col-sm-2 control-label">' . __( 'Name', 'newpaper' ) . 
		    ( $newpaper_req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		    ' <div class="col-sm-10"><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $newpaper_commenter['comment_author'] ) .
		    '" size="30"' . $newpaper_aria_req . ' /></div></div>',
		
		  'email' =>
		    '<div class="form-group comment-form-email"><label for="email" class="col-sm-2 control-label">' . __( 'Email', 'newpaper' ) . 
		    ( $newpaper_req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		    ' <div class="col-sm-10"><input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $newpaper_commenter['comment_author_email'] ) .
		    '" size="30"' . $newpaper_aria_req . ' /></div></div>',
		
		  'url' =>
		    '<div class="form-group comment-form-url"><label for="url" class="col-sm-2 control-label">' . __( 'Website', 'newpaper' ) . '</label>' .
		    ' <div class="col-sm-10"><input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $newpaper_commenter['comment_author_url'] ) .
		    '" size="30" /></div></div>',
		);
	    	$newpaper_comment_args = array(
			  'id_form'           => 'commentform',
			  'class_form'      => 'comment-form',
			  'id_submit'         => 'submit',
			  'class_submit'      => 'btn btn-default submit',
			  'name_submit'       => 'submit',
			  'title_reply'       => sprintf( "%s %s", esc_html__( 'Leave a Reply', 'newpaper' ), '<i class="fa fa-paper-plane"></i>'),
			  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'newpaper' ),
			  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'newpaper' ),
			  'label_submit'      => esc_html__( 'Post Comment', 'newpaper' ),
			  'format'            => 'xhtml',
			
			  'comment_field' =>  '<div class="form-group comment-form-comment"><label for="comment">' . __( 'Comment', 'newpaper' ) .
			    '</label><textarea id="comment" class="form-control" rows="5" name="comment" aria-required="true">' .
			    '</textarea></div>',

			  'fields' => apply_filters( 'comment_form_default_fields', $newpaper_fields ),
			);
	        
	        comment_form( $newpaper_comment_args ); ?>
        </div>
	</div>
</div>

</div>
