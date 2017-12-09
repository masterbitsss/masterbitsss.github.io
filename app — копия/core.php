<?php
$start=microtime(true);
if(isset($_SERVER['HTTP_X_REAL_IP'])){ $_SERVER['REMOTE_ADDR']=$_SERVER['HTTP_X_REAL_IP']; }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ $_SERVER['REMOTE_ADDR']=$_SERVER['HTTP_X_FORWARDED_FOR']; }else{ $_SERVER['REMOTE_ADDR']=$_SERVER['REMOTE_ADDR']; }
$ip = $_SERVER['REMOTE_ADDR'];

if($_SERVER['HTTP_HOST']!=str_replace('www.','',$_SERVER['HTTP_HOST'])){
    $wwww='http://'.str_replace('www.','',$_SERVER['HTTP_HOST']).$_SERVER['REQUEST_URI'];
    header("Location:$wwww");
    die();
}

$bp = explode("\n",file_get_contents('blocked_pages.txt'));
if(in_array(urldecode($_SERVER['REQUEST_URI']),$bp)){
    include 'app/inc/404.php';
    die();
}

$bab = explode("\n",file_get_contents('blocked_abusers.txt'));
if(in_array(urldecode($ip),$bab)){
    include 'app/inc/404.php';
    die();
}

require_once 'cfg.php';
require_once 'router.php';
