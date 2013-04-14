<?php

// Convert hex codes to rgb

function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);	
	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		$rgb = array($r, $g, $b);
		return implode(",", $rgb);
	} elseif(strlen($hex) > 3) {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		$rgb = array($r, $g, $b);
		return implode(",", $rgb);
	} else {}
}

echo '<style>';
	
// Primary

if(get_option($dirname.'_primary_text_color') OR get_option($dirname.'_primary_font') OR get_option($dirname.'_primary_size')) {
	echo 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {
	color: '.get_option($dirname.'_primary_text_color').';	
	font-family: "'.get_option($dirname.'_primary_font').'";
	font-size: '.get_option($dirname.'_primary_size').'px;
	}';
}
	
if(get_option($dirname.'_primary_link_color')) {
	echo 'a, .ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a, .ui-tabs .ui-tabs-nav li.ui-state-hover a {color: '.get_option($dirname.'_primary_link_color').';}';
}

if(get_option($dirname.'_primary_link_hover_color')) {
	echo 'a:hover {color: '.get_option($dirname.'_primary_link_hover_color').';}';
}

if(get_option($dirname.'_primary_bg_color')) {
	echo '.padder, .widget, #footer, body.activity-permalink .activity-list {background-color: '.get_option($dirname.'_primary_bg_color').';}';
}	

if(get_option($dirname.'_primary_border_color')) {
	echo '.widget .widgettitle, .sc-divider, .author-info, .separate > div, .joint > div {border-color:'.get_option($dirname.'_primary_border_color').';}';
}	

// Secondary

if(get_option($dirname.'_secondary_bg_color')) {
	echo 'input, textarea, input[type="password"], .ui-tabs .ui-tabs-nav li.ui-tabs-active, .sc-tab-panel, #content .widget[class*="widget_bp_"] h3 {background-color: '.get_option($dirname.'_secondary_bg_color').'; border-color: '.get_option($dirname.'_secondary_bg_color').';}';
}

if(get_option($dirname.'_secondary_bg_hover_color')) {
	echo 'input:focus, textarea:focus, input[type="password"]:focus {background-color: '.get_option($dirname.'_secondary_bg_hover_color').'; border-color: '.get_option($dirname.'_secondary_bg_hover_color').';}';
}	


// Headings

if(get_option($dirname.'_heading_text_color') OR get_option($dirname.'_heading_font')) {
	echo 'h1, h2, h3, h4, h5, h6, .widget .widgettitle, {color: '.get_option($dirname.'_heading_text_color').'; font-family: "'.get_option($dirname.'_heading_font').'";}';
}	

if(get_option($dirname.'_heading1_size')) {
	echo 'h1 {font-size: '.get_option($dirname.'_heading1_size').'px;}';
}	

if(get_option($dirname.'_heading2_size')) {
	echo 'h2 {font-size: '.get_option($dirname.'_heading2_size').'px;}';
}
	
if(get_option($dirname.'_heading3_size')) {
	echo 'h3 {font-size: '.get_option($dirname.'_heading3_size').'px;}';
}
	
if(get_option($dirname.'_heading_link_color')) {				
	echo 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, #sidebar .menu li a {color: '.get_option($dirname.'_heading_link_color').';}';
}

if(get_option($dirname.'_heading_link_hover_color')) {
	echo 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, #sidebar .menu li a:hover {color: '.get_option($dirname.'_heading_link_hover_color').';}';
}	


// Header

if(get_option($dirname.'_header_bg_color')) {
	echo '#header {background-color: rgb('.hex2rgb(get_option($dirname.'_header_bg_color')).'); background-color: rgba('.hex2rgb(get_option($dirname.'_header_bg_color')).',0.8);}';
	echo '#nav .menu li a:hover, #nav .menu .sub-menu, #nav .menu li:hover > a {background-color: '.get_option($dirname.'_header_bg_color').';}';
}	

if(get_option($dirname.'_header_link_color')) {
	echo '#nav .menu li a, #nav .menu li a:hover, #nav .menu li:hover > a {color: '.get_option($dirname.'_header_link_color').';}';
	echo '#nav .menu .sub-menu li a {color: rgb('.hex2rgb(get_option($dirname.'_header_link_color')).'); color: rgba('.hex2rgb(get_option($dirname.'_header_link_color')).',0.8);}';
	echo '#nav .menu .sub-menu li a:hover {color: rgb('.hex2rgb(get_option($dirname.'_header_link_color')).'); color: rgba('.hex2rgb(get_option($dirname.'_header_link_color')).',1);}'; 
}


// Primary Buttons
	
if(get_option($dirname.'_primary_button_text_color')) {
	echo 'input[type="button"], input[type="submit"], input[type="reset"], button, .button {color: '.get_option($dirname.'_primary_button_text_color').';}';
}	
		
