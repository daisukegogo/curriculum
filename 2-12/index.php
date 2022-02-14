<?php
//課題2-12 URL「http://localhost/LetsEngineer/curriculum/2-12/index.php」
?>
<html>
    <!-- method 通信するプロトコルの種類 -->
    <form action="result.php" method="post">
        お名前：<input type="text" name="my_name" />
        <br>

        ご希望の商品：
        <input type="radio" name="item" value="A賞">A賞
        <input type="radio" name="item" value="B賞">B賞
        <input type="radio" name="item" value="C賞">C賞
        <br>

        個数：
        <select name="cnt">
            <?php for ($i=1;$i<=10;$i++){ ?>
            <option value="<?php echo $i; ?>">
                <?php echo $i; ?>
            </option>
            <?php } ?>
        </select>
        <br>

        <input type="submit" value="申込" />
    </form>
</html>