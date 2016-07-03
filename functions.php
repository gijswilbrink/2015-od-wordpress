<?php
/**
 * @package WordPress
 * @subpackage WordPress Theme by Occhio Web Development
 */

if ( ! function_exists( 'theme_setup' ) ) {

	function theme_setup() {

		// include files in od/includes
		od_includes();

		// setup occhio framework
		Framework::Register();

		// add post thumbnail support
		add_theme_support( 'post-thumbnails' );

		// add css for editor
		add_editor_style( 'dist/css/app.css' );

		// add feed links
		add_theme_support( 'automatic-feed-links' );

		/*
			load textdomain od for theme translations
			usage: <?php echo __('Fill in your name', 'od'); ?>
		*/
		load_theme_textdomain('od', get_template_directory() . '/languages');

		// Display the XHTML generator that is generated on the wp_head hook, WP version
		remove_action( 'wp_head', 'wp_generator');
	}
}

if ( ! function_exists( 'od_includes' ) ) {
	/**
	 * Include all files in od/includes folder of parent and child theme
	 */
	function od_includes()
	{

	   // Array with incdirs.
	   $aIncDirs = array(
	   		get_stylesheet_directory() . '/od/includes', // child theme
	   		get_template_directory() . '/od/includes',   // parent theme
	   	);

		// include files in od/includes
		foreach($aIncDirs as $incDir) {
			foreach(scandir($incDir) as $file) {
				if(substr($file, 0, 1) !== '.' && strpos($file, '.php') !== false) require_once($incDir . '/' . $file);
			}
		}
	}
}

// run theme setup
add_action( 'after_setup_theme', 'theme_setup' );