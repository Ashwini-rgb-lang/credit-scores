/* Mobile Menu */
function toggleMenu(){
  const menu = document.getElementById("navMenu");
  menu.style.display = menu.style.display === "flex" ? "none" : "flex";
}

/* Slider Fix */
let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide(){
  slides.forEach(slide => slide.classList.remove("active"));
  slides[index].classList.add("active");
  index = (index + 1) % slides.length;
}

/* Start slider correctly */
showSlide();
setInterval(showSlide, 4000);


function toggleMenu(){
  const menu = document.getElementById("navMenu");
  menu.style.display = menu.style.display === "flex" ? "none" : "flex";
}





