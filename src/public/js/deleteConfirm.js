function deleteConfirm(){
  if(window.confirm('本当に削除しますか？')){
    return true;
  }else{
    return false;
  }
}


//削除ボタンをクリックしたら確認画面が出てくる
//OKを押したら削除処理実行
//キャンセルを押したら取り消し
