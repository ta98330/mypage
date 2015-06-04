<?php
    require "header.php";//ヘッダー読み込み 
        
    if($_SESSION['login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    require "state.php";//ヘッダー読み込み
    
?>

        <div id="user">
          
          <?php

          echo "<p>{$_SESSION['login']}{$_SESSION['userName']}さん．　<a href='logout.php'>ログアウト</a></p>";

          ?>
        </div>

        <div id="main">
        <section id="bbs">
            <h2>簡易掲示板</h2>
            <ul>
            <?php
            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
            $st = $pdo->query("SELECT * FROM bbs_logs");//SQL文の発行

            while ($row = $st->fetch()) {
                $name = htmlspecialchars($row['name']);
                $time = htmlspecialchars($row['time']);
                $content = htmlspecialchars($row['content']);
                
                echo "<li>$name&nbsp;$time<br />&nbsp;&nbsp;&nbsp;&nbsp;$content&nbsp;<br /></li>";
                echo "<hr />";
            }
            

            echo "</ul>";
            
            echo "<form action='bbs.php' method='post'>";
            echo "<p>name:<input type='text' name='contributeName'  value={$_SESSION['userName']}></p>";
                        
            ?>
            
                <p><textarea name="contributeContent" maxlength='200' required></textarea>
                <input type="submit" value='書き込む'></p>        
            </form>
        </section>
        

        
        <section id="registration">
            <h2>登下校登録</h2>
            <?php
            $today = date("Y-m-d");
            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
            $st = $pdo->query("SELECT * FROM user_logs WHERE id = {$_SESSION['userId']} AND date = '$today'");
            while ($row = $st->fetch()) {
                $str = htmlspecialchars($row['start_time']);
                $end = htmlspecialchars($row['end_time']);
                
                $start_time = htmlspecialchars($row['start_time']);
                $end_time = htmlspecialchars($row['end_time']);
                $stay_time = htmlspecialchars($row['stay_time']);
            }

            if(empty($str)){
                echo "<form method='post' action='time_counter.php'>";
                echo "<input type='submit' value='登校' name='come' id='toukou'> ";
                echo "<input type='submit' value='下校' name='out' id='gekou' disabled>";
                echo "</form>";
            }
            else if(empty($end)){
                echo "<form method='post' action='time_counter.php'>";
                echo "<input type='submit' value='登校時間\n$start_time' name='come' id='toukou' disabled>";
                echo "<input type='submit' value='下校' name='out' id='gekou'>";
                echo "</form>";
            }
            else{
                echo "<form method='post' action='time_counter.php'>";
                echo "<input type='submit' value='登校時間\n$start_time' name='come' id='toukou' disabled> ";
                echo "<input type='submit' value='下校時間\n$end_time' name='out' id='gekou' disabled> ";
                echo "<input type='submit' value='下校\n取り消し\n$stay_time' name='outreset' id='regekou'>";
                echo "</form>";
            }
            ?>
            
        </section>
            
            
                        
            
        <!--予定レコードの追加-->
        <section>
            <h2>予定登録</h2>
            <form action="task_insert.php" method="post">
              日付
              <input type="date" name="date" pattern="\d{4}-?\d{2}-?\d{2}" min="2015-04-01" max="2016-03-31"><br><!--日付範囲制限-->
              時刻
              <input type="time" name="time"><br>
              場所
              <input type="text" name="place"><br>
              内容
              <input type="text" name="content" required><br>
              <input type="submit">
            </form>
        </section>
            
        <section>    
            <h2>パスワード変更</h2>
            <form name="pass_insert" action="pass_update.php" method="post">
            現在のパスワード
            <input type="password" name="pass" required><br>
            新しいパスワード
            <input type="password" name="newPass" onblur="passCheck();" required><br>
            <input type="submit">
            </form>
        </section>
        
        <section>
            <h2>ユーザー情報確認</h2>
            <form action="user_info.php" method="post">
            パスワード
            <input type="password" name="pass" required>
            <input type="submit">
            </form>
         </section>   
            
            
            
            
        </div>

<?php require "footer.php" //フッター読み込み?>