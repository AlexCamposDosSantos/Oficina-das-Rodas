document.addEventListener("DOMContentLoaded", function() {
  var sideMenuSwitch = document.getElementById("side-menu-switch");
  var sideMenu = document.querySelector(".side-menu");
  var menuContent = document.querySelector(".menu-content");
  var logoImage = document.querySelector(".logo-menu img");
  var pageCenter = document.querySelector(".page_center");
  var container = document.querySelector(".container");

  if (sideMenuSwitch) {
    sideMenuSwitch.addEventListener("change", function() {
      if (this.checked) {
        sideMenu.classList.add("recolhido");
        menuContent.style.display = "none";
        logoImage.style.display = "none";
        pageCenter.style.marginLeft = '0';
        container.classList.add("menu-recolhido");
      } else {
        sideMenu.classList.remove("recolhido");
        menuContent.style.display = "";
        logoImage.style.display = "";
        pageCenter.style.marginLeft = '';
        container.classList.remove("menu-recolhido");
      }
    });
  }
});

