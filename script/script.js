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
const jumlahDataDuration = 2.5;


// Object
const navbarObserver = new IntersectionObserver(([entry]) => {
    if (entry.intersectionRatio <= 0.99 && !document.body.contains(stickyNavbar)) {
        document.body.insertBefore(stickyNavbar, header);
        headerNavbar.style.opacity = '0';
    }
    else if (document.body.contains(stickyNavbar)) {
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
            const progress = 1 - Math.pow(1 - Math.min(1, (elapsedTimes / jumlahDataDuration)), 2.5); // 0 - 1

            jumlahSiswaElement.innerHTML = Math.floor(jumlahSiswa * progress) + "+";
            jumlahGuruElement.innerHTML = Math.floor(jumlahGuru * progress) + "+";
            jumlahLulusanElement.innerHTML = Math.floor(jumlahLulusan * progress) + "+";
            if (progress > 1) clearInterval(intervalStopwatch);
        }, 35);
    }
}, { threshold: [0.25] });

// Main
// Setting up cloned navbar
stickyNavbar.id = '';
stickyNavbar.classList.add('stuck');
stickyNavbar.style.zIndex = '1000';

navbarObserver.observe(headerNavbar);
jumlahDataObserver.observe(jumlahSiswaElement);
