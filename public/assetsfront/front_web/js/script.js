// script for Aos animation
AOS.init();

// ================================================
// script for header scroll Animation
// ================================================
function header_animate() {
  if (window.scrollY > 50) {
    header.classList.add('scroll_header');
  } else {
    header.classList.remove('scroll_header');
  }
}
var header = document.getElementById('header');
window.addEventListener("scroll", header_animate);
window.addEventListener("load", header_animate);



// Active Menu Functionality
jQuery(document).ready(function () {
  $(".navbar-nav .nav-item a").click(function () {
    $('#navCloseBtn').click();
  });
});