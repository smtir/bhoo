<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'cookingwp_';

	// Quote Format Post
	$meta_boxes[] = array(
		'id' => 'post-format-quote',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Quote Format Post' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'Qoute Text' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}qoute",
				'desc'  => __( 'Input Your Qoute Here' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'Qoute Author' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}qoute_author",
				'desc'  => __( 'Input Qoute Author' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	// Chat Format Post
	$meta_boxes[] = array(
		'id' => 'post-format-chat',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Chat Format Post' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'Chat Conversion' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}chat",
				'type' => 'wysiwyg',
				'raw'  => false,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => false,
					'media_buttons' => false,
				)
			)
			
		)
	);

	// Link Format Post
	$meta_boxes[] = array(
		'id' => 'post-format-link',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Link Format Post' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'Link URL' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}link",
				'desc'  => __( 'Input Your Link' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	// Audio Post Format
	$meta_boxes[] = array(
		'id' => 'post-format-audio',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Audio Post Format ' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'Audio Embed Code' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}audio",
				'desc'  => __( 'Input Your Audio Embed Code Here' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	// Status Format Post
	$meta_boxes[] = array(
		'id' => 'post-format-status',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Status Format Post' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'Status Embed' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}status",
				'desc'  => __( 'Input Facebook, Twitter etc status link' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	// Video Format Post
	$meta_boxes[] = array(
		'id' => 'post-format-video',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Video Format Post' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'Video Embed Code/ID' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}video",
				'desc'  => __( 'Input Your Vedio Embed Code/ID Here' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			),
			array(
				'name'     => __( 'Select Vedio Type' ),
				'id'       => "{$prefix}video_source",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'1' => __( 'Embed Code' ),
					'2' => __( 'YouTube' ),
					'3' => __( 'Vimeo' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
			),
			
		)
	);

	// Gallery Format Post
	$meta_boxes[] = array(
		'id' => 'post-format-gallery',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Gallery Format Post ' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => __( 'Gallery Image Upload' ),
				'id'               => "{$prefix}gallery_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 10,
			)			
		)
	);

	return $meta_boxes;
}