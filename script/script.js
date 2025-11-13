// Deklarasi Variabel / Element
const header = document.querySelector('header');
const headerNavbar = document.querySelector('nav');
const stickyNavbar = headerNavbar.cloneNode(true);
const heroSection = document.getElementById('hero');

const navMenuDropdown = {
    "profile_nav": {
        "normal_btn": document.getElementById("navbar-profil"),
        "normal_dropdown": document.getElementById('navbar-profil-dropdown'),
        "sticky_btn": stickyNavbar.querySelector('#navbar-profil'),
        "sticky_dropdown": stickyNavbar.querySelector('#navbar-profil-dropdown'),
    },
    "information_nav": {
        "normal_btn": document.getElementById('navbar-informasi'),
        "normal_dropdown": document.getElementById('navbar-informasi-dropdown'),
        "sticky_btn": stickyNavbar.querySelector('#navbar-informasi'),
        "sticky_dropdown": stickyNavbar.querySelector('#navbar-informasi-dropdown'),
    }
}

// Object
const navbarObserver = new IntersectionObserver(([entry]) => {
    if (entry.intersectionRatio <= 0.99 && !document.body.contains(stickyNavbar)) {
        // Ketika navbar menempel di atas
        document.body.insertBefore(stickyNavbar, header);
        headerNavbar.style.opacity = '0';
    }
    else if (document.body.contains(stickyNavbar)) {
        // Ketika navbar di header
        document.body.removeChild(stickyNavbar);
        headerNavbar.style.opacity = '1';
    }
}, { threshold: [0.99, 1.0] });

function toggleDropdown(pressedBtn) {
    if (!navbarObserver || !jumlahDataObserver) return;
    Object.values(navMenuDropdown).forEach(menu => {
        const buttons = [menu.normal_btn, menu.sticky_btn];
        const dropdowns = [menu.normal_dropdown, menu.sticky_dropdown];
        if (!buttons.includes(pressedBtn)) {
            buttons.forEach(btn => { btn.classList.remove('active'); });
            dropdowns.forEach(d => { d.classList.remove('show'); });
        }
        else {
            buttons.forEach(btn => { btn.classList.toggle('active'); });
            dropdowns.forEach(d => { d.classList.toggle('show'); });
        }
    });
}

function handleClickOutside(event) {
    if (!navbarObserver || !jumlahDataObserver) return;
    Object.values(navMenuDropdown).forEach(menu => {
        const buttons = [menu.normal_btn, menu.sticky_btn];
        const dropdowns = [menu.normal_dropdown, menu.sticky_dropdown];
        const clickable = buttons.concat(dropdowns).filter(Boolean);
        const clickedInside = clickable.some(el => el.contains && el.contains(event.target));
        if (!clickedInside) {
            buttons.forEach(btn => { if (btn) btn.classList.remove('active'); });
            dropdowns.forEach(d => { if (d) d.classList.remove('show'); });
        }
    });
}

// Event listeners
Object.values(navMenuDropdown).forEach(menu => {
    menu.normal_btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleDropdown(e.target);
    });
    menu.sticky_btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleDropdown(e.target);
    });
});

// Main
navbarObserver?.observe(headerNavbar);
jumlahDataObserver?.observe(jumlahSiswaElement);

document.addEventListener('click', handleClickOutside);



