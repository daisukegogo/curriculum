<?php
//課題2-10 URL「http://localhost/LetsEngineer/curriculum/2-10/index.php」
?>
<html>
    <?php 
    //直方体の体積を求める関数定義
    function getArea($tate, $yoko, $height) {
        $answer = $tate * $yoko * $height;
        print "直方体の体積は".$answer."だよ。";
    }

    getArea(5,10,8);
    
    ?>

</html>