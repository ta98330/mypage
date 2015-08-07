/*----------------------------------ページ内自動スクロール（jquery使用）-----------------*/
$(function(){
        $('a[href^=#]').click(function(){
            var speed = 800;
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            $("html, body").animate({scrollTop:position}, speed, "swing");
            return false;
        });
    });


/*----------------------------------マウスオーバー基本形（jquery使用）-----------------
$(function(){
    $('#hoge').hover(
        function(){ //マウスオーバー処理 

        },
        function(){ //マウスアウト処理

        }
    );
});
---------------------*/

/*----------------------------------メイン画像フェードイン（jquery使用）-----------------*/
$('head').append(
    '<style type="text/css">body {display:none;}'
);
$(window).load(function() {
    $('body').fadeIn("slow");
});












/*----------------------------------マウスオーバーメイン画面（jquery使用）-----------------*//*
$(function(){
    $('#products').hover(
        function(){ //マウスオーバー処理
            $('#pro_new').css("display","none");
            $('#pro_con').css("display","inline");
        },
        function(){ //マウスアウト処理
            $('#pro_con').css("display","none");
            $('#pro_new').css("display","inline");
        }
    );
});

$(function(){
    $('#process').hover(
        function(){ //マウスオーバー処理
            $('#process_new').css("display","none");
            $('#process_contents').css("display","inline");
        },
        function(){ //マウスアウト処理
            $('#process_contents').css("display","none");
            $('#process_new').css("display","inline");
        }
    );
});

*/



/*
$(function(){
    $('#process article h1').click(
        function(){ 
            $(nextAll(this)).toggle(false);
            
        }
        
    );
});
*/
$(function(){
    $('#process article').children("h1~").css("display","none");
});

$(function(){
    $('#process article').click(
        function(){ 
            $(this).children("h1~").toggle(200);
        }
        );
        
    $('#process article').hover(
        function(){ //マウスオーバー処理
            $(this).children("h1").css({"color":"brown","border-bottom":"solid 2px orangered"});
            
        },
        function(){ //マウスアウト処理
            $(this).children("h1").css({"color":"black","border-bottom":"none"});
            
        }
        
    );
});

$(function(){
    $('#process>h1').click(
        function(){ 
            $('#process article').children("h1~").toggle(500);
            
        }
        
    );
});








