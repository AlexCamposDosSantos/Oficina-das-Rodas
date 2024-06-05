document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll(".menu-item");
  
    menuItems.forEach(function(item) {
      item.addEventListener("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
  
        menuItems.forEach(function(menuItem) {
          if (menuItem !== item) {
            menuItem.classList.remove("open");
          }
        });
  
        item.classList.toggle("open");
      });
    });
  
    document.addEventListener("click", function(event) {
      menuItems.forEach(function(menuItem) {
        if (!menuItem.contains(event.target)) {
          menuItem.classList.remove("open");
        }
      });
    });
  });