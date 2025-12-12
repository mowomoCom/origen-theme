<section class="comentarios"><a name="comments" id="comments"></a>
<?php if ( have_comments() )  ?>

		<h3><?php comments_number (__('No comments yet.', 'origen'), __('1 Comment', 'origen'), __('% Comments', 'origen')); ?></h3>

			<section class="listado-comentarios">

				<ul class="commentlist">
				<?php wp_list_comments('type=comment&callback=comentarios_blogalizate');

				function comentarios_blogalizate($comment, $args, $depth) {

					$GLOBALS['comment'] = $comment;
					extract($args, EXTR_SKIP);

					if ( 'div' == $args['style'] ) {
						$tag = 'div';
						$add_below = 'comment';
					} else {
						$tag = 'li';
						$add_below = 'div-comment';
					}
					?>
						<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
						<?php if ( 'div' != $args['style'] ) : ?>
						<div id="div-comment-<?php comment_ID() ?>" class="comment-body">

						<?php endif; ?>

						<div class="comment-author vcard">

							<div class="avatar-comentario"> <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['80'] ); ?></div>

						<div class="fecha-comentario">
							<?php
								/* translators: 1. date, 2. time */
								printf( __('%1$s %2$s', 'origen'), get_comment_date(__('d.m.Y', 'origen')),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)', 'origen'),'  ','' );
								?>
						</div><!--/.fecha-comentario-->


						<div class="autor-comentario">
							<?php
								/* translators: 1. comment author */
								printf(__('<cite class="fn">%s</cite> <span class="Dice">says:</span>','origen'), get_comment_author_link())
								?>
						</div>
						</div>

				<?php if ($comment->comment_approved == '0') : ?>
						<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','origen') ?></em>
						<br />
				<?php endif; ?>


						<div class="txt-comentario">
							<?php comment_text() ?>
				        </div>

						<div class="reply">
							<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

						</div>
						<?php if ( 'div' != $args['style'] ) : ?>
						</div>
						<?php endif; ?>
				<?php
				        }?>
				    </ul>


				<div class="formulario-comentarios">
				<?php if ( comments_open() ) : ?>

				<div id="respond">

				<h3>
					<?php 					
						comment_form_title( __('Leave a Reply','origen'),
						/* translators: 1: author of the comment being replied to */
						__('Leave a Reply to %s','origen' ) );
						?>
				</h3>

				<div id="cancel-comment-reply">
					<small><?php cancel_comment_reply_link() ?></small>
				    <br />
				</div>

				<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p>
					<?php
						/* translators: 1: login link */
						printf(__('<a href="%s">Log in</a> to leave a Comment.','origen'), wp_login_url( get_permalink() )); 
						?>
				</p>
				<?php else : ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="commentform">

				<?php if ( is_user_logged_in() ) : ?>

				<p><?php 
					/* translators: 1. user profile link, 2. username */
					printf(__('Logged in as <a href="%1$s">%2$s</a>.','origen'), get_edit_user_link(), $user_identity); 
					?> 
					<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out', 'origen'); ?>"><?php _e('Log out','origen'); ?></a></p>

				<?php else : ?>

				<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="<?php _e('Name (required)', 'origen'); ?>" required /></p>

				<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="<?php _e('Email (required)', 'origen'); ?>" required /></p>


				<!--<label for="url"><?php _e('Website', 'origen'); ?></label>
				<p><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" tabindex="3" /></p>-->


				<?php endif; ?>

				<p><textarea name="comment" id="comment" tabindex="4" placeholder="<?php _e('Your comment (required)', 'origen'); ?>" required></textarea></p>

				<input type="checkbox" required=""> 
					<?php
						/* translators: 1. site name 2. Privacy Policy */
						printf( _e( 'I have read and agree with the %1$s %2$s', 'origen' ), get_bloginfo( 'name' ), '<a href="/privacy-policy/" target="_blank">' . __('Privacy Policy', 'origen') . '</a>' );
						?>

				<br><input type="checkbox" required=""> <?php _e( 'I agree that the data I provided (except email) will be published.' , 'origen' ); ?>

				<p><input name="submit" type="submit" id="submit" class="btn-accion" tabindex="5" value="<?php esc_attr_e('Submit Comment','origen'); ?>" />
				<?php comment_id_fields(); ?>
				</p>
				<?php do_action('comment_form', $post->ID); ?>

				</form>
				<strong> <?php _e( 'What we do with your personal data', 'origen' ); ?> </strong> </br>
				<?php 
					/* translators: 1. site URL */
					printf( __( 'At %s we ask for your name and email (we do not publish the email) to identify you among the rest of the people who comment on the blog.' , 'origen' ), get_bloginfo('wpurl')); 
					?>

				<?php endif; // If registration required and not logged in ?>
				</div>

				<?php endif; // if you delete this the sky will fall on your head ?>

				</div>

				</section>
	</section>
