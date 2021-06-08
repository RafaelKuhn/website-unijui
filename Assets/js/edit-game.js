const uploadForm = document.getElementById("upload-form");

uploadForm.onsubmit = function() {
  return verifyFields();
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