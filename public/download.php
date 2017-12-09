<?php
if(isset($_GET["id"]) && isset($_GET["hash"])){
    require_once '../app/functions.php';
$hash=$_GET["hash"];
$id=$_GET["id"];
require_once '../cfg.php';
if(hash('sha256',$api_key.$_GET["id"].date("H",time()))==$hash or hash('sha256',$api_key.$_GET["id"].date("H",time()+3600))==$hash or hash('sha256',$api_key.$_GET["id"].date("H",time()-3600))==$hash){
$url='http://'.$api_url.'/api.php?method=get.audio&ids='.$_GET["id"].'&key='.$api_key;
$resp=file_get_contents($url);

        $resp=json_decode($resp,true);

$name='?'.rus2translit(low_filtr(filtr($resp[0][4])).'_-_'.low_filtr(filtr($resp[0][3]))).'.mp3';
if(isset($resp[0][2]) && !empty($resp[0][2])) {
    $resp = str_ireplace('/vkp/', '/vkd/', $resp[0][2]) . $name;
    header("Location: $resp");
    die();
}else{

    echo $url;
    print_r($resp);

    //header("Location:/");
    die();
}
}else{
header("Location:/");
    die();
}
}