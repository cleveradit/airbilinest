<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php

$sql = "SELECT * FROM users ORDER BY created_at DESC";
$user_result = $conn->query($sql);
$users = [];

if ($user_result->num_rows > 0) {
    while ($row = $user_result->fetch_assoc()) {
        $users[] = $row;
    }
}



?>
<div class="container-scroller">
    <!-- Sidebar -->
    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/sidebar.php'; ?>

        <!-- Main Content Start -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Assign Role </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="#">Patient</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Assign Role</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Data Users</h4>
                            </div>
                            <!-- <div class="wrapper ms-auto action-bar">
                                <button class="btn btn-sm btn-gradient-primary" onclick="window.location.href='patient_add.php'"><i class="fa fa-user me-1"></i> Tambah Pasien</button>
                            </div> -->
                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="order-listing" class="table dataTable no-footer display responsive nowrap" aria-describedby="order-listing_info" style="font-size:small">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Role</th>
                                                        <th>Nama</th>
                                                        <th>Institusi</th>
                                                        <th>Profesi</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($users as $index => $user) { ?>
                                                        <tr>
                                                            <td><?php echo $index + 1 ?></td>
                                                            <td>
                                                                <select class="form-control btn-role" name="role" id="role" data-id="<?= $user['id'] ?>">
                                                                    <option value=""></option>
                                                                    <option <?php echo $user['role']=='Super Admin' ? 'selected' : '' ?> value="Super Admin">Super Admin</option>
                                                                    <option <?php echo $user['role']=='Admin Instusi' ? 'selected' : '' ?> value="Admin Institusi">Admin Institusi</option>
                                                                    <option <?php echo $user['role']=='Dokter' ? 'selected' : '' ?> value="Dokter">Dokter</option>
                                                                </select>
                                                            </td>
                                                            <td><?php echo $user['username'] ?></td>
                                                            <td><?php echo $user['institution'] ?></td>
                                                            <td><?php echo $user['profession'] ?></td>
                                                            <td><?php echo date('j M Y', strtotime($user['created_at'])) ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 <a href="#">GP</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

    <script>
        $(document).ready(function() {

            new DataTable('#order-listing', {
                layout: {
                    topStart: {
                        buttons: [{
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel-o me-1"></i> Excel',
                            className: 'btn btn-xs btn btn-gradient-success' // Ganti dengan class yang kamu inginkan
                        }]
                    }
                },
                responsive: true
            });

        })

        $(document).on('change', '.btn-role', function(e) {
            e.preventDefault();
            const userId = $(this).data('id');
            const role = $(this).val();

            Swal.fire({
                title: 'Are you sure you want to assign this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Assign!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `role_assign.php?id=${userId}&role=${role}`;
                }
            });
        });
    </script>