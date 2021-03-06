<?php
//mimic the actuall admin-ajax
define('DOING_AJAX', true);

if (!isset( $_POST['action']))
	die('-1');

//make sure you update this line 
//to the relative location of the wp-load.php
require_once('../../../../../wp-load.php'); 

//Typical headers
header('Content-Type: text/html');
send_nosniff_header();

//Disable caching
header('Cache-Control: no-cache');
header('Pragma: no-cache');


$action = esc_attr(trim($_POST['action']));

//A bit of security
$allowed_actions = array(
	'get_awards',
	'get_news_release_audio'
);

if( in_array( $action, $allowed_actions ) ){
	if( is_user_logged_in() )
		do_action('wusm_ajax_'.$action);
	else
		do_action('wusm_ajax_nopriv_'.$action);
}
else{
	die('-1');
} 