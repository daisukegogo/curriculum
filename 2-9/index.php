<?php
//課題2-9 「http://localhost/LetsEngineer/curriculum/2-1/index.php」
?>
<html>
    <?php 
    for($i=1;i<101;$i++){
        if($i%3==0 && $i%5==0){
            echo "FizzBuzz!";
            echo '<br>';
        }elseif($i%5==0){
            echo "Buzz!";
            echo '<br>';
        }elseif ($i%3==0){
            echo "Fizz!";
            echo '<br>';
        }else{
            echo $i;
            echo '<br>';
        }
    }
    ?>

</html>