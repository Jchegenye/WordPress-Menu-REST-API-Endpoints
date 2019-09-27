<?php
/**
* Plugin Name: WordPress Menu REST API Endpoints
* Description: Custom RESTful endpoints for WordPress menus
* Version: 1.0
* Author: Jackson Chegenye
* Author URI: https://www.jchegenye.me
**/

if(!defined('ABSPATH')) exit;

require_once(plugin_dir_path(__FILE__).'inc/app/NavMenu.php');

/**
 * Registers our api endpoints
 */
add_action('rest_api_init', function(){

 /**
 * Gets a single menu by ID
 */
 register_rest_route('wp/v1', '/menu/(?P<id>[\d]+)', [
    'methods' => ['GET'],
    'callback' => 'jchegenye\lib\app\NavMenu::getMenuFromApi',
 ]);

 /**
 * Gets a single menu by slug
 */
 register_rest_route('wp/v1', '/menu/(?P<name>[\w-_]+)', [
    'methods' => ['GET'],
    'callback' => 'jchegenye\lib\app\NavMenu::getMenuFromApi',
 ]);

 /**
 * Gets a single menu by its theme location
 */
 register_rest_route('wp/v1', '/menu/location/(?P<location>[\w-_]+)', [
    'methods' => ['GET'],
    'callback' => 'jchegenye\lib\app\NavMenu::getMenuByLocationFromApi',
 ]);

});