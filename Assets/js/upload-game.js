const inputThumb = document.getElementById("thumb");
const thumbPreview = document.getElementById("thumb-preview");
const inputHtml = document.getElementById("htmlfile");
const htmlSpan = document.getElementById("html-path");

inputThumb.onchange = function() {
  updateThumbPreview();
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