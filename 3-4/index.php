<?php
//URL「http://localhost/LetsEngineer/curriculum/curriculum/3-4/index.php」

//エラーログコマンド　「tail -f /Applications/MAMP/logs/php_error.log」
//ターミナルを元に戻す　「Ctrl + c」

    require_once("getData.php");

    //getDataをインスタンス化&コンストラクタ実行
    $getdata = new getData(); 
    $stmt = $getdata->getUserData(); //関数の実行
    $post = $getdata->getPostData(); //関数の実行
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>テスト</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <img src="yi_logo.png" class="header-side">
				<div class="header-top-left-top">
                    <p>ようこそ<?php echo ' '.$stmt['last_name'].$stmt['first_name'].' '; ?>さん</p>
                </div>
				<div class="header-top-left-bottom">
                    <p>最終ログイン日：<?php echo ' '.$stmt['last_login'] ?></P>
                </div>
            </div>
                <table class="table1">

                    <tr>
                        <th>記事ID</th>
                        <th>タイトル</th>
                        <th>カテゴリ</th>
                        <th>本文</th>
                        <th>投稿日</th>
                    </tr>  
                    
                    <?php while ($row = $post->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>

                            <?php if($row['category_no'] == 1 ){ ?>
                                <td><?php echo '食事'; ?></td>
                            <?php }elseif($row['category_no'] == 2 ){ ?>   
                                <td><?php echo '旅行'; ?></td>
                            <?php }else{ ?> 
                                <td><?php echo 'その他'; ?></td>    
                            <?php  } ?>

                            <td><?php echo $row['comment']; ?></td>
                            <td><?php echo $row['created']; ?></td>
                        </tr>
                    <?php } ?>
                    
                </table>    
            <div class="footer">Y&I group.inc </div>
        </div>
    </body>
</html>
