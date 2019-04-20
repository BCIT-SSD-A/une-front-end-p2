(function() {
  const menuBtn = document.getElementById('header-menu-toggle');
  const menu    = document.getElementById('header-menu');
  const calendarBtn = document.getElementsByClassName('calendar-view-toggle')[0];
  const calendar    = document.getElementsByClassName('calendar')[0];
  if(menuBtn && menu) {
    menuBtn.onclick = function() {
      menu.classList.toggle('show');
    }
  }
  if(calendarBtn && calendar) {
    calendarBtn.onclick = function() {
      const textNode = calendarBtn.childNodes[0];
      const text = textNode.nodeValue.trim();
      textNode.nodeValue = text == 'List View' ? 'Grid View' : 'List View';
      calendar.classList.toggle('list-view');
      calendar.classList.toggle('grid-view');
    }
  }
})();