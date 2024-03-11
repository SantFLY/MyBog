// Variables globales
var slideIndex = 1;

// Función para avanzar o retroceder en el visualizador de imágenes
function plusSlides(n) {
  showSlide(slideIndex + n);
}

// Función para mostrar una imagen específica en el visualizador
function currentSlide(n) {
  showSlide(n);
}

// Función para mostrar una imagen en el visualizador
function showSlide(n) {
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");

  if (n > slides.length) {
    slideIndex = 1;
  } else if (n < 1) {
    slideIndex = slides.length;
  } else {
    slideIndex = n;
  }

  // Ocultar todas las imágenes
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  // Desactivar todos los puntos
  for (var i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  // Mostrar la imagen actual y activar el punto correspondiente
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

// Función para cargar las imágenes
function cargarImagenes() {
  // Código para cargar las imágenes aquí

  // Luego de cargar las imágenes, actualiza el visualizador
  showSlide(slideIndex);
}

// Llamada a la función para cargar las imágenes
cargarImagenes();