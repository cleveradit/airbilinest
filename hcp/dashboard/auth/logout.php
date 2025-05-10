<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>
<?php

session_start();

session_destroy(); // Hapus semua session

echo "<script>
window.location.href = '".base_url()."hcp/dashboard/auth/login.php';
                    </script>;";

?>