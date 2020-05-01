<?php
/**
 * Why Hello There Customizer functionality
 *
 * @package WordPress
 * @subpackage whyhellothere
 * @since Why Hello There 1.0
 */

/** Add Support for Custom Backgrounds & Headers */
add_theme_support( 'custom-background' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whyhellothere_customize_preview_js() {
	wp_enqueue_script( 'whyhellothere_customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'whyhellothere_customize_preview_js' );

/**
 * whyhellothere Options.
 */
function whyhellothere_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Accent/Link Color
	$wp_customize->add_setting( 'primary_color', array(
		'default' => '#d12424',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'       => __( 'Accent/Link Color', 'why-hello-there' ),
		'section'     => 'colors',
		'description' => __( 'The primary link/button color for the content area.', 'why-hello-there' )
	) ) );

	// Create social URL section
	
	$wp_customize->add_section( 'whyhellothere_social_urls' , array(
    'title'      => __('Social Urls','why-hello-there'),
    'priority'   => 85,
	) );

	// Facebook URL
	$wp_customize->add_setting( 'facebook_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', array(
		'label'       => __( 'Facebook Url', 'why-hello-there' ),
		'section'     => 'whyhellothere_social_urls',
	) ) );

	// Twitter URL
	$wp_customize->add_setting( 'twitter_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url', array(
		'label'       => __( 'Twitter Url', 'why-hello-there' ),
		'section'     => 'whyhellothere_social_urls',
	) ) );

 // Create Flexslider section
	
	$wp_customize->add_section( 'whyhellothere_slider_settings' , array(
    'title'      => __('Slider','why-hello-there'),
    'priority'   => 80,
	) );

	$wp_customize->add_setting( 'enable_slider', array(
		'default'           => false,
		'sanitize_callback' => 'whyhellothere_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'enable_slider', array(
		'label'       => __( 'Check to enable/disable slider', 'why-hello-there' ),
		'section'     => 'whyhellothere_slider_settings',
		'type'			  => 'checkbox'
	) );

}
add_action( 'customize_register', 'whyhellothere_customize_register' );

/* Sanitize Callbacks */

function whyhellothere_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/* Add New CSS  */

function whyhellothere_customize_css()
{
	?>
		<style type="text/css">

		<?php $primary_color = esc_html( get_theme_mod('primary_color', '#d12424') ); ?>

		.entry-category a, .entry-content a.more-link, .slider-caption .slider-read-more, article:after, #postscript a:hover { color: <?php echo $primary_color; ?> }
		.site-title,.right-sidebar .widget .heading, #footer, .search-form input[type="submit"]:hover, .page-numbers:hover, header .primary-navigation li ul li a:hover { background: <?php echo $primary_color; ?> }
		.right-sidebar .widget .heading:after { border-top-color: <?php echo $primary_color; ?> }
		.right-sidebar .widget ul li:hover { border-left-color: <?php echo $primary_color; ?> }

		</style>
	<?php
}
add_action( 'wp_head', 'whyhellothere_customize_css');