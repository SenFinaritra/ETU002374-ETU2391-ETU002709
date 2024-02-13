
document.addEventListener('DOMContentLoaded', function() {
    function updateUserType() {
      var emailField = document.getElementById('yourUsername');
      var passwordField = document.getElementById('yourPassword');
      
      var userType = document.querySelector('input[name="user"]:checked').value;
    console.log(userType);
      switch (userType) {
        case 'admin':
          emailField.value = "admin@gmail.com";
          passwordField.value = "admin";
          break;
        case 'client':
          emailField.value = "client@gmail.com";
          passwordField.value = "client";
          break;
        default:
          break;
      }
    }
  
    var adminRadio = document.getElementById('admin');
    var clientRadio = document.getElementById('client');
  
    if (adminRadio) {
      adminRadio.addEventListener('click', updateUserType);
    }
  
    if (clientRadio) {
      clientRadio.addEventListener('click', updateUserType);
    }
  });
  