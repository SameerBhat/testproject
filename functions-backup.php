<?php
/**
 * IBA functions and definitions
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */

load_theme_textdomain( 'iba' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );

require_once('wp-bootstrap-navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'iba' ),
    'header'  => __( 'Header menu', 'iba' ),
    'footer'  => __( 'Footer menu', 'iba' ),
) );

add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );
add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
) );
add_theme_support( 'custom-logo', array(
    'height'      => 248,
    'width'       => 248,
    'flex-height' => true,
) );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );
/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );
function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
});
</script>
<?php
}
add_theme_support( 'iba-widgets' );

/*
* Creating a function to create widget
*/
function iba_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'iba' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'iba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Member Sidebar', 'iba' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'iba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	
	register_sidebar( array(
        'name'          => __( 'Supplier Sidebar', 'iba' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'iba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Pages Sidebar', 'iba' ),
        'id'            => 'sidebar-4',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'iba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Post Sidebar', 'iba' ),
        'id'            => 'sidebar-5',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'iba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Extra Sidebar', 'iba' ),
        'id'            => 'sidebar-6',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'iba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'iba_theme_slug_widgets_init' );

/*
* Creating a function to create our slider
*/

function slider_iba() {
	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'iba' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'iba' ),
		'menu_name'           => __( 'Slider', 'iba' ),
		'parent_item_colon'   => __( 'Parent Slider', 'iba' ),
		'all_items'           => __( 'All Slider', 'iba' ),
		'view_item'           => __( 'View Slider', 'iba' ),
		'add_new_item'        => __( 'Add New Slider', 'iba' ),
		'add_new'             => __( 'Add New', 'iba' ),
		'edit_item'           => __( 'Edit Slider', 'iba' ),
		'update_item'         => __( 'Update Slider', 'iba' ),
		'search_items'        => __( 'Search Slider', 'iba' ),
		'not_found'           => __( 'Not Found', 'iba' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'iba' ),
	);
	$args = array(
		'label'               => __( 'Slider', 'iba' ),
		'description'         => __( 'Slider description and reviews', 'iba' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'          => array( 'genres' ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,

		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'taxonomies'          => array( 'category' ),
	);
	register_post_type( 'slider', $args );
}
add_action( 'init', 'slider_iba', 0 );


/*
* Creating a function to create our Logo
*/

