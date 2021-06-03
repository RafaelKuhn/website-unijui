document.getElementById("register-form").onsubmit = function() {
  return compareRegisterPasswords();
};

function compareRegisterPasswords(){
  var password = document.getElementById("registerPassword").value;
  var retypedPasw = document.getElementById("confirmPassword").value;

  if(password != retypedPasw) {
    alert("Senhas não coincidem!");
    return false;
  }

  return true;
}