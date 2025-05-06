function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    
    // Toggle kelas 'active' pada sidebar dan main content
    sidebar.classList.toggle('active');
    mainContent.classList.toggle('active');

    // Tambahkan logika penutupan manual jika perlu
    if (sidebar.classList.contains('active')) {
        document.addEventListener('click', closeSidebarOutside);
    } else {
        document.removeEventListener('click', closeSidebarOutside);
    }
}

// Fungsi untuk menutup sidebar saat klik di luar
function closeSidebarOutside(e) {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.querySelector('.menu-toggle');

    if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
        sidebar.classList.remove('active');
        document.getElementById('mainContent').classList.remove('active');
        document.removeEventListener('click', closeSidebarOutside);
    }
}