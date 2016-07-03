# od-wordpress
MVC Parent theme for Wordpress by Occhio Design

## Installation
Download and add to your *wp-content/themes/* folder. Then add three folders to your child theme:
- */od/includes*
- */od/classes*
- */od/classes/control*

And get ready for the magic

## Including files or adding procedural code
### The old wordpress way
```
require('dependent-file.php');
```
Or worse: you'd be lazy and add the code to your main *functions.php* file
### The OD way
Just add a new file to your *od/includes* folder

## Creating a custom post type
### The old wordpress way
```
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
    	'menu_icon' => 'dashicons-cart'
    )
  );
}
```
### The OD way
```
class Product extends DirectoryObject 
{
	protected $label_name = 'Products';
	protected $args = array(
		'menu_icon' => 'dashicons-cart'
	);
}
```
