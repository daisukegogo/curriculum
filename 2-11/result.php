<?php
//課題2-11 URL「http://localhost/LetsEngineer/curriculum/2-11/index.php」
?>
<html>
    <?php
        //GETで送信された値を受け取るには、$_GETを使用!!
        $my_name = $_POST['my_name'];
        $e_mail  = $_POST['e_mail'];
        $password = $_POST['password'];
    ?>
    <p>私の名前は、<?php echo $my_name; ?></p>
    <p>メールアドレスは、<?php echo $e_mail; ?></p>
    <p>私のパスワードは、<?php echo $password; ?></p>
</html>