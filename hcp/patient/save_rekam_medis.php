<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $patient_id = $_POST['patient_id'];
    $user_id = $_POST['user_id'];
    $tempat_rawat = $_POST['tempat_rawat'];
    $tanggal_ambil_data = $_POST['tanggal_ambil_data'];
    $waktu_ambil_data = $_POST['waktu_ambil_data'];
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
    $berat_aktual = $_POST['berat_aktual'];
    $hr = $_POST['hr'];
    $rr = $_POST['rr'];
    $eritema = $_POST['eritema'];
    $suhu_aksila = $_POST['suhu_aksila'];
    $status_hidrasi = $_POST['status_hidrasi'];
    $kewaspadaan = $_POST['kewaspadaan'];
    $hemoglobin = $_POST['hemoglobin'];
    $hematokrit = $_POST['hematokrit'];
    $jumlah_sel_darah_merah = $_POST['jumlah_sel_darah_merah'];
    $jumlah_sel_darah_putih = $_POST['jumlah_sel_darah_putih'];
    $jumlah_trombosit = $_POST['jumlah_trombosit'];
    $hasil_darah = $_POST['hasil_darah'];
    $sgot = $_POST['sgot'];
    $sgpt = $_POST['sgpt'];
    $hasil_fungsi_hati = $_POST['hasil_fungsi_hati'];
    $hasil_bilinorm = $_POST['hasil_bilinorm'];
    $alat_fototerapi = $_POST['alat_fototerapi'];
    $lama_fototerapi = $_POST['lama_fototerapi'];
    $waktu_mulai_fototerapi = $_POST['waktu_mulai_fototerapi'];
    $waktu_lepas_fototerapi = $_POST['waktu_lepas_fototerapi'];
    $intensitas_fototerapi = $_POST['intensitas_fototerapi'];
    $tcb_sebelum_fototerapi = $_POST['tcb_sebelum_fototerapi'];
    $tsb_sebelum_fototerapi = $_POST['tsb_sebelum_fototerapi'];
    $tcb_sesudah_fototerapi = $_POST['tcb_sesudah_fototerapi'];
    $tsb_sesudah_fototerapi = $_POST['tsb_sesudah_fototerapi'];
    $observasi = $_POST['observasi'];
    $catatan = $_POST['catatan'];

    $sql_patient = "UPDATE patients SET
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
        WHERE id = $patient_id";

    $conn->query($sql_patient);

    $sql_rekam_medis = "INSERT INTO medical_records (
        patient_id, user_id, tempat_rawat, tanggal_ambil_data, waktu_ambil_data,
        berat_aktual, hr, rr, eritema, suhu_aksila, status_hidrasi, kewaspadaan,
        hemoglobin, hematokrit, jumlah_sel_darah_merah, jumlah_sel_darah_putih, jumlah_trombosit,
        hasil_darah, sgot, sgpt, hasil_fungsi_hati, hasil_bilinorm,
        alat_fototerapi, lama_fototerapi, waktu_mulai_fototerapi, waktu_lepas_fototerapi,
        intensitas_fototerapi, tcb_sebelum_fototerapi, tsb_sebelum_fototerapi,
        tcb_sesudah_fototerapi, tsb_sesudah_fototerapi, observasi, catatan
    ) VALUES (
        '$patient_id', '$user_id', '$tempat_rawat', '$tanggal_ambil_data', '$waktu_ambil_data',
        '$berat_aktual', '$hr', '$rr', '$eritema', '$suhu_aksila', '$status_hidrasi', '$kewaspadaan',
        '$hemoglobin', '$hematokrit', '$jumlah_sel_darah_merah', '$jumlah_sel_darah_putih', '$jumlah_trombosit',
        '$hasil_darah', '$sgot', '$sgpt', '$hasil_fungsi_hati', '$hasil_bilinorm',
        '$alat_fototerapi', '$lama_fototerapi', '$waktu_mulai_fototerapi', '$waktu_lepas_fototerapi',
        '$intensitas_fototerapi', '$tcb_sebelum_fototerapi', '$tsb_sebelum_fototerapi',
        '$tcb_sesudah_fototerapi', '$tsb_sesudah_fototerapi', '$observasi', '$catatan'
    )";
    if ($conn->query($sql_rekam_medis) === TRUE) {
        echo "<script>
            alert('Data rekam medis berhasil disimpan!');
            window.location.href = 'rekam_medis.php?id=$patient_id'; // Ganti dengan halaman tujuan
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data: " . $conn->error . "');
            window.location.href = 'add_rekam_medis.php?id=$patient_id';
        </script>";
    }
    $conn->close();
}
