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

/*----------------------------------マウスオーバー基本形（jquery使用）-----------------*/
$(function(){
    $('#hoge').hover(
        function(){ //マウスオーバー処理 

        },
        function(){ //マウスアウト処理

        }
    );
});




/*----------------------------------マウスオーバーメイン画面（jquery使用）-----------------*/
$(function(){
    $('#main01').hover(
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

