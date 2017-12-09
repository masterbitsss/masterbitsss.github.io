<?php
require_once 'cfg.php';
if(isset($_GET["id"]) && isset($_SERVER['HTTP_REFERER'])){
$q=$_GET["id"];
$referer=str_replace(array('http://','/'),'',$_SERVER['HTTP_REFERER']);
if($referer==$_SERVER['HTTP_HOST']){
$l='http://api.xn--41a.ws/api.php?method=audio.getById&audios='.$q.'&key='.$api_xn41a_key.'&format=json';
$p=json_decode(file_get_contents($l),true);
$rel=$p['response'][0]['download'].'?i='.base64_encode(base64_encode($_SERVER['REMOTE_ADDR']));
header("Location: $rel");
}else{
header("Location: /#!/");
}
}