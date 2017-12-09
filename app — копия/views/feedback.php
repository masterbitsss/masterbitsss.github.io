<div id="xx2" class="rtform">
    <?php include 'app/views/genres.php'; ?>
    <div id="xbody">
        <aside id="xbody-left">
            <div class="xblock"><h1>Feedback</h1>

                <?php echo $message ?? ''; ?>
                <form action="/feedback/" method="post">
                    <div class="lbl">
                        <label>
                            <em class="lbl-t">Имя:</em>
                            <input type="text" name="name" style="width: 100%; max-width: 400px;" required>
                        </label>
                    </div>
                    <br>
                    <div class="lbl">
                        <label>
                            <em class="lbl-t">Эл. почта:</em>
                            <input type="text" name="email" style="width: 100%; max-width: 400px;" required>
                        </label>
                    </div>
                    <br>
                    <div class="lbl">
                        <label>
                            <em class="lbl-t">Тема сообщения:</em>
                            <select name="subject" style="width: 100%; max-width: 400px;" required>
                                <option disabled selected>-- выберите тему --</option>
                                <option value="abuse">Нарушение авторских прав / Удаление контента / ABUSE</option>
                                <option value="ad">Реклама на сайте</option>
                                <option value="bug">Ошибка на сайте</option>
                                <option value="other">Другое</option>
                            </select>
                        </label>
                    </div>
                    <div class="lbl">
                        <label>
                            <em class="lbl-t">Сообщение:</em>
                            <textarea name="message" style="width: 100%; height: 150px;" required></textarea>
                        </label></div>
                    <br>
                    <div><input name="submit" type="submit" value="Отправить" class="rtform-blue"/></div>
                </form>

            </div>
        </aside>
        <?php include 'app/views/right.php'; ?>

    </div>
</div>


<?php include 'app/views/foot.php';

