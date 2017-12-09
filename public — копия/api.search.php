<?php
if (isset($_POST["q"])) {
    require_once '../app/functions.php';
    $q = $_POST["q"];
    $q = str_replace('ё', 'е', $q);
    echo "/search/" . str_replace(' ', '-', filtr($q)) . "/";
}