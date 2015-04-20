<?php //

add_post_meta($id, 'Company', 'value');
add_post_meta($id, 'Year', 'value');
add_post_meta($id, 'Height', 'value');


function new_nav_menu_items($items) {
    $homelink = '<li class="home"><a href="' . home_url( '/' ) . '">' . __('Work') . '</a></li>';
    $items = $homelink . $items;
    return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );
add_filter( 'wp_list_pages', 'new_nav_menu_items' );

add_post_type_support( 'page', 'excerpt' );

add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));

//remove inline width and height added to images
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
	// Removes attached image sizes as well
	add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
    		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    		return $html;
	}

// thumbnail inclusion
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 180, 270 );
add_image_size( 'small-thumb', 180, 9999 );

// add google analytics to footer
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-10737615-2");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

// add a favicon to your 
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');

function display_images_in_list($prepend, $append) {

	if($images = get_posts(array(
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => -1, // show all
		'post_status'    => null,
		'exclude'		 => get_post_thumbnail_id(),
		'post_mime_type' => 'image',
                'orderby'        => 'menu_order',
                'order'           => 'ASC',
	))) {
		foreach($images as $image) {
			$imgSrc = wp_get_attachment_image_src( $image->ID, 'full' );
				$img = $imgSrc[0];
				echo $prepend.$img.$append;

		}
	}
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
  
  $labels = array(
    'name' => _x('Portfolio', 'Portfolio general name'),
    'singular_name' => _x('Portfolio', 'deail type singular name'),
    'add_new' => _x('Add New', 'portfolio post'),
    'add_new_item' => __('Add New portfolio post'),
    'edit_item' => __('Edit portfolio post'),
    'new_item' => __('New portfolio post'),
    'view_item' => __('View portfolio post'),
    'search_items' => __('Search portfolio'),
    'not_found' =>  __('Nothing found'),
    'not_found_in_trash' => __('Nothing found in Trash'),
    'parent_item_colon' => ''
  );
  
  $args = array(
    'labels' => $labels,
    'public' => true,
    /*'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,*/
    'rewrite' => array('slug' => 'portfolio'),
    /*'capability_type' => 'post',*/
    'hierarchical' => true,
    'menu_position' => 4,
    'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail', 'tags' ),
        'taxonomies' => array('post_tag', 'category')
  );
    
  register_post_type('portfolio', $args);
}

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

?>
