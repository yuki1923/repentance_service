(function(){
  var passeye = document.getElementById('showPassToggle');
  var textField = document.getElementById('passField');

  passeye.addEventListener('click',function(){
    if(textField.type === 'text'){
      textField.type = 'password';
      passeye.className = 'fa fa-eye-slash';
    }else{
      textField.type = 'text';
      passeye.className = 'fa fa-eye';
    }
  })
})();
