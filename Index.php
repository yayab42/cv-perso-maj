<?php
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
    }

} else {
    require './pages/index.php';
}

require './pages/footer.php';
