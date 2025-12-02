/**
 * Menampilkan notifikasi popup
 * @param {string} message - Pesan yang akan ditampilkan
 * @param {number} duration - Durasi tampil dalam milidetik (default: 2000)
 * @param {string} type - Tipe notifikasi: 'success', 'error', 'warning', 'info' (default: 'success')
 */
function showNotification(message, duration = 2000, type = "success") {
  // Cari atau buat elemen notifikasi
  let notification = document.getElementById("global-notification");

  // Jika belum ada, buat elemen baru
  if (!notification) {
    notification = document.createElement("div");
    notification.id = "global-notification";
    notification.className = "notification-popup";
    notification.innerHTML = `
            <div class="notification-icon">
                <i class="fa-solid fa-check-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-title"></div>
                <div class="notification-message"></div>
            </div>
        `;
    document.body.appendChild(notification);
  }

  // Set tipe notifikasi
  const types = {
    success: {
      class: "success",
      icon: "fa-check-circle",
      title: "Berhasil!",
    },
    error: {
      class: "error",
      icon: "fa-exclamation-circle",
      title: "Gagal!",
    },
    warning: {
      class: "warning",
      icon: "fa-triangle-exclamation",
      title: "Peringatan!",
    },
    info: {
      class: "info",
      icon: "fa-info-circle",
      title: "Informasi",
    },
  };

  const typeConfig = types[type] || types.success;

  // Update class
  notification.className = "notification-popup";
  notification.classList.add(typeConfig.class);

  // Update konten
  notification.querySelector(".notification-icon i").className =
    "fa-solid " + typeConfig.icon;
  notification.querySelector(".notification-title").textContent =
    typeConfig.title;
  notification.querySelector(".notification-message").textContent = message;

  // Tampilkan notifikasi
  notification.classList.add("show");

  // Sembunyikan setelah durasi
  setTimeout(() => {
    notification.classList.remove("show");
  }, duration);
}

// Fungsi pendek untuk tipe tertentu
function showSuccess(message, duration = 2000) {
  showNotification(message, duration, "success");
}

function showError(message, duration = 3000) {
  showNotification(message, duration, "error");
}

function showWarning(message, duration = 2500) {
  showNotification(message, duration, "warning");
}

function showInfo(message, duration = 2000) {
  showNotification(message, duration, "info");
}

// Export fungsi ke window object agar bisa dipanggil dari mana saja
window.showNotification = showNotification;
window.showSuccess = showSuccess;
window.showError = showError;
window.showWarning = showWarning;
window.showInfo = showInfo;
