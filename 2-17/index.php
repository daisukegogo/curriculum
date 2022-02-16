<?php
//課題2-17 URL「http://localhost/LetsEngineer/curriculum/curriculum/2-17/index.php」
?>
<html>
<?php
    //EXTRA問題②
    $the_time = intval(date("H", time()));

    if(7 <= $the_time && $the_time <= 12){
        echo 'おはようございます';
        echo '<br>';
    } elseif (12 < $the_time && $the_time <= 19){
        echo 'こんにちは';
        echo '<br>';
    }else{
        echo 'こんばんは';
        echo '<br>';
    };
    
    //EXTRA問題①
    $sum = 0;//合計用変数
    $dice = 0;//サイコロの目
    $cnt = 1;//実行回数

    while($sum < 40) {
        
        $dice = mt_rand(1, 6);
        print $cnt."回目=".$dice;
        echo '<br>';
        
        $cnt++;
        $sum = $sum + $dice;
     }
     print "合計".($cnt -1)."回でゴールしました。"

?>
</html>