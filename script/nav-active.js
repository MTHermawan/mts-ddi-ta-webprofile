// ====== SET ACTIVE KETIKA DI KLIK ======
const navLinks = document.querySelectorAll('.nav-menu a');

navLinks.forEach(link => {
    link.addEventListener('click', function () {
        navLinks.forEach(nav => nav.classList.remove('active'));
        this.classList.add('active');
    });
});

// ====== SET ACTIVE KETIKA DI SCROLL ======
const sections = document.querySelectorAll("section[id]");

function setActiveOnScroll() {
    let scrollY = window.pageYOffset;

    let activeSet = false;

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 150;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute("id");

        if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
            navLinks.forEach(link => link.classList.remove("active"));

            const activeLink = document.querySelector(`.nav-menu a[href="#${sectionId}"]`);
            if (activeLink) {
                activeLink.classList.add("active");
                activeSet = true;
            }
        }
    });

    // fallback ke home (#)
    if (!activeSet) {
        const homeLink = document.querySelector('.nav-menu a[href="#"]');
        if (homeLink) {
            navLinks.forEach(link => link.classList.remove("active"));
            homeLink.classList.add("active");
        }
    }
}

document.addEventListener("DOMContentLoaded", setActiveOnScroll);
window.addEventListener("scroll", setActiveOnScroll);
