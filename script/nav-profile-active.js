// ==============================
// NAVBAR ACTIVE ON CLICK
// ==============================
const navLinks = document.querySelectorAll(".nav-menu a");

navLinks.forEach(link => {
    link.addEventListener("click", function() {
        navLinks.forEach(l => l.classList.remove("active"));
        this.classList.add("active");
    });
});

// ==============================
// SCROLL SPY (ACTIVE ON SCROLL)
// ==============================
const sections = document.querySelectorAll("section");
const options = {
    threshold: 0.6
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        const id = entry.target.getAttribute("id");
        const activeNav = document.querySelector(`nav .nav-menu a[href="#${id}"]`);

        if (entry.isIntersecting && activeNav) {
            navLinks.forEach(link => link.classList.remove("active"));
            activeNav.classList.add("active");
        }
    });
}, options);

sections.forEach(section => observer.observe(section));


// ==============================
// FADE IN ANIMATION
// ==============================

// Tambahkan class fade saat muncul di layar
const faders = document.querySelectorAll("section");

const appearOptions = {
    threshold: 0.2,
    rootMargin: "0px 0px -50px 0px"
};

const appearOnScroll = new IntersectionObserver((entries, appearOnScroll) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;

        entry.target.classList.add("fade-in");
        appearOnScroll.unobserve(entry.target);
    });
}, appearOptions);

faders.forEach(fader => {
    fader.classList.add("fade-start"); // posisi awal (opacity 0)
    appearOnScroll.observe(fader);
});
