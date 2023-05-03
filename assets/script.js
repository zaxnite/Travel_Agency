const header = document.querySelector("header");

window.addEventListener("scroll", function () {
    header.classList.toggle("sticky", window.scrollY > 100);
})

let menu = document.querySelector('#menu-icon')
let navbar = document.querySelector('.navbar')

menu.onclick = () => {
    menu.classList.toggle('bx-x')
    navbar.classList.toggle('open')
}

let image1 =document.querySelector('#flights')
image1.onclick = () => {
    window.location.href = 'flights.html';
}

let image2 =document.querySelector('#hotels')
image2.onclick = () => {
    window.location.href = 'hotels.html';
}

let image3 =document.querySelector('#about_us')
image3.onclick = () => {
    window.location.href = 'about_us.html';
}

let image4 =document.querySelector('#support')
image4.onclick = () => {
    window.location.href = 'support.html';
}

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" activepic", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " activepic";
}

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("activeanim");
    } else {
        reveals[i].classList.remove("activeanim");
    }
    }
}
window.addEventListener("scroll", reveal);

let image1 =document.querySelector('#flights')
image1.onclick = () => {
  window.location.href = 'flights.html';
}

let image2 =document.querySelector('#hotels')
image2.onclick = () => {
  window.location.href = 'hotels.html';
}

let image3 =document.querySelector('#about_us')
image3.onclick = () => {
  window.location.href = 'about_us.html';
}

let image4 =document.querySelector('#support')
image4.onclick = () => {
  window.location.href = 'support.html';
}