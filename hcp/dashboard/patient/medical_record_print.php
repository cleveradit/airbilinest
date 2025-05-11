<?php

function base_url() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . '://' . $host . '/';
}

session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/hcp/includes/db.php';

if (empty($_SESSION['user_id'])) {
    echo "<script>window.location.href = '" . base_url() . "hcp/dashboard/auth/login.php';</script>";
    exit();
}

$medical_record_id = $_GET['id'];
$sql = "SELECT medical_records.*, 
               patients.nama_pasien, 
               patients.jenis_kelamin, 
               patients.berat_lahir, 
               patients.tanggal_lahir, 
               patients.umur_kehamilan, 
               patients.skor_apgar, 
               patients.cara_lahir, 
               patients.golongan_darah, 
               patients.rhesus, 
               patients.etnis_ayah, 
               patients.etnis_ibu, 
               patients.rhesus_ibu, 
               patients.golongan_darah_ibu,
               users.username 
        FROM medical_records 
        JOIN patients ON patients.id = medical_records.patient_id 
        JOIN users ON users.id = medical_records.user_id 
        WHERE medical_records.id = '$medical_record_id'";
$result_medical_record = $conn->query($sql);
$medical_record = $result_medical_record->fetch_assoc();
// echo "<pre>";
// print_r($medical_record);
// echo "</pre>";
// die();
require($_SERVER['DOCUMENT_ROOT'] . '/hcp/assets/vendors/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Fungsi untuk header bagian
function sectionHeader($pdf, $title) {
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(45, 62, 80); // warna biru gelap
    $pdf->SetTextColor(255);
    $pdf->Cell(0, 5, $title, 0, 1, 'C', true);
    $pdf->SetTextColor(0); // reset ke hitam
    $pdf->Ln(1);
}

// Fungsi isi dua kolom
function rowTwo($pdf, $label1, $value1, $label2, $value2) {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(35, 5, $label1, 0);
    $pdf->Cell(60, 5, $value1, 0);
    $pdf->Cell(30, 5, $label2, 0);
    $pdf->Cell(60, 5, $value2, 0);
    $pdf->Ln();
}

// === HEADER === 
sectionHeader($pdf, 'IDENTITAS, WAKTU, DAN TEMPAT STUDI');
rowTwo($pdf, 'Dokter', ': '.$medical_record['username'], 'Tempat', ': '.$medical_record['tempat_rawat']);
rowTwo($pdf, 'Tanggal', ': '.date('d/m/Y', strtotime($medical_record['tanggal_ambil_data'])), 'Waktu', ': '.date('h:i A', strtotime($medical_record['waktu_ambil_data'])));

sectionHeader($pdf, 'DATA BAYI');
rowTwo($pdf, 'Nama Pasien', ': '.$medical_record['nama_pasien'], 'Jenis Kelamin', ': '.$medical_record['jenis_kelamin']);
rowTwo($pdf, 'Berat Lahir', ': '.$medical_record['berat_lahir'], 'Tanggal Lahir', ': '.date('d/m/Y', strtotime($medical_record['tanggal_lahir'])));
rowTwo($pdf, 'Umur Kehamilan', ': '.$medical_record['umur_kehamilan'], 'Skor Apgar', ': '.$medical_record['skor_apgar']);
rowTwo($pdf, 'Cara Lahir', ': '.$medical_record['cara_lahir'], 'Golongan Darah', ': '.$medical_record['golongan_darah']);
rowTwo($pdf, 'Rhesus', ': '.$medical_record['rhesus'], '', '');

sectionHeader($pdf, 'DATA ORANG TUA');
rowTwo($pdf, 'Etnis Ayah', ': '.$medical_record['etnis_ayah'], 'Etnis Ibu', ': '.$medical_record['etnis_ibu']);
rowTwo($pdf, 'Rhesus Ibu', ': '.$medical_record['rhesus_ibu'], 'Golongan Darah Ibu', ': '.$medical_record['golongan_darah_ibu']);

sectionHeader($pdf, 'PENGUKURAN AWAL');
rowTwo($pdf, 'Berat Aktual (gram)', ': '.$medical_record['berat_aktual'], 'HR (bpm)', ': '.$medical_record['hr']);
rowTwo($pdf, 'RR (bpm)', ': '.$medical_record['rr'], 'Eritema', ': '.$medical_record['eritema']);
rowTwo($pdf, 'Suhu Aksila', ': '.$medical_record['suhu_aksila'], 'Status Hidrasi', ': '.$medical_record['status_hidrasi']);
rowTwo($pdf, 'Kewaspadaan / GCS Skor', ': '.$medical_record['kewaspadaan'], '', '');

sectionHeader($pdf, 'DARAH');
rowTwo($pdf, 'Hemoglobin (HB)', ': '.$medical_record['hemoglobin'], 'Hematokrit (Hct)', ': '.$medical_record['hematokrit']);
rowTwo($pdf, 'RBC', ': '.$medical_record['jumlah_sel_darah_merah'], 'WBC', ': '.$medical_record['jumlah_sel_darah_putih']);
rowTwo($pdf, 'Trombosit', ': '.$medical_record['jumlah_trombosit'], 'Hasil Darah', ': '.$medical_record['hasil_darah']);

sectionHeader($pdf, 'FUNGSI HATI');
rowTwo($pdf, 'SGOT', ': '.$medical_record['sgot'], 'SGPT', ': '.$medical_record['sgpt']);
rowTwo($pdf, 'Hasil Fungsi Hati', ': '.$medical_record['hasil_fungsi_hati'], 'Hasil Bilinorm', ': '.$medical_record['hasil_bilinorm']);

sectionHeader($pdf, 'DETAIL FOTOTERAPI');
rowTwo($pdf, 'Alat', ': '.$medical_record['alat_fototerapi'], 'Lama (jam)', ': '.$medical_record['lama_fototerapi']);
rowTwo($pdf, 'Waktu Mulai', ': '.date('h:i A', strtotime($medical_record['waktu_mulai_fototerapi'])), 'Waktu Lepas', ': '.date('h:i A', strtotime($medical_record['waktu_lepas_fototerapi'])));
rowTwo($pdf, 'Intensitas', ': '.$medical_record['intensitas_fototerapi'], '', '');

sectionHeader($pdf, 'OBSERVASI FOTOTERAPI');
rowTwo($pdf, 'TCB Sebelum', ': '.$medical_record['tcb_sebelum_fototerapi'], 'TSB Sebelum', ': '.$medical_record['tsb_sebelum_fototerapi']);
rowTwo($pdf, 'TCB Sesudah', ': '.$medical_record['tcb_sesudah_fototerapi'], 'TSB Sesudah', ': '.$medical_record['tsb_sesudah_fototerapi']);

sectionHeader($pdf, 'KOMPLIKASI & CATATAN');
$pdf->SetFont('Arial', '', 8);
$pdf->MultiCell(0, 5, 'Observasi: '.$medical_record['observasi']);
$pdf->MultiCell(0, 5, 'Catatan: '.$medical_record['catatan']);

$pdf->Output();
?>
