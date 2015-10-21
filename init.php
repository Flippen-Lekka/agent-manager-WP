<?php
/*
Plugin Name: Flippen Lekka Agent Manager
Description: This plugin was developed for Flippen Lekka™ Holdings
Version: 1.0
Author: Louis Cabano
Author URI: http://louiscabano.com
*/

//menu items
add_action('admin_menu','flippenlekka_agents_modifymenu');
function flippenlekka_agents_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Agents', //page title
	'Agents', //menu title
	'manage_options', //capabilities
	'flippenlekka_agents_list', //menu slug
	flippenlekka_agents_list //function
	);
	
	//this is a submenu
	add_submenu_page('flippenlekka_agents_list', //parent slug
	'Add New School', //page title
	'Add New', //menu title
	'manage_options', //capability
	'flippenlekka_agents_create', //menu slug
	'flippenlekka_agents_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update School', //page title
	'Update', //menu title
	'manage_options', //capability
	'flippenlekka_agents_update', //menu slug
	'flippenlekka_agents_update'); //function
}

add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

function toolbar_link_to_mypage( $wp_admin_bar ) {
 $args = array(
 'id' => 'my_page',
 'title' => 'My Page',
 'href' => 'http://mysite.com/my-page/'
 
 );
 $wp_admin_bar->add_node( $args );
}













//Shortcode

/*function flippenlekka_list_of_agents ($atts) {
    global $wpdb;
                                      
$rows = $wpdb->get_results("SELECT name, surname, email, phone from agents");
                                      
$output = "<table class=\'wp-list-table widefat fixed\'>";
$output .= "<tr><th>Name</th><th>Surname</th><th>&nbsp;</th></tr>";
foreach ($rows as $row ){
	$output .= "<tr>";
	$output .= "<td>$row->name</td>";
	$output .= "<td>$row->surname</td>";	
    $output .= "<td>$row->email</td>";	
    $output .= "<td>$row->phone</td>";	
	$output .= "<td><a href=\'\".admin_url(\'admin.php?page=flippenlekka_agents_update&id=\'.$row->id).\"\'>Edit Details</a></td>";
	$output .= "</tr>";}
$output .= "</table>";
    
    return = $output;

}

add_shotcode('list-agents', 'flippenlekka_list_of_agents');*/



define('ROOTDIR', plugin_dir_path(__FILE__));

require_once(ROOTDIR . 'agents-list.php');
require_once(ROOTDIR . 'agents-create.php');
require_once(ROOTDIR . 'agents-update.php');
?>