<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register Breadcrumbs
require_once(get_template_directory().'/assets/functions/breadcrumbs.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/dsa-metaboxes.php');


/*
 * Possible solution for Single Event page 404 errors where the WP_Query has an attachment set
 * IMPORTANT: Flush permalinks after pasting this code: http://tri.be/support/documentation/troubleshooting-404-errors/
 * Updated to work with post 3.10 versions
 */
function tribe_attachment_404_fix () {
	if (class_exists('Tribe__Events__Main')) {
		remove_action( 'init', array( Tribe__Events__Main::instance(), 'init' ), 10 );
		add_action( 'init', array( Tribe__Events__Main::instance(), 'init' ), 1 );
	}
}

add_action( 'wp_head', 'community_add_css' );
function community_add_css() {
  if (tribe_is_community_edit_event_page() || tribe_is_community_my_events_page()) {
?>
<style>  
  .recurrence-row {display:none !important;}
</style>
<?php
	}
}

add_action( 'after_setup_theme', 'tribe_attachment_404_fix' );


/*****



// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 