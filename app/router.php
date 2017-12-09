<?php
$routes = explode('/', $_SERVER['REQUEST_URI']);

if (!empty($routes[1]) && $routes[1] != 'main' && $routes[1] != 'router' && $routes[1] != '404') {

    $p = $routes[1];

    /* rules */

    if ($p == 'pop') {
        header("Location:/популярные-новинки/");
        die();
    }

    if (urldecode($p) == 'популярные-новинки') {
        $p = 'pop';
    }


    /*rules */

    if (!empty($routes[2])) {
        $action = $routes[2];
    }

    if (!empty($routes[3])) {
        $page = $routes[3];
    }

    (@include 'inc/' . $p . '.php') or include('inc/404.php');

} elseif (empty($routes[1])) {
    require_once 'inc/main.php';
} else {
    require_once 'inc/404.php';
}
