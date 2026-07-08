/* Navbar shadow on scroll */
const nav = document.getElementById('mainNav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  });
}

/* Close the mobile menu on link tap or when tapping outside */
const navMenu = document.getElementById('navMenu');
if (navMenu && window.bootstrap) {
  const collapse = bootstrap.Collapse.getOrCreateInstance(navMenu, { toggle: false });
  navMenu.querySelectorAll('.nav-link').forEach((link) => {
    link.addEventListener('click', () => {
      if (navMenu.classList.contains('show')) collapse.hide();
    });
  });
  document.addEventListener('click', (e) => {
    if (navMenu.classList.contains('show') && !e.target.closest('#mainNav')) {
      collapse.hide();
    }
  });
}
