// --- FUNGSI UNTUK LOGO SEKOLAH ---
const fileInputLogo = document.getElementById("fileInputLogo");
const previewImgLogo = document.getElementById("previewImgLogo");
const placeholderLogo = document.getElementById("placeholderLogo");
const imagePreviewBoxLogo = document.getElementById("imagePreviewLogo");
const removeBtnLogo = document.getElementById("removeBtnLogo");

fileInputLogo.addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImgLogo.src = e.target.result;
      previewImgLogo.style.display = "block";
      removeBtnLogo.style.display = "inline-flex"; // Gunakan inline-flex agar icon rapi
      placeholderLogo.style.display = "none";
      imagePreviewBoxLogo.style.borderStyle = "solid";
      imagePreviewBoxLogo.style.borderColor = "#e9ecef";
    };
    reader.readAsDataURL(file);
  }
});

removeBtnLogo.addEventListener("click", function () {
  fileInputLogo.value = "";
  previewImgLogo.src = "";
  previewImgLogo.style.display = "none";
  removeBtnLogo.style.display = "none";
  placeholderLogo.style.display = "flex";
  imagePreviewBoxLogo.style.borderStyle = "dashed";
  imagePreviewBoxLogo.style.borderColor = "#ced4da";
});

// --- FUNGSI UNTUK VISUAL UTAMA (HERO) ---
const fileInputHero = document.getElementById("fileInputHero");
const previewImgHero = document.getElementById("previewImgHero");
const placeholderHero = document.getElementById("placeholderHero");
const imagePreviewBoxHero = document.getElementById("imagePreviewHero");
const removeBtnHero = document.getElementById("removeBtnHero");

fileInputHero.addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImgHero.src = e.target.result;
      previewImgHero.style.display = "block";
      removeBtnHero.style.display = "inline-flex"; // Gunakan inline-flex
      placeholderHero.style.display = "none";
      imagePreviewBoxHero.style.borderStyle = "solid";
      imagePreviewBoxHero.style.borderColor = "#e9ecef";
    };
    reader.readAsDataURL(file);
  }
});

removeBtnHero.addEventListener("click", function () {
  fileInputHero.value = "";
  previewImgHero.src = "";
  previewImgHero.style.display = "none";
  removeBtnHero.style.display = "none";
  placeholderHero.style.display = "flex";
  imagePreviewBoxHero.style.borderStyle = "dashed";
  imagePreviewBoxHero.style.borderColor = "#ced4da";
});

async function ReloadFormData() {
  const res = await fetch("./get/pengaturan/getPengaturan.php", {
    method: "GET"
  });
  result = await res.json();
  console.log(result);

  const forms = document.getElementsByTagName("form");
  let formInputs = [];

  for (let form of forms) {
    formInputs = [...formInputs, ...form.getElementsByTagName("input")];
  }

  for (let input of formInputs) {
    if (!result[input.name]) {
      continue;
    }

    let value = result[input.name];

    if (input.type != "file") {
      // Reload teks
      input.value = value;
    }
    else if (await IsUrlFound("assets/" + value)) {
      // Reload gambar
      value = "../assets/" + value;
      handleResumeInput(input.id, value);
    }
  }
}

async function SubmitPengaturan(formId) {
  const form = document.getElementById(formId);
  const formData = new FormData();

  for (const el of form.elements) {
    console.log(el);
    if (!el.name) continue;

    if (el.type === "file") {
      if (el.files.length > 0) {
        formData.append(el.name, el.files[0]);
      }
      else {
        formData.append(el.name, "");
      }
    }
    else {
      formData.append(el.name, el.value);
    }
  }

  const res = await fetch("./post/pengaturan/update-pengaturan.php", {
    method: "POST",
    body: formData
  });

  const result = await res.json();
  showNotification(message = result.message, 3000, result.status);
}

async function SubmitChangePassword() {
  const input_password_baru = document.getElementById("input_password_baru");
  const input_konfirmasi_password = document.getElementById("input_konfirmasi_password");
  const password_baru = input_password_baru.value;
  const konfirmasi_password = input_konfirmasi_password.value;
  const formData = new FormData();

  formData.append('password_baru', password_baru);
  formData.append('konfirmasi_password', konfirmasi_password);

  const res = await fetch("./post/pengaturan/update-password.php", {
    method: "POST",
    body: formData
  });

  const result = await res.json();
  showNotification(message = result.message, 3000, result.status);

  if (result.status == 'success') {
    input_password_baru.value = '';
    input_konfirmasi_password.value = '';
  }
}

window.onload = () => {
  ReloadFormData();
}