if(get_option($dirname.'_primary_button_bg_color')) {		
	echo 'input[type="button"], input[type="submit"], input[type="reset"], button, .button {background-color: '.get_option($dirname.'_primary_button_bg_color').'; border-color: '.get_option($dirname.'_primary_button_bg_color').';}';
}	

if(get_option($dirname.'_primary_button_bg_hover_color')) {
	echo 'input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:hover, .button:hover {background-color: '.get_option($dirname.'_primary_button_bg_hover_color').'; border-color: '.get_option($dirname.'_primary_button_bg_hover_color').'; color: '.get_option($dirname.'_primary_button_text_color').';}';
}	


// Secondary Buttons
	
if(get_option($dirname.'_secondary_button_text_color')) {
	echo '.login-button, .bp-wrapper .generic-button a,.bp-wrapper ul.button-nav li a,.bp-wrapper .item-list .activity-meta a,.bp-wrapper .item-list .acomment-options a,.bp-wrapper .activity-meta a:hover span,.widget .item-options a,.widget .swa-wrap ul#activity-filter-links a,.widget .swa-activity-list li.mini div.swa-activity-meta a,.widget .swa-activity-list div.swa-activity-meta a.acomment-reply,.widget .swa-activity-list div.swa-activity-meta a,.widget .swa-activity-list div.acomment-options a {color: '.get_option($dirname.'_secondary_button_text_color').';}';
}	
		
if(get_option($dirname.'_secondary_button_bg_color')) {		
	echo '.login-button, .bp-wrapper .generic-button a,.bp-wrapper ul.button-nav li a,.bp-wrapper .item-list .activity-meta a,.bp-wrapper .item-list .acomment-options a,.bp-wrapper .activity-meta a:hover span,.widget .item-options a,.widget .swa-wrap ul#activity-filter-links a,.widget .swa-activity-list li.mini div.swa-activity-meta a,.widget .swa-activity-list div.swa-activity-meta a.acomment-reply,.widget .swa-activity-list div.swa-activity-meta a,.widget .swa-activity-list div.acomment-options a {background-color: '.get_option($dirname.'_secondary_button_bg_color').'; border-color: '.get_option($dirname.'_secondary_button_bg_color').';}';
}	

if(get_option($dirname.'_secondary_button_bg_hover_color')) {
	echo '.login-button:hover, .bp-wrapper .generic-button a:hover,.bp-wrapper ul.button-nav li a:hover,.bp-wrapper .item-list .activity-meta a:hover,.bp-wrapper .item-list .acomment-options a:hover,.bp-wrapper .acomment-options a:hover,.bp-wrapper .activity-meta a span,.widget .item-options a:hover,.widget .item-options a.selected,.widget .swa-wrap ul#activity-filter-links a:hover,.widget .swa-activity-list div.swa-activity-meta a.acomment-reply:hover,.widget .swa-activity-list div.swa-activity-meta a:hover,.widget .swa-activity-list div.acomment-options a:hover {background-color: '.get_option($dirname.'_secondary_button_bg_hover_color').'; border-color: '.get_option($dirname.'_secondary_button_bg_hover_color').'; color: '.get_option($dirname.'_secondary_button_text_color').';}';
}	

	
// Icons

if(get_option($dirname.'_icon_color')) {
	echo '[class^="icon-"]::before, [class*=" icon-"]::before {color: '.get_option($dirname.'_icon_color').';}';
}	

if(get_option($dirname.'_icon_hover_color')) {
	echo '[class^="icon-"]:hover::before, [class*=" icon-"]:hover::before {color: '.get_option($dirname.'_icon_hover_color').' !important;}';
}
	
echo '</style>';

?>

<script>

/* Text Variables */

var rootFolder = "<?php echo get_template_directory_uri(); ?>";
var navigationText = "<?php _e('Navigation', 'gp_lang'); ?>";
var emptySearchText = "<?php _e('Please enter something in the search box!', 'gp_lang'); ?>";


/* Move Sidebars Responsively */

<?php if(get_option($dirname.'_responsive') == "0") { ?>

	jQuery(window).load(function(){
		moveSidebars();
		jQuery(window).resize(function() {
			moveSidebars();
		});	
	});
	
	function moveSidebars() {

		var windowWidth = jQuery(window).width();

		/* Small Computers/Tablets */
		if (windowWidth < 1024) {
			jQuery('#sidebar-right').prepend(jQuery('#sidebar-left'));
		} else {
			jQuery('#content-wrapper').prepend(jQuery('#sidebar-left'));
		}

		/* Mobiles */
		if (windowWidth < 600) {
			jQuery('#content-wrapper').append(jQuery('#sidebar-left'));
		}

	}

<?php } ?>


/* Retina Support */

<?php if(get_option($dirname."_retina") == "0") { ?>
	jQuery(document).ready(function(){
		if(window.devicePixelRatio >= 2){		
			jQuery('.post-thumbnail img').each(function() {
				jQuery(this).attr({src: jQuery(this).attr('data-rel')});
			});		
		}
	});
<?php } ?>

</script>