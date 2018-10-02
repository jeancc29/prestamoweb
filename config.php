<?php

// Define DB Params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "jeancarlos29");
define("DB_NAME", "shareboard");

// Define URL
define("ROOT_PATH", "/./");
define("ROOT_URL", "https://prestamoweb.azurewebsites.net");

 function returnPageClass($page){
	$class = "";
	switch ($page) {
		case 'about':
			$class = 'page-about';
			break;
		case 'blog':
			$class = 'page-blog';
			break;
		case 'booking-cars-page':
			$class = 'page-post';
			break;
		case 'booking-cars':
			$class = 'page-post';
			break;
		case 'booking-cruise-page':
			$class = 'page-post';
			break;
		case 'booking-cruise':
			$class = 'page-post';
			break;
		case 'booking-flights-page':
			$class = 'page-post';
			break;
		case 'booking-flights':
			$class = 'page-post';
			break;
		case 'booking-hotel-page':
			$class = 'page-post';
			break;
		case 'booking-hotel':
			$class = 'page-post';
			break;
		case 'cars':
			$class = 'page-pages page-cars';
			break;
		case 'contacts':
			$class = ' page-contacts';
			break;
		case 'cruises':
			$class = 'page-pages page-cruises';
			break;
		case 'flights':
			$class = 'page-pages page-flights';
			break;
		case 'full-post':
			$class = 'page-post';
			break;
		case 'gallery':
			$class = 'page-gallery';
			break;
		case 'hotels':
			$class = 'page-pages page-hotels';
			break;
		case 'post':
			$class = 'page-post';
			break;
		case 'search-cars':
			$class = 'page-post';
			break;
		case 'search-cruise':
			$class = 'page-post';
			break;
		case 'search-flights':
			$class = 'page-post';
			break;
		case 'search-hotel':
			$class = 'page-post';
			break;

		default:
			$class = '';
			break;
	}

	return $class;
}




?>
