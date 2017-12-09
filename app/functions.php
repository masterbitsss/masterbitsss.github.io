<?php

function query_write($q,$file='zapros.php'){
    global $kol_zap;
    $armar=array();
    $armar=unserialize( trim( @file_get_contents($file) ) );
    if(count($armar)<=1) $armar[3]="";
    @array_unshift($armar, $q);
    $armar = @array_unique($armar);
    if(count($armar)>$kol_zap) { $armar=array_chunk($armar, $kol_zap);  $armar=$armar[0];}
    $fff=fopen($file,'w'); flock($fff, LOCK_EX);
    fputs($fff,serialize($armar) );
    flock($fff, LOCK_UN);
    fclose($fff);
}

function my_mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

function low_filtr_song($q){
    $q=str_replace('-',' ',$q);
    $q=wordwrap($q,45,'!!');
    $q=explode('!!',$q);
    $q=str_replace(' ','-',$q[0]);
    return $q;
}


function rus2translit($string) {

    $converter = array(

        'а' => 'a',   'б' => 'b',   'в' => 'v',

        'г' => 'g',   'д' => 'd',   'е' => 'e',

        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

        'и' => 'i',   'й' => 'y',   'к' => 'k',

        'л' => 'l',   'м' => 'm',   'н' => 'n',

        'о' => 'o',   'п' => 'p',   'р' => 'r',

        'с' => 's',   'т' => 't',   'у' => 'u',

        'ф' => 'f',   'х' => 'h',   'ц' => 'c',

        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

        'ь' => '',  'ы' => 'y',   'ъ' => '',

        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',



        '50 Cent' =>'50 центов', 'А' => 'A',   'Б' => 'B',   'В' => 'V',

        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

        'И' => 'I',   'Й' => 'Y',   'К' => 'K',

        'Л' => 'L',   'М' => 'M',   'Н' => 'N',

        'О' => 'O',   'П' => 'P',   'Р' => 'R',

        'С' => 'S',   'Т' => 'T',   'У' => 'U',

        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',

        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

    );

    return strtr($string, $converter);

}
function low_filtr($q){
    $q=str_replace('-',' ',$q);
    $q=wordwrap($q,40,'!!');
    $q=explode('!!',$q);
    $q=str_replace(' ','-',$q[0]);
    return $q;
}




function filtr($q){
    $q = mb_strtolower($q, 'UTF-8');
    $q=str_replace(array('Ѻ','ø'),'o',$q);
    $q = html_entity_decode($q, ENT_QUOTES | ENT_XML1, 'UTF-8');
    $q = preg_replace('/[^a-zабвгдеёжзийклмнопрстуфхцчщшъыьэюя0-9 ]/', ' ', $q);
    $q=@iconv("UTF-8", "UTF-8//IGNORE", $q);
    $q=preg_replace('/\s+/', ' ', $q);
    return trim($q);
}

function get($request){
    global $api_key,$api_url;
    $url  = "http://".$api_url."/api.php?key=".$api_key."&".str_replace(' ','+',$request);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($ch);

}



function play($song){
    global $api_key;
    return '/public/play.php?id='.$song[1].'_'.$song[0].'&hash='.hash('sha256',$api_key.$song[1].'_'.$song[0].date("H",time()));
}

function dwnl($song){
    global $api_key;
    return '/public/download.php?id='.$song[1].'_'.$song[0].'&hash='.hash('sha256',$api_key.$song[1].'_'.$song[0].date("H",time()));
}


function link_search($song){
    $fartist = low_filtr(filtr($song[4]));
    if(!empty($fartist)) {

        if(is_numeric(substr($fartist, 0, 1))){
            $link_search = '<a target="_blank" href="/search/' . $fartist . '/">' . str_replace('"', '', $song[4]) . '</a>';

        }else{
            $link_search = '<a href="/search/' . $fartist . '/">' . str_replace('"', '', $song[4]) . '</a>';
        }
    }else{
        $link_search = str_replace('"', '', $song[4]);
    }
    return $link_search;
}



