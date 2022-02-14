<?php
//課題2-14 URL「http://localhost/LetsEngineer/curriculum/2-14/index.php」
?>
<html>
<?php
    $members = ["oikawa","yoshida", "uchida"];
    echo count($members);//要素数表示
    echo '<br>';

    sort($members);//配列内並替え
    var_dump($members);
    echo '<br>';

    $numbers1 = [55, 5, 7, 67, 105];
    sort($numbers1);//数字バージョン
    var_dump($numbers1);
    echo '<br>';

    if (in_array("oikawa", $members)) {//配列の要素存在チェック
        echo "oikawaは要素です！";
    } else {
        echo "oikawaは要素ではない！";
    }
    echo '<br>';

    $atstr = implode("■", $members);//配列(並替え後)→文字列へ
    var_dump($atstr);
    echo '<br>';

    $re_members = explode("■", $atstr);//文字列→配列へ(並替え後)
    var_dump($re_members);

?>
</html>