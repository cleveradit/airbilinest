<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

<?php
$id = $_GET['id']; // sesuaikan dengan nama input hidden dari modal

// Hati-hati terhadap SQL injection: gunakan prepared statement
$stmt = $conn->prepare("DELETE FROM worklist WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
    window.location.href = '".base_url()."hcp/dashboard/worklist_px.php';
                    </script>;";
} else {
    echo "<script>
                        showDangerToast('Delete Failed: " . $stmt->error . "');
                        window.location.href = '".base_url()."hcp/dashboard/worklist_px.php';
                    </script>;";
}

$stmt->close();
$conn->close();
