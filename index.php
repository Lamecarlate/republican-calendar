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
require_once 'vendor/autoload.php';

// helpers
include(INC_PATH . DS . 'helpers.php');

$view = new View();

// Builds date, either current date or by GET input
$date = new DateTimeImmutable();
if (isset($_GET['date']) && preg_match('/^\d\d\d\d-\d\d-\d\d$/', $_GET['date'])) {
  $date = DateTimeImmutable::createFromFormat('Y-m-d', $_GET['date']);
}

$calendarFactory = new \Popy\RepublicanCalendar\Factory\CalendarFactory();
$republicanCalendar = $calendarFactory->buildRepublican();

$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::LONG);
$formatter->setPattern('d MMMM');

if($date) {
  $name =  $republicanCalendar->format($date, 'X');

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
