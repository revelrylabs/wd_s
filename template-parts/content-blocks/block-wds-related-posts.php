<?php
/**
 * The template used for displaying related posts.
 *
 * @package Harmonium
 */

// Set up fields.
$block_title   = get_field( 'title' );
$related_posts = get_field( 'related_posts' );
$alignment     = harmonium_get_block_alignment( $block );
$classes       = harmonium_get_block_classes( $block );

// Display section if we have any posts.
if ( $related_posts ) :

	// Start a <container> with possible block options.
	harmonium_display_block_options(
		array(
			'block'     => $block,
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'rev-Row rev-Row--flex rev-Row--justifyCenter content-block related-posts-block' . esc_attr( $alignment . $classes ), // Container class.
		)
	);
	?>

		<div class="rev-Row">
			<div class="rev-Col">
				<div class="container">
					<?php if ( $block_title ) : ?>
						<h2 class="content-block-title"><?php echo esc_html( $block_title ); ?></h2>
					<?php endif; ?>
				</div>

				<div class="container display-flex">

					<?php
					// Loop through recent posts.
					foreach ( $related_posts as $key => $post ) :// @codingStandardsIgnoreLine

						// Convert post object to post data.
						setup_postdata( $post );

						// Display a card.
						harmonium_display_card(
							array(
								'title' => get_the_title( $post ),
								'image' => wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'medium', false, array( 'card-image' ) ),
								'text'  => harmonium_get_the_excerpt(
									array(
										'length' => 20,
										'more'   => '...',
										'post'   => $post,
									)
								),
								'url'   => get_the_permalink( $post ),
								'class' => 'third',
							)
						);

					endforeach;
					wp_reset_postdata();
				?>
				</div>
			</div><!-- end rev-Col -->
		</div><!-- end rev-Row -->
	</section>
<?php elseif ( ! $related_posts && is_admin() ) : ?>
	<?php
	// Start a <container> with possible block options.
	harmonium_display_block_options(
		array(
			'block'     => $block,
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'rev-Row rev-Row--flex content-block related-posts-block' . esc_attr( $alignment . $classes ), // Container class.
		)
	);
	?>

		<div class="container">
			<?php if ( $block_title ) : ?>
				<h2 class="content-block-title"><?php echo esc_html( $block_title ); ?></h2>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
