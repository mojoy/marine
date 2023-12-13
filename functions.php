<?php


include 'core/forseo.php';



if ( function_exists("add_theme_support") ) {
	add_theme_support( 'admin-bar', array( 'callback'=>'__return_false' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails');
	add_theme_support( 'custom-background');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'admin-bar', array( 'callback'=>'__return_false' ) );
	add_theme_support( 'post-formats', array( 'standard','aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'  ) );

/*
	if ( function_exists( 'add_image_size' ) ) {
		//add_image_size( 'services-images-big', 1210,450, true);
		//add_image_size( 'add_photo_services', 800,525, true);
		//add_image_size( 'result-image-item', 280,180, true);
		add_image_size( 'doctor-item', 280,360, true);
		add_image_size( 'overview-images', 300,220, true);
		add_image_size( 'featured-images-big', 750,535, true);
		add_image_size( 'item-image-content', 950,560, true);
		add_image_size( 'coupons_images_big', 1200,625, true);
	}*/
}


function register_my_menus(){
	register_nav_menus(
		array(
			'main-nav'=>'main nav',
			'footer-nav'=>'footer nav',
		));
}

add_action('init','register_my_menus');
add_shortcode('template_url', 'theme_template_url');
add_filter('widget_text', 'do_shortcode');

// All JS scripts are connected at the end of the page

function footer_enqueue_scripts(){
	remove_action('wp_head','wp_print_scripts');
	remove_action('wp_head','wp_print_head_scripts',9);
	remove_action('wp_head','wp_enqueue_scripts',1);
	add_action('wp_footer','wp_print_scripts',5);
	add_action('wp_footer','wp_enqueue_scripts',5);
	add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');



## replace the active item with active
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}


function theme_template_url(){
	return get_bloginfo('template_url');
}
add_shortcode('template_url', 'theme_template_url');
add_filter('widget_text', 'do_shortcode');


## Completely Uninstall WP Version
## You also need to delete the readme.html file in the root of the site
remove_action('wp_head', 'wp_generator'); // from header
add_filter('the_generator', '__return_empty_string'); // from feeds and urls


## close the ability to publish via xmlrpc.php
add_filter('xmlrpc_enabled', '__return_false');


## picture quality
function my_prefix_regenerate_thumbnail_quality() {
	return 70;
}
add_filter( 'jpeg_quality', 'my_prefix_regenerate_thumbnail_quality');



## Removing widgets from WordPress dashboard
add_action('wp_dashboard_setup', 'clear_wp_dash' );
function clear_wp_dash(){
	$dash_side = &$GLOBALS['wp_meta_boxes']['dashboard']['side']['core'];
	$dash_normal = &$GLOBALS['wp_meta_boxes']['dashboard']['normal']['core'];

	unset($dash_side['dashboard_quick_press']);
	//unset($dash_side['dashboard_recent_drafts']);
	unset($dash_side['dashboard_primary']);
	unset($dash_side['dashboard_secondary']);

	unset($dash_normal['dashboard_incoming_links']);
	//unset($dash_normal['dashboard_right_now']);
	unset($dash_normal['dashboard_recent_comments']);
	unset($dash_normal['dashboard_plugins']);

	unset($dash_normal['dashboard_activity']);
}








register_post_type('section',
	array(
		'labels' => array(
			'name' => _x('section for home', 'post type general name'),
			'singular_name' => _x('section for home', 'post type singular name'),
			'add_new' => _x('add section', 'add'),
			'add_new_item' => __('add section'),
			'edit_item' => __('edit section'),
			'new_item' => __('new section'),
			'view_item' => __('see section'),
			'search_items' => __('search section'),
			'not_found' =>  __('Nothing found '),
			'not_found_in_trash' => __('not found in the basket'),
		),
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'_builtin'            => false,
		'_edit_link'          => 'post.php?post=%d',
		'query_var' => true,
		'show_in_quick_edit' => false,
		'show_admin_column' => false,
		//'permalink_epmask' => 'EP_NONE',
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-admin-home',
		//'taxonomies' => array('category','post_tag'),
		'supports' => array(
			'title',
			'editor',
			//'author',
			'thumbnail',
			'excerpt',
			'trackbacks',
			//'custom-fields',
			//'comments',
			'revisions',
			//'page-attributes',
			//'post-formats',
		),
	)
);




register_post_type('testimonials',
	array(
		'labels' => array(
			'name' => _x('testimonials', 'post type general name'),
			'singular_name' => _x('testimonials', 'post type singular name'),
			'add_new' => _x('add testimonials', 'add'),
			'add_new_item' => __('add testimonials'),
			'edit_item' => __('edit testimonials'),
			'new_item' => __('new testimonials'),
			'view_item' => __('see testimonials'),
			'search_items' => __('search testimonials'),
			'not_found' =>  __('Nothing found '),
			'not_found_in_trash' => __('not found in the basket'),
		),
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'_builtin'            => false,
		'_edit_link'          => 'post.php?post=%d',
		'query_var' => true,
		'show_in_quick_edit' => false,
		'show_admin_column' => false,
		//'permalink_epmask' => 'EP_NONE',
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-admin-home',
		//'taxonomies' => array('category','post_tag'),
		'supports' => array(
			'title',
			'editor',
			//'author',
			'thumbnail',
			'excerpt',
			'trackbacks',
			//'custom-fields',
			//'comments',
			'revisions',
			//'page-attributes',
			//'post-formats',
		),
	)
);


