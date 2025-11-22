// =========================================================
// Fade-in effect for the header text 
// =========================================================
$(document).ready(function () {
    $("#portada_texto").hide().fadeIn(1800);
});

// =========================================================
// Smooth animation for feature cards
// =========================================================
$(document).ready(function () {

    const $cards = $(".feature-card");

    $cards.css({
        opacity: "0",
        transform: "translateY(40px)",
        transition: "all 0.8s ease"
    });

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).css({
                    opacity: "1",
                    transform: "translateY(0)"
                });
            }
        });
    }, { threshold: 0.2 });

    $cards.each(function () {
        observer.observe(this);
    });
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
