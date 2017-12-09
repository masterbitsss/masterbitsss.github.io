<div id="xx2" class="rtform">
<?php include 'app/views/genres.php'; ?>
    <div id="xbody">
<aside id="xbody-left">
    <div class="xblock"><h1>ТОП ПЕСЕН</h1>
        <ul class="playlist">

            <?php foreach ($p->list as $song): ?>
                <li>
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

            <?php endforeach; ?>

        </ul>
    </div>
</aside>
        <?php include 'app/views/right.php'; ?>

    </div>
</div>


<?php include 'app/views/foot.php';