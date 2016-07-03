<?php

/**
 * Extend Custom Post Type models to this class
 */
abstract class PostType extends Post {

	/**
	 * Required variables
	 */
	protected $post_type;
	protected $label_name;
	protected $label_name_singular;
	protected $args;
	
	/**
	 * Required method to register the custom post type
	 */
	protected function Register_PostType()
	{
		
		// set labels
		$label_name          =	$this->label_name;
		$label_name_singular =  $this->label_name_singular;
		$post_type           = 	$this->post_type;

		// default
		$label_name_lc          = mb_strtolower( $label_name );
		$label_name_singular_lc = mb_strtolower( $label_name_singular );
		

		// make complete $args array
		$args = array(
			// labels
			'label'               => __( $label_name_lc, 'od' ),
			'description'         => __( $label_name, 'od' ),
			'labels'              => array(
				'name'                => _x( $label_name, 'Post Type General Name', 'od' ),
				'singular_name'       => _x( $label_name_singular, 'Post Type Singular Name', 'od' ),
				'menu_name'           => __( $label_name, 'od' ),
				'parent_item_colon'   => __( 'Parent Item:', 'od' ),
				'all_items'           => __( 'All ' . $label_name_lc, 'od' ),
				'view_item'           => __( 'View ' . $label_name_singular_lc, 'od' ),
				'add_new_item'        => __( 'New ' . $label_name_singular_lc, 'od' ),
				'add_new'             => __( 'Add ' . $label_name_singular_lc, 'od' ),
				'edit_item'           => __( 'Edit ' . $label_name_singular_lc, 'od' ),
				'update_item'         => __( 'Update ' . $label_name_singular_lc, 'od' ),
				'search_items'        => __( 'Search ' . $label_name_singular_lc, 'od' ),
				'not_found'           => __( 'No ' . $label_name_lc . ' found', 'od' ),
				'not_found_in_trash'  => __( 'No ' . $label_name_lc . ' found in the trash', 'od' ),
			),
			// rewrite
			'rewrite'             => array(
				'slug'                => $post_type,
				'with_front'          => true,
				'pages'               => true,
				'feeds'               => false,
			),
			// options
			'supports'            => array( 'title','editor','thumbnail', 'author' ), 
			'taxonomies'          => array( ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => '10',
			'menu_icon'           => '',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		
		// combine arrays
		if(!is_array($this->args)) $this->args = array();
		$args = array_replace_recursive($args, $this->args);
		
		// register already!
		register_post_type( $post_type, $args );
	}
}