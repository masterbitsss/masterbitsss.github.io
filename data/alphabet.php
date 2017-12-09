<?php
if(isset($_GET["id"])){
$id=$_GET["id"];
}else{
$id="";
}

if(!empty($id)){
$filename='txtbd/'.$id.'.h';

if (file_exists($filename)) {
    echo file_get_contents($filename);
} else {
    $hh=file_get_contents('http://vk-music.download/data/alphabet.php?id='.$id);
echo $hh;
file_put_contents($filename, $hh);
}
}