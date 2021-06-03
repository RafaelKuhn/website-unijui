document.getElementById("register-form").onsubmit = function() {
  return validateFields();
};

function validateFields(){
  var email = document.getElementById("registerEmail").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("registerPassword").value;
  var retypedPasw = document.getElementById("confirmPassword").value;

  if (email == "" || username == "" || password == "" || retypedPasw == "") {
    alert("Nenhum dos campos pode estar vazio!");
    return;
  }

  if(password != retypedPasw) {
    alert("Senhas não coincidem!");
    return false;
  }

  return true;
}