<section class="comentarios"><a name="comments" id="comments"></a>
<?php if ( have_comments() )  ?>

		<h3><?php comments_number (__('No hay comentarios', 'mowomo-base'), __('Hay un comentario', 'mowomo-base'), __('Hay % comentarios ', 'mowomo-base')); ?></h3>

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
								/* translators: 1: date, 2: time */
								printf( __('%1$s'), get_comment_date('d.m.Y'),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','' );
							?>
						</div><!--/.fecha-comentario-->


						<div class="autor-comentario">
							<?php printf(__('<cite class="fn">%s </cite> <span class="Dice"> says:</span>','mowomo-base'), get_comment_author_link()) ?>
						</div>
						</div>

				<?php if ($comment->comment_approved == '0') : ?>
						<em class="comment-awaiting-moderation"><?php _e('Tu comentario está a la espera de ser moderado.','mowomo-base') ?></em>
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

				<h3><?php comment_form_title( __('Deja un comentario','mowomo-base'), __('Deja un comentario para %s','mowomo-base' ) ); ?></h3>

				<div id="cancel-comment-reply">
					<small><?php cancel_comment_reply_link() ?></small>
				    <br />
				</div>

				<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p><?php printf(__('Necesitas <a href="%s">iniciar sesión</a> para comentar.','mowomo-base'), wp_login_url( get_permalink() )); ?></p>
				<?php else : ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="commentform">

				<?php if ( is_user_logged_in() ) : ?>

				<p><?php printf(__('Iniciada sesión como <a href="%1$s">%2$s</a>.','mowomo-base'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Salir'); ?>"><?php _e('Cerrar sesión&raquo;','mowomo-base'); ?></a></p>

				<?php else : ?>

				<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="<?php _e('Nombre (requerido)', 'mowomo-base'); ?>" required /></p>

				<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="<?php _e('Email (requerido)', 'mowomo-base'); ?>" required /></p>


				<!--<label for="url"><?php _e('Sitio Web'); ?></label>
				<p><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" tabindex="3" /></p>-->


				<?php endif; ?>

				<p><textarea name="comment" id="comment" tabindex="4" placeholder="<?php _e('Tu comentario (requerido)', 'mowomo-base'); ?>" required></textarea></p>

				<input type = "checkbox" required = ""> <?php _e( 'He leido y acepto la' , 'mowomo-base' ); ?> <a href="/privacy-policy/" target="_blank"> <?php _e( 'política de privacidad' , 'mowomo-base' ); ?> </a> <?php _e( 'de base.com' , 'mowomo-base' ); ?>

				<br><input type = "checkbox" required = ""> <?php _e( 'Acepto que los datos que he proporcionado (con la excepción del correo electrónico) se publicarán.' , 'mowomo-base' ); ?>

				<p><input name="submit" type="submit" id="submit" class="btn-accion" tabindex="5" value="<?php esc_attr_e('Enviar comentario','mowomo-base'); ?>" />
				<?php comment_id_fields(); ?>
				</p>
				<?php do_action('comment_form', $post->ID); ?>

				</form>
				<strong> <?php _e( '¿Qué hacemos con tus datos?' , 'mowomo-base' ); ?> </strong> </br>
				<?php _e( 'En base.com le pedimos su nombre y correo electrónico (no publicamos el correo electrónico) para identificarlo entre el resto de las personas que comentan en el blog.' , 'mowomo-base' ); ?>

				<?php endif; // If registration required and not logged in ?>
				</div>

				<?php endif; // if you delete this the sky will fall on your head ?>

				</div>

				</section>
	</section>
