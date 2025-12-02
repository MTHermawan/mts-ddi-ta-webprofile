// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;

// Data guru hardcoded (tambah data untuk demo pagination)
let staffData = [
  {
    id_staff: 1,
    nama_staff: "Lindsey Curtis",
    jabatan: "Guru",
    mapel: "Teknologi Informasi",
    pendidikan: "S.Kom",
    url_foto: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 2,
    nama_staff: "Kaiya George",
    jabatan: "Guru",
    mapel: "Manajemen Proyek",
    pendidikan: "M.M",
    url_foto: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 3,
    nama_staff: "Zain Geldt",
    jabatan: "Guru",
    mapel: "Bahasa Indonesia",
    pendidikan: "S.S",
    url_foto: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 4,
    nama_staff: "Abram Schleifer",
    jabatan: "Guru",
    mapel: "Pemasaran Digital",
    pendidikan: "M.M",
    url_foto: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 5,
    nama_staff: "Carla George",
    jabatan: "Guru",
    mapel: "Pemrograman Web",
    pendidikan: "S.Kom",
    url_foto: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  }
  // Tambahkan lebih banyak data untuk demo pagination
];

// Generate data dummy tambahan untuk demo pagination
function generateDummyData(count) {
  const names = ["Budi Santoso", "Sari Dewi", "Agus Wijaya", "Rina Kartika", "Eko Prasetyo", "Dewi Lestari", "Hendra Gunawan", "Maya Indah", "Fajar Rahman", "Lina Wati"];
  const subjects = ["Matematika", "Bahasa Inggris", "IPA", "IPS", "Seni Budaya", "PJOK", "Agama", "Sejarah", "Geografi", "Ekonomi"];
  const degrees = ["S.Pd", "M.Pd", "S.S", "M.Si", "S.T", "M.T"];
  
  for (let i = 6; i <= count; i++) {
    const randomName = names[Math.floor(Math.random() * names.length)];
    const randomSubject = subjects[Math.floor(Math.random() * subjects.length)];
    const randomDegree = degrees[Math.floor(Math.random() * degrees.length)];
    
    staffData.push({
      id_staff: i,
      nama_staff: randomName,
      jabatan: "Guru",
      mapel: randomSubject,
      pendidikan: randomDegree,
      url_foto: `https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80&v=${i}`,
    });
  }
}

// Generate 30 data dummy untuk demo pagination
generateDummyData(30);

// Fungsi untuk menampilkan data pada halaman tertentu
function displayTableData(page = 1) {
  const tbody = document.querySelector('tbody');
  const emptyData = document.getElementById("emptyData");
  const tableContainer = document.querySelector('.table-container');
  const paginationContainer = document.getElementById("paginationContainer");
  
  // Jika tidak ada data
  if (staffData.length === 0) {
    emptyData.style.display = "flex";
    tableContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }
  
  emptyData.style.display = "none";
  tableContainer.style.display = "block";
  paginationContainer.style.display = "flex";
  
  // Kosongkan tabel
  tbody.innerHTML = '';
  
  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, staffData.length);
  const pageData = staffData.slice(startIndex, endIndex);
  
  // Tampilkan data
  pageData.forEach((staff, index) => {
    const row = document.createElement('tr');
    const globalIndex = startIndex + index;
    
    row.innerHTML = `
      <td>
        <div class="teacher-info">
          <div class="teacher-avatar">
            <img src="${staff.url_foto}" alt="${staff.nama_staff}" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
            <div class="teacher-avatar-initials">${getInitials(staff.nama_staff)}</div>
          </div>
          <div class="teacher-details">
            <h3>${staff.nama_staff}</h3>
          </div>
        </div>
      </td>
      <td><span class="position">${staff.jabatan}</span></td>
      <td><span class="subject">${staff.mapel}</span></td>
      <td><span class="degree">${staff.pendidikan}</span></td>
      <td>
        <div class="action-buttons">
          <button class="btn btn-edit" data-id="${staff.id_staff}">
            <i class="fa-regular fa-pen-to-square"></i> Edit
          </button>
          <button class="btn btn-delete" data-id="${staff.id_staff}">
            <i class="fas fa-trash"></i> Hapus
          </button>
        </div>
      </td>
    `;
    
    tbody.appendChild(row);
  });
  
  // Update informasi pagination
  updatePaginationInfo(page);
  
  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk mendapatkan inisial nama
