<?php
//課題2-13 URL「http://localhost/LetsEngineer/curriculum/2-13/index.php」
?>
<html>
<?php
    // 様々な既存関数
    $x = 10.5;
    echo ceil($x);//切り上げ
    echo '<br>';
    echo floor($x);//切り捨て
    echo '<br>';
    echo round($x);//四捨五入
    echo '<br>';

    echo pi();//円周率
    echo '<br>';
    
    function circleArea($r) {
        $circle_area = $r * $r * pi();
        echo $circle_area; 
    }
    // 半径が3の円の面積の計算
    circleArea(3);
    echo '<br>';

    echo mt_rand(1,5);//乱数
    echo '<br>';

    $str = "oikawadaisuke";
    echo strlen($str);//文字の長さ
    echo '<br>';
    echo strpos($str, "kawa");//文字検索
    echo '<br>';
    echo substr($str,6,7);//文字切り出し
    echo '<br>';
    echo str_replace("oikawa", "matuzaka", $str);//文字列置換
    echo '<br>';

    printf("%sは%f点です", $str, $x);//表示
    echo '<br>';

    //変数に代入して表示
    $limit_time = sprintf("%sは%d点です", $str, $x);
    echo $limit_time;
    echo '<br>';
?>
</html>