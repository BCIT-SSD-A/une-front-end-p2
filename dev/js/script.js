(function() {
  const menuBtn = document.getElementById('header-menu-toggle');
  const menu    = document.getElementById('header-menu');
  if(menuBtn && menu) {
    menuBtn.onclick = function() {
      menu.classList.toggle('show');
    }
  }
})();