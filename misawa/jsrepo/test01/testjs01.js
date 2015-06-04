window.onload = function() {
    // id名がboxの要素を取得
    var box = document.getElementById('box');

    // 取得した要素の内容を変更
    box.innerHTML = box.innerHTML + ' added!';

    // 内容が変更されていることを確認
    alert(box.innerHTML); //=> This is <b>box</b> added!
};