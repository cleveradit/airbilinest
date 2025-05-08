// script.js

// JavaScript untuk toggle sidebar



// const toggleButton = document.getElementById('toggleButton');

// const userprofile = document.getElementById('userprofile');



// toggleButton.addEventListener('click', () => {

//     userprofile.classList.toggle('active');

// });



function toggleMenu() {

    const navbar = document.getElementById("navbar_cust");

    navbar.classList.toggle("active");

}



function showModal() {

    document.getElementById('confirmationModal').style.display = 'block';

}



function closeModal() {

    document.getElementById('confirmationModal').style.display = 'none';

}



function submitForm() {

    window.location.href = 'https://airbilinest.com/hcp/logout.php';

}



function confirmDelete() {

    if (confirm("Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan!")) {

        window.location.href = 'delete_account.php'; // Arahkan ke file PHP untuk menghapus akun

    }

}

new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    },
    
    responsive: true
});
new DataTable('#example_medical_records', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    },
    
    responsive: true
});

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);        // tombol yang diklik
    var patientId = button.data('id');          // ambil data-id
    var modal = $(this);
    modal.find('#modal_patient_id').val(patientId); // isi input hidden
});

$('#deleteMedicalRecordModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);        // tombol yang diklik
    var medicalRecordId = button.data('id');          // ambil data-id
    var modal = $(this);
    console.log('tes')
    modal.find('#modal_medical_record_id').val(medicalRecordId); // isi input hidden
});