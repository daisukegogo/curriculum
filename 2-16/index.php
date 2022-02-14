<?php
//課題2-16 URL「http://localhost/LetsEngineer/curriculum/curriculum/2-16/index.php」
?>
<html>
<?php
    $testFile = "test.txt";
    $testFile2 = "test2.txt";
    $contents = "こんにちは！";
    
    if (is_writable($testFile)) {//書き込み可能か判定
        $fp = fopen($testFile, "w");//対象ファイルを開き、変数格納(w：書き込みモード)
        fwrite($fp, $contents);//対象のファイルに書き込む  
        fclose($fp);//ファイルを閉じる
        echo "finish writing!!";
    } else {
        echo "not writable!";
        exit;
    }

    if (is_readable($testFile2)) {//読み込み可能か判定
        $fp = fopen($testFile2, "r");//対象ファイルを開き、変数格納(r：読み込みモード)
        while ($line = fgets($fp)) {//fgets()：開いたファイルを1行ずつ読み込む
            echo $line.'<br>';
        }
        fclose($fp);//ファイルを閉じる
    } else {
        echo "not readable!";
        exit;
    }
?>
</html>