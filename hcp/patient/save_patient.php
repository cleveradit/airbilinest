<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    $sql = "INSERT INTO patients (
        nama_pasien, jenis_kelamin, berat_lahir, tanggal_lahir, umur_kehamilan,
        skor_apgar, cara_lahir, golongan_darah, rhesus,
        etnis_ayah, etnis_ibu, rhesus_ibu, golongan_darah_ibu
    ) VALUES (
        '$nama_pasien', '$jenis_kelamin', '$berat_lahir', '$tanggal_lahir', '$umur_kehamilan',
        '$skor_apgar', '$cara_lahir', '$golongan_darah', '$rhesus',
        '$etnis_ayah', '$etnis_ibu', '$rhesus_ibu', '$golongan_darah_ibu')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Data pasien berhasil disimpan!');
        window.location.href = 'patient.php'; // Ganti dengan halaman tujuan
    </script>";
} else {
    echo "<script>
        alert('Gagal menyimpan data: " . $conn->error . "');
        window.location.href = 'add_patient.php';
    </script>";
}
    $conn->close();
}
?>