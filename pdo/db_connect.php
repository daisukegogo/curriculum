<?php
//URL「http://localhost/LetsEngineer/curriculum/curriculum/pdo/db_connect.php」

    //DB情報
    define('DB_DATABASE', 'yigroupBlog');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    //プログラムからDBを参照
    define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);
    
    try {
        //インスタンス生成
        $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        echo 'DBと接続しました。';
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }
?>