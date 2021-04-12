function formValidate(){
    var passwordAdmin = document.getElementById("passwordAdmin").value;

    if (passwordAdmin!==pass) {
      alert('Mật khẩu quản trị không hợp lệ!'); 
      window.location.reload();
    }
  }