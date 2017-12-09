<?php
if(!isset($_GET["params"]["q"])){
if(isset($_GET["params"]["offset"])){
echo('{"response":[0]}');
}else{
echo file_get_contents('http://vk-music.download/core/data.php');
}
}else{
$q=$_GET["params"]["q"];
if(isset($_GET["params"]["offset"])){
$offset=$_GET["params"]["offset"];
$echo=file_get_contents('http://vk-music.download/core/data.php?method=tracks&params%5Bq%5D='.urlencode($q).'&params%5Blimit%5D=100&params%5Boffset%5D='.$offset.'&_='.time().'');
if($echo=='{"response":[111111]}'){
echo('{"response":[0]}');
}else{
echo($echo);
}
}else{
echo file_get_contents('http://vk-music.download/core/data.php?method=tracks&params%5Bq%5D='.urlencode($q).'&params%5Blimit%5D=100&_='.time().'');
}
}