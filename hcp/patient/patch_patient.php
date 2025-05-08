<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil ID pasien dari input hidden
    $id = $_POST['id']; // Pastikan form edit mengirimkan ini

    // Ambil semua data dari form
    $nama_pasien = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $berat_lahir = $_POST['berat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $umur_kehamilan = $_POST['umur_kehamilan'];
    $skor_apgar = $_POST['skor_apgar'];
    $cara_lahir = $_POST['cara_lahir'];
    $golongan_darah = $_POST['golongan_darah'];
    $rhesus = $_POST['rhesus'];
    $etnis_ayah = $_POST['etnis_ayah'];
    $etnis_ibu = $_POST['etnis_ibu'];
    $rhesus_ibu = $_POST['rhesus_ibu'];
    $golongan_darah_ibu = $_POST['golongan_darah_ibu'];

    // Buat query UPDATE
    $sql = "UPDATE patients SET
        nama_pasien = '$nama_pasien',
        jenis_kelamin = '$jenis_kelamin',
        berat_lahir = '$berat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        umur_kehamilan = '$umur_kehamilan',
        skor_apgar = '$skor_apgar',
        cara_lahir = '$cara_lahir',
        golongan_darah = '$golongan_darah',
        rhesus = '$rhesus',
        etnis_ayah = '$etnis_ayah',
        etnis_ibu = '$etnis_ibu',
        rhesus_ibu = '$rhesus_ibu',
        golongan_darah_ibu = '$golongan_darah_ibu'
        WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Data pasien berhasil diperbarui!');
            window.location.href = 'patient.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui data: " . $conn->error . "');
            window.location.href = 'edit_patient.php?id=$id';
        </script>";
    }

    $conn->close();
}
?>
