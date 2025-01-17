<?php
/**
 * Block Styles & Variations
 *
 * Load the CSS, JS, and register custom styles.
 */

namespace WordPressdotorg\Theme\Parent_2021\Block_Styles;

defined( 'WPINC' ) || die();

const STYLE_HANDLE = 'wporg-parent-block-styles';

/**
 * Actions and filters.
 */
add_action( 'init', __NAMESPACE__ . '\setup_block_styles' );
add_filter( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_assets' );
add_filter( 'admin_enqueue_scripts', __NAMESPACE__ . '\register_assets' );
add_filter( 'should_load_separate_core_block_assets', '__return_false' );

/**
 * Add our custom block styles & class names.
 */
function setup_block_styles() {
	// Register the two-column class for Group, Post Content, and Columns — this will let each block use the
	// slightly-offset grid, though Columns works slightly differently in that it allows for content in the
	// first column (hence the different name).
	register_block_style(
		'core/group',
		array(
			'name'         => 'two-column-display',
			'label'        => __( 'Shifted Content', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/post-content',
		array(
			'name'         => 'two-column-display',
			'label'        => __( 'Shifted Content', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/columns',
		array(
			'name'         => 'two-column-display',
			'label'        => __( 'Left Heading', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'four-columns',
			'label'        => __( 'Four Columns', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'         => 'fill-on-dark',
			'label'        => __( 'Fill on dark', 'wporg' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'         => 'outline-on-dark',
			'label'        => __( 'Outline on dark', 'wporg' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'         => 'text',
			'label'        => __( 'Text', 'wporg' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'         => 'toggle',
			'label'        => __( 'Toggle', 'wporg' ),
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'         => 'features',
			'label'        => __( 'Features', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'         => 'links-list',
			'label'        => __( 'Links', 'wporg' ),
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'serif',
			'label'        => __( 'Serif', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'short-text',
			'label'        => __( 'Short text', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'with-arrow',
			'label'        => __( 'Link & Arrow', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/navigation',
		array(
			'name'         => 'dots',
			'label'        => __( 'Dots', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'brush-stroke',
			'label'        => __( 'Brush Stroke', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'         => 'list-long-items',
			'label'        => __( 'Long items', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/navigation',
		array(
			'name'         => 'dropdown-on-mobile',
			'label'        => __( 'Dropdown on Mobile', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/search',
		array(
			'name'         => 'on-dark',
			'label'        => __( 'On dark', 'wporg' ),
			'style_handle' => STYLE_HANDLE,
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'cards-grid',
			'label'        => __( 'Cards Grid', 'wporg' ),
		)
	);

	register_block_style(
		'core/table',
		array(
			'name'         => 'borderless',
			'label'        => __( 'Borderless', 'wporg' ),
		)
	);
}

/**
 * Add our custom block style assets — CSS for the layout, and JS to register
 * block variations & add custom styles.
 */
function register_assets() {
	wp_register_style(
		STYLE_HANDLE,
		get_template_directory_uri() . '/build/block-styles.css',
		array(),
		filemtime( dirname( __DIR__ ) . '/build/block-styles.css' )
	);
	wp_style_add_data( STYLE_HANDLE, 'rtl', 'replace' );

	if ( is_admin() ) {
		wp_enqueue_script(
			'wporg-parent-block-tweaks',
			get_template_directory_uri() . '/js/blocks.js',
			array( 'wp-blocks', 'wp-hooks', 'wp-i18n' ),
			filemtime( dirname( __DIR__ ) . '/js/blocks.js' )
		);
	}
}
