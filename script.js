let slideIndex = 0;
showSlides();

function showSlides() {
  let slides = document.getElementsByClassName("slide");
  for (let s of slides) {
    s.style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 5000); // Change every 5 seconds
}

function plusSlides(n) {
  showManualSlide(slideIndex += n);
}

function showManualSlide(n) {
  let slides = document.getElementsByClassName("slide");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (let s of slides) {
    s.style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
