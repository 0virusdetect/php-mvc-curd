<?php 

require_once '../config/database.php';
require_once '../app/controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$parts = explode('/', $uri);
$firstPart = $parts[1]; 
$desiredLink = '/' . $firstPart;
$route1 = str_replace($desiredLink, '', $uri);

if($route1 == ''){
$route1=  $uri;
}

$userController = new UserController();
switch ($route1) {
case '/':
$userController->index();
break;
case '/index':
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
case '/signup':
$userController->signup();
break;
case '/signupinserted':
$userController->signupinserted();
break;
case '/check_username':
$userController->check_username();
break;
case '/check_email':
$userController->check_email();
break;
case '/login':
$userController->login();
break;
case '/login_check':
$userController->login_check();
break;
case '/admin':
$userController->admin();
break;
case '/logout':
$userController->logout();
break;

default:
// Handle 404 Not Found
http_response_code(404);
echo '404 Not Found';
break;
}