<?php
session_start();
if (isset($_SESSION['countViewPage'])) {
    $_SESSION['countViewPage']++;
} else {
    $_SESSION['countViewPage'] = 0;
}
if (!isset($_SESSION['dateFirstVisit'])) {
    $_SESSION['dateFirstVisit'] =  date('Y-m-d-H-i-s');
}


$routes = array(
    "accueil" => 'pages/accueil.php',
    "video" => 'pages/video.php',
    "hobby" => 'pages/hobby.php',
    "contact" => 'pages/contact.php',
    "404" => 'pages/404.php',
);

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);



if (isset($page)) {
    if (array_key_exists($page, $routes)) {
        $route = $routes[$page];
    } else {
        header("HTTP/1.0 404 Not Found");
        $route = $routes['404'];
    }
} else {
    $route = $routes['index'];
}

require 'pages/header.php';
require $route;
require 'pages/footer.php';

