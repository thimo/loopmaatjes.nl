<?php

/////////////////////////////////////// Localisation ///////////////////////////////////////


load_theme_textdomain('gp_lang', get_template_directory() . '/languages');
$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if(is_readable($locale_file)) require_once($locale_file);


/////////////////////////////////////// Theme Information ///////////////////////////////////////


$themename = get_option('current_theme'); // Theme Name
$dirname = 'buddy'; // Directory Name


/////////////////////////////////////// File Directories ///////////////////////////////////////


define("gp", get_template_directory() . '/');
define("gp_inc", get_template_directory() . '/lib/inc/');
define("gp_scripts", get_template_directory() . '/lib/scripts/');
define("gp_admin", get_template_directory() . '/lib/admin/inc/');
define("gp_bp", get_template_directory() . '/buddypress/');


/////////////////////////////////////// Additional Functions ///////////////////////////////////////


// Main Theme Options
require_once(gp_admin . 'theme-options.php');
require(gp_inc . 'options.php');

// Meta Options
require_once(gp_admin . 'theme-meta-options.php');

// Other Options
if(is_admin()) { require_once(gp_admin . 'theme-other-options.php'); }

// Sidebars
require_once(gp_admin . 'theme-sidebars.php');

// Sidebars
require_once(gp_admin . 'theme-widgets.php');

// Shortcodes
require_once(gp_admin . 'theme-shortcodes.php');

// Custom Post Types
require_once(gp_admin . 'theme-post-types.php');

// Envato Toolkit (Auto Updater)
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(!is_plugin_active('envato-wordpress-toolkit-master/index.php') && is_admin()) { include_once (gp_admin . 'envato-wordpress-toolkit-master/index.php'); }

// TinyMCE
if(is_admin()) { require_once (gp_admin . 'tinymce/tinymce.php'); }

// WP Show IDs
if(is_admin()) { require_once(gp_admin . 'wp-show-ids/wp-show-ids.php'); }

// Import/Export Widgets
if(is_admin()) { require_once(gp_admin . 'widget-settings-importexport/widget-data.php'); }

// Auto Install
if(is_admin()) { require_once(gp_admin . 'theme-auto-install.php'); }

// Image Resizer
require_once(gp_scripts . 'aq_resizer/aq_resizer.php');

// BuddyPress Functions
if((function_exists('bp_is_active') OR function_exists('is_bbpress')) && file_exists(gp_bp.'functions-buddypress.php')) { require_once(gp_bp . 'functions-buddypress.php'); }



/////////////////////////////////////// Enqueue Styles ///////////////////////////////////////


function gp_enqueue_styles() { 
	if(!is_admin()){
	
		require(gp_inc . 'options.php'); global $post, $dirname;

		wp_enqueue_style('gp-reset', get_template_directory_uri().'/lib/css/reset.css');

		wp_enqueue_style('gp-style', get_stylesheet_uri());
		
		wp_enqueue_style('gp-font-awesome', get_template_directory_uri().'/lib/fonts/font-awesome/css/font-awesome.min.css');
				
		wp_enqueue_style('gp-font-awesome-social', get_template_directory_uri().'/lib/fonts/font-awesome/css/font-awesome-social.css');
		
		wp_enqueue_style('gp-prettyphoto', get_template_directory_uri().'/lib/scripts/prettyPhoto/css/prettyPhoto.css');
			
		if(get_option($dirname.'_responsive') == "0") wp_enqueue_style('gp-responsive', get_template_directory_uri().'/responsive.css');
		
		if(get_option($dirname.'_custom_stylesheet')) wp_enqueue_style('gp-style-theme-custom', get_template_directory_uri().'/'.get_option($dirname.'_custom_stylesheet'));
		
		if((is_single() OR is_page()) && get_post_meta($post->ID, '_'.$dirname.'_custom_stylesheet', true)) wp_enqueue_style('gp-style-page-custom', get_template_directory_uri().'/'.get_post_meta($post->ID, '_'.$dirname.'_custom_stylesheet', true));
	
	}
}
add_action('wp_enqueue_scripts', 'gp_enqueue_styles');


/////////////////////////////////////// Enqueue Scripts ///////////////////////////////////////


