<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

<?php
$id = $_GET['id']; // sesuaikan dengan nama input hidden dari modal
$role = $_GET['role']; // sesuaikan dengan nama input hidden dari modal


// Buat query UPDATE
$sql = "UPDATE users SET
        `role` = '$role'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
                        showSuccessToast('Assign role success!');
                        setTimeout(function() {
                            window.location.href = '" . base_url() . "hcp/dashboard/role/role.php';
                        }, 2600); // 2.6 detik = 2600 ms
                    </script>;";
} else {
    echo "<script>
                        showDangerToast('Assign role failed! " . $conn->error . "');
                    </script>;";
}
$conn->close();

$stmt->close();
$conn->close();
