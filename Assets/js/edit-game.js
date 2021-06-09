const uploadForm = document.getElementById("upload-form");

uploadForm.onsubmit = function() {
  return verifyFields() && confirmEdit();
}

function verifyFields() {
  var title = document.getElementById("title").value;
  var description = document.getElementById("description").value;

  if (title == "" || description == "") {
    alert("ERRO: O jogo deve ter um título e uma descrição!");
    return false
  }

  return true;
}

function confirmEdit() {
  var confirmed = confirm("Tem certeza que deseja fazer essas alterações?");

  return confirmed;
}