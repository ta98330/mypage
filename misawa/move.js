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
$('#hoge').hover(
    function(){ //マウスオーバー処理 
        
    },
    function(){ //マウスアウト処理
        
    }
);


/*----------------------------------マウスオーバー基本形（jquery使用）-----------------*/
$(function(){
    $('.profile').hover(function() {
        $(this).animate({
            'width':'200px',
            'height':'200px',
            'marginLeft':'3px'
        }, 300);//左を3px空ける事でテキストを右にずらす
    },function() {
        $(this).animate({
            'width':'100px',
            'height':'100px',
            'marginLeft':'0px'
        }, 300);
    });
});
