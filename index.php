<?php
//print_r($_SERVER);
//exit;
function load_view() {
    $view = trim(str_replace(dirname($_SERVER['SCRIPT_NAME']), '', array_shift(explode('?', $_SERVER['REQUEST_URI']))), '/');
    if (empty($view)) $view = 'index.html';
    $view = str_replace('.html', '.php', $view);
    if (file_exists('app/'.$view)) {
        ob_start();
        include 'app/'.$view;
        $view_content = ob_get_clean();
        if (empty($_REQUEST['_pjax'])) {
            include 'app/layout.php';
        } else {
            echo !empty($title) ? "<title>$title - pjax</title>\n" : '';
            echo $view_content;
        }
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        header('Status: 404 Not Found');
        exit("<h1>404 Not Found!</h1>");
    }
}

load_view();