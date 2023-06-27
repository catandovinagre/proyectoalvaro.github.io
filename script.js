// Detectar cuando se muestra el texto en el viewport
function isElementInViewport(element) {
  var rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Agregar la clase 'visible' a los elementos de texto que están en el viewport
function handleVisibility() {
  var elements = document.querySelectorAll('.fade-in');
  for (var i = 0; i < elements.length; i++) {
    if (isElementInViewport(elements[i])) {
      elements[i].classList.add('visible');
    }
  }
}

// Escuchar el evento 'scroll' para activar la transición al desplazarse
window.addEventListener('scroll', handleVisibility);
window.addEventListener('resize', handleVisibility);

// Ejecutar la función al cargar la página para mostrar los elementos de texto visibles inicialmente
handleVisibility();