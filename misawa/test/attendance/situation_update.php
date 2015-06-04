            <form method="post" action="situation_update.php">    
            <p>
            <select name="situation">
            <option value="登校">登校</option>
            <option value="帰宅">帰宅</option>
            <option value="帰省">帰省</option>
            <option value="就活">就活</option>
            </select>
                <input type="submit" value="変更">
            </p>
            </form>
<?php
    session_start();
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");


    $st = $pdo->prepare("UPDATE member SET situation = ? WHERE id = {$_SESSION['userId']}");//SQL文の発行

    if(!empty($_POST['situation'])){
        $st->execute(array($_POST['situation']));
        echo '状況を更新しました．<br /><a href="top.php">戻る</a>';
    }
    else{
        echo '状況の更新に失敗しました．<br /><a href="top.php">戻る</a>';
    }
       
    
    
?>