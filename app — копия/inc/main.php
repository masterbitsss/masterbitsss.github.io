<?php
$title = 'Поиск mp3 музыки - слушать песни онлайн или скачать мп3 бесплатно на '.$_SERVER['HTTP_HOST'];
$desc = 'Онлайн поисковик музыки - быстро скачать мп3 песни или слушать mp3 бесплатно на '.$_SERVER['HTTP_HOST'];
$keywords = 'Скачать, мп3, онлайн, песни, музыка, бесплатно, mp3, '.$_SERVER['HTTP_HOST'];
$content = 'app/views/main.php';


require_once 'app/functions.php';

$p = json_decode(get('method=search&q= '));


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    ob_start();
    include($content);
    $content = ob_get_clean();
    ?>{"title":"Главная","search_query":"","xx1_content":<?php echo json_encode($content); ?>}<?php
} else {
    require_once 'app/views/template.php';
}
