<?php
//課題2-12 URL「http://localhost/LetsEngineer/curriculum/2-12/index.php」
?>
<html>
    <?php
        //GETで送信された値を受け取るには、$_GETを使用!!
        $my_name = $_POST['my_name'];
        $item = $_POST['item'];
        $cnt = $_POST['cnt'];
    ?>
    <p>お名前：<?php echo $my_name; ?></p>
    <p>ご希望景品<?php echo $item; ?></p>
    <p>個数：<?php echo $cnt; ?></p>

</html>