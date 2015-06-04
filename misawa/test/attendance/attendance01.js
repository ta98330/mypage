//所属先の定義
var attach = 'soLabo';
//メンバーの定義
var memberList = ['matsubara', 'misawa', 'nishi', 'nizato', 'okada', 'sone', 'toyota'];
//メンバー人数の取得
var memberLength = memberList.length;
console.log('現在の在籍人数は' + memberLength + '人です．');

//h1への出力
var title = document.getElementById('top');
title.innerHTML = attach + title.innerHTML;


//在室状況
var situation = ['在室', '授業', '校内', '食事（校内）', '食事（校外）', '就活', '帰省', '帰宅'];


//メンバーのul要素を取得
var memberUl = document.getElementById('memberList');

//新規作成した
for(var i = 0; i < memberLength; i++){
    //li要素の新規作成 !!これもループに入れる!!
    var newli = document.createElement('li');
     //メンバーをリストに記述　※画像絶対パス指定
    newli.innerHTML = '<a href="..' + memberList[i] + '/index.html"> <img src=http://buturi.heteml.jp/student/2015/images/profile/' + memberList[i] + '.jpg width=100 height=100 alt="No image"</a><br />' + memberList[i];
    //記述したリストを出力
    memberUl.appendChild(newli);
    
}

//ログインのselect要素を取得
var loginOption = document.getElementById('loginOption');

//ログイン　option要素新規作成
for(var i = 0; i < memberLength; i++){
    //option要素の新規作成 !!これもループに入れる!!
    var newOption = document.createElement('option');
    //メンバーをリストに記述
    newOption.innerHTML = memberList[i];
    //記述したリストを出力
    loginOption.appendChild(newOption);
    
}
   
   