<?php
//課題2-11 URL「http://localhost/LetsEngineer/curriculum/2-11/index.php」
?>
<html>
    <!-- method 通信するプロトコルの種類 -->
    <form action="result.php" method="post">
        名前：<input type="text" name="my_name" />
        <br>
        メールアドレス：<input type="text" name="e_mail" />
        <br>
        パスワード：<input type="password" name="password" />
        <br>
        <input type="submit" value="送信" />
    </form>
</html>