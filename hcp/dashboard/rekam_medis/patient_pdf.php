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

$worklist_id = $_GET['id'];
$sql = "SELECT worklist.*, 
               users.username 
        FROM worklist 
        JOIN users ON users.id = worklist.user_id 
        WHERE worklist.id = '$worklist_id'";
$result_worklist = $conn->query($sql);
$worklist = $result_worklist->fetch_assoc();
// echo "<pre>";
// print_r(base_url());
// echo "</pre>";
// die();
require($_SERVER['DOCUMENT_ROOT'] . '/hcp/assets/vendors/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 10);

// Header Logo + Title
$pdf->Image(base_url() . '/assets/App_logo.png', 10, 10, 30); // ganti path sesuai file logo
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 6, '', 0, 1, 'C');
$pdf->Cell(0, 7, 'Medical Records', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 5, 'Smart Phototherapy System Airlangga Bilirubin Nesting', 0, 1, 'C');
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 5, '(AirBiliNest)', 0, 1, 'C');
$pdf->Cell(0, 10, '', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);

// Header dengan latar biru muda
$pdf->SetFillColor(222, 235, 255);
$pdf->Cell(0, 8, 'DATA PASIEN', 0, 1, 'C', true);
$pdf->Ln(3);

// Posisi awal konten setelah header
$startY = $pdf->GetY();
$startX = 10;

// Gambar bayi
$pdf->Image(base_url() . '/assets/baby_sleep.png', $startX, $startY, 30); // ganti path sesuai file logo

// Geser X ke kanan gambar bayi
$leftX = $startX + 35;
$pdf->SetY($startY);
$pdf->SetX($leftX);
$pdf->SetFont('Arial','',7);

// Kolom kiri
$cellHeight = 4;
$pdf->Cell(25, $cellHeight, 'Nama Pasien', 0, 0);
$pdf->Cell(60, $cellHeight, ': '.$worklist['nama_pasien'], 0, 0);

// Kolom kanan
$pdf->Cell(25, $cellHeight, 'Jenis Kelamin', 0, 0);
$pdf->Cell(0, $cellHeight, ': '.$worklist['jenis_kelamin'], 0, 1);

$pdf->SetX($leftX);
$pdf->Cell(25, $cellHeight, 'Berat Lahir', 0, 0);
$pdf->Cell(60, $cellHeight, ': '.$worklist['berat_lahir'].' gram', 0, 0);
$pdf->Cell(25, $cellHeight, 'Tanggal Lahir', 0, 0);
$pdf->Cell(0, $cellHeight, ': '.date('d/m/Y', strtotime($worklist['tanggal_lahir'])), 0, 1);

$pdf->SetX($leftX);
$pdf->Cell(25, $cellHeight, 'Umur Kehamilan', 0, 0);
$pdf->Cell(60, $cellHeight, ': '.$worklist['umur_kehamilan'], 0, 0);
$pdf->Cell(25, $cellHeight, 'Skor Apgar', 0, 0);
$pdf->Cell(0, $cellHeight, ': '.$worklist['skor_apgar'], 0, 1);

$pdf->SetX($leftX);
$pdf->Cell(25, $cellHeight, 'Cara Lahir', 0, 0);
$pdf->Cell(60, $cellHeight, ': '.$worklist['cara_lahir'], 0, 0);
$pdf->Cell(25, $cellHeight, 'Golongan Darah', 0, 0);
$pdf->Cell(0, $cellHeight, ': '.$worklist['golongan_darah'], 0, 1);

$pdf->SetX($leftX);
$pdf->Cell(25, $cellHeight, 'Rhesus', 0, 0);
$pdf->Cell(60, $cellHeight, ': '.$worklist['rhesus'], 0, 1);
$pdf->Ln(12);

// DATA ORANG TUA
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(222, 235, 255);
$pdf->Cell(0, 8, 'DATA ORANG TUA', 0, 1, 'C', true);
$pdf->Ln(1);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(25, 4, 'Etnis Ayah', 0); $pdf->Cell(75, 4, ': '.$worklist['etnis_ayah'], 0);
$pdf->Cell(25, 4, 'Etnis Ibu', 0); $pdf->Cell(0, 4, ': '.$worklist['etnis_ibu'], 0);
$pdf->Ln();
$pdf->Cell(25, 4, 'Rhesus Ibu', 0); $pdf->Cell(75, 4, ': '.$worklist['rhesus_ibu'], 0);
$pdf->Cell(25, 4, 'Golongan Darah Ibu', 0); $pdf->Cell(0, 4, ': '.$worklist['golongan_darah_ibu'], 0);
$pdf->Ln(6);

// DATA PEMERIKSA
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(222, 235, 255);
$pdf->Cell(0, 8, 'DATA PEMERIKSA', 0, 1, 'C', true);
$pdf->Ln(1);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(100, 4, 'Dokter : '. $worklist['username'], 0);
$pdf->Cell(0, 4, 'Tempat : '.$worklist['tempat_rawat'], 0);
$pdf->Ln();
$pdf->Cell(100, 4, 'Tanggal Pemeriksaan : '.date('l, d F Y', strtotime($worklist['tanggal_ambil_data'])), 0);
$pdf->Cell(0, 4, 'Waktu Pemeriksaan : '.date('h:i A', strtotime($worklist['waktu_ambil_data'])), 0);

$pdf->Output();
?>
