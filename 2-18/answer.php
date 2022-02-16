<?php
//課題2-18 URL「http://localhost/LetsEngineer/curriculum/curriculum/2-18/index.php」

$myname = $_POST['myname'];
$portnumber = $_POST['port_number'];
$uselanguage = $_POST['use_language'];
$sqlcomand = $_POST['sql_comand'];
$portnumber_answer = $_POST['portnumber_answer'];
$uselanguage_answer = $_POST['uselanguage_answer'];
$sqlcomand_answer = $_POST['sqlcomand_answer'];

function question_judge($user_answer, $answer) {
    if($user_answer == $answer){
        print "正解！";
    }else{
        print "残念・・・";
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <p><?php echo $myname; ?>さんの結果は・・・？</p>
        <p>①の答え</p>
        <!--作成した関数を呼び出して結果を表示-->
        <?php question_judge($portnumber, $portnumber_answer); ?>

        <p>②の答え</p>
        <!--作成した関数を呼び出して結果を表示-->
        <?php question_judge($uselanguage, $uselanguage_answer); ?>

        <p>③の答え</p>
        <!--作成した関数を呼び出して結果を表示-->
        <?php question_judge($sqlcomand, $sqlcomand_answer); ?>
    </body>
</html>