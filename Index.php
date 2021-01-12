<?php
require './pages/header.php';
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL | FILTER_SANITIZE_ENCODED);
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
