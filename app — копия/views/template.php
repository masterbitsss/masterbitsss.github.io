<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $desc; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <meta property="og:site_name" content="<?php echo $_SERVER['HTTP_HOST'];?>">
    <meta property="og:image" content="http://<?php echo $_SERVER['HTTP_HOST'];?>/i/img/site_prw.png">
    <meta property="og:type" content="music.song">
    <meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'];?>/">
    <meta property="og:title" content="<?php echo $title; ?>">


</head>
<body>

<header id="fixedheader">
    <div id="fixedheader_x1">

        <a href="/" id="he-logo"><img src="/i/img/he-logo.png" alt="<?php echo $_SERVER['HTTP_HOST'];?>"></a>

        <form id="he-search">
            <div>
                <input type="text" name="song" value="" id="he-search-text"
                       placeholder="исполнитель, альбом или песня">
                <input type="submit" value="" id="he-search-submit">
            </div>
        </form>

    </div>
</header>

<div id="xx1">



            <?php include($content); ?>




</div>



<div id="fixplayer">
    <div id="fixplayer_x1">


        <div id="fixplayer-prok">

            <span id="fixplayer-prok-sk" style="width: 60%;"></span>
            <span id="fixplayer-prok-pr" style="width: 30%;"></span>

            <div id="fixplayer-time">
                <b>0:00</b>
                <em>0:00</em>
            </div>

            <div id="fixplayer-lcd">
                <div id="fixplayer-title"><span>
						<b>name</b>
						<i>&mdash;</i>
						<em>title</em>
					</span></div>
                <div id="fixplayer-notification">notification</div>
            </div>

        </div>

        <div id="fixplayer-foo">
            <a href="javascript:void(0);" id="fixplayer-b_back" class="no-ajax"></a>
            <a href="javascript:void(0);" id="fixplayer-b_play" class="js__on no-ajax"></a>
            <a href="javascript:void(0);" id="fixplayer-b_next" class="no-ajax"></a>
        </div>

        <a href="javascript:void(0);" title="сменить режим воспроизведения" id="fixplayer-pv"
           class="js__line no-ajax"></a>
        <a href="javascript:void(0);" id="fixplayer-sound" class="js__on no-ajax"></a>
        <div id="fixplayer-volume"><span id="fixplayer-volume-x" style="width: 80%;"></span></div>


    </div>
</div>
<link rel="stylesheet" href="/i/css/main.css">
<script src="/i/js/main.js"></script>
</body>
</html>