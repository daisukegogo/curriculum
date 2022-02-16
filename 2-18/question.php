<?php
//課題2-18 URL「http://localhost/LetsEngineer/curriculum/curriculum/2-18/index.php」
$myname = $_POST['myname'];

//回答の配列を作成
$port_number = [80,22,20,21];
$use_language = ['PHP','Python','JAVA','HTML'];
$sql_comand = ['join','select','insert','update'];

$portnumber_answer = $port_number[1];
$uselanguage_answer = $use_language[2];
$sqlcomand_answer = $sql_comand[0];

?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <p>お疲れ様です<?php echo $myname; ?>さん</p>
        <!--フォームの作成 通信はPOST通信で-->
        <form action="answer.php" method="post">
            <!-- 画面には表示しない -->
            <input type="hidden" name="myname" value="<?php echo $myname; ?>">
            <input type="hidden" name="portnumber_answer" value="<?php echo $portnumber_answer; ?>">
            <input type="hidden" name="uselanguage_answer" value="<?php echo $uselanguage_answer; ?>">
            <input type="hidden" name="sqlcomand_answer" value="<?php echo $sqlcomand_answer; ?>">

            <h2>①ネットワークのポート番号は何番？</h2>
            <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <?php foreach ($port_number as $value1) { ?>
                <input type="radio" name="port_number" value="<?php echo $value1; ?>"><?php echo $value1; ?>
            <?php } ?>

            <h2>②Webページを作成するための言語は？</h2>
            <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <?php foreach ($use_language as $value2) { ?>
                <input type="radio" name="use_language" value="<?php echo $value2; ?>"><?php echo $value2; ?>
            <?php } ?>

            <h2>③MySQLで情報を取得するためのコマンドは？</h2>
            <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <?php foreach ($sql_comand as $value3) { ?>
                <input type="radio" name="sql_comand" value="<?php echo $value3; ?>"><?php echo $value3; ?>
            <?php } ?>

            <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
            <br>
            <input type="submit" value="回答する" />
        </form>
    </body>
</html>