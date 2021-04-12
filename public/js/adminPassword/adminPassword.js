function formValidate(){
    var regExp = /^([0-9])$/;
    var pass = 9398;
    var passwordAdmin = document.getElementById("passwordAdmin").value;
    if (!regExp.test(passwordAdmin) && passwordAdmin!=pass.toString()) {
      alert('Mật khẩu quản trị không hợp lệ!'); 
      window.location.reload();
    }
  }