(function(){
  var passViewCheck = document.getElementById('showPassToggle');
  var textField = document.getElementById('passField');

  passViewCheck.addEventListener('click',function(){
    if(textField.type === 'password'){
      textField.type = 'text';
    }else{
      textField.type = 'password';
    }
  })
})();
