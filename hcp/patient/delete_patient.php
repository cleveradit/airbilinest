<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['patient_id']; // sesuaikan dengan nama input hidden dari modal

    // Hati-hati terhadap SQL injection: gunakan prepared statement
    $stmt = $conn->prepare("DELETE FROM patients WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data pasien berhasil dihapus!');
            window.location.href = 'patient.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data: " . $stmt->error . "');
            window.location.href = 'patient.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