function gp_enqueue_scripts() { 
	if(!is_admin()){
	
		require(gp_inc . 'options.php'); global $post;

		wp_enqueue_script('gp-modernizr', get_template_directory_uri().'/lib/scripts/modernizr.js', array('jquery'), '', false);

		if(is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
	
		wp_enqueue_script('gp-jwplayer', get_template_directory_uri().'/lib/scripts/mediaplayer/jwplayer.js', '', '', false);	
		
		wp_enqueue_script('gp-swfobject', 'http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', '', '', true);			

		wp_enqueue_script('gp-back-to-top', get_template_directory_uri().'/lib/scripts/jquery.ui.totop.min.js', array('jquery'), '', true);
		
		wp_enqueue_script('gp-prettyphoto', get_template_directory_uri().'/lib/scripts/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), '', true);
												
		wp_register_script('gp-flexslider', get_template_directory_uri().'/lib/scripts/jquery.flexslider.js', array('jquery'), '', true);

		wp_register_script('gp-accordion-init', get_template_directory_uri().'/lib/scripts/jquery.accordion.init.js', array('jquery-ui-accordion'), '', true);

		wp_register_script('gp-contact-init', get_template_directory_uri().'/lib/scripts/jquery.contact.init.js', array('jquery'), '', true);
							
		wp_register_script('gp-tabs-init', get_template_directory_uri().'/lib/scripts/jquery.tabs.init.js', array('jquery-ui-tabs'), '', true);

		wp_register_script('gp-toggle-init', get_template_directory_uri().'/lib/scripts/jquery.toggle.init.js', array('jquery'), '', true);

		wp_enqueue_script('gp-custom-js', get_template_directory_uri().'/lib/scripts/custom.js', array('jquery'), '', true);
						
						
	}
}
add_action('wp_enqueue_scripts', 'gp_enqueue_scripts');


/////////////////////////////////////// WP Header Hooks ///////////////////////////////////////


function gp_wp_header() {
	
	require(gp_inc . 'options.php'); global $dirname;
		
    if(get_option($dirname.'_favicon_ico')) echo '<link rel="shortcut icon" href="'.get_option($dirname.'_favicon_ico').'" /><link rel="icon" href="'.get_option($dirname.'_favicon_ico').'" type="image/vnd.microsoft.icon" />';
    
    if(get_option($dirname.'_favicon_png')) echo '<link rel="icon" type="image/png" href="'.get_option($dirname.'_favicon_png').'" />';
    
    if(get_option($dirname.'_apple_icon')) echo '<link rel="apple-touch-icon" href="'.get_option($dirname.'_apple_icon').'" />';
   
   	if(get_option($dirname.'_custom_css')) echo '<style>'.stripslashes(get_option($dirname.'_custom_css')).'</style>';

	echo stripslashes(get_option($dirname.'_scripts'));

	require_once(gp_inc . 'style-settings.php');		
	
}
add_action('wp_head', 'gp_wp_header');


/////////////////////////////////////// Navigation Menus ///////////////////////////////////////


add_action('init', 'register_my_menus');
function register_my_menus() {
	register_nav_menus(array(
		'main-nav' => __('Main Navigation', 'gp_lang')
	));
}

/*************************************** Mobile Navigation Walker ***************************************/	

class gp_mobile_menu extends Walker_Nav_Menu {

	var $to_depth = -1;

    function start_lvl(&$output, $depth){
		$output .= '</option>';
    }

    function end_lvl(&$output, $depth){
		$indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
		$indent = ($depth) ? str_repeat("- ", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'mobile-menu-item-' . $item->ID;
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';
		$id = apply_filters('nav_menu_item_id', 'mobile-menu-item-'. $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
		$value = ' value="'. $item->url .'"';
		$output .= '<option'.$id.$value.$class_names.'>';
		$item_output = $args->before;
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$output .= $indent.$item_output;
    }

    function end_el(&$output, $item, $depth){
		if(substr($output, -9) != '</option>')
      		$output .= "</option>"; // replace closing </li> with the option tag
    }

}


/////////////////////////////////////// Theme Support ///////////////////////////////////////


// Featured images
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);

// Background customizer
add_theme_support('custom-background');

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Set the content width based on the theme's design and stylesheet.
if(!isset($content_width)) $content_width = 670;

// Add default posts and comments RSS feed links to <head>.
add_theme_support('automatic-feed-links');

// WooCommerce Support
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
	add_theme_support('woocommerce');
}

// BuddyPress Support
add_theme_support('buddypress');


/////////////////////////////////////// Excerpts ///////////////////////////////////////


// Character Length
function new_excerpt_length($length) {
	return 10000;
}
add_filter('excerpt_length', 'new_excerpt_length');

function excerpt($count, $ellipsis = '...') {
	$excerpt = get_the_excerpt();
	$excerpt = strip_tags($excerpt);
	if(function_exists('mb_strlen') && function_exists('mb_substr')) { 
		if(mb_strlen($excerpt) > $count) {
			$excerpt = mb_substr($excerpt, 0, $count).$ellipsis;
		}
	} else {
		if(strlen($excerpt) > $count) {
			$excerpt = substr($excerpt, 0, $count).$ellipsis;
		}	
	}
	return $excerpt;
}

// Replace Excerpt Ellipsis
function new_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Content More Text
function new_more_link($more_link, $more_link_text) {
	return str_replace('more-link', 'more-link read-more', $more_link);
}
add_filter('the_content_more_link', 'new_more_link', 10, 2);


/////////////////////////////////////// Add Excerpt Support To Pages ///////////////////////////////////////


add_action('init', 'my_add_excerpts_to_pages');
function my_add_excerpts_to_pages() {
     add_post_type_support('page', 'excerpt');
}


/////////////////////////////////////// Title Length ///////////////////////////////////////


function the_title_limit($count, $ellipsis = '...') {
	$title = the_title('','',FALSE);
	$title = strip_tags($title);
	if(function_exists('mb_strlen') && function_exists('mb_substr')) { 
		if(mb_strlen($title) > $count) {
			$title = mb_substr($title, 0, $count).$ellipsis;
		}
	} else {
		if(strlen($title) > $count) {
			$title = substr($title, 0, $count).$ellipsis;
		}	
	}
	return $title;
}


/////////////////////////////////////// Page Navigation ///////////////////////////////////////


function gp_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     
	 if (get_query_var('paged')) {
		 $paged = get_query_var('paged');
	 } elseif (get_query_var('page')) {
		 $paged = get_query_var('page');
	 } else {
		 $paged = 1;
	 }

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
	
     if(1 != $pages)
     {
        echo "<div class='clear'></div><div class='wp-pagenavi cat-navi'>";
		echo '<span class="pages">'.__('Page', 'gp_lang').' '.$paged.' '.__('of', 'gp_lang').' '.$pages.'</span>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}


/////////////////////////////////////// Shortcode Support For Text Widget ///////////////////////////////////////


add_filter('widget_text', 'do_shortcode');


/////////////////////////////////////// Shortcode Empty Paragraph Fix ///////////////////////////////////////


// Plugin URI: http://www.johannheyne.de/wordpress/shortcode-empty-paragraph-fix/
add_filter('the_content', 'shortcode_empty_paragraph_fix');
function shortcode_empty_paragraph_fix($content)
{   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']',
		']<br />' => ']'
	);

	$content = strtr($content, $array);

	return $content;
}


/////////////////////////////////////// TMG Plugin Activation ///////////////////////////////////////	


require_once(gp_admin . 'class-tgm-plugin-activation.php');

add_action('tgmpa_register', 'gp_register_required_plugins');

function gp_register_required_plugins() {

	$plugins = array(
				
		array(
			'name' => 'BuddyPress Community Stats',
			'slug' => 'buddypress-community-stats',
			'source' => get_stylesheet_directory() . '/lib/admin/inc/plugins/buddypress-community-stats.zip',
			'required' => false,
			'version' => '',
			'force_activation' => true,
			'force_deactivation' => false
		),
		
	);

	$theme_text_domain = 'gp_lang';

	$config = array(		
		'domain' => $theme_text_domain,
		'default_path' => '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug' => 'themes.php', // Default parent menu slug
		'parent_url_slug' => 'themes.php', // Default parent URL slug
		'menu' => 'install-required-plugins', // Menu slug
		'has_notices' => true, // Show admin notices or not
		'is_automatic' => true, // Automatically activate plugins after installation or not
		'message' => '', // Message to output right before the plugins table
	);

	tgmpa($plugins, $config);

}


?>