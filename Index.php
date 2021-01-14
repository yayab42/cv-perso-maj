<?php
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
session_start();
$id_session = session_id();
$dateActuelle = date('Y-m-d-H-i-s');
if (isset($_SESSION['countViewPage'])) {
    $_SESSION['countViewPage']++;
} else {
    $_SESSION['countViewPage']=0;
}
if (!isset($_SESSION['dateFirstVisit'])) {
    $_SESSION['dateFirstVisit'] = $dateActuelle;
}
require 'pages/header.php';

$routes=array(
    "index"=>'pages/index.php',
    "video"=>'pages/video.php',
    "hobby"=>'pages/hobby.php',
    "contact"=>'pages/contact.php',
    "404"=>'pages/404.php',
);
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (array_key_exists($page,$routes)){
    require $routes[$page];
    }
    else{
        require $routes['404'];
    }
} else {
    require $routes['index'];
}


require './pages/footer.php';
