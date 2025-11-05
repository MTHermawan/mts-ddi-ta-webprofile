// Deklarasi Variabel / Element
const siteHeader = document.querySelector('div.site-header');
const headerNavbar = document.querySelector('nav');

// Object
const observer = new IntersectionObserver(([entry]) => {
    if (entry.intersectionRatio > 0) {
        if (headerNavbar.classList.contains('stuck'))
            headerNavbar.classList.remove('stuck');
    }
    else {
        if (!headerNavbar.classList.contains('stuck'))
            headerNavbar.classList.add('stuck');
    }
    console.log(entry.intersectionRatio);
}, { threshold: [0] });


// Main
observer.observe(siteHeader);