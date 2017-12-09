<?php

$action = urldecode($action);

require_once 'app/functions.php';

$q = my_mb_ucfirst(str_replace('-',' ',$action));

$title = 'Поиск песни ' . $q .' - слушать онлайн или скачать mp3 бесплатно на '.$_SERVER['HTTP_HOST'];
$desc = 'Быстро найти песню '. $q .' прослушать онлайн или скачать мп3 музыку на сайте '.$_SERVER['HTTP_HOST'];
$keywords = 'Быстро, найти, поиск, скачать, мп3, бесплатно, слушать, онлайн, музыка, песни, mp3, '.$_SERVER['HTTP_HOST'].', '.$q;

$content = 'app/views/search.php';


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $page = $_GET['page'] ?? '1';
    $npage = $page +1;
    $limit = 50;
    $offset = $page * $limit - $limit;
}else{
    $npage = 2;
    $offset = 0;
    $norm_link = str_replace(' ','-','/search/'.filtr($action).'/');
    if(urldecode($_SERVER['REQUEST_URI'])!=$norm_link){
        header("Location:$norm_link");
        die();
    }
}


$action = str_replace('-',' ',filtr(urldecode($action)));
$p = json_decode(get('method=search&q=' . $action . '&offset=' . $offset));

if(count($p->list)==0){
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
}
if(count($p->list)>=2 && mb_strlen($action,"UTF-8")>=3){
    query_write(filtr($action));
}
if(count($p->list)>40){
    $npage = '/search/'.$action.'/?page='.$npage;
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

