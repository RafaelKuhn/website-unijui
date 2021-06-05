function validateForm(){ 
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  if(name == "" || email == "" || message == "") {
    alert("Nenhum dos campos pode estar vazio!");
    return false;
  } else if (name.length > 45) {
    alert("Nome muito grande, respeite o limite de 45 caracteres!");
    return false;
  } else if (email.length > 60) {
    alert("email muito grande, respeite o limite de 60 caracteres!");
    return false;
  } else if (message.length > 300) {
    alert("mensagem muito grande, respeite o limite de 300 caracteres!");
    return false;
  } else if(!email.includes('@')) {
    alert("Endereço de email inválido! \n (precisa conter '@')");
    return false;
  }
  
  return true;
}