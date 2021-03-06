<?php
/**
 * Customizer sections.
 *
 * @package Harmonium
 */

/**
 * Register the section sections.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function harmonium_customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'harmonium_additional_scripts_section',
		array(
			'title'    => esc_html__( 'Additional Scripts', 'harmonium' ),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'harmonium_social_links_section',
		array(
			'title'       => esc_html__( 'Social Media', 'harmonium' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'harmonium' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'harmonium_header_section',
		array(
			'title'    => esc_html__( 'Header Customizations', 'harmonium' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'harmonium_footer_section',
		array(
			'title'    => esc_html__( 'Footer Customizations', 'harmonium' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);
}
add_action( 'customize_register', 'harmonium_customize_sections' );
