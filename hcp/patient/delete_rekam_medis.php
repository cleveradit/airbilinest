<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['medical_record_id']; // sesuaikan dengan nama input hidden dari modal

    $sql = "SELECT * FROM medical_records WHERE id='$id'";
    $result = $conn->query($sql);
    $medical_record = $result->fetch_assoc();
    $patient_id = $medical_record['patient_id'];

    // Hati-hati terhadap SQL injection: gunakan prepared statement
    $stmt = $conn->prepare("DELETE FROM medical_records WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data rekam medis berhasil dihapus!');
            window.location.href = 'rekam_medis.php?id=$patient_id';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data: " . $stmt->error . "');
            window.location.href = 'rekam_medis.php?id=$patient_id';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
