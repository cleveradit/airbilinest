<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php

$sql = "SELECT * FROM worklist ORDER BY created_at DESC;

";
$worklist_result = $conn->query($sql);
$worklists = [];

if ($worklist_result->num_rows > 0) {
    while ($row = $worklist_result->fetch_assoc()) {
        $worklists[] = $row;
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
                    <h3 class="page-title"> Worklist </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="#">Patient</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Worklist</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Worklist Pasien</h4>
                            </div>
                            <div class="wrapper ms-auto action-bar">
                                <button class="btn btn-sm btn-gradient-primary" onclick="window.location.href='worklist_px_add.php'"><i class="fa fa-user me-1"></i> Tambah Pasien</button>
                            </div>
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
                                                        <th>Aksi</th>
                                                        <th>ID Pasien</th>
                                                        <th>Tempat Rawat</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Tanggal Fototerapi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($worklists as $index => $worklist) { ?>
                                                        <tr>
                                                            <td><?php echo $index + 1 ?></td>
                                                            <td>
                                                                <a href="rekam_medis/patient_pdf.php?id=<?php echo $worklist['id'] ?>" class="btn btn-xs btn-outline btn-outline-success me-1" title="Rekam Medis">
                                                                    <i class="fa fa-book"></i>
                                                                </a>
                                                                <a href="worklist_px_edit.php?id=<?php echo $worklist['id'] ?>" class="btn btn-xs btn-outline btn-outline-info me-1" title="Edit">
                                                                    <i class="fa fa-pencil-square-o"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-xs btn-outline btn-outline-danger me-1 btn-delete"
                                                                    title="Delete" data-id="<?= $worklist['id'] ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $worklist['id'] ?></td>
                                                            <td><?php echo $worklist['tempat_rawat'] ?></td>
                                                            <td><?php echo $worklist['nama_pasien'] ?></td>
                                                            <td><?php echo $worklist['jenis_kelamin'] ?></td>
                                                            <td><?php echo $worklist['alamat'] ?></td>
                                                            <td><?php echo $worklist['tanggal_lahir'] ?></td>
                                                            <td><?php echo $worklist['tanggal_ambil_data'] ?></td>
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

        $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        const worklistId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure you want to delete this patient?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Delete!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke controller PHP atau AJAX
                window.location.href = `worklist_px_delete.php?id=${worklistId}`;
                // atau jika pakai AJAX, kirim request di sini
            }
        });
    });
    </script>