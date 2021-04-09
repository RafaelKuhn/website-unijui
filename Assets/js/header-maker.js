(function() { // iife
const wrapper = document.getElementById("wrapper");
if (!wrapper) {
  throw Error('here is no div with id "wrapper" inside this file');
}

// header creation
const header = document.createElement("div");
header.id = "header";

// navbar names and uris
const listLinksJson = {
  "Games": "./games.html",
  "Quem somos": "./about.html",
  "Contato": "./contact.html"
}

// css reference
const headerCss = document.createElement("link");
headerCss.rel = "stylesheet";
headerCss.type = "text/css";
headerCss.href = "../Assets/style/header.css"

// logo
const logoDiv = document.createElement("div");
const logo = document.createElement("img");
const logoLink = document.createElement("a");
logoLink.href = "./index.html";
logo.src = "../Assets/images/logo.png";

logoDiv.classList.add("logo-div");

// navigator menu
const navbarList = document.createElement("ul");
navbarList.classList.add("navbar");

for (const linkRef in listLinksJson) {
  const relativeLink = listLinksJson[linkRef];
  
  const genericListItem = document.createElement("li");
  const genericLink = document.createElement("a");

  genericLink.innerHTML = linkRef;
  genericLink.href = relativeLink;

  genericListItem.appendChild(genericLink);

  navbarList.appendChild(genericListItem);
}

const navbarDiv = document.createElement("div");
navbarDiv.classList.add("navbar-div");

// icon
const iconRef = document.createElement("link");
iconRef.rel = "icon";
iconRef.href = "../Assets/images/icon.png";

// appends
document.head.prepend(iconRef);
document.head.appendChild(headerCss);

logoLink.appendChild(logo)
logoDiv.appendChild(logoLink);
header.appendChild(logoDiv);

navbarDiv.appendChild(navbarList);
header.appendChild(navbarDiv);

wrapper.prepend(header);

})();