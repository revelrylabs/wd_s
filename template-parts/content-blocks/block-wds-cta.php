<?php
/**
 * The template used for displaying a CTA block.
 *
 * @package Harmonium
 */

// Set up fields.
$block_title = get_field( 'title' );
$text        = get_field( 'text' );
$alignment   = harmonium_get_block_alignment( $block );
$classes     = harmonium_get_block_classes( $block );

// Start a <container> with possible block options.
harmonium_display_block_options(
	array(
		'block'     => $block,
		'container' => 'aside', // Any HTML5 container: section, div, etc...
		'class'     => 'rev-Row content-block cta-block' . esc_attr( $alignment . $classes ), // Container class.
	)
);
?>
	<div class="rev-Row rev-Row--flex rev-Row--justifyCenter container display-flex align-center">
		<div class="rev-Col rev-Col--medium6 rev-Col--small12">
			<header>
				<?php if ( $block_title ) : ?>
					<h1 class="cta-title"><?php echo esc_html( $block_title ); ?></h1>
				<?php endif; ?>

				<?php if ( $text ) : ?>
					<h2 class="cta-text"><?php echo esc_html( $text ); ?></h2>
				<?php endif; ?>
			</header>

			<?php
			harmonium_display_link(
				array(
					'button' => true,
					'class'  => 'button-cta',
				)
			);
			?>
		</div><!-- end rev-Col -->
	</div>
</aside>
