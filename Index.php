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
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if ($page == 'index') {
        require './pages/index.php';
    } elseif ($page == 'video') {
        require './pages/video.php';
    } elseif ($page == 'hobby') {
        require './pages/hobby.php';
    } elseif ($page == 'contact') {
        require './pages/contact.php';
    } else {
        require './pages/404.php';
    }

} else {
    require './pages/index.php';
}

require './pages/footer.php';
