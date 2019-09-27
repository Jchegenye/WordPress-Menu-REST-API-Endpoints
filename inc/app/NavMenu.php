<?php
/**
 * Gets a nav menu
 * @author: Jackson Chegenye
 */

namespace jchegenye\lib\app;

class NavMenu{

 public function __construct($menu_name_or_id, $type = 'menu'){
    if($type == 'location') $menu_name_or_id = $this->getMenuIdFromLocation($menu_name_or_id);
    
    $this->menus = wp_get_nav_menu_items($menu_name_or_id);
 }

 /**
 * Gets the menu ID from the specified location
 *
 * @param $location
 *
 * @return mixed
 */
 public function getMenuIdFromLocation($location){
   $locations = get_theme_mod('nav_menu_locations');
   
   return $locations[$location];
 }


 /**
 * Callback function to get the menu by slug/id via the REST API
 *
 * @param \WP_REST_Request $request
 *
 * @return array|\WP_Error
 */
 public static function getMenuFromApi(\WP_REST_Request $request){
   $name_or_id = $request->get_param('name') ? $request->get_param('name') : (int) $request->get_param('id');
   $self = new self($name_or_id);
   
   return $self->menus;
 }


 /**
 * Callback function to get the menu by location via the REST API
 *
 * @param \WP_REST_Request $request
 *
 * @return array|\WP_Error
 */
 public static function getMenuByLocationFromApi(\WP_REST_Request $request){
    $location = $request->get_param('location');
    $self = new self($location, "location");
    
    return $self->menus;
 }

}
