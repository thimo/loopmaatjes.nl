<?php
include 'wp-load.php';
function upgrade_the_database(){
		
	global $wpdb;
	
	$table_name_a = $wpdb->prefix . "postmeta";	
	$table_name_b = $wpdb->prefix . "posts";	
	
	$default_sidebar = ''; // Enter the ID of the default sidebar you want to update. In most cases this will be 'default', if this doesn't work view the Custom Fields section on your posts/pages and see what sidebar value is set for the field 'ghostpool_sidebar'. 
	
	$new_sidebar = ''; // Enter the ID of your custom sidebar between the quotation marks - you can find your sidebar IDs from Appearance > Sidebars.
	
	$post_type = 'post'; // Can use 'post' and 'page'.
	
	$sql = "UPDATE $table_name_a SET meta_value = replace(meta_value, '$default_sidebar', '$new_sidebar') WHERE post_id IN (SELECT ID FROM $table_name_b WHERE post_type = '$post_type')";
	
	mysql_query($sql);	
	
	echo "Sidebars updated.";	
		
}

upgrade_the_database();

?>