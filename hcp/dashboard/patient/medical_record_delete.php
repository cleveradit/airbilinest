<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

<?php
$id = $_GET['id']; // sesuaikan dengan nama input hidden dari modal

$sql = "SELECT * FROM medical_records WHERE id='$id'";
$result_medical_record = $conn->query($sql);
$medical_record = $result_medical_record->fetch_assoc();

$patient_id = $medical_record['patient_id'];

// Hati-hati terhadap SQL injection: gunakan prepared statement
$stmt = $conn->prepare("DELETE FROM medical_records WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
    window.location.href = '".base_url()."hcp/dashboard/patient/medical_record.php?id=".$patient_id."';
                    </script>;";
} else {
    echo "<script>
                        showDangerToast('Delete Failed: " . $stmt->error . "');
                        window.location.href = '".base_url()."hcp/dashboard/patient/medical_record.php?id=".$patient_id."';
                    </script>;";
}

$stmt->close();
$conn->close();
