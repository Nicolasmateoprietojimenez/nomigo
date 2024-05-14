window.onload = function() {
    const spans = document.querySelectorAll('.stack span');
    spans.forEach(span => {
      span.style.setProperty('--glitch-duration', `calc(0.5s + ${Math.random()}s)`);
      span.style.setProperty('--glitch-delay', `calc(0.1s + ${Math.random()}s)`);
    });
  }