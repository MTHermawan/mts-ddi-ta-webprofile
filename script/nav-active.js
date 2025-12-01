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

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 150;  
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute("id");

        if (scrollY >= sectionTop && scrollY <= sectionTop + sectionHeight) {
            navLinks.forEach(link => link.classList.remove("active"));

            const activeLink = document.querySelector(`.nav-menu a[href="#${sectionId}"]`);
            if (activeLink) {
                activeLink.classList.add("active");
            }
        }
    });
    
    if (scrollY < document.querySelector("#about").offsetTop - 200) {
        navLinks.forEach(nav => nav.classList.remove('active'));
        document.querySelector('.nav-menu a[href="#"]').classList.add("active");
    }
}

window.addEventListener("scroll", setActiveOnScroll);
