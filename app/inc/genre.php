<?php

$action = urldecode($action);

require_once 'app/functions.php';

if($action =='1'){
    $q = 'Rock';
}elseif ($action=='2'){
    $q = 'Pop';
}elseif ($action=='3'){
    $q = 'Rap & Hip-Hop';
}elseif ($action=='10'){
    $q = 'Drum & Bass';
}elseif ($action=='8'){
    $q = 'Dubstep';
}elseif ($action=='5'){
    $q = 'House & Dance';
}elseif ($action=='4'){
    $q = 'Light music';
}elseif ($action=='15'){
    $q = 'Reggae';
}elseif ($action=='22'){
    $q = 'Electropop & Disco';
}elseif ($action=='14'){
    $q = 'Acoustic & Vocal';
}elseif ($action=='21'){
    $q = 'Alternative';
}elseif ($action=='6'){
    $q = 'Instrumental';
}elseif ($action=='7'){
    $q = 'Metal';
}elseif ($action=='11'){
    $q = 'Trance';
}elseif ($action=='16'){
    $q = 'Classical';
}else{
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    $title = 'Ошибка 404 - страница не найдена';
    $template = 'app/views/404.php';
    require_once 'app/views/template.php';
}

$title = 'Жанр ' . $q .' слушать все песни жанра '.$q;
$desc = 'Здесь можно быстро отыскать музыку по жанрам '.$q;
$keywords = 'Жанр, '.$q.', '.$_SERVER['HTTP_HOST'];

$content = 'app/views/genre.php';


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $page = $_GET['page'] ?? '1';
    $npage = $page +1;
    $limit = 50;
    $offset = $page * $limit - $limit;
}else{
    $npage = 2;
    $offset = 0;
    $norm_link = str_replace(' ','-','/genre/'.filtr($action).'/');
    if(urldecode($_SERVER['REQUEST_URI'])!=$norm_link){
        header("Location:$norm_link");
        die();
    }
}


$action = str_replace('-',' ',filtr(urldecode($action)));
$p = json_decode(get('method=popular&genre=' . $action . '&offset=' . $offset));

if($p->list>40){
    $npage = '/genre/'.$action.'/?page='.$npage;
}else{
    $npage = '';
}


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if(isset($_GET['page'])){
        ob_start();
        ?>

        <?php foreach ($p->list as $song): ?>
            <li <?php if($c==0){ echo 'class="first"'; } ?>>
                <div class="playlist-btn">
                    <a href="javascript:void(0);" class="playlist-play no-ajax"
                       data-url="http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo play($song);?>">(play)</a>
                    <a target="_blank" class="playlist-down no-ajax" href="<?php echo dwnl($song);?>">(download)</a>
                </div>

                <div class="playlist-right">

                    <span class="playlist-duration"><?php echo date("i:s",$song[5]); ?></span>
                </div>

                <div class="playlist-name">
                    <span class="playlist-name-artist"><?php echo link_search($song);?></span>
                    <span class="playlist-name-title"><em><?php echo $song[3];?></em></span>
                </div>
            </li>
            <?php $c++; ?>
        <?php endforeach; ?>
        <?php
        $content = ob_get_clean();
        ?>{"urlnext":<?php echo json_encode($npage); ?>,"content":<?php echo json_encode($content); ?>}<?php
    }else {
        ob_start();
        include($content);
        $content = ob_get_clean();
        ?>{"title":"Поиск <?php echo $action; ?>","search_query":"","xx1_content":<?php echo json_encode($content); ?>}<?php
    }
} else {
    require_once 'app/views/template.php';
}

