// Deklarasi Variabel / Element

// Header
const header = document.querySelector('header');
const headerNavbar = document.querySelector('nav');
const stickyNavbar = headerNavbar.cloneNode(true);
const heroSection = document.getElementById('hero');

const jumlahSiswaElement = document.getElementById('value_jumlah_siswa');
const jumlahGuruElement = document.getElementById('value_jumlah_guru');
const jumlahLulusanElement = document.getElementById('value_jumlah_lulusan');
const jumlahSiswa = 720;
const jumlahGuru = 64;
const jumlahLulusan = 3500;
const jumlahDataDuration = 3;

const profileButton = document.getElementById("navbar-profil")
const profileDropdown = document.getElementById('navbar-profil-dropdown');
const stickyProfileButton = stickyNavbar.querySelector('#navbar-profil');
const stickyProfileDropdown = stickyNavbar.querySelector('#navbar-profil-dropdown');

const infoButton = document.getElementById('navbar-informasi');
const infoDropdown = document.getElementById('navbar-informasi-dropdown');
const stickyInfoButton = stickyNavbar.querySelector('#navbar-informasi');
const stickyInfoDropdown = stickyNavbar.querySelector('#navbar-informasi-dropdown');



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

const jumlahDataObserver = new IntersectionObserver(([entry]) => {
    if (entry.isIntersecting && entry.intersectionRatio > 0.25) {
        jumlahDataObserver.unobserve(jumlahSiswaElement);
        
        const startTime = performance.now();
        intervalStopwatch = setInterval(() => {
            const currentTime = performance.now();
            const elapsedTimes = (currentTime - startTime) / 1000;
            const progress = 1 - Math.pow(1 - Math.min(1, (elapsedTimes / jumlahDataDuration)), 3); // 0 - 1

            jumlahSiswaElement.innerHTML = Math.floor(jumlahSiswa * progress) + "+";
            jumlahGuruElement.innerHTML = Math.floor(jumlahGuru * progress) + "+";
            jumlahLulusanElement.innerHTML = Math.floor(jumlahLulusan * progress) + "+";
            if (progress > 1) clearInterval(intervalStopwatch);
        }, 35);
    }
}, { threshold: [0.25] });

// Function
function toggleDropdown(button, dropdownMenu) {
    dropdownMenu.classList.toggle('show');
    button.classList.toggle('active');
    
    const navButtons = document.querySelectorAll('nav ul li');
    navButtons.forEach(btn => {
        if (btn !== button) {
            btn.classList.remove('active');
        }
    });
}

function handleClickOutside(event) {
    if (!profileButton.contains(event.target) && !stickyProfileButton.contains(event.target)) {
        profileDropdown.classList.remove('show');
        stickyProfileDropdown.classList.remove('show');
        profileButton.classList.remove('active');
        stickyProfileButton.classList.remove('active');
    }
}

function handleClickOutside(event) {
    if (!profileButton.contains(event.target) && 
        !stickyProfileButton.contains(event.target) && 
        !infoButton.contains(event.target) && 
        !stickyInfoButton.contains(event.target)) {
        
        profileDropdown.classList.remove('show');
        stickyProfileDropdown.classList.remove('show');
        profileButton.classList.remove('active');
        stickyProfileButton.classList.remove('active');
        
        infoDropdown.classList.remove('show');
        stickyInfoDropdown.classList.remove('show');
        infoButton.classList.remove('active');
        stickyInfoButton.classList.remove('active');
    }
}

// Event listeners
profileButton.addEventListener('click', (e) => {
    e.preventDefault();
    toggleDropdown(profileButton, profileDropdown);
    // Sync with sticky nav
    stickyProfileButton.classList.toggle('active');
    stickyProfileDropdown.classList.toggle('show');
});

stickyProfileButton.addEventListener('click', (e) => {
    e.preventDefault();
    toggleDropdown(stickyProfileButton, stickyProfileDropdown);
    // Sync with main nav
    profileButton.classList.toggle('active');
    profileDropdown.classList.toggle('show');
});

// Add these event listeners with the other ones
infoButton.addEventListener('click', (e) => {
    e.preventDefault();
    toggleDropdown(infoButton, infoDropdown);
    // Sync with sticky nav
    stickyInfoButton.classList.toggle('active');
    stickyInfoDropdown.classList.toggle('show');
});

stickyInfoButton.addEventListener('click', (e) => {
    e.preventDefault();
    toggleDropdown(stickyInfoButton, stickyInfoDropdown);
    // Sync with main nav
    infoButton.classList.toggle('active');
    infoDropdown.classList.toggle('show');
});

// Main
// Setting up cloned navbar
stickyNavbar.id = '';
stickyNavbar.classList.add('stuck');
stickyNavbar.style.zIndex = '1000';

navbarObserver.observe(headerNavbar);
jumlahDataObserver.observe(jumlahSiswaElement);

// Close dropdown when clicking outside
document.addEventListener('click', handleClickOutside);



