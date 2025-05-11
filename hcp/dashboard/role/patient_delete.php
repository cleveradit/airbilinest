<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

<?php
$id = $_GET['id']; // sesuaikan dengan nama input hidden dari modal


$sql = "SELECT * FROM patients";
$patient_result = $conn->query($sql);
$patients = [];

if ($patient_result->num_rows > 0) {
    while ($row = $patient_result->fetch_assoc()) {
        $patients[] = $row;
    }
}

// Hati-hati terhadap SQL injection: gunakan prepared statement
$stmt = $conn->prepare("DELETE FROM patients WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
    window.location.href = '".base_url()."hcp/dashboard/patient/patient.php';
                    </script>;";
} else {
    echo "<script>
                        showDangerToast('Delete Failed: " . $stmt->error . "');
                        window.location.href = '".base_url()."hcp/dashboard/patient/patient.php';
                    </script>;";
}

$stmt->close();
$conn->close();
