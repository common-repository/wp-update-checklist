document.addEventListener('DOMContentLoaded', function(){ 
    var list = document.querySelector('ul#pwupcheck_update_checklist');
    list.addEventListener('click', function(ev) {
      if (ev.target.tagName === 'LI') {
        ev.target.classList.toggle('checked');
      }
    }, false);
}, false);    