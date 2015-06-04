<?php
    require "header.php";//ヘッダー読み込み 
        
    if($_SESSION['login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    require "state.php";//ヘッダー読み込み
    
?>
<meta http-equiv="refresh" content="5;URL=top.php">
<section id="passage">
    <?php
    if(!empty(@$_POST['pass'] && @$_POST['newPass'])){
        if($_SESSION['userPass'] == $_POST['pass']){
          $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
          $st = $pdo->prepare("UPDATE member SET pass = ? WHERE id = {$_SESSION['userId']}");
          $st->execute(array($_POST['newPass']));

          $_SESSION['userPass'] = $_POST['newPass'];
          echo 'パスワードを変更しました。';
        }
        else
            echo 'パスワードが違います．'; 
    }
    else
        echo "パスワードを入力してください．"
    ?>
    <p>5秒後に自動で戻ります．<a href="top.php">戻る</a></p>

</section>

<?php require "footer.php" //フッター読み込み?>