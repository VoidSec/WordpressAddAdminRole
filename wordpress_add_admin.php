<?php
///////////////////////////////////////////////////////////////////////////////////////
// __      __   _     _  _____           
// \ \    / /  (_)   | |/ ____|          
//  \ \  / /__  _  __| | (___   ___  ___ 
//   \ \/ / _ \| |/ _` |\___ \ / _ \/ __|
//    \  / (_) | | (_| |____) |  __/ (__ 
//     \/ \___/|_|\__,_|_____/ \___|\___|
//
//           http://voidsec.com
///////////////////////////////////////////////////////////////////////////////////////
// ADD NEW ADMIN USER TO WORDPRESS
// ----------------------------------
// Put this file in your Wordpress root directory and run it from your browser.
// Delete it when you're done!
///////////////////////////////////////////////////////////////////////////////////////

require_once('wp-blog-header.php');
require_once('wp-includes/registration.php');

// CONFIG
$newusername = 'admin';
$newpassword = 'password';
$newemail = 'admin@admin.com';

// Make sure you set CONFIG variables
if ( $newpassword != 'admin' && $newemail != 'admin@admin.com' && $newusername !='password'  ) 
{
	// Check that user doesn't already exist
	if ( !username_exists($newusername) && !email_exists($newemail) ) 
	{
		// Create user and set role to administrator
		$user_id = wp_create_user( $newusername, $newpassword, $newemail);
		if ( is_int($user_id) )
		{
			$wp_user_object = new WP_User($user_id);
			$wp_user_object->set_role('administrator');
			echo 'Successfully created new admin user. <b><font color="red">Now delete this file!</font></b>';
		} 
		else {
			echo 'Error with wp_insert_user. No users were created.';
		}
	} 
	else {
		echo 'This user or email already exists. Nothing was done.';
	}
} 
else {
	echo "Whoops, looks like you didn't set a password, username, or email before running the script. Set these variables and try again.";
}

?>