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

function OpenPopup(id_form_popup) {
    const popup = document.getElementById(id_form_popup);
    const overlay = popup.querySelector(".popup-overlay");
    const topbar = document.querySelector(".top-bar");

    // compute scrollbar width and set CSS variable to compensate layout shift
    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
    document.body.style.setProperty('--scrollbar-compensation', (scrollbarWidth > 0 ? scrollbarWidth : 0) + 'px');

    popup.classList.add("open");
    overlay.classList.add("open");

    document.body.classList.add("popup-open");
    topbar.classList.add("popup-open");
}

function ClosePopup(id_form_popup) {
    const popup = document.getElementById(id_form_popup);
    const overlay = popup.querySelector(".popup-overlay");
    const topbar = document.querySelector(".top-bar");

    overlay.classList.remove("open");
    setTimeout(() => {
        popup.classList.remove("open");

        // remove compensation after animation completes
        document.body.style.removeProperty('--scrollbar-compensation');
    }, 220);

    document.body.classList.remove("popup-open");
    topbar.classList.remove("popup-open");
}