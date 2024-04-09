<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../config/database.php';
require_once '../app/controllers/UserController.php';

$request_uri = $_SERVER['REQUEST_URI'];
$route1 = parse_url($request_uri, PHP_URL_PATH);
$base_uri = '/mvc_crud';
$route = str_replace($base_uri, '', $route1);

$userController = new UserController();
switch ($route) {
case '/':
$userController->index();
break;

case '/display':
$userController->display();
break;

case '/insert':
$userController->insert();
break;
case '/inserted':
$userController->inserted();
break;

case '/edit':
$userController->edit();
break;
case '/edit_display':
$userController->edit_display();
break;
case '/edit_final':
$userController->edit_final();
break;

case '/delete':
$userController->delete();
break;
case '/deleted':
$userController->deleted();
break;

case '/about':
$userController->about();
break;

case '/contact':
$userController->contact();
break;


default:
// Handle 404 Not Found
http_response_code(404);
echo '404 Not Found';
break;
}
?>
