const accordions = document.getElementsByClassName('has-submenu');
const adminSlideButton = document.getElementById('admin-slide-button');

adminSlideButton.onclick = function() {
  this.classList.toggle('is-active');
  document.getElementById('admin-side-menu').classList.toggle('is-active');
}
for(let i = 0; i < accordions.length; i++) {
  if(accordions[i].classList.contains('is-active')){
    const submenu = accordions[i].nextElementSibling;
    submenu.style.maxHeight = submenu.scrollHeight + 'px';
    submenu.style.marginTop = "0.75em";
    submenu.style.marginBottom = "0.75em";
  }
  
  accordions[i].onclick = function() {
    this.classList.toggle('is-active');
    
    const submenu = this.nextElementSibling;
    
    if(submenu.style.maxHeight) {
      submenu.style.maxHeight = null;
      submenu.style.marginTop = null;
      submenu.style.marginBottom = null;
    } else {
      submenu.style.maxHeight = submenu.scrollHeight + 'px';
      submenu.style.marginTop = "0.75em";
      submenu.style.marginBottom = "0.75em";
    }
  }
}