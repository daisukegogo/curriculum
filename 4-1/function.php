<?php
    /**
     * 引数の値が空だった場合、main.phpにリダイレクトする
     * @param integer $param
     * @return void
     */
    function redirect_main_unless_parameter($param) {
        if (empty($param)) {
            header("Location: main.php");
            exit;
        }
    }

    /**
     * 引数で与えられたidでpostsテーブルを検索する
     * もし対象のレコードがなければmain.phpに遷移させる
     * @param integer $id
     * @return array
     */
    function find_post_by_id($id) {
        // PDOのインスタンスを生成
        $pdo = db_connect();
        try {
            // SQL文の準備
            $sql = "SELECT * FROM posts WHERE id = :id";
            // プリペアドステートメントの作成
            $stmt = $pdo->prepare($sql);
            // idのバインド
            $stmt->bindParam('id', $id);
            // 実行
            $stmt->execute();
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
        // 結果が1行取得できたら
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        } else {
        // 対象のidでレコードがない場合はメインページにリダイレクト
            redirect_main_unless_parameter($row);
        }
    }

?>


