<?php
if(isset($_GET["id"]) && isset($_GET["hash"])){
$hash=$_GET["hash"];
$id=$_GET["id"];
require_once '../cfg.php';
    if(hash('sha256',$api_key.$_GET["id"].date("H",time()))==$hash or hash('sha256',$api_key.$_GET["id"].date("H",time()+3600))==$hash or hash('sha256',$api_key.$_GET["id"].date("H",time()-3600))==$hash){
$url='http://'.$api_url.'/api.php?method=get.audio&ids='.$id.'&key='.$api_key;
$url=@file_get_contents($url);
$url=json_decode($url,true);
$url=$url[0][2];
header("Location: $url");
        die();
}else{
header("Location: /");
        die();
}
}