// // Deklarasi Variabel / Element
// const siteHeader = document.querySelector('div.site-header');
// const headerNavbar = document.querySelector('nav');

// // Object
// const observer = new IntersectionObserver(([entry]) => {
//     if (entry.intersectionRatio > 0) {
//         if (headerNavbar.classList.contains('stuck'))
//             headerNavbar.classList.remove('stuck');
//     }
//     else {
//         if (!headerNavbar.classList.contains('stuck'))
//             headerNavbar.classList.add('stuck');
//     }
//     console.log(entry.intersectionRatio);
// }, { threshold: [0] });


// // Main
// observer.observe(siteHeader);

// Deklarasi Variabel / Element
const header = document.querySelector('header');
const headerNavbar = document.querySelector('nav');
const stickyNavbar = headerNavbar.cloneNode(true);
const heroSection = document.getElementById('hero');

// Object
const observer = new IntersectionObserver(([entry]) => {
    if (entry.intersectionRatio <= 0.99 && !document.body.contains(stickyNavbar)) {
        document.body.insertBefore(stickyNavbar, header);
        headerNavbar.style.opacity = '0';
    }
    else if (document.body.contains(stickyNavbar)) {
        document.body.removeChild(stickyNavbar);
        headerNavbar.style.opacity = '1';
    }
}, { threshold: [0.99, 1.0] });


// Main

// Setting up cloned navbar
stickyNavbar.id = '';
stickyNavbar.classList.add('stuck');
stickyNavbar.style.zIndex = '1000';

observer.observe(headerNavbar);