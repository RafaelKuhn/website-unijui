const inputThumb = document.getElementById("thumb");
const thumbPreview = document.getElementById("thumb-preview");
const inputHtml = document.getElementById("htmlfile");
const htmlSpan = document.getElementById("html-path");
const uploadForm = document.getElementById("upload-form");

inputThumb.onchange = function() {
  updateThumbPreview();
}

uploadForm.onsubmit = function() {
  return verifyFields();
}

function updateThumbPreview() {
  const file = inputThumb.files[0];
  
  if(file) {
    var fileReader = new FileReader();

    fileReader.addEventListener("load", function() {
      thumbPreview.setAttribute("src", this.result);
    });

    fileReader.readAsDataURL(file);
  }
}

function verifyFields() {
  var title = document.getElementById("title").value;
  var description = document.getElementById("description").value;
  var thumb = inputThumb.files[0];
  var html = inputHtml.files[0];

  if (title == "" || description == "") {
    alert("ERRO: O jogo deve ter um título e uma descrição!");
    return false
  }

  if (!thumb || !html) {
    alert("ERRO: O jogo deve ter uma miniatura e um arquivo html.");
    return false;   
  }

  return true;
}