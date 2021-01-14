<?php
session_start();
$id_session = session_id();
$dateActuelle = date('Y-m-d-H-i-s');
$_SESSION['count'] = 0;
$countViewPage = $_SESSION['count'];
if ($_SESSION['count']!=0) {
    $_SESSION['count']++;
    $dateFirstVisit = "$dateActuelle";
}
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
require './pages/header.php';
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
session_destroy();