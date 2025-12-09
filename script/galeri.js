// Ambil elemen popup
const popup = document.getElementById("popup");
const popupImg = document.getElementById("popupImg");
const popupTitle = document.getElementById("popupTitle");
const popupDesc = document.getElementById("popupDesc");

const closeBtn = document.getElementById("closeBtn");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

// Ambil semua card galeri
const cards = document.querySelectorAll(".gallery-card");

// Simpan index gambar aktif
let currentIndex = 0;

// Buka popup
function openPopup(index) {
    currentIndex = index;

    const card = cards[index];
    const imgSrc = card.querySelector("img").src;
    const title = card.dataset.title;
    const desc = card.dataset.desc;

    popupImg.src = imgSrc;
    popupTitle.textContent = title;
    popupDesc.textContent = desc;

    popup.classList.add("active"); // Tampil
}

// Tutup popup
function closePopup() {
    popup.classList.remove("active");
}

// NEXT
function nextImage() {
    currentIndex = (currentIndex + 1) % cards.length;
    openPopup(currentIndex);
}

// PREV
function prevImage() {
    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
    openPopup(currentIndex);
}

// Event click pada setiap card
cards.forEach((card, index) => {
    card.addEventListener("click", () => openPopup(index));
});

// Tombol close
closeBtn.addEventListener("click", closePopup);

// Tombol slide
nextBtn.addEventListener("click", nextImage);
prevBtn.addEventListener("click", prevImage);

// Klik luar popup → tutup
popup.addEventListener("click", (e) => {
    if (e.target === popup) closePopup();
});
