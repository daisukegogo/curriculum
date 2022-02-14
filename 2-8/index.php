<?php
//課題2-8
?>
<html>
    <?php 
    $fruits = ["apple" =>"りんご", "orange" => "みかん", "peach" => "もも"];

    foreach ($fruits as $key => $value) {
        echo  $key;
        echo  "といったら";
        echo  $value;
        echo '<br>';
    }
    
    ?>

</html>