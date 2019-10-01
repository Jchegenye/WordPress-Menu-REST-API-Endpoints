# WordPress Menu REST API Endpoints
Custom RESTful endpoints for WordPress menus

## Usage

### Available Endpoints

* Get a single menu by ID
https://example.com/wp-json/wp/v1/menu/YOUT_MENU_ID

* Get a single menu by slug
https://example.com/wp-json/wp/v1/menu/YOUT_MENU_SLUG

* Get a single menu by its theme location
https://example.com/wp-json/wp/v1/menu/location/YOUT_MENU_THEME_LOCATION

### Example

```
/**
 * Fetch all Menu json data.
 * @param array $menu_type Theme Location name i.e primary etc.
 * @return array
 */
function menu_api_endpoint($menu_type = null){
 
	$url = get_site_url().'/wp-json/wp/v1/menu/location/YOUT_MENU_THEME_LOCATION;
	$body =  wp_remote_retrieve_body(wp_remote_get($url));
	$json = json_decode($body);
	
	return $json;
	//var_dump($json);

}

menu_api_endpoint('YOUT_MENU_THEME_LOCATION');
```
