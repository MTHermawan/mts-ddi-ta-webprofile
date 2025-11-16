// document.querySelectorAll(".menu-item").forEach((item) => {
//   item.addEventListener("click", function (e) {
//     e.preventDefault();

//     // Hapus class active dari semua menu items
//     document.querySelectorAll(".menu-item").forEach((i) => {
//       i.classList.remove("active");
//     });

//     // Tambahkan class active ke menu item yang diklik
//     this.classList.add("active");
//   });
// });

// const btnAddGuru = document.getElementById("btn_tambah_guru");
// const main = document.querySelector(".main");

// btnAddGuru.addEventListener("click", () => {
//     alert(main);
//     document.append(```
//         <section class="popup">
//       <form class="popup-tambah">
//         <h1>Tambah Guru</h1>
//         <div class="popup-input-group">
//           <div class="popup-input">
//             <label for="nama">Nama Lengkap</label>
//             <input type="text" name="nama" id="nama">
//           </div>
//         </div>
//         <div class="popup-input-group">
//           <div class="popup-input">
//             <label for="mapel">Mapel</label>
//             <input type="text" name="mapel" id="gelar">
//           </div>
//           <div class="popup-input">
//             <label for="gelar">Gelar</label>
//             <input type="text" name="gelar" id="gelar">
//           </div>
//         </div>
//         <div class="popup-input-group">
//           <div class="popup-input-gambar">
//             <label for="foto_guru">
//               <img src="../assets/icon-tambah-gambar.svg" alt="">Tambah Gambar
//             </label>
//             <input type="file" name="foto_guru" id="foto_guru">
//           </div>
//           <button type="submit" class="popup-button-tambah">Tambah</button>
//           <button type="button" class="popup-button-kembali" onclick="ClosePopup('popup-tambah')">Kembali</button>
//         </div>
//       </form>
//     </section>
//   </div>
//         ```);
// });

//                      POP UP
// function OpenPopup(id_form_popup) {
//     const popup = document.getElementById(id_form_popup);
//     const overlay = popup.querySelector(".popup-overlay");
//     // const topbar = document.querySelector(".top-bar");

//     const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
//     document.body.style.setProperty('--scrollbar-compensation', (scrollbarWidth > 0 ? scrollbarWidth : 0) + 'px');

//     popup.classList.add("open");
//     overlay.classList.add("open");

//     document.body.classList.add("popup-open");
//     // topbar.classList.add("popup-open");
// }

// function ClosePopup(id_form_popup) {
//     const popup = document.getElementById(id_form_popup);
//     const overlay = popup.querySelector(".popup-overlay");
//     // const topbar = document.querySelector(".top-bar");

//     overlay.classList.remove("open");
//     setTimeout(() => {
//         popup.classList.remove("open");

//         document.body.style.removeProperty('--scrollbar-compensation');
//     }, 220);

//     document.body.classList.remove("popup-open");
//     // topbar.classList.remove("popup-open");
// }

// function SetInputValue(inputId, newValue)
// {
//     const target = document.querySelector('input#'+inputId);
//     target.value = newValue;
// }

// Elemen DOM
const popup = document.getElementById("popup");
const imageUploadArea = document.getElementById("imageUploadArea");
const imageInput = document.getElementById("imageInput");
const imagePlaceholder = document.getElementById("imagePlaceholder");
const imagePreview = document.getElementById("imagePreview");
const previewImage = document.getElementById("previewImage");

// Fungsi buka/tutup popup
function openPopup() {
  popup.style.display = "flex";
}

function closePopup() {
  popup.style.display = "none";
  document.body.style.overflow = "auto";
  resetForm();
}

// Tutup popup ketika klik di luar konten
popup.addEventListener("click", function (e) {
  if (e.target === popup) {
    closePopup();
  }
});

// Event untuk upload area
imageUploadArea.addEventListener("click", function () {
  imageInput.click();
});

imageUploadArea.addEventListener("dragover", function (e) {
  e.preventDefault();
  imageUploadArea.classList.add("dragover");
});

imageUploadArea.addEventListener("dragleave", function () {
  imageUploadArea.classList.remove("dragover");
});

imageUploadArea.addEventListener("drop", function (e) {
  e.preventDefault();
  imageUploadArea.classList.remove("dragover");

  const files = e.dataTransfer.files;
  if (files.length > 0) {
    handleImageSelection(files[0]);
  }
});

// Event untuk input file
imageInput.addEventListener("change", function (e) {
  if (e.target.files.length > 0) {
    handleImageSelection(e.target.files[0]);
  }
});

// Fungsi untuk menangani pemilihan gambar
function handleImageSelection(file) {
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      previewImage.src = e.target.result;
      imagePlaceholder.style.display = "none";
      imagePreview.style.display = "flex";
    };

    reader.readAsDataURL(file);
  } else {
    alert("Please select a valid image file (PNG, JPG, JPEG)");
  }
}

// Fungsi untuk trigger input file
function triggerImageInput() {
  imageInput.click();
}

// Fungsi untuk menghapus gambar
function removeImage() {
  imageInput.value = "";
  imagePreview.style.display = "none";
  imagePlaceholder.style.display = "flex";
}

// Fungsi untuk submit form
function submitForm() {
  const title = document.getElementById("titleInput").value;
  const description = document.getElementById("descriptionInput").value;
  const category = document.getElementById("categoryInput").value;
  const imageFile = imageInput.files[0];

  if (!title.trim()) {
    alert("Judul harus diisi!");
    return;
  }

  if (!imageFile) {
    alert("Gambar harus diupload!");
    return;
  }

  // Di sini Anda bisa mengirim data ke server
  console.log("Data yang akan dikirim:");
  console.log("Judul:", title);
  console.log("Deskripsi:", description);
  console.log("Kategori:", category);
  console.log("Gambar:", imageFile);

  alert("Data berhasil disimpan!");
  closePopup();
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("descriptionInput").value = "";
  document.getElementById("categoryInput").value = "";
  removeImage();
}
