/**
 * Membuat notifikasi baru yang otomatis hilang dan dihapus dari DOM
 * @param {string} message - Pesan notifikasi
 * @param {number} duration - Durasi tampil (ms)
 * @param {string} type - success | error | warning | info
 */
function showNotification(message, duration = 2000, type = "success") {
  const types = {
    success: { class: "success", icon: "fa-check-circle", title: "Berhasil!" },
    error: { class: "error", icon: "fa-exclamation-circle", title: "Gagal!" },
    warning: { class: "warning", icon: "fa-triangle-exclamation", title: "Peringatan!" },
    info: { class: "info", icon: "fa-info-circle", title: "Informasi" },
  };

  const cfg = types[type] || types.success;

  // Buat elemen baru (selalu baru)
  const el = document.createElement("div");
  el.className = `notification-popup ${cfg.class}`;
  el.innerHTML = `
      <div class="notification-icon">
          <i class="fa-solid ${cfg.icon}"></i>
      </div>
      <div class="notification-content">
          <div class="notification-title">${cfg.title}</div>
          <div class="notification-message">${message}</div>
      </div>
  `;

  // Tambahkan ke body
  document.body.appendChild(el);

  // Trigger animasi tampil
  setTimeout(() => el.classList.add("show"), 10);

  // Timer untuk menghilangkan
  setTimeout(() => {
    el.classList.remove("show");
    setTimeout(() => el.remove(), 300); // beri waktu animasi hide
  }, duration);
}

// Fungsi ringkas
function showSuccess(msg, dur = 2000) { showNotification(msg, dur, "success"); }
function showError(msg, dur = 3000) { showNotification(msg, dur, "error"); }
function showWarning(msg, dur = 2500) { showNotification(msg, dur, "warning"); }
function showInfo(msg, dur = 2000) { showNotification(msg, dur, "info"); }

// Export ke window
window.showNotification = showNotification;
window.showSuccess = showSuccess;
window.showError = showError;
window.showWarning = showWarning;
window.showInfo = showInfo;
