// assets/js/script.js (vanilla JS — no jQuery required)

// Set year in footer elements if they exist
(function() {
  const y = new Date().getFullYear().toString();
  ['year','year2','year3'].forEach(id => {
    const el = document.getElementById(id);
    if(el) el.textContent = y;
  });

  // Mobile menu toggle
  const menuToggle = document.getElementById('menuToggle');
  const nav = document.querySelector('.nav');
  if(menuToggle && nav) {
    menuToggle.addEventListener('click', function() {
      // simple slide toggle: toggle a class that controls display
      if(nav.style.display === 'block') {
        nav.style.display = '';
      } else {
        nav.style.display = 'block';
      }
    });
  }

  // Smooth scroll for internal links that start with '#'
  document.addEventListener('click', function(e) {
    const a = e.target.closest('a[href^="#"]');
    if(!a) return;
    const hash = a.getAttribute('href');
    if(!hash || hash === '#') return;
    const target = document.querySelector(hash);
    if(target) {
      e.preventDefault();
      // offset to allow header space (60px)
      const top = target.getBoundingClientRect().top + window.pageYOffset - 60;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  });
})();
