<?php 

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('DS', DIRECTORY_SEPARATOR);
define('BASE', __FILE__);
define('BASE_PATH', dirname(BASE) );
define('INC_PATH', BASE_PATH . DS . 'inc' );
define('MEDIA_PATH', BASE_PATH . DS .'media');
define('MEDIA_URL', 'media');
define('ASSETS_URL', 'assets');
define('DATA_PATH', BASE_PATH . DS . 'data');

// classes loading
spl_autoload_register(function ($class) {
  include INC_PATH . DS . $class . '.class.php';
});

// helpers
include(INC_PATH . DS . 'helpers.php');

$view = new View();

$date = '';
if(!empty($_GET) && !empty($_GET['month']) && !empty($_GET['day'])) {
  $month = intval($_GET['month']);
  $day = intval($_GET['day']);
  $date = $_GET['month'] . '/' . $_GET['day'];
}
$day = get_date($date);

if($day) {

  $republican_day = new Republican($day['month'], $day['day']);

  $name = $republican_day->republican_day_name;

  $view->views_variables['day_number'] = $republican_day->republican_day_number;
  $view->views_variables['month'] = $republican_day->republican_month;
  $view->views_variables['season'] = $republican_day->republican_season;

  $local_image = MEDIA_PATH . DS . $name . '.jpg';
  if(!file_exists($local_image)) {

    $WPAPI = new Wikipedia_API();

    $image_name = $WPAPI->get_main_picture_name($name);
    if($image_name) {
      $distant_image = $WPAPI->get_main_picture_file($image_name);
      download_file($distant_image, $local_image);
    }
    else {
      $error = new Error('NOIMAGE');
    }
  }
  
  $image_href = MEDIA_URL . '/' . $name . '.jpg';

}
else {
  $error = new Error('NODATE');
}

include('view.php');