function getInitials(name) {
  return name.split(' ')
    .map(word => word[0])
    .join('')
    .toUpperCase()
    .substring(0, 2);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, staffData.length);
  const totalData = staffData.length;
  
  document.getElementById("paginationInfo").textContent = 
    `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(staffData.length / recordsPerPage);
  const prevBtn = document.getElementById("prevPage");
  const nextBtn = document.getElementById("nextPage");
  const pageNumbers = document.getElementById("pageNumbers");
  
  // Update tombol prev/next
  prevBtn.disabled = page === 1;
  nextBtn.disabled = page === totalPages || totalPages === 0;
  
  // Update nomor halaman
  pageNumbers.innerHTML = '';
  
  // Tampilkan maksimal 5 nomor halaman
  let startPage = Math.max(1, page - 2);
  let endPage = Math.min(totalPages, startPage + 4);
  
  // Adjust jika kurang dari 5 halaman
  if (endPage - startPage < 4) {
    startPage = Math.max(1, endPage - 4);
  }
  
  // Tombol halaman pertama
  if (startPage > 1) {
    const firstPage = document.createElement('span');
    firstPage.className = 'page-number';
    firstPage.textContent = '1';
    firstPage.onclick = () => changePage(1);
    pageNumbers.appendChild(firstPage);
    
    if (startPage > 2) {
      const ellipsis = document.createElement('span');
      ellipsis.className = 'page-number';
      ellipsis.textContent = '...';
      ellipsis.style.cursor = 'default';
      ellipsis.style.pointerEvents = 'none';
      pageNumbers.appendChild(ellipsis);
    }
  }
  
  // Nomor halaman
  for (let i = startPage; i <= endPage; i++) {
    const pageNumber = document.createElement('span');
    pageNumber.className = `page-number ${i === page ? 'active' : ''}`;
    pageNumber.textContent = i;
    pageNumber.onclick = () => changePage(i);
    pageNumbers.appendChild(pageNumber);
  }
  
  // Tombol halaman terakhir
  if (endPage < totalPages) {
    if (endPage < totalPages - 1) {
      const ellipsis = document.createElement('span');
      ellipsis.className = 'page-number';
      ellipsis.textContent = '...';
      ellipsis.style.cursor = 'default';
      ellipsis.style.pointerEvents = 'none';
      pageNumbers.appendChild(ellipsis);
    }
    
    const lastPage = document.createElement('span');
    lastPage.className = 'page-number';
    lastPage.textContent = totalPages;
    lastPage.onclick = () => changePage(totalPages);
    pageNumbers.appendChild(lastPage);
  }
}

// Fungsi untuk ganti halaman
function changePage(page) {
  currentPage = page;
  displayTableData(page);
}

// Event listener untuk pagination
document.addEventListener('DOMContentLoaded', function() {
  // Event untuk tombol prev
  document.getElementById('prevPage').addEventListener('click', function() {
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  });
  
  // Event untuk tombol next
  document.getElementById('nextPage').addEventListener('click', function() {
    const totalPages = Math.ceil(staffData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });
  
  // Tampilkan data halaman pertama
  displayTableData(currentPage);
  
  // Event delegation untuk tombol edit dan delete di tabel
  document.querySelector('.table-container').addEventListener('click', function(e) {
    const editBtn = e.target.closest('.btn-edit');
    const deleteBtn = e.target.closest('.btn-delete');
    
    if (editBtn) {
      const id_staff = parseInt(editBtn.getAttribute('data-id'));
      openEditPopup(id_staff);
    }
    
    if (deleteBtn) {
      const id_staff = parseInt(deleteBtn.getAttribute('data-id'));
      const staff = GetStaffById(id_staff);
      if (staff) {
        openDeletePopup(id_staff);
      }
    }
  });
});

// Modifikasi fungsi submitForm untuk refresh tabel setelah CRUD
async function submitForm() {
  const nama = document.getElementById("inputName").value;
  const jabatan = document.getElementById("inputPosition").value;
  const mapel = document.getElementById("inputSubject").value;
  const pendidikan = document.getElementById("inputDegree").value;
  const foto_staff = document.getElementById("imageInput").files[0] ?? null;

  if (!nama.trim()) {
    alert("Nama harus diisi!");
    return;
  }

  let success = false;
  
  if (currentMode === "add") {
    success = await PostTambahStaff(nama, jabatan, mapel, pendidikan, foto_staff);
    alert(success ? "Data staff berhasil ditambahkan" : "Data staff gagal ditambahkan");
  } else {
    success = await PostEditStaff(currentEditId, nama, jabatan, mapel, pendidikan, foto_staff);
    alert(success ? `Data guru ${nama} berhasil diperbarui!` : "Data staff gagal diperbarui");
  }

  if (success) {
    // Refresh data dari server (dalam demo ini, kita refresh dari array lokal)
    // Di aplikasi nyata, Anda akan fetch data terbaru dari server
    displayTableData(currentPage);
    closePopup();
  }
}

// Modifikasi fungsi confirmDelete untuk refresh tabel
async function confirmDelete() {
  if (currentDeleteId) {
    const staff = GetStaffById(currentDeleteId);
    if (!staff) {
      alert('Staff tidak ditemukan!');
      return;
    }
     
    const success = await PostDeleteStaff(staff['id_staff']);
    alert(success ? `Data guru ${staff['nama_staff']} berhasil dihapus!` : `Data guru ${staff['nama_staff']} gagal dihapus!`);
    
    if (success) {
      // Refresh tabel
      displayTableData(currentPage);
      closeDeletePopup();
    }
  }
}
