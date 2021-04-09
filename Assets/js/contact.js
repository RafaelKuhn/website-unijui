function submitMessage(){
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  if(name == "" || surname == "" || email == "" || message == "") {
    alert("Nenhum dos campos pode estar vazio!");
    return;
  }
  if(!email.includes('@')) {
    alert("Endereço de email inválido! \n (precisa conter '@')");
    return;
  }
  
  alert('Mensagem enviada com sucesso!');
  document.getElementById("contact-form").reset();

}