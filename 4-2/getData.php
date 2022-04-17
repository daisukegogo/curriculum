<?php
require_once("dbconnect.php");

class getData{

    public $pdo;
    public $data;

    //コンストラクタ
    function __construct()  {
        $this->pdo = db_connect();
    }

    /**
     * ユーザ情報の取得
     *
     * @param 
     * @return array $users_data ユーザ情報(配列)
     */
    public function getUserData(){
        $getusers_sql = "SELECT * FROM users limit 1";
        $users_data = $this->pdo->query($getusers_sql)->fetch(PDO::FETCH_ASSOC);
        return $users_data;
    }
    
    /**
     * 記事情報の取得
     *
     * @param 
     * @return array $post_data 在庫情報
     */
    public function getBooksData(){
        $getbooks_sql = "SELECT * FROM books ORDER BY id desc";
        $book_data = $this->pdo->query($getbooks_sql);
        return $book_data;
    }
}