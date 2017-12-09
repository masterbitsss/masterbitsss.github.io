<?php
if(isset($_GET["id"])){
$mp3=str_replace(' ','_',$_GET["t"]);
$url=explode('https://',$_SERVER["QUERY_STRING"]);
$url='https://'.$url[1];
$head = get_headers($url, 1);
$url2=$head['Location'];
$head2 = get_headers($url2, 1);
$fp = fopen($url2, 'rb');
 header('Last-Modified:');
        header('ETag:');
        header('Content-Type: audio/mpeg');
        header('Accept-Ranges: bytes');
  
        header('Content-Description: File Transfer');
        header('Content-Transfer-Encoding: binary');
    header ("Content-Length: ".$head2['Content-Length']);
header('Content-Disposition: attachment; filename='.$mp3);
fpassthru($fp);

}