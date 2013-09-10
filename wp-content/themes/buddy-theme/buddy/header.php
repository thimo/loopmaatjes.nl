<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js">
<head>
<meta charset=<?php bloginfo('charset'); ?> />
<title><?php bloginfo('name'); ?> | <?php is_home() || is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php require(gp_inc . 'options.php'); ?>
<?php require(gp_inc . 'page-styling.php'); ?>
<?php if(get_option($dirname.'_responsive') == "0") { ?><meta name="viewport" content="width=device-width, initial-scale=1"><?php } ?>
<?php wp_head(); ?>
</head>

<!--[if !IE]><!-->
<body <?php body_class($gp_settings['browser'].' '.$gp_settings['layout']); ?>>
<!--<![endif]-->
<!--[if gt IE 8]>
<body <?php body_class('ie9 '.$gp_settings['browser'].' '.$gp_settings['layout']); ?>>
<![endif]-->
<!--[if lt IE 9]>
<body <?php body_class('ie8 '.$gp_settings['browser'].' '.$gp_settings['layout']); ?>>
<![endif]-->

<?php global $dirname; ?>


<?php if(!is_page_template('blank-page.php')) { ?>


	<!-- BEGIN PAGE WRAPPER-->
 
	<div id="page-wrapper">
 
 
		<!-- BEGIN HEADER -->
	
		<div id="header">
	
	
			<!-- BEGIN LOGO -->
		
			<<?php if($gp_settings['title'] == "Show") { ?>div<?php } else { ?>h1<?php } ?> id="logo" style="<?php if(get_option($dirname.'_logo_top')) { ?> margin-top: <?php echo get_option($dirname.'_logo_top'); ?>px;<?php } ?><?php if(get_option($dirname.'_logo_right')) { ?> margin-right: <?php echo get_option($dirname.'_logo_right'); ?>px;<?php } ?><?php if(get_option($dirname.'_logo_bottom')) { ?> margin-bottom: <?php echo get_option($dirname.'_logo_bottom'); ?>px;<?php } ?><?php if(get_option($dirname.'_logo_left')) { ?> margin-left: <?php echo get_option($dirname.'_logo_left'); ?>px;<?php } ?>">
			
				<span class="logo-details"><?php bloginfo('name'); ?> | <?php is_home() || is_front_page() ? bloginfo('description') : wp_title(''); ?></span>
			
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php if(get_option($dirname.'_logo')) { echo(get_option($dirname.'_logo')); } else { echo get_template_directory_uri(); ?>/lib/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" style="<?php if(get_option($dirname.'_logo_width')) { ?> width: <?php echo get_option($dirname.'_logo_width'); ?>px;<?php } ?><?php if(get_option($dirname.'_logo_height')) { ?> height: <?php echo get_option($dirname.'_logo_height'); ?>px;<?php } ?>" /></a>
			
			</<?php if($gp_settings['title'] == "Show") { ?>div<?php } else { ?>h1<?php } ?>>
		
			<!-- END LOGO -->	
									
			
			<!-- BEGIN NAV WRAPPER -->	
			
			<div id="nav">

			
				<!-- BEGIN NAV -->	
			
				<?php wp_nav_menu(array('theme_location' => 'main-nav', 'sort_column' => 'menu_order', 'container' => 'ul', 'fallback_cb' => 'null')); ?>
	
				<?php wp_nav_menu(array('theme_location' => 'main-nav', 'walker' => new gp_mobile_menu(), 'sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => 'null', 'items_wrap' => '<select>%3$s</select>')); ?>
			
				<!-- END NAV -->	
			
			
				<!-- BEGIN LOGIN/REGISTER -->
			
				<?php if(get_option($dirname."_bp_buttons") == "0" && function_exists('bp_is_active')) { ?>
				
					<div class="clear"></div>
							
					<div id="bp-buttons">
				
						<?php if(is_user_logged_in()) { ?>	
										
							<a href="<?php echo wp_logout_url(esc_url($_SERVER['REQUEST_URI'])); ?>" class="bp-button login-button"><?php _e('Logout', 'gp_lang'); ?></a>
	
						<?php } else { ?>
						
							<a href="<?php if(get_option($dirname."_login_url")) { echo get_option($dirname."_login_url"); } else { echo wp_login_url(); } ?>" class="bp-button login-button"><?php _e('Login', 'gp_lang'); ?></a>
						
							<?php if(bp_get_signup_allowed()) { ?><a href="<?php echo bp_get_signup_page(false); ?>" class="bp-button signup-button"><?php _e('Sign Up', 'gp_lang'); ?></a><?php } ?>
						
						<?php } ?>
				
					</div>
				
				<?php } ?>
			
				<!-- END LOGIN/REGISTER -->
		
		
			</div>
		
			<!-- END NAV -->
		
			
		</div>
	
		<!-- END HEADER -->
	
	
		<!-- BEGIN CONTENT WRAPPER -->
	
		<div id="content-wrapper">

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
	
	
			<?php get_sidebar('left'); ?>
			

<?php } ?>			