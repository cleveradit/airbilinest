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

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.toggle-access');

    buttons.forEach(button => {
        // Set class CSS awal berdasarkan status akses
        const currentAccess = button.getAttribute('data-access');
        if (currentAccess == 1) {
            button.classList.add('active'); // Tombol aktif (hijau)
        } else {
            button.classList.add('inactive'); // Tombol nonaktif (merah)
        }

        button.addEventListener('click', function() {
            console.log('Tombol diklik'); // Debugging
            const userId = this.getAttribute('data-user-id');
            const currentAccess = this.getAttribute('data-access');
            console.log('User ID:', userId, 'Current Access:', currentAccess); // Debugging
            const newAccess = currentAccess == 1 ? 0 : 1; // Toggle nilai akses

            // Kirim permintaan AJAX ke server
            fetch('update_access.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                credentials: 'include', // Kirim cookie session
                body: JSON.stringify({
                    user_id: userId,
                    app_access: newAccess
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respons dari server:', data); // Debugging
                if (data.success) {
                    // Update tampilan tombol dan status akses
                    this.setAttribute('data-access', newAccess);
                    this.textContent = newAccess ? 'Aktif' : 'Nonaktif';

                    // Update class CSS berdasarkan status baru
                    if (newAccess == 1) {
                        this.classList.remove('inactive');
                        this.classList.add('active');
                    } else {
                        this.classList.remove('active');
                        this.classList.add('inactive');
                    }

                    // Update teks status akses di kolom sebelumnya
                    // const accessCell = this.closest('tr').querySelector('td:nth-child(6)');
                    // accessCell.textContent = newAccess ? 'Aktif' : 'Nonaktif';
                } else {
                    alert('Gagal memperbarui status akses.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});