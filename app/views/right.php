<aside id="xbody-right">


                <span class="rt_share mod__motiv_text"><a class="rt_share-fb no-ajax" href="javascript:void(0);" title="Share &mdash; facebook"
                                                          onclick="window.open('//facebook.com/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'];?>/', '_blank', 'scrollbars=1, resizable=1, width=650, height=500'); return false;"></a>
                    <a class="rt_share-vk no-ajax" href="javascript:void(0);" title="Share &mdash; VK"
                       onclick="window.open('//vk.com/share.php?url=http://<?php echo $_SERVER['HTTP_HOST'];?>/', '_blank', 'scrollbars=1, resizable=1, width=650, height=500'); return false;"></a>
                    <a class="rt_share-tw no-ajax" href="javascript:void(0);" title="Share &mdash; twitter"
                       onclick="window.open('//twitter.com/share?url=http://<?php echo $_SERVER['HTTP_HOST'];?>/', '_blank', 'scrollbars=1, resizable=1, width=650, height=500'); return false;"></a>
                    <a class="rt_share-gp no-ajax" href="javascript:void(0);" title="Share &mdash; Google+"
                       onclick="window.open('//plus.google.com/share?url=http://<?php echo $_SERVER['HTTP_HOST'];?>/', '_blank', 'scrollbars=1, resizable=1, width=650, height=500'); return false;"></a>
                </span>


    <div class="sblock">
        <h3 class="sblock-title">Сейчас слушают</h3>
        <ul class="tags_block">
            <?php
            global $kol_zap;
            $zapros=unserialize( trim( file_get_contents("zapros.php") ) );
            $cz=(count($zapros)<$kol_zap)?count($zapros):$kol_zap;
            for($i=0;$i<$cz;$i++){
                if(isset($zapros[$i])) {
                    $zap = str_replace(' ','-',$zapros[$i]);
                    $name = my_mb_ucfirst($zapros[$i]);
                    if (strlen($zapros[$i]) < 2) continue;
                    echo <<<GGG
	<li><a href="/search/{$zap}/">{$name}</a></li>
GGG;
                }
            }
            ?>



        </ul>
    </div>
</aside>