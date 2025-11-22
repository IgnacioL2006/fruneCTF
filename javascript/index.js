// =========================================================
// Fade-in effect for the header text 
// =========================================================
$(document).ready(function () {
    $("#portada_texto").hide().fadeIn(1800);
});

// =========================================================
// Smooth animation for feature cards
// =========================================================
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".feature-card");

    // Initial hidden state
    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform = "translateY(40px)";
        card.style.transition = "all 0.8s ease";
    });

    // Observer that activates animation when card enters viewport
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, { threshold: 0.2 });

    cards.forEach(card => observer.observe(card));
});

// =========================================================
// Parallax scrolling effect for the cover background
// =========================================================
const portada = document.querySelector('#portada');
const offsetInicial = -750;

window.addEventListener('scroll', () => {
    let offset = window.scrollY;
    portada.style.backgroundPositionY = offsetInicial - offset * 0.2 + "px";
});
