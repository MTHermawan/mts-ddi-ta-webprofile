/**
 * Fungsi Reusable untuk Upload File
 */
function setupCustomFileInput(ids) {
  const realInput = document.getElementById(ids.inputId);
  const actionBtn = document.getElementById(ids.btnId);
  const fileNameText = document.getElementById(ids.textId);
  const imgPreview = document.getElementById(ids.imgId);
  const previewContainer = document.getElementById(ids.containerId);

  // Cek Error: Jika salah satu ID tidak ada di HTML, stop dan beri info di console
  if (
    !realInput ||
    !actionBtn ||
    !fileNameText ||
    !imgPreview ||
    !previewContainer
  ) {
    console.error(
      "Salah satu ID elemen tidak ditemukan. Cek HTML dan JS Anda:",
      ids
    );
    return;
  }

  // --- FUNGSI RESET LOKAL ---
  function resetInput() {
    realInput.value = "";

    fileNameText.textContent = "No file chosen";
    fileNameText.style.color = "#495057";

    actionBtn.textContent = "Choose File";
    actionBtn.classList.remove("delete-mode");

    previewContainer.style.display = "none";
    imgPreview.src = "";
  }

  // --- EVENT LISTENERS ---

  // 1. Klik Tombol Kiri
  actionBtn.addEventListener("click", function () {
    if (actionBtn.classList.contains("delete-mode")) {
      resetInput();
    } else {
      realInput.click();
    }
  });

  // 2. Klik Teks Nama File
  fileNameText.addEventListener("click", function () {
    realInput.click();
  });

  // 3. Saat File Dipilih
  realInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
      fileNameText.textContent = file.name;
      fileNameText.style.color = "#333";

      actionBtn.innerHTML = '<i class="fa-solid fa-trash"></i> Hapus';
      actionBtn.classList.add("delete-mode");

      if (file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.onload = function (e) {
          imgPreview.src = e.target.result;
          previewContainer.style.display = "block";
        };
        reader.readAsDataURL(file);
      }
    }
  });
}

// --- PEMANGGILAN FUNGSI (BAGIAN INI YANG DIPERBAIKI) ---

// 1. Setup untuk STAFF
setupCustomFileInput({
  inputId: "realFileInputStaff",
  btnId: "actionBtnStaff",
  textId: "fileNameTextStaff",
  imgId: "imgPreviewStaff",
  containerId: "previewContainerStaff",
});

// 2. Setup untuk MURID (ID Disesuaikan dengan HTML)
setupCustomFileInput({
  inputId: "realFileInputMurid",
  btnId: "actionBtnMurid",
  textId: "fileNameTextMurid",
  imgId: "imgPreviewMurid",
  containerId: "previewContainerMurid",
});

// Setup untuk Nilai Dasar 1
setupCustomFileInput({
  inputId: "realFileInputND1",
  btnId: "actionBtnND1",
  textId: "fileNameTextND1",
  imgId: "imgPreviewND1",
  containerId: "previewContainerND1",
});

// Setup untuk Nilai Dasar 2
setupCustomFileInput({
  inputId: "realFileInputND2",
  btnId: "actionBtnND2",
  textId: "fileNameTextND2",
  imgId: "imgPreviewND2",
  containerId: "previewContainerND2",
});

// Setup untuk Nilai Dasar 3
setupCustomFileInput({
  inputId: "realFileInputND3",
  btnId: "actionBtnND3",
  textId: "fileNameTextND3",
  imgId: "imgPreviewND3",
  containerId: "previewContainerND3",
});

// Setup untuk Nilai Dasar 4
setupCustomFileInput({
  inputId: "realFileInputND4",
  btnId: "actionBtnND4",
  textId: "fileNameTextND4",
  imgId: "imgPreviewND4",
  containerId: "previewContainerND4",
});