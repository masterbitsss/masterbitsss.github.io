<footer id="footer">
    <div id="footer_x1">

        <ul class="foo-menu">
            <li><a href="/">Главная</a></li>

            <li><a href="/dmca/">DMCA Abuse / Правообладателям</a></li>

            <li><a href="/feedback/">Feedback</a></li>
        </ul>

        <div id="foo-copyright">&copy;  <?php echo date("Y",time());?> <?php echo $_SERVER['HTTP_HOST'];?><br/><?php echo $_SERVER['SERVER_ADMIN'];?><br> <?php
            $time = microtime(true) - $start;
            printf('Скрипт выполнялся %.4F сек.', $time);
            ?></div>

    </div>
</footer>