function logo_post_type() {
	$labels = array(
		'name'                => _x( 'Logo', 'Post Type General Name', 'iba' ),
		'singular_name'       => _x( 'Logo', 'Post Type Singular Name', 'iba' ),
		'menu_name'           => __( 'Logo', 'iba' ),
		'parent_item_colon'   => __( 'Parent Logo', 'iba' ),
		'all_items'           => __( 'All Logo', 'iba' ),
		'view_item'           => __( 'View Logo', 'iba' ),
		'add_new_item'        => __( 'Add New Logo', 'iba' ),
		'add_new'             => __( 'Add New', 'iba' ),
		'edit_item'           => __( 'Edit Logo', 'iba' ),
		'update_item'         => __( 'Update Logo', 'iba' ),
		'search_items'        => __( 'Search Logo', 'iba' ),
		'not_found'           => __( 'Not Found', 'iba' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'iba' ),
	);
	$args = array(
		'label'               => __( 'Logo', 'iba' ),
		'description'         => __( 'Logo Name and reviews', 'iba' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'genres' ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,

		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'taxonomies'          => array( 'category' ),
	);
	register_post_type( 'logo', $args );
}


/*
* Creating a function to create our News
*/

function news_post_type() {
	$labels = array(
		'name'                => _x( 'News', 'Post Type General Name', 'iba' ),
		'singular_name'       => _x( 'News', 'Post Type Singular Name', 'iba' ),
		'menu_name'           => __( 'News', 'iba' ),
		'parent_item_colon'   => __( 'Parent News', 'iba' ),
		'all_items'           => __( 'All News', 'iba' ),
		'view_item'           => __( 'View News', 'iba' ),
		'add_new_item'        => __( 'Add New News', 'iba' ),
		'add_new'             => __( 'Add New', 'iba' ),
		'edit_item'           => __( 'Edit News', 'iba' ),
		'update_item'         => __( 'Update News', 'iba' ),
		'search_items'        => __( 'Search News', 'iba' ),
		'not_found'           => __( 'Not Found', 'iba' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'iba' ),
	);
	$args = array(
		'label'               => __( 'News', 'iba' ),
		'description'         => __( 'News news and reviews', 'iba' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor',  'author', 'thumbnail', ),
		'taxonomies'          => array( 'News' ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'news', $args );
}
add_action( 'init', 'news_post_type',4 );

/*
* Creating a function to create our Events
*/

function events_post_type() {
	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'iba' ),
		'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'iba' ),
		'menu_name'           => __( 'Events', 'iba' ),
		'parent_item_colon'   => __( 'Parent Events', 'iba' ),
		'all_items'           => __( 'All Events', 'iba' ),
		'view_item'           => __( 'View Events', 'iba' ),
		'add_new_item'        => __( 'Add New Events', 'iba' ),
		'add_new'             => __( 'Add New', 'iba' ),
		'edit_item'           => __( 'Edit Events', 'iba' ),
		'update_item'         => __( 'Update Events', 'iba' ),
		'search_items'        => __( 'Search Events', 'iba' ),
		'not_found'           => __( 'Not Found', 'iba' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'iba' ),
	);
	$args = array(
		'label'               => __( 'Events', 'iba' ),
		'description'         => __( 'Events news and reviews', 'iba' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author','comments', 'thumbnail', ),
		'taxonomies'          => array( 'Events' ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		//'taxonomies'          => array( 'category' ),
	);
	register_post_type( 'events', $args );
}
add_action( 'init', 'events_post_type',5 );


add_action( 'init', 'logo_post_type', 0 );

//extra user info in wp-admin
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function extra_user_profile_fields( $user ) {
?>
	<style type="text/css">
		.fh-profile-upload-options th,
		.fh-profile-upload-options td,
		.fh-profile-upload-options input {
			vertical-align: top;
		}

		.user-preview-image {
			display: block;
			height: auto;
			width: 300px;
		}

	</style>
  <h3><?php _e("Extra profile information", "blank"); ?></h3>
  <table class="form-table">
    <tr>
      <th><label for="company"><?php _e("Company"); ?></label></th>
      <td>
	  
        <input type="text" name="company" id="company" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'company', $user->ID ) ); ?>" /><br />
    </td>
    </tr>   
    <tr>
      <th><label for="job"><?php _e("Job"); ?></label></th>
      <td>
        <input type="text" name="job" id="job" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'job', $user->ID ) ); ?>" /><br />
    </td>
    </tr>    
    <tr>
      <th><label for="country"><?php _e("Country"); ?></label></th>
      <td>
        <input type="text" name="country" id="country" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'country', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
	<tr>
      <th><label for="address"><?php _e("Address"); ?></label></th>
      <td>
        <input type="text" name="address" id="address" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
    <tr>
      <th><label for="city"><?php _e("City"); ?></label></th>
      <td>
        <input type="text" name="city" id="city" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" /><br />
    </td>
    </tr>     
    <tr>
      <th><label for="phone"><?php _e("Phone"); ?></label></th>
      <td>
        <input type="text" name="phone" id="phone" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
	<tr>
      <th><label for="postalcode"><?php _e("Postalcode"); ?></label></th>
      <td>
        <input type="text" name="postalcode" id="postalcode" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'postalcode', $user->ID ) ); ?>" /><br />
    </td>
	</tr>
	<tr>
		<th><label for="image"><?php _e("Company Logo"); ?></label></th>
	<td>
		<img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>"><br />
		<input type="file" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" class="regular-text" /><br/>
		<input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />
	</td>
    </tr>
  </table>
  <script type="text/javascript">
(function( $ ) {
	$( '#uploadimage' ).on( 'click', function() {
		tb_show('test', 'media-upload.php?type=image&TB_iframe=1');

		window.send_to_editor = function( html ) 
		{
			imgurl = $( 'img',html ).attr( 'src' );
			$( '#image' ).val(imgurl);
			tb_remove();
		}
		return false;
	});
})(jQuery);
</script>
<?php
}

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
	}
	update_user_meta( $user_id, 'company', $_POST['company'] );
	update_user_meta( $user_id, 'job', $_POST['job'] );
	update_user_meta( $user_id, 'address', $_POST['address'] );
	update_user_meta( $user_id, 'city', $_POST['city'] );
	update_user_meta( $user_id, 'country', $_POST['country'] );
	update_user_meta( $user_id, 'phone', $_POST['phone'] );
	update_user_meta( $user_id, 'postalcode', $_POST['postalcode'] );
	update_user_meta( $user_id, 'image', $_POST[ 'image' ] );
}