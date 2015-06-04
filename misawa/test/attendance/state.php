<?php //require "header.php";//ヘッダー読み込み ※通常時は必ずコメントアウト！開発時のみ ?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="base.css">
        
        <!--<script src="form_check.js"></script>-->
        
        <title>卒検支援</title>
    </head>
    <body>
    <div id="pagebody">
        
        <header>
        <h1 id="top"><a href="index.php">情報物理研究室 卒検支援システム</a></h1>
        
        <h2><a href="http://buturi.heteml.jp/student/2015/index.html">情報物理研究室2015</a></h2>

        </header>
        
        
        <section id="today">
            <?php
            $today = date("Y-m-d");//本日の日付取得
            $taskNo = 0;//予定件数

            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
            $st = $pdo->query("SELECT * FROM task");//SQL文の発行
            while ($row = $st->fetch()) {
                $date = htmlspecialchars($row['date']);
                if($date == $today){
                $time[$taskNo] = htmlspecialchars($row['time']);
                $place[$taskNo] = htmlspecialchars($row['place']);
                $content[$taskNo] = htmlspecialchars($row['content']);
                $taskNo++;
                }
            }
            echo "<h2><time>",date('n月 j日 (D)'),"</time> 本日の予定（$taskNo 件）</h2>";

            if($taskNo == 0){
                echo "<MARQUEE>本日の予定はありません.</MARQUEE>";
            }
            else{
                echo "<MARQUEE>";
                for($i = 0; $i < $taskNo; $i++){
                    $n = $i+1;
                    echo "$n 件目&emsp; $time[$i]&emsp; $place[$i]&emsp; $content[$i]&emsp;&emsp;&emsp;&emsp;";
                }
                echo "</MARQUEE>";
            }            
            ?>
            
            <!-- 折りたたみ -->
            <div onclick="obj=document.getElementById('Future_Schedule').style; obj.display=(obj.display=='none')?'block':'none';">
            <a style="cursor:pointer;">今後の予定（クリックで表示）</a>
            </div>
            <!--// 折りたたみ -->

            <!-- 折りたたまれ -->
            <div id="Future_Schedule" style="display:none;clear:both;">
            <!--ここに書いたものが上述の「クリックで展開」をクリックすると表示される-->
            <table border="1"><br /><tr><th>日付</th><th>時間</th><th>場所</th><th>内容</th></tr><br />
            <?php 
                
            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
        $st = $pdo->query("SELECT * FROM task ORDER BY date ASC");//SQL文の発行
        
        
        
        while ($row = $st->fetch()) {
            $date = htmlspecialchars($row['date']);
            $time = htmlspecialchars($row['time']);
            $place = htmlspecialchars($row['place']);
            $content = htmlspecialchars($row['content']);
            echo "<tr><td>$date</td><td>$time</td><td>$place</td><td>$content</td></tr>";
        }
        
            ?>
            </table>
            </div>
            <!--// 折りたたまれ -->
            
                
        </section>
        
        <section id="now">
            <h2>在室状況</h2>
            <div id="member">
                <ul id="memberList">
                <?php
                $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                $st = $pdo->query("SELECT * FROM member");//SQL文の発行
                while ($row = $st->fetch()) {
                    $name = htmlspecialchars($row['name']);
                    $lnRuby = htmlspecialchars($row['lnRuby']);
                    $situation = htmlspecialchars($row['situation']);
                    if($situation == '登校')
                        $situ = 'toukou';
                    else// if($situation == '')
                        $situ = 'kitaku';
                    
                    echo "<li><a href='http://buturi.heteml.jp/student/2015/$lnRuby/'><img src=http://buturi.heteml.jp/student/2015/images/profile/$lnRuby.jpg width=100 height=100 alt='No image'><img src=http://buturi.heteml.jp/student/2015/$situ.gif class='situ' width=60 height=60 alt='No image'><br /><name>$name</name></a></li>";
                }
                
                ?>
                </ul><!--メンバーはPHPで記述-->
                
                
            </div>   
            
            
            <hr /><!--float解除-->
            
            <form>
            <input id="reload" type=button value="更新" onclick=location.reload()>
            </form>
        </section>
        
        