const jumlahSiswaElement = document.getElementById('value_jumlah_siswa');
const jumlahGuruElement = document.getElementById('value_jumlah_guru');
const jumlahLulusanElement = document.getElementById('value_jumlah_lulusan');
const jumlahSiswa = 720;
const jumlahGuru = 64;
const jumlahLulusan = 3500;
const jumlahDataDuration = 3;

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

jumlahDataObserver?.observe(jumlahSiswaElement);