const animateOnScroll = function() {
    const elements = document.querySelectorAll('#home, #features, #coverage, #about, #reviews');
    
    elements.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      const screenPosition = window.innerHeight / 1.3;
      
      if (elementPosition > screenPosition) {
        element.style.opacity = '1';
        element.style.transform = 'translateY(0)';
      }
    });
  };

  // Set initial state for animated elements
  document.querySelectorAll('#home, #features, #coverage, #about, #reviews').forEach(element => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(30px)';
    element.style.transition = 'all 0.6s ease';
  });

  // Run animation check on scroll and load
  window.addEventListener('scroll', animateOnScroll);
  window.addEventListener('load', animateOnScroll